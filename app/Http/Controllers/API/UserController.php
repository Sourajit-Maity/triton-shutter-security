<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Industry;
use App\Models\Profession;
use DateTime;
/**
 * @group  User Authentication
 *
 * APIs for managing basic auth functionality
 */
class UserController extends Controller
{

/** 
 * Get-Profession
 * @response  {
    "status": true,
    "data": [
        {
            "id": 2,
            "profession_name": "profession2",
            "active": 1,
            "created_at": "2021-08-19T06:20:27.000000Z",
            "updated_at": "2021-08-19T06:20:27.000000Z"
        },
        {
            "id": 1,
            "profession_name": "profession1",
            "active": 1,
            "created_at": "2021-08-19T05:07:30.000000Z",
            "updated_at": "2021-08-19T05:07:30.000000Z"
        }
    ]
}
 
 */
public function getprofession()
{
    $profession = Profession::where(['active'=>1])->latest()->get();
    
    if(count($profession) > 0){
        return response()->json(["status" => true, "data" => $profession]);
    }
    else{
        return response()->json(["status" => true, "message" => "Profession not found"]);
    }
}
/** 
 * Get-Industry
 * @response  {
    "status": true,
    "data": [
        {
            "id": 2,
            "industry_name": "industry2",
            "industry_description": "industry details",
            "active": 1,
            "created_at": "2021-08-19T06:20:51.000000Z",
            "updated_at": "2021-08-19T06:20:51.000000Z",
            "deleted_at": null
        },
        {
            "id": 1,
            "industry_name": "industry1",
            "industry_description": "industry details",
            "active": 1,
            "created_at": "2021-08-19T05:05:40.000000Z",
            "updated_at": "2021-08-19T05:05:40.000000Z",
            "deleted_at": null
        }
    ]
}
 
 */
public function getindustry()
{
    $industry = Industry::where(['active'=>1])->latest()->get();
    
    if(count($industry) > 0){
        return response()->json(["status" => true, "data" => $industry]);
    }
    else{
        return response()->json(["status" => true, "message" => "Industry not found"]);
    }
}
/** 
 * Register
     * @bodyParam  full_name string required  Example: John
     * @bodyParam  email string required  Example: John@gmail.com
     * @bodyParam user_name string required  Example: John
     * @bodyParam  phone string required  Example: 1122334455
     * @bodyParam  address string required  Example: address
     * @bodyParam  Profile Photo string required  Example: image
     *  @bodyParam  looking for string required  Example: test
     * @bodyParam  profession_id  required  Example: 1
     * @bodyParam  industry_id  required  Example: 1
     * * @bodyParam  password password required  Example: password
     * @response  {
    "status": true,
    "message": "Success! registration completed",
    "token": "6|V3krGzwc7vOLxIK8MUyi3NmKXcEaJk2GqB7QDBGG",
    "data": {
        "first_name": "test",
        "last_name": "test",
        "user_name": "test",
        "email": "test@test.com",
        "phone": "123456789",
        "profession_id": "1",
        "industry_id": "1",
        "address": "address test",
        "message": "looking for Artist",
        "profile_photo_path": "1629438076.png",
        "updated_at": "2021-08-19T05:07:36.000000Z",
        "created_at": "2021-08-19T05:07:36.000000Z",
        "id": 54,
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "pivot": {
                    "model_id": 54,
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
            // "first_name"  =>  "required",
            // "last_name"  =>  "required",
            "full_name"  =>  'required|max:255',
            "user_name"  =>  "required|unique:users",
            "email"  =>  "required|email|unique:users",           
            "password"  =>  "required",
            "profession_id"  =>  "required",
            "industry_id"  =>  "required",          
           // "message" => "required",
           
        ]);


        if($validator->fails()) {
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
        }

        $inputs = $request->all();


        // $user   =   User::create($inputs);
        // $user->assignRole('CLIENT');
        $name = $request->get('full_name');

        $splitName = explode(' ', $name, 2); 

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';

        $user = new User();
        $user->first_name = $first_name;
        $user->last_name= $last_name;
        $user->user_name= $request->get('user_name');
        $user->email= $request->get('email');
        $user->phone= $request->get('phone');
        $user->password= $request->get('password');
        $user->profession_id= $request->get('profession_id');
        $user->industry_id= $request->get('industry_id');
        $user->address= $request->get('address');
        $user->message= $request->get('message');
        $user->assignRole('CLIENT');
        $user->save();

        if(!is_null($user)) {
            $token      =       $user->createToken('token')->plainTextToken;
            return response()->json(["status" => true, "message" => "Success! registration completed","token" => $token, "data" => $user]);
        }
        else {
            return response()->json(["status" => false, "message" => "Registration failed!"],401);
        }       
    }
    /**
     * @bodyParam username string required Example: user@user.com or user
     * @bodyParam password string required Example: 12345678
     * @bodyParam  device_type string required Example: device type
     * @bodyParam  device_token string required Example: device token
     * @response  {
    "status": true,
    "token": "3|VKeacEjkrbok1aDKxqTa1eIgEXgoi8rPPWRFpTJr",
    "data": {
        "id": 1,
        "first_name": "Admin",
        "last_name": "Admin",
        "user_name": "Admin1",
        "email": "admin@admin.com",
        "phone": null,
        "address": null,
        "looking_for": null,
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "social_info": null,
        "device_type": "1",
        "device_token": "1",
        "industry_id": null,
        "profession_id": null,
        "active": 1,
        "created_at": "2021-08-30T05:05:39.000000Z",
        "updated_at": "2021-08-30T06:58:57.000000Z",
        "full_name": "Admin Admin",
        "role_name": "SUPER-ADMIN",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=EBF4FF"
    }
}
     */
public function login(Request $request)
{
    $input = $request->all();

    $validator = Validator::make($request->all(), [
        "username" =>  "required",
        "password" =>  "required",
        // "device_type" => "required",
        // "device_token" => "required",
    ]);

    if ($validator->fails()) {
        return response()->json(["validation_errors" => $validator->errors()]);
    }

    $useremail = User::where("email", $request->email)->first();
    $username = User::where("user_name", $request->user_name)->first();

    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

    if (is_null($useremail || $username)) {
        return response()->json(["status" => false, "message" => "Failed! email or username not found"],401);
    }
   
    if(Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
        $user       =       Auth::user();
        //dd($user);
        $token      =       $user->createToken('token')->plainTextToken;
        // dd($request);
        User::where("id", $user->id)->update(array("device_type" => $request->device_type, "device_token" => $request->device_token));

        return response()->json(["status" => true,  "token" => $token, "data" => $user]);
    } else {

        return response()->json(["status" => false, "message" => "Whoops! invalid username or password"],401);
    }
}
/** 
 * User View
 * @authenticated
 * @response  {
    "status": true,
    "data": {
        "id": 54,
        "first_name": "test",
        "last_name": "test",
        "email": "test@test.com",
        "phone": "123456789",
        "address": null,
        "message": "message",
        "looking_for": 1,
        "offering": 0,
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "social_info": null,
        "device_type": null,
        "device_token": null,
        "industry_id": 1,
        "profession_id": 1,
         "latitude": null,
        "longitude": null,
        "available_from": "00:00:23",
        "available_to": "00:00:05",
        "active": 0,
        "created_at": "2021-08-19T05:07:36.000000Z",
        "updated_at": "2021-08-19T05:07:36.000000Z",
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
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
 * Profile update
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
     * Password Change
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
                return response()->json(["status" => false, "validation_errors" => $validator->errors()],401);
            }

            $user->password = $request->confirm_password;
            $user->save();

            return response()->json(["status" => true, "message" => "Success! password change successfully", "data" => $user]);
        } else {
            return response()->json(["status" => false, "message" => "Whoops! Old password is invalid"],401);
        }
    }

    /**
     * Forgot password
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
    * Otp Verification
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
 * Edit Profile
 * @bodyParam  full_name string required  Example: John Doe
 * @bodyParam user_name string required  Example: John
 * @bodyParam  profession_id string required  Example: 1
 * @bodyParam  industry_id string required  Example: 1
 *  @bodyParam  latitude string required  Example: lat
 *  @bodyParam  longitude string required  Example: long
 * @bodyParam  email string   Example: John@gmail.com
 * @bodyParam  phone string   Example: 1122334455
 * @bodyParam  address string   Example: address
 * @bodyParam  available_to  required  Example: 1630651142
 *  @bodyParam  looking for  required  Example: 1
 * @bodyParam  offering  required  Example: 1
 * @bodyParam  available_from    Example: 1630651142
 * @bodyParam  profile_photo_path  file 
 * @response {
    "status": true,
    "message": "Success! Profile update completed",
    "data": {
        "first_name": "sourajit",
        "last_name": "m",
        "user_name": "sourm",
        "email": "sourajitm8@gmail.com1",
        "address": "test address",
        "phone": null,
        "profession_id": "1",
        "industry_id": "1",
        "message": "message",
        "looking_for": "1",
        "offering": "0",
        "available_from": "23.14",
        "available_to": "5.01",
        "longitude": "74.52",
        "latitude": "45.12",
        "profile_photo_path": "/uploads/profile-photos/16304800051228993330.png"
    }
}
     * @response  401 {
    "status": false,
    "message": "Profile update failed!"
    }
     */
    public function editprofile(Request $request)
    {

        if ($request->has('full_name') && $request->has('profession_id') && $request->has('email') && $request->has('industry_id')) {
            $validator  =   Validator::make($request->all(), [
                "full_name"  =>  "required",
                "email"  =>  "required",
                //"phone"  =>  "requiredphp",
                // "profile_photo_path" => "required",
                 "address" => "required",
                "profession_id"  =>  "required",
                "industry_id"  =>  "required",
                "message"  =>  "required",
                 "available_from"  =>  "required",
                 "available_to"  =>  "required",
                 //"latitude"  =>  "required",
                // "longitude"  =>  "required",


            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()],401);
            }
        }

