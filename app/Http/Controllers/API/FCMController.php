<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
}
