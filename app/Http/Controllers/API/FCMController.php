<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatDetails;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
/**
/**
 * @group  Fcm Token Management
 *
 * APIs for managing basic cms functionality
 */
class FCMController extends Controller
{
    public function index(Request $request){
        $input = $request->all();
        $fcm_token = $input['fcm_token'];
        $user_id = $input['user_id'];
     
     
         $user = User::findOrFail($user_id);
     
        $user->fcm_token = $fcm_token;
        $user->save();
        return response()->json([
            'success'=>true,
            'message'=>'User token updated successfully.'
        ]);
      }




    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $SERVER_API_KEY = 'XXXXXX';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        dd($response);
    }


    /**
 * Token save
 *  @bodyParam  device_token string required  
 

 * @response {
    "status": true,
    "message": "Success! Token saved successfully",
    "data": {
        "device_token": "czczx"
    }
}
     */
    public function saveToken(Request $request)
     {
        try{
        if ($request->has('user_name') && $request->has('profession_id') && $request->has('email') && $request->has('industry_id')) {
            $validator  =   Validator::make($request->all(), [
                "device_token"  =>  "required",


            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()],201);
            }
        }

        $inputs = $request->all();
    
     

        if (!empty($inputs)) {
            User::where('id', auth()->user()->id)->update($inputs);
            
            return response()->json(["status" => true, "message" => "Success! Token saved successfully", "data" => $inputs]);
        } else {
            return response()->json(["status" => false, "message" => "Token update failed!"],201);
        }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
    }


    // Fcm token fetch
    /**
 
 * @response {
    "status": true,
    "data": "czczx"
    }
     */
    public function getToken() {
        $userid= Auth::user()->id;
        $token= User::where('id', $userid)->value('device_token');

        if(!is_null($token)) { 
            return response()->json(["status" => true, "data" => $token]);
        }

        else {
            return response()->json(["status" => false, "message" => "Whoops! no data found"]);
        }        
    }

    /** 
       * Make Order
 * @authenticated
 * @bodyParam products string required Example: [
        {
        "product_id": 1,
        "quantity":1
        },
        {
        "product_id": 2,
        "quantity":1
        }
    ]
 * @response  {
    "status": true,
    "message": "Your order has been successfully Placed."
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */

    //     public function sendChatRequest(Request $request)
    //         {
    //             //try{
    //                 $rules = [
    //                     "receiver_id"   =>      "required",  
    //                     //"chat_token"    =>      "required",     
    //                 ];
    //                 $validator = Validator::make($request->all(),$rules);
    //                 if ($validator->fails()){
                    
    //                     return response()->json([
    //                         'status'=>false,
    //                         'message' => $validator->errors()->all()[0],
    //                         'data'=> new \stdClass()
    //                     ]);
                        
    //                 }
    //                 $receiver_id = $request->input('receiver_id');
    //                 $user = ChatDetails::where('sender_id', auth()->user()->id)->where('receiver_id', $receiver_id)->first();
    //      
    //                 if (empty($user)) {
    //                     $inputs = $request->all();
                                               
    //                     $user=new ChatDetails($inputs);                        
    //                     $user->sender_id=auth()->user()->id;   
    //                     $user->accept = 1;                      
    //                     $user->save();                     
    //                     return response()->json(["status" => true,  "message" => "Success! Request submitted", "data" => $user]);
    //                 } else {
                        
    //                     $token = Str::random(32);
    //                     $inputs = $request->all();
    //             //dd($token);
    //                      ChatDetails::where("id", $user->id)->update(array("sender_id" => auth()->user()->id, "receiver_id" => $request->receiver_id,"chat_token" => $token,"accept" => 2));
        
    //                     return response()->json(["status" => true,   "message" => "Success! Request accepted","token" => $token,"data" => $user]);
                        
    //                 }
    //         // }
    //         // catch(\Exception $e) {
    //         //     return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    //         // }
    //   }


       

