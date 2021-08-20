<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invitation;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
/**
 * @group  Invitation Management
 *
 * APIs for managing  invitation functionality
 */
class InvitationController extends Controller
{
   
/** 
 * @authenticated
 * @response {
    "status": true,
    "data": [
        {
            "id": 1,
            "inviter_id": 1,
            "invited_id": 4,
            "active": 1,
            "created_at": "2021-08-20T09:42:10.000000Z",
            "updated_at": "2021-08-20T09:42:10.000000Z",
            "deleted_at": null,
            "usersinvitation": {
                "id": 1,
                "first_name": "Admin",
                "last_name": "Admin",
                "email": "admin@admin.com",
                "phone": null,
                "address": null,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 1,
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "full_name": "Admin Admin",
                "role_name": "SUPER-ADMIN",
                "profile_photo_url": "https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=EBF4FF"
            },
            "usersinvited": {
                "id": 4,
                "first_name": "Lelah",
                "last_name": "Wuckert",
                "email": "wyman01@example.com",
                "phone": "+16808068368",
                "address": null,
                "email_verified_at": "2021-08-18T10:15:30.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 0,
                "created_at": "2021-08-18T10:15:33.000000Z",
                "updated_at": "2021-08-18T10:15:33.000000Z",
                "full_name": "Lelah Wuckert",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=Lelah&color=7F9CF5&background=EBF4FF"
            }
        },
        {
            "id": 2,
            "inviter_id": 1,
            "invited_id": 10,
            "active": 1,
            "created_at": "2021-08-20T09:46:56.000000Z",
            "updated_at": "2021-08-20T09:46:56.000000Z",
            "deleted_at": null,
            "usersinvitation": {
                "id": 1,
                "first_name": "Admin",
                "last_name": "Admin",
                "email": "admin@admin.com",
                "phone": null,
                "address": null,
                "email_verified_at": null,
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 1,
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "full_name": "Admin Admin",
                "role_name": "SUPER-ADMIN",
                "profile_photo_url": "https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=EBF4FF"
            },
            "usersinvited": {
                "id": 10,
                "first_name": "Terence",
                "last_name": "Gislason",
                "email": "karen75@example.com",
                "phone": "(575) 795-3129",
                "address": null,
                "email_verified_at": "2021-08-18T10:15:30.000000Z",
                "current_team_id": null,
                "profile_photo_path": null,
                "otp": null,
                "social_id": null,
                "social_account_type": null,
                "social_info": null,
                "device_type": null,
                "device_token": null,
                "industry_id": null,
                "profession_id": null,
                "active": 0,
                "created_at": "2021-08-18T10:15:34.000000Z",
                "updated_at": "2021-08-18T10:15:34.000000Z",
                "full_name": "Terence Gislason",
                "role_name": "CLIENT",
                "profile_photo_url": "https://ui-avatars.com/api/?name=Terence&color=7F9CF5&background=EBF4FF"
            }
        }
    ]
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
public function index()
{
    $invitation = Invitation::where("inviter_id", auth()->user()->id)->where(['active'=>1])->with(['usersinvitation','usersinvited'])->get();
    
    if(count($invitation) > 0){
        return response()->json(["status" => true, "data" => $invitation]);
    }
    else{
        return response()->json(["status" => true, "message" => "Invitation not found"]);
    }
}

/** 
* @authenticated
* @bodyParam invited_id  required Example: 5

* @response  {
    "status": true,
    "message": "Success! invitation created",
    "data": {
        "invited_id": "5",
        "inviter_id": 1,
        "updated_at": "2021-08-20T10:00:26.000000Z",
        "created_at": "2021-08-20T10:00:26.000000Z",
        "id": 3
    }
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
public function store(Request $request)
{
        $validator      =   Validator::make($request->all(), [
            "invited_id"         =>      "required",        
        ]);

        if($validator->fails())
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

        $invitation=new Invitation($request->all());
        $invitation->inviter_id=auth()->user()->id; 
        $invitation->save();

        return response()->json(["status" => true, "message" => "Success! invitation created", "data" => $invitation]);
}
/** 
* @authenticated
* @urlParam invited number required Example: 5
* @response  {
    "status": true,
    "data": []
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
public function show(Invitation $invitation)
{
    return response()->json(["status" => true, "data" => $invitation]);
}
/** 
* @authenticated
* @urlParam invited_id number required Example: 5

* @response  {
    "status": true,
    "message": "Success! task updated",
    "data": []
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
public function update(Request $request, Invitation $invitation)
{
    $validator      =       Validator::make($request->all(), [
        "invited_id"           =>      "required",
    ]);
    if($validator->fails()) 
        return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

    $invitation->update($request->all());
    return response()->json(["status" => true, "message" => "Success! task updated", "data" => $invitation]);
}
/** 
* @authenticated
* @urlParam invitation number required Example: 5
* @response  {
    "status": true,
    "message": "Success! Invitation deleted"
}
* @response  401 {
*   "message": "Unauthenticated."
*}
*/
public function destroy(Invitation $invitation)
{
    $invitation->delete();
    return response()->json(["status" => true, "message" => "Success! Invitation deleted"], 200);
}
}