       // $inputs = $request->all();

       $name = $request->get('full_name');
    //    $available_form = $request->get('available_from');
    //    $available_to = $request->get('available_to');
    //    dd($available_form);
        //$available_form_convert = (date("Y-m-d",$available_form)); 
        // $dt1 = new DateTime("@$available_form");
        // $available_form_convert = $dt1->format('Y-m-d H:i:s');
        // $dt2 = new DateTime("@$available_to");
        // $available_to_convert = $dt1->format('Y-m-d H:i:s');
        //dd($available_to_convert);
        $splitName = explode(' ', $name, 2); 

       $first_name = $splitName[0];
       
       $last_name = !empty($splitName[1]) ? $splitName[1] : '';
       
       $inputs['first_name'] = $first_name;
       $inputs['last_name'] = $last_name;
       $inputs['user_name'] = $request->get('user_name');
       $inputs['email'] = $request->get('email');
       $inputs['address'] = $request->get('address');
       $inputs['phone'] = $request->get('phone');
       $inputs['profession_id'] = $request->get('profession_id');
       $inputs['industry_id'] = $request->get('industry_id');
       $inputs['message'] = $request->get('message');
       $inputs['looking_for'] = $request->get('looking_for');
       $inputs['offering'] = $request->get('offering');
       $inputs['available_from'] = $request->get('available_from');
       $inputs['available_to'] = $request->get('available_to');
  
