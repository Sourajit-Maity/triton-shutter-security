<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ChatDetails;
use App\Models\UserBlockList;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

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
                try{
                    $rules = [
                        "receiver_id"   =>      "required",  
                        //"chat_token"    =>      "required",     
                    ];
                    $validator = Validator::make($request->all(),$rules);
                    if ($validator->fails()){
                    
                        return response()->json([
                            'status'=>false,
                            'message' => $validator->errors()->all()[0],
                            'data'=> new \stdClass()
                        ]);
                        
                    }
                    $receiver_id = $request->input('receiver_id');
                    $user = ChatDetails::where('sender_id', auth()->user()->id)->where('receiver_id', $receiver_id)->first();
         
                    if (empty($user)) {                        
                        $token = Str::random(32);
                        $inputs = $request->all();
                        $user=new ChatDetails($inputs);                        
                        $user->sender_id=auth()->user()->id;   
                        $user->chat_token = $token;      
                        $user->accept = 1;                 
                        $user->save();                    
                        return response()->json(["status" => true,  "message" => "Success! Chat Request Send", "data" => $user]);
                    } else {
                        
                        
                        $value = ChatDetails::where("id", $user->id)->first();
                        return response()->json(["status" => true,   "message" => "Success! Request already sent","data" => $value]);
                        
                    }
            }
            catch(\Exception $e) {
                return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
            }
      }


       

