<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

/**
 * @group  User Authentication
 *
 * APIs for managing basic auth functionality
 */
class UserController extends Controller
{
/** 
 * @bodyParam  first_name string required  Example: John
 * @bodyParam  last_name string required  Example: Doe
 * @bodyParam  email string required  Example: John@gmail.com
 * @bodyParam  phone string required  Example: 1122334455
 * @response  {
    "status": true,
    "message": "Success! registration completed",
    "data": {
        "first_name": "john",
        "last_name": "doe",
        "email": "john@gmail.com",
        "phone": "1122334455",
        "updated_at": "2021-02-18T12:14:01.000000Z",
        "created_at": "2021-02-18T12:14:01.000000Z",
        "id": 56,
        "full_name": "john doe",
        "role_name": "CLIENT",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-02-17T06:58:17.000000Z",
                "updated_at": "2021-02-17T06:58:17.000000Z",
                "pivot": {
                    "model_id": 56,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
 */
    public function register(Request $request) {
        $validator  =   Validator::make($request->all(), [
            "first_name"  =>  "required",
            "last_name"  =>  "required",
            "email"  =>  "required|email|unique:users",
            "phone"  =>  "required|unique:users",
            "password"  =>  "required"
        ]);

        if($validator->fails()) {
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();

        $user   =   User::create($inputs);
        $user->assignRole('CLIENT');

        if(!is_null($user)) {
            return response()->json(["status" => true, "message" => "Success! registration completed", "data" => $user]);
        }
        else {
            return response()->json(["status" => false, "message" => "Registration failed!"]);
        }       
    }
/** 
 * @bodyParam email string required Example: user@user.com
 * @bodyParam password string required Example: 12345678
 * @response  {
    "status": true,
    "token": "6|Imv8VDsE27b1sRclxv91emCSIbLpxLmfvK3wFsAa",
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
 */
    public function login(Request $request) {

        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user=User::where("email", $request->email)->first();

        if(is_null($user)) {
            return response()->json(["status" => false, "message" => "Failed! email not found"]);
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user       =       Auth::user();
            $token      =       $user->createToken('token')->plainTextToken;

            return response()->json(["status" => true,  "token" => $token, "data" => $user]);
        }
        else {
            return response()->json(["status" => false, "message" => "Whoops! invalid password"]);
        }
    }
/** 
 * @authenticated
 * @response  {
    "status": true,
    "data": {
        "id": 55,
        "first_name": "Abhik",
        "last_name": "paul",
        "email": "abhik421@gmail.com",
        "phone": "6655443321",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-02-17T15:13:27.000000Z",
        "updated_at": "2021-02-17T15:13:27.000000Z",
        "full_name": "Abhik paul",
        "role_name": "CLIENT"
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function user() {
        $user= Auth::user();
        if(!is_null($user)) { 
            return response()->json(["status" => true, "data" => $user]);
        }

        else {
            return response()->json(["status" => false, "message" => "Whoops! no user found"]);
        }        
    }




    /**
     * @authenticated
     * @bodyParam  first_name string Example: Emoryy
     * @bodyParam  last_name string Example: Wiza
     * @bodyParam  email string Example: lueilwitz.caterina@example.com
     * @bodyParam  phone string Example: (345) 744-1545
     * @response  {
    "status": true,
    "message": "Success! user profile updated",
    "data": {
        "id": 2,
        "first_name": "Emoryy",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-05T10:41:07.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Emory&color=7F9CF5&background=EBF4FF"
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function profile_update(Request $request)
    {

        User::where('id', auth()->user()->id)->update($request->all());
        $user = User::where('id', auth()->user()->id)->get();
        return response()->json(["status" => true, "message" => "Success! user profile updated", "data" => $user]);
    }

    /**
     * @authenticated
     * @bodyParam  old_password string required Example: 11111111
     * @bodyParam  new_password string required Example: 22222222
     * @bodyParam  confirm_password string required Example: 22222222
     * @response  {
    "status": true,
    "message": "Success! password change successfully",
    "data": {
        "id": 2,
        "first_name": "Emory",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-08T07:50:35.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Emory&color=7F9CF5&background=EBF4FF"
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */

    public function password_change(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $password = $user->password;
        if (Hash::check($request->old_password, $password)) {

            $validator = Validator::make($request->all(), [
                "old_password" =>  "required",
                "new_password" =>  "required|min:8",
                "confirm_password" =>  "required|same:new_password",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }

            $user->password = $request->confirm_password;
            $user->save();

            return response()->json(["status" => true, "message" => "Success! password change successfully", "data" => $user]);
        } else {
            return response()->json(["status" => false, "message" => "Whoops! Old password is invalid"]);
        }
    }

    /**
     * @bodyParam  email string required Example: lueilwitz.caterina@example.com
     * @bodyParam  password string required Example: danwdjdajw
     * @response  {
    "status": true,
    "message": "Success! password change successfully",
    "data": {
        "id": 2,
        "first_name": "Emory",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-08T07:50:35.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Emory&color=7F9CF5&background=EBF4FF"
    }
}
     */

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();

        if (is_null($user)) {
            return response()->json(["status" => false, "message" => "Failed! email not found"]);
        }

        // $new_pass = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstvwxyzABCDEFGGHIJKLMNOPQRSTUVWXYZ', 36)), 0, 8);

        $details = [
            'title' =>  "Change password  request for HeartTheLook",
            'body'  =>  "Your password is reset.",
        ];

        Mail::to($user->email)->send(new ForgotPasswordMail($details));

        if (Mail::failures()) {
            return response()->json(["status" => false, "message" => "Failed! unable to send password to your mail"]);
        } else {

            $update_pass = User::find($user->id);
            $update_pass->password = ($request->password);
            $update_pass->save();

            return response()->json(["status" => true, "message" => "Success! password change successfully", "data" => $user]);
        }
    }

    /**
     * @bodyParam  email string required Example: lueilwitz.caterina@example.com
     * @bodyParam  otp number  Example: 1234
     * @response  {

    "status": true,
    "message": "Success! Otp Send successfully",
    "data": {
        "id": 3,
        "first_name": "Makayla",
        "last_name": "Runte",
        "email": "cedrick.schmitt@example.com",
        "phone": "609.587.7230",
        "email_verified_at": "2021-03-11T07:39:50.000000Z",
        "otp": 2430,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-11T07:39:54.000000Z",
        "updated_at": "2021-03-12T06:36:42.000000Z",
        "full_name": "Makayla Runte",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Makayla&color=7F9CF5&background=EBF4FF"
    }
 }
     */
    public function otpverification(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if (is_null($request->otp)) {
            $validator = Validator::make($request->all(), [
                "email" =>  "required|email",
            ]);
            if ($validator->fails()) {
                return response()->json(["validation_errors" => $validator->errors()]);
            }
            $otp = rand(1000, 9999);
            $details = [
                'title' =>  "OTP for HeartTheLook",
                'body'  =>  "Your Email Verification otp is - " . $otp,
            ];

            Mail::to($request->email)->send(new OtpVerificationMail($details));
            if (Mail::failures()) {
                return response()->json(["status" => false, "message" => "Failed! unable to send password to your mail"]);
            } else {
                $userdetail = User::find($user->id);
                $userdetail->otp = $otp;
                $userdetail->save();
                return response()->json(["status" => true, "message" => "Success! Otp Send successfully", "data" => $userdetail]);
            }
        } else {

            $validator = Validator::make($request->all(), [
                "email" =>  "required|email",
                "otp"   =>  "required|max:4"
            ]);
            if ($validator->fails()) {
                return response()->json(["validation_errors" => $validator->errors()]);
            }

            $userdetail = User::find($user->id);
            if ($userdetail->otp == $request->otp) {
                $userdetail->otp = '';
                $userdetail->email_verified_at = \Carbon\Carbon::now()->timestamp;
                $userdetail->save();
                return response()->json(["status" => true, "message" => "Success! Otp Verified successfully"]);
            } else {
                return response()->json(["status" => true, "message" => "Fail! Otp Not Verified"]);
            }
        }
    }

 

    /**
     * @bodyParam  first_name string required  Example: John
     * @bodyParam  last_name string required  Example: Doe
     * @bodyParam  phone string required  Example: 1122334455
     * @bodyParam  profile_photo_path  file 
     * @response {
    "status": true,
    "message": "Success! Profile update completed"
    }
     * @response  401 {
    "status": false,
    "message": "Profile update failed!"
    }
     */
    public function editprofile(Request $request)
    {

        if ($request->has('first_name') && $request->has('last_name') && $request->has('email') && $request->has('phone')) {
            $validator  =   Validator::make($request->all(), [
                "first_name"  =>  "required",
                "last_name"  =>  "required",
                //"email"  =>  "required|unique:users",
                "phone"  =>  "requiredphp",
                // "profile_photo_path" => "required",
            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }
        }

        $inputs = $request->all();
        if ($request->hasFile('profile_photo_path')) {
            $this->validate(request(), [
                'profile_photo_path' => 'mimes:jpeg,jpg,png',
            ], [
                'profile_photo_path.mimes' => 'Image must be jpeg,jpg or png type.',
            ]);

            $fileName = time() . rand() . '.' . $request->profile_photo_path->extension();
            $request->file('profile_photo_path')->storeAs(
                'public/uploads/profile-photos/',
                $fileName
            );
            $inputs['profile_photo_path'] = '/uploads/profile-photos/' . $fileName;
        }

        if (!empty($inputs)) {
            User::where('id', auth()->user()->id)->update($inputs);
            return response()->json(["status" => true, "message" => "Success! Profile update completed"]);
        } else {
            return response()->json(["status" => false, "message" => "Profile update failed!"]);
        }
    }


    /**
     * socialsignup
     * @bodyParam  first_name string required  Example: John
     * @bodyParam  last_name string required  Example: Doe
     * @bodyParam  email string required  Example: John@gmail.com
     * @bodyParam  social_id string required  Example: 1122334455
     * @bodyParam  social_account_type string required  Example: social_account_type
     * @bodyParam  device_type string required Example: device type
     * @bodyParam  device_token string required Example: device token
    
     * @response  {
        "status": true,
        "token": "39|bhS7JawUelLpJVaNEOrDltEporGJPkkOWijC3Aht",
        "message": "Success! registration completed ?? Success! login successfull",
        "data": {
            "first_name": "John",
            "last_name": "Doe",
            "email": "John@gmaildw.com",
            "social_id": "1122334455",
            "social_account_type": "social_account_type",
            "device_type": "device type",
            "device_token": "device token",
            "updated_at": "2021-06-11T09:43:51.000000Z",
            "created_at": "2021-06-11T09:43:51.000000Z",
            "id": 64,
            "full_name": "John Doe",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=John&color=7F9CF5&background=EBF4FF",
            "roles": [
                {
                    "id": 2,
                    "name": "CLIENT",
                    "guard_name": "web",
                    "created_at": "2021-06-09T08:25:25.000000Z",
                    "updated_at": "2021-06-09T08:25:25.000000Z",
                    "pivot": {
                        "model_id": 64,
                        "role_id": 2,
                        "model_type": "App\\Models\\User"
                    }
                }
            ]
        }
    }
     
     */
    public function socialsignup(Request $request)
    {
        $validator  =   Validator::make($request->all(), [
            "first_name"  =>  "required",
            "last_name"  =>  "required",
            "email"  =>  "required|email",
            "social_id"  =>  "required",
            "social_account_type"  =>  "required",
            "device_token" => "required",
            "device_type" => "required",

        ]);
        if ($validator->fails()) {
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
        }
        $user = User::where('social_id', $request->social_id)->first();
        // dd($user);
        if (empty($user)) {
            $inputs = $request->all();

            $user   =   User::create($inputs);
            $token  =   $user->createToken('token')->plainTextToken;
            $user->assignRole('CLIENT');
            return response()->json(["status" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user]);
        } else {
            $token      =       $user->createToken('token')->plainTextToken;
            // dd($request);
            User::where("id", $user->id)->update(array("device_type" => $request->device_type, "device_token" => $request->device_token));

            return response()->json(["status" => true,  "token" => $token, "message" => "Success! login successfull",  "data" => $user->assignRole('CLIENT')]);
            // return response()->json(["status" => false, "message" => "Registration failed!"]);
        }
    }
}