       $inputs['longitude'] = $request->get('longitude');
       $inputs['latitude'] = $request->get('latitude');

       $full_name = $request->get('full_name');
       //dd($inputs);

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
            
            return response()->json(["status" => true, "message" => "Success! Profile update completed", "data" => $inputs, $full_name]);
        } else {
            return response()->json(["status" => false, "message" => "Profile update failed!"],401);
        }
    }

/**
 * Location Sink
 *  @bodyParam  latitude string required  Example: 33.15
 *  @bodyParam  longitude string required  Example: 85.14

 * @response {
    "status": true,
    "message": "Success! Location update completed",
    "data": {
        "longitude": "33.15",
        "latitude": "85.14"
    }
}
     * @response  401 {
    "status": false,
    "message": "Location update failed!"
    }
     */
    public function sinklocation(Request $request)
    {

        if ($request->has('full_name') && $request->has('profession_id') && $request->has('email') && $request->has('industry_id')) {
            $validator  =   Validator::make($request->all(), [
                "latitude"  =>  "required",
                "longitude"  =>  "required",


            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()],401);
            }
        }

        $inputs = $request->all();
    
       //dd($inputs);

  

        if (!empty($inputs)) {
            User::where('id', auth()->user()->id)->update($inputs);
            
            return response()->json(["status" => true, "message" => "Success! Location update completed", "data" => $inputs]);
        } else {
            return response()->json(["status" => false, "message" => "Profile update failed!"],401);
        }
    }