/** 
* Chat Details List
* @authenticated

* @response  {
    "status": true,
    "message": "",
    "data": [
        {
            "id": 1,
            "sender_id": 52,
            "receiver_id": 2,
            "accept": 3,
            "chat_token": "qwe",
            "active": 0,
            "created_at": "2021-09-30T06:21:28.000000Z",
            "updated_at": "2021-09-30T06:26:36.000000Z",
            "deleted_at": null,
            "sender_chat_request_id": {
                "id": 52,
                "first_name": "Ray",
                "last_name": "Martin",
                "user_name": "ray2",
                "email": "ray2@test.com",
                "phone": null,
                "address": "seminyak",
                "message": "ghfhg",
                "looking_for": 1,
                "offering": 1,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": 42.75,
                "longitude": 88.21,
                "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
                "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
                "time_available": "10",
                "social_info": null,
                "device_type": null,
                "device_token": "22",
                "industry_id": 1,
                "profession_id": 1,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-09-28T11:16:20.000000Z",
                "updated_at": "2021-09-30T06:17:39.000000Z",
                "full_name": "Ray Martin",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=RM&color=FFFFFF&background=a85232&height=400&width=400"
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Elise",
                "last_name": "Renner",
                "user_name": null,
                "email": "ulises.eichmann@example.org",
                "phone": "352.830.3868",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-09-28T11:13:41.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-09-28T11:13:44.000000Z",
                "updated_at": "2021-09-28T11:13:44.000000Z",
                "full_name": "Elise Renner",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=ER&color=FFFFFF&background=a85232&height=400&width=400"
            }
        }
    ]
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
    public function getChatDetails()
    {
        try{
            $chatdetails = ChatDetails::where('sender_id',Auth::user()->id)->where(function($query){
                $query->where('accept',1)->orWhere('accept',2)->orWhere('accept',3);
            })->with(['senderChatRequestId','receiverChatRequestId'])->orderBy('id','DESC')->get();
            
            if($chatdetails->count() == 0){
                return Response()->Json(["status"=>true,"message"=> 'No data found','data'=>$chatdetails]);
            }
            return Response()->Json(["status"=>true,"message"=> '','data'=>$chatdetails]);

        }catch(\Exception $e) {
            return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
        }
        }

/** 
* @authenticated
* @urlParam receiver_id number required Example: 5

* @response  {
    "status": true,
    "message": "Success! Chat Request Send created",
    "data": {
        "receiver_id": "10",
        "sender_id": 52,
        "accept": 1,
        "updated_at": "2021-09-30T14:00:36.000000Z",
        "created_at": "2021-09-30T14:00:36.000000Z",
        "id": 10
    }
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
    public function sendChatRequest(Request $request)
        {                       
                                $token = Str::random(32);
                                $inputs = $request->all();
                                $user=new ChatDetails($inputs);                        
                                $user->sender_id=auth()->user()->id;   
                                $user->chat_token = $token;      
                                $user->accept = 1;                 
                                $user->save(); 

           return response()->json(["status" => true, "message" => "Success! Chat Request Send", "data" => $user]);   
       }
/** 
* @authenticated
* @urlParam receiver_id number required Example: 5

* @response  {
    "status": true,
    "message": "Success! Request accepted",
    "data": [
        {
            "id": 10,
            "sender_id": 52,
            "receiver_id": 10,
            "accept": 2,
            "chat_token": "F7wlcUvJ6mZS57SKJkkwQfRYNjEx7sj1",
            "active": 0,
            "created_at": "2021-09-30T14:00:36.000000Z",
            "updated_at": "2021-09-30T14:01:12.000000Z",
            "deleted_at": null,
            "sender_chat_request_id": {
                "id": 52,
                "first_name": "Ray",
                "last_name": "Martin",
                "user_name": "ray2",
                "email": "ray2@test.com",
                "phone": null,
                "address": "seminyak",
                "message": "ghfhg",
                "looking_for": 1,
                "offering": 1,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": 42.75,
                "longitude": 88.21,
                "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
                "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
                "time_available": "10",
                "social_info": null,
                "device_type": null,
                "device_token": "22",
                "industry_id": 1,
                "profession_id": 1,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-09-28T11:16:20.000000Z",
                "updated_at": "2021-09-30T14:00:08.000000Z",
                "full_name": "Ray Martin",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=RM&color=FFFFFF&background=a85232&height=400&width=400"
            },
            "receiver_chat_request_id": {
                "id": 10,
                "first_name": "Ava",
                "last_name": "Bernhard",
                "user_name": null,
                "email": "marge22@example.com",
                "phone": "+1.737.625.5903",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-09-28T11:13:41.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-09-28T11:13:44.000000Z",
                "updated_at": "2021-09-28T11:13:44.000000Z",
                "full_name": "Ava Bernhard",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=AB&color=FFFFFF&background=a85232&height=400&width=400"
            }
        }
    ]
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
    public function acceptChatRequest(Request $request)
       {
                
        $validator      =       Validator::make($request->all(), [
            "receiver_id"           =>      "required",
        ]);
        if($validator->fails()) 
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
            $receiver_id = $request->input('receiver_id');
            $token = ChatDetails::where('sender_id', auth()->user()->id)->where('receiver_id', $receiver_id)->value('chat_token');
            //dd($token);
            $chatdetails = ChatDetails::where('sender_id', auth()->user()->id)->where('receiver_id', $receiver_id)->first();
            if (empty($chatdetails)) {
                                                       
                return response()->json(["status" => false,  "message" => "Request Not Found"]);
             } 
            else {
               
                $senderid = auth()->user()->id;
                $inputs = $request->all();
                $inputs['receiver_id'] = $receiver_id;
                $inputs['sender_id'] = $senderid;
                $inputs['chat_token'] = $token;
                $inputs['accept'] = 2;
                // $user->update($inputs);
                ChatDetails::where('sender_id', auth()->user()->id)->update($inputs);
                $user = ChatDetails::where('sender_id', auth()->user()->id)->with(['senderChatRequestId','receiverChatRequestId'])->get();
                return response()->json(["status" => true, "message" => "Success! Request accepted", "data" => $user]);
           }
    }

    /** 
* User Chat Request List
* @authenticated

* @response  {
    "status": true,
    "message": "",
    "data": [
        {
            "id": 12,
            "sender_id": 54,
            "receiver_id": 48,
            "accept": 1,
            "chat_token": "r43Fv9n1k0YC0DyBnb2BkZB5mhJ9j3lY",
            "active": 0,
            "created_at": "2021-10-01T07:27:54.000000Z",
            "updated_at": "2021-10-01T07:29:51.000000Z",
            "deleted_at": null,
            "sender_chat_request_id": {
                "id": 54,
                "first_name": "Tom",
                "last_name": "Martin",
                "user_name": "tom",
                "email": "tom@test.com",
                "phone": null,
                "address": "seminyak",
                "message": "ghfhg",
                "looking_for": 1,
                "offering": 1,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": 42.76,
                "longitude": 88.21,
                "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
                "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
                "time_available": "10",
                "social_info": null,
                "device_type": null,
                "device_token": "22",
                "industry_id": 1,
                "profession_id": 1,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-09-29T07:40:14.000000Z",
                "updated_at": "2021-10-01T06:21:45.000000Z",
                "full_name": "Tom Martin",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=TM&color=FFFFFF&background=a85232&height=400&width=400"
            },
            "receiver_chat_request_id": {
                "id": 48,
                "first_name": "Adonis",
                "last_name": "Stanton",
                "user_name": null,
                "email": "shanel35@example.net",
                "phone": "1-816-597-8063",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-09-28T11:13:44.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "latitude": null,
                "longitude": null,
                "available_from": null,
                "available_to": null,
                "time_available": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-09-28T11:13:46.000000Z",
                "updated_at": "2021-09-28T11:13:46.000000Z",
                "full_name": "Adonis Stanton",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=AS&color=FFFFFF&background=a85232&height=400&width=400"
            }
        }
    ]
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
public function getChatRequestDetails()
{
    try{
        $chatdetails = ChatDetails::where('sender_id',Auth::user()->id)->where(function($query){
            $query->where('accept',1);
        })->with(['senderChatRequestId','receiverChatRequestId'])->orderBy('id','DESC')->get();
        
        if($chatdetails->count() == 0){
            return Response()->Json(["status"=>true,"message"=> 'No data found','data'=>$chatdetails]);
        }
        return Response()->Json(["status"=>true,"message"=> '','data'=>$chatdetails]);

    }catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
    }
    }
}