/** 
* Chat Details List
* @authenticated
* @response  {
    "status": true,
    "message": "",
    "data": [
        {
            "id": 2,
            "sender_id": 42,
            "receiver_id": 2,
            "accept": 2,
            "chat_token": "Ahg7R61uTzhKhLddhG2VDKkdvgQMoY68",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-04-02T00:00:00.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Hii Jacky accept my request",
                "read": false,
                "receiver_id": 53,
                "sender_id": 54,
                "time": "Tue Oct 05 2021 12:07:34 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 42,
                "first_name": "Diamond",
                "last_name": "Lowe",
                "user_name": null,
                "email": "maybell21@example.net",
                "phone": "1-847-561-5377",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:51.000000Z",
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
                "created_at": "2021-10-04T09:40:57.000000Z",
                "updated_at": "2021-10-04T09:40:57.000000Z",
                "full_name": "Diamond Lowe",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=DL&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
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
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=RJ&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
            }
        },
        {
            "id": 1,
            "sender_id": 6,
            "receiver_id": 2,
            "accept": 2,
            "chat_token": "XnS1OXNREigzD9OYl9ZJdE3ZvfvJEQNn",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-10-04T18:05:27.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Accept pls",
                "read": false,
                "receiver_id": 55,
                "sender_id": 53,
                "time": "Mon Oct 04 2021 17:35:26 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 6,
                "first_name": "Vida",
                "last_name": "Grant",
                "user_name": null,
                "email": "xhamill@example.org",
                "phone": "605.388.8187",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
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
                "created_at": "2021-10-04T09:40:54.000000Z",
                "updated_at": "2021-10-04T09:40:54.000000Z",
                "full_name": "Vida Grant",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=VG&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
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
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=RJ&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
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
            // $userblocklist = UserBlockList::where('user_id', Auth::user()->id)->where('block', 0)->pluck('block_user_id');
            // $userblockId = UserBlockList::where('block_user_id', Auth::user()->id)->where('block', 0)->pluck('user_id');  
            $chatdetails = ChatDetails::where('sender_id',Auth::user()->id)
            // ->whereNotIn('receiver_id',$userblocklist)
            // ->whereNotIn('sender_id',$userblockId)
            ->orWhere('receiver_id',Auth::user()->id)->where(function($query){
                $query->orWhere('accept',2);
            })->with(['senderChatRequestId.industries','senderChatRequestId.professions','receiverChatRequestId.industries','receiverChatRequestId.professions'])->orderBy('id','DESC')->get();
            
        //     $blockUsers = $chatdetails->filter(function ($item,$key)
        //     {    
               

        //         $userblocklist = UserBlockList::where('user_id', Auth::user()->id)->where('block', 0)->value('block_user_id'); 

        //         $userblockId = UserBlockList::where('block_user_id', Auth::user()->id)->where('block', 0)->value('user_id'); 

        //         if($userblocklist)
        //         {                        
        //             return $item->receiver_id != $userblocklist;
        //         }
        //         elseif($userblockId){
        //             return $item->sender_id !=  $userblockId;
        //           }
        //        else
        //        {
        //            return  1;
        //        }

              
        //     });
            
        //    $chatdetails = $blockUsers->all();
           
        //    $chatdetails = collect([$chatdetails][0]);
            
            if($chatdetails->count() == 0){
                return Response()->Json(["status"=>true,"message"=> 'No data found','data'=>$chatdetails]);
            }

            $tokens = [];

            foreach ($chatdetails as $key => $value) {
                $tokens[$key] = $value->chat_token;
            }

            $lastMessages = $this->chatData($tokens);


            foreach ($chatdetails as $key => $value) {
                $chatdetails[$key]['lastMessage'] = $lastMessages[$key];
            }
            return Response()->Json(["status"=>true,"message"=> '','data'=>$chatdetails]);

        }
        catch(\Exception $e) {
            return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
        }
        }


/** 
* @authenticated
* @urlParam sender_id number required Example: 5

* @response  {
    "status": true,
    "message": "Success! Request accepted",
    "data": [
        {
            "id": 1,
            "sender_id": 51,
            "receiver_id": 45,
            "accept": 2,
            "chat_token": "AS2GAw9dJpx4pt0uusmhM6oOv4HhOgH9",
            "active": 0,
            "created_at": "2021-10-04T13:28:54.000000Z",
            "updated_at": "2021-10-04T13:45:55.000000Z",
            "deleted_at": null,
            "sender_chat_request_id": {
                "id": 51,
                "first_name": "Monique",
                "last_name": "Welch",
                "user_name": null,
                "email": "ferry.melody@example.net",
                "phone": "231.688.6936",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T13:26:25.000000Z",
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
                "device_token": "22",
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T13:26:27.000000Z",
                "updated_at": "2021-10-04T13:28:27.000000Z",
                "full_name": "Monique Welch",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=MW&color=FFFFFF&background=a85232&height=400&width=400"
            },
            "receiver_chat_request_id": {
                "id": 45,
                "first_name": "Bernard",
                "last_name": "Terry",
                "user_name": null,
                "email": "rey27@example.net",
                "phone": "+1-651-661-7664",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T13:26:25.000000Z",
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
                "device_token": "22",
                "industry_id": null,
                "profession_id": null,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T13:26:27.000000Z",
                "updated_at": "2021-10-04T13:29:27.000000Z",
                "full_name": "Bernard Terry",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=BT&color=FFFFFF&background=a85232&height=400&width=400"
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
        try{        
                $validator      =       Validator::make($request->all(), [
                    "sender_id"           =>      "required",
                ]);
                if($validator->fails()) 
                    return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
                    $sender_id = $request->input('sender_id');
                    $token = ChatDetails::where('receiver_id', auth()->user()->id)->where('sender_id', $sender_id)->value('chat_token');
                    //dd($token);
                    $chatdetails = ChatDetails::where('receiver_id', auth()->user()->id)->where('sender_id', $sender_id)->first();
                    if (empty($chatdetails)) {
                                                            
                        return response()->json(["status" => false,  "message" => "Request Not Found"]);
                    } 
                    else {
                    
                        $receiverid = auth()->user()->id;
                        $inputs = $request->all();
                        $inputs['receiver_id'] = $receiverid;
                        $inputs['sender_id'] = $sender_id;
                        $inputs['chat_token'] = $token;
                        $inputs['accept'] = 2;
                        // $user->update($inputs);
                        ChatDetails::where('receiver_id', auth()->user()->id)->update($inputs);
                        $user = ChatDetails::where('receiver_id', auth()->user()->id)->with(['senderChatRequestId','receiverChatRequestId'])->get();
                        return response()->json(["status" => true, "message" => "Success! Request accepted", "data" => $user]);
                }
             }
        catch(\Exception $e) {
            return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
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
            "id": 2,
            "sender_id": 42,
            "receiver_id": 2,
            "accept": 1,
            "chat_token": "Ahg7R61uTzhKhLddhG2VDKkdvgQMoY68",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-04-02T00:00:00.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Hii Jacky accept my request",
                "read": false,
                "receiver_id": 53,
                "sender_id": 54,
                "time": "Tue Oct 05 2021 12:07:34 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 42,
                "first_name": "Diamond",
                "last_name": "Lowe",
                "user_name": null,
                "email": "maybell21@example.net",
                "phone": "1-847-561-5377",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:51.000000Z",
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
                "created_at": "2021-10-04T09:40:57.000000Z",
                "updated_at": "2021-10-04T09:40:57.000000Z",
                "full_name": "Diamond Lowe",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=DL&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
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
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=RJ&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
            }
        },
        {
            "id": 1,
            "sender_id": 6,
            "receiver_id": 2,
            "accept": 1,
            "chat_token": "XnS1OXNREigzD9OYl9ZJdE3ZvfvJEQNn",
            "active": 1,
            "created_at": "2021-10-04T18:05:27.000000Z",
            "updated_at": "2021-10-04T18:05:27.000000Z",
            "deleted_at": null,
            "lastMessage": {
                "message": "Accept pls",
                "read": false,
                "receiver_id": 55,
                "sender_id": 53,
                "time": "Mon Oct 04 2021 17:35:26 GMT+0530"
            },
            "sender_chat_request_id": {
                "id": 6,
                "first_name": "Vida",
                "last_name": "Grant",
                "user_name": null,
                "email": "xhamill@example.org",
                "phone": "605.388.8187",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
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
                "created_at": "2021-10-04T09:40:54.000000Z",
                "updated_at": "2021-10-04T09:40:54.000000Z",
                "full_name": "Vida Grant",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=VG&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": null,
                "professions": null
            },
            "receiver_chat_request_id": {
                "id": 2,
                "first_name": "Rebecca",
                "last_name": "Jacobi",
                "user_name": "rebecca_jacobi",
                "email": "ubogisich@example.com",
                "phone": "+1-425-265-9847",
                "address": null,
                "message": null,
                "looking_for": 0,
                "offering": 0,
                "email_verified_at": "2021-10-04T09:40:48.000000Z",
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
                "industry_id": 1,
                "profession_id": 2,
                "fcm_token": null,
                "active": 1,
                "invitation_accept": 0,
                "currently_online": 1,
                "created_at": "2021-10-04T09:40:52.000000Z",
                "updated_at": "2021-10-04T12:32:41.000000Z",
                "full_name": "Rebecca Jacobi",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=RJ&color=FFFFFF&background=a85232&height=400&width=400",
                "industries": {
                    "id": 1,
                    "industry_name": "industry 1",
                    "industry_description": "svhskdbkdj",
                    "active": 1,
                    "created_at": "2021-10-04T18:07:58.000000Z",
                    "updated_at": "2021-10-04T18:07:58.000000Z",
                    "deleted_at": null
                },
                "professions": {
                    "id": 2,
                    "profession_name": "profession2",
                    "active": 1,
                    "created_at": "2021-10-04T18:08:47.000000Z",
                    "updated_at": "2021-10-04T18:08:47.000000Z"
                }
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
        // $userblocklist = UserBlockList::where('user_id', Auth::user()->id)->where('block', 0)->pluck('block_user_id');
        // $userblockId = UserBlockList::where('block_user_id', Auth::user()->id)->where('block', 0)->pluck('user_id');  
        $chatdetails = ChatDetails::
        // whereNotIn('receiver_id',$userblocklist)
        // ->whereNotIn('sender_id',$userblockId)->
        where('receiver_id',Auth::user()->id)->where(function($query){
            $query->where('accept',1);
        })->with(['senderChatRequestId.industries','senderChatRequestId.professions','receiverChatRequestId.industries','receiverChatRequestId.professions'])->orderBy('id','DESC')->get();

        if($chatdetails->count() == 0){
            
            return Response()->Json(["status"=>true,"message"=> 'No data found','data'=>$chatdetails]);
        }

        $tokens = [];

        foreach ($chatdetails as $key => $value) {
            
            $tokens[$key] = $value->chat_token;
            // dd($tokens[$key]);
        }

        $lastMessages = $this->chatData($tokens);
        // dd($lastMessages);

        foreach ($chatdetails as $key => $value) {
            $chatdetails[$key]['lastMessage'] = $lastMessages[$key];
        }
        return Response()->Json(["status"=>true,"message"=> '','data'=>$chatdetails]);

    }catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
    }
    }

    /** 
* @authenticated
* @urlParam sender_id number required Example: 5

* @response {
    "status": true,
    "message": "Success! Request cancelled"
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
public function canceltChatRequest(Request $request)
{
    try
        {
                $validator      =       Validator::make($request->all(), [
                "sender_id"           =>      "required",
            ]);
            if($validator->fails()) 
                return response()->json(["status" => false, "validation_errors" => $validator->errors()]);
                $sender_id = $request->input('sender_id');
                $token = ChatDetails::where('receiver_id', auth()->user()->id)->where('sender_id', $sender_id)->value('chat_token');
                //dd($token);
                $chatdetails = ChatDetails::where('receiver_id', auth()->user()->id)->where('sender_id', $sender_id)->first();
                if (empty($chatdetails)) {
                                                        
                    return response()->json(["status" => false,  "message" => "Request Not Found"]);
                } 
                else {
                
                    $receiverid = auth()->user()->id;
                    $inputs = $request->all();
                    $inputs['receiver_id'] = $receiverid;
                    $inputs['sender_id'] = $sender_id;
                    $inputs['chat_token'] = NULL;
                    $inputs['accept'] = 3;
                    // $user->update($inputs);
                    ChatDetails::where('receiver_id', auth()->user()->id)->update($inputs);
                    $user = ChatDetails::where('receiver_id', auth()->user()->id)->with(['senderChatRequestId','receiverChatRequestId'])->get();
                    return response()->json(["status" => true, "message" => "Success! Request cancelled", ]);
            }
        }
        catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
         }
    }

    private function chatData($tokens)
    {
        try {
            $jsonFile = ServiceAccount::fromValue(public_path('nghbr-324911-7719d6256d5f.json'));
            $factory = (new Factory)
                    ->withServiceAccount($jsonFile)
                    ->withDatabaseUri('https://nghbr-324911-default-rtdb.firebaseio.com/');

            $database = $factory->createDatabase();
            // $snapshot = $database->getReference('/chatMessages/')->getSnapshot();
            // $tokens = $database->getReference('/chatMessages/')->getChildKeys();

            $chatData = [];

            foreach ($tokens as $key => $result) {
                $resultData = $database->getReference('/chatMessages/' . $result)->orderByKey()->limitToLast(1)->getValue();
                $getChildKey = array_key_first($resultData);
                $chatData[$key] = $resultData[$getChildKey];
            }

            if(count($chatData) > 0){
                return $chatData;
            }else{
                return $chatData;
            }
        } catch (\Exception $e) {
            return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.']);
        }
    }

    
}