/**
 *Social signup
 * @bodyParam  first_name string required  Example: John
 * @bodyParam  last_name string required  Example: Doe
 * @bodyParam  email string required  Example: John@gmail.com
 * @bodyParam  social_id string required  Example: 1122334455
 * @bodyParam  social_account_type string required  Example: social_account_type
 * @bodyParam  device_type string required Example: device type
 * @bodyParam  device_token string required Example: device token 
 * @bodyParam  password string required Example: password
 * @bodyParam  password_confirmation string required Example: password
    
     * @response {
    "status": true,
    "token": "2|TskImAyBQSIUR58AS5sGMUvyEIHe8nUiHTteVV4h",
    "message": "Success! registration completed",
    "data": {
        "first_name": "ranit",
        "last_name": "ray",
        "email": "ranit@rc.com",
        "updated_at": "2021-08-19T05:55:18.000000Z",
        "created_at": "2021-08-19T05:55:18.000000Z",
        "id": 55,
        "full_name": "ranit ray",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=tghfh&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "pivot": {
                    "model_id": 55,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
     
     */
    // public function socialsignup(Request $request)
    // {
    //     $validator  =   Validator::make($request->all(), [
    //         // "first_name"  =>  "required",
    //         // "last_name"  =>  "required",
    //         "full_name"  =>  "required",
    //         "email"  =>  "required|email",
    //         "social_id"  =>  "required",
    //         "social_account_type"  =>  "required",
    //         "device_token" => "required",
    //         "device_type" => "required",
    //         //"password" => "required",

    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
    //     }
    //     $user = User::where('social_id', $request->social_id)->first();

    //     if (empty($user)) {
    //        // $inputs = $request->all();

    //         //$user   =   User::create($inputs);
    //         $name = $request->get('full_name');

    //         $splitName = explode(' ', $name, 2); 

    //         $first_name = $splitName[0];
    //         $last_name = !empty($splitName[1]) ? $splitName[1] : '';

    //         $user = new User();
    //         $user->first_name = $first_name;
    //         $user->last_name= $last_name;
    //         $user->email= $request->get('email');
    //         $user->social_id= $request->get('social_id');
    //         $user->password= $request->get('password');
    //         $user->social_account_type= $request->get('social_account_type');
    //         $user->device_token= $request->get('device_token');
    //         $user->device_type= $request->get('device_type');
           
    //         $user->assignRole('CLIENT');
    //         $user->save();
    //         $token  =   $user->createToken('token')->plainTextToken;
    //         //$user->assignRole('CLIENT');
    //         return response()->json(["status" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user]);
    //     } else {
    //         $token      =       $user->createToken('token')->plainTextToken;

    //         User::where("id", $user->id)->update(array("device_type" => $request->device_type, "device_token" => $request->device_token));

    //         return response()->json(["status" => true,  "token" => $token, "message" => "Success! login successfull",  "data" => $user->assignRole('CLIENT')]);
          
    //     }
    // }
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
         //dd($user);
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
    /** 
 * Update-User
 * @authenticated
 * @response  {
    "status": true,
    "message": "Success! User updated",
    "data": {
        "id": 54,
        "first_name": "Jack",
        "last_name": "Dawson",
        "email": "jack@test.com",
        "phone": "5654665756",
        "address": "Test Address",
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
         "latitude": "22.86",
        "longitude": "45.65",
        "available_from": "12.00",
        "available_to": "5.00",
        "social_info": null,
        "device_type": null,
        "device_token": null,
        "industry_id": "2",
        "profession_id": "2",
        "message": "message",
        "looking_for": "1",
        "offering": "0",
        "active": 0,
        "created_at": "2021-08-19T05:07:36.000000Z",
        "updated_at": "2021-08-19T08:06:38.000000Z",
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */


public function updateuser(Request $request,  User $user) {

    $validator      =       Validator::make($request->all(), [
        "full_name"   => "required",
        "user_name"   => "required",
        "email"  => "required|email",
        "address" => "required",
        "profession_id"  =>  "required",
        "industry_id"  =>  "required",
        "message"  =>  "required",
        "available_from"  =>  "required",
        "available_to"  =>  "required",
        "latitude"  =>  "required",
        "longitude"  =>  "required",
    ]);
    if($validator->fails()) 
        return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

        $path = '';
        if ($request->hasFile('profile_photo_path')) {
    
        $messsages = array(
            'required' => 'The :attribute field is required.'
        );            
        $rules = array(
            "profile_photo_path"  =>  "mimes:jpeg,jpg,png",
        );
        $validator = Validator::make($request->all(), $rules,$messsages);
            if($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }
        $path = $request->file('profile_photo_path')->store('avatars');
    }
        //$inputs = $request->all();
        $name = $request->get('full_name');

        $splitName = explode(' ', $name, 2); 

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';
 
        $inputs['first_name'] = $first_name;
        $inputs['last_name'] = $last_name;
        $inputs['user_name'] = $request->get('user_name');
        $inputs['email'] = $request->get('email');
        $inputs['address'] = $request->get('address');
        $inputs['phone'] = $request->get('phone');
        $inputs['profession_id'] = $request->get('profession_id');
        $inputs['industry_id'] = $request->get('industry_id');
        $inputs['message'] = $request->get('message');
        $inputs['looking_for'] = $request->get('looking_for');
        $inputs['offering'] = $request->get('offering');
        $inputs['available_from'] = $request->get('available_from');
        $inputs['available_to'] = $request->get('available_to');
        $inputs['longitude'] = $request->get('longitude');
        $inputs['latitude'] = $request->get('latitude');

        if ($request->hasFile('profile_photo_path')) {
            $imagefile = time().'.'.$request->profile_photo_path->extension();  
            $request->profile_photo_path->move(public_path('/storage/attachFile/'), $imagefile);
            $inputs->profile_photo_path= $imagefile;
          }

            $user->update($inputs);
            

    return response()->json(["status" => true, "message" => "Success! User updated", "data" => $user]);
    
}

/**
 * User Filter list
 * @urlParam industry_id number required Example: 1
 * @urlParam profession_id number required Example: 1
 * @urlParam looking_for number required Example: 1/0
 * @urlParam offering number required Example: 1/0
 *  @urlParam latitude number required Example: 1
 * @urlParam longitude number required Example: 1
 *  @urlParam radius number required Example: 1-5
 * @response {
    "status": true,
    "data": [
        {
            "id": 52,
            "user_name": "sourm",
            "first_name": "Sourajit",
            "last_name": "M",
            "looking_for": 1,
            "available_from": "2021-09-03 06:39:02",
            "available_to": "2021-09-03 06:39:02",
            "offering": 0,
            "email": "sourajitm8@gmail.com1",
            "industry_id": 1,
            "profession_id": 1,
            "address": "gfdgdgd",
            "latitude": 45.12,
            "longitude": 74.52,
            "distance": 0,
            "full_name": "Sourajit M",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Sourajit&color=7F9CF5&background=EBF4FF",
            "industries": {
                "id": 1,
                "industry_name": "fghf",
                "industry_description": "fghfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:29.000000Z",
                "updated_at": "2021-09-03T07:07:29.000000Z",
                "deleted_at": null
            },
            "professions": {
                "id": 1,
                "profession_name": "gfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:21.000000Z",
                "updated_at": "2021-09-03T07:07:21.000000Z"
            }
        }
    ]
}
     */
    
    public function getuserlist(Request $request, $industryid, $professionid,$looking_for, $offering,$latitude,$longitude,$radius){

        //1st function
      

        // $shops          =       DB::table("users");

        // $shops          =       $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
        //                         * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
        //                         + sin(radians(" .$latitude. ")) * sin(radians(latitude))) AS distance"));
        // $shops          =       $shops->having('distance', '<', 20);
        // $shops          =       $shops->orderBy('distance', 'asc');

        // $shops          =       $shops->get();

        //2nd function
        // $circle_radius = 3959;
        // $max_distance = 20;
        // $lat = $latitude;
        // $lng = $longitude;

        //     return $user = DB::select(
        //                 'SELECT * FROM
        //                         (SELECT id, name, address, phone, latitude, longitude, (' . $circle_radius . ' * acos(cos(radians(' . $lat . ')) * cos(radians(latitude)) *
        //                         cos(radians(longitude) - radians(' . $lng . ')) +
        //                         sin(radians(' . $lat . ')) * sin(radians(latitude))))
        //                         AS distance
        //                         FROM users) AS distances
        //                     WHERE distance < ' . $max_distance . '
        //                     ORDER BY distance
        //                     OFFSET 0
        //                     LIMIT 20;
        //                 ');
      
            
        $user = User::selectRaw("id, user_name,first_name,last_name,looking_for,available_from,available_to,offering,email,industry_id,profession_id, address, latitude, longitude,
        ( 6371 * acos( cos( radians(?) ) *
          cos( radians( latitude ) )
          * cos( radians( longitude ) - radians(?)
          ) + sin( radians(?) ) *
          sin( radians( latitude ) ) )
        ) AS distance", [$latitude, $longitude, $latitude])
            ->where(['active'=>1, 'industry_id'=>$industryid, 'profession_id'=>$professionid, 'offering'=> $offering, 'looking_for'=> $looking_for])->with(['industries','professions'])
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)
            ->get();

            
            if(count($user) > 0){
                return response()->json(["status" => true, "data" => $user]);
            }
            else{
               return response()->json(["status" => true, "message" => "List not found"]);
            }
      
        
    }



    //if condition user search
    /**
 * User Filter list Post method Or condition
 * @urlParam industry_id number required Example: 1
 * @urlParam profession_id number required Example: 1
 * @urlParam looking_for number required Example: 1/0
 * @urlParam offering number required Example: 1/0
 *  @urlParam latitude number required Example: 1
 * @urlParam longitude number required Example: 1
 *  @urlParam radius number required Example: 1-5
 * @response {
    "status": true,
    "data": [
        {
            "id": 52,
            "user_name": "sourm",
            "first_name": "Sourajit",
            "last_name": "M",
            "looking_for": 1,
            "available_from": "2021-09-03 06:39:02",
            "available_to": "2021-09-03 06:39:02",
            "offering": 0,
            "email": "sourajitm8@gmail.com1",
            "industry_id": 1,
            "profession_id": 1,
            "address": "gfdgdgd",
            "latitude": 45.12,
            "longitude": 74.52,
            "distance": 0,
            "full_name": "Sourajit M",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Sourajit&color=7F9CF5&background=EBF4FF",
            "industries": {
                "id": 1,
                "industry_name": "fghf",
                "industry_description": "fghfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:29.000000Z",
                "updated_at": "2021-09-03T07:07:29.000000Z",
                "deleted_at": null
            },
            "professions": {
                "id": 1,
                "profession_name": "gfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:21.000000Z",
                "updated_at": "2021-09-03T07:07:21.000000Z"
            }
        },
        {
            "id": 55,
            "user_name": "sourw",
            "first_name": "East",
            "last_name": "Zone",
            "looking_for": 1,
            "available_from": "2021-09-03 06:39:02",
            "available_to": "2021-09-03 06:39:02",
            "offering": 0,
            "email": "sourajitm@gmail.com",
            "industry_id": 1,
            "profession_id": 1,
            "address": "gfdgdgd",
            "latitude": 45.12,
            "longitude": 74.52,
            "distance": 0,
            "full_name": "East Zone",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=East&color=7F9CF5&background=EBF4FF",
            "industries": {
                "id": 1,
                "industry_name": "fghf",
                "industry_description": "fghfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:29.000000Z",
                "updated_at": "2021-09-03T07:07:29.000000Z",
                "deleted_at": null
            },
            "professions": {
                "id": 1,
                "profession_name": "gfhf",
                "active": 1,
                "created_at": "2021-09-03T07:07:21.000000Z",
                "updated_at": "2021-09-03T07:07:21.000000Z"
            }
        }
    ]
}
     */
    public function filter(Request $request, User $user)
    {
        
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $radius = $request->input('radius');
        $user = $user->newQuery();
    

        if ($request->has('industry_id')) {
            $user->where('industry_id', $request->input('industry_id'));
        }
    

        if ($request->has('profession_id')) {
            $user->where('profession_id', $request->input('profession_id'));
        }
    

        if ($request->has('offering')) {
            $user->where('offering', $request->input('offering'));
        }

        if ($request->has('looking_for')) {
            $user->where('looking_for', $request->input('looking_for'));
        }

        // if ($request->has('latitude' || 'longitude')) {
        //     $user->where('latitude', $request->input('latitude') || 'longitude', $request->input('longitude'));
        // }

        $userdata = $user->selectRaw("id, user_name,first_name,last_name,looking_for,available_from,available_to,offering,email,industry_id,profession_id, address, latitude, longitude,
        ( 6371 * acos( cos( radians(?) ) *
          cos( radians( latitude ) )
          * cos( radians( longitude ) - radians(?)
          ) + sin( radians(?) ) *
          sin( radians( latitude ) ) )
        ) AS distance", [$latitude, $longitude, $latitude])
        ->orWhere(['active'=>1])
            ->with(['industries','professions'])
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->offset(0)
            ->limit(20)
        ->get();

        if(count($userdata) > 0){
            return response()->json(["status" => true, "data" => $userdata]);
        }
        else{
           return response()->json(["status" => true, "message" => "List not found"]);
        }
    }


    //picture update
    public function piceditprofile(Request $request) {

        
        $messsages = array(
            'required' => 'The :attribute field is required.'
        );
        
        $rules = array(
            "first_name"  =>  "required",
            "last_name"  =>  "required",
            "username"=>"required",
            "bio"=>"required",
            'username' => [
                'required',
                Rule::unique('users')->ignore(Auth::id()),
            ],            
            
        );
    
        $validator = Validator::make($request->all(), $rules,$messsages);

        if($validator->fails()) {
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
        }

        
        $path = '';
        if ($request->hasFile('profile_photo')) {
           
            $messsages = array(
                'required' => 'The :attribute field is required.'
            );            
            $rules = array(
                "profile_photo"  =>  "mimes:jpeg,jpg,png",
            );
            $validator = Validator::make($request->all(), $rules,$messsages);
            if($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            }
            $path = $request->file('profile_photo')->store('avatars');
            
            // $request->profile_photo->move(public_path('/storage/attachFile/'), $fileName);
            // $profile_photopath= $path;
            // User::where('id', Auth::id())->update(['profile_photo'=>$path]);
        }
        $inputs = $request->all();
        if (!empty($inputs)) {
            if($path) {
                $inputs['profile_photo'] = $path;
            }
            User::where('id', auth()->user()->id)->update($inputs);
            return response()->json(["status" => true, "message" => "Success! Profile update completed"]);
        } else {
            return response()->json(["status" => false, "message" => "Profile update failed!"]);
        }
    }


}
