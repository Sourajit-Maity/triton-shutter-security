<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
/**
 * @group  Product Details Management
 *
 * APIs for managing  Product Details functionality
 */
class ProductDetailsController extends Controller
{
    /** 
 * @authenticated
 * @response {
{
    "status": true,
    "data": [
        {
            "id": 4,
            "sender_id": 5,
            "verify_user_id": null,
            "profession_id": 1,
            "accept": 1,
            "product_token": "12345678",
            "active": 1,
            "created_at": "2022-09-20T16:37:31.000000Z",
            "updated_at": "2022-09-20T16:37:31.000000Z",
            "deleted_at": null,
            "product_request_id": {
                "id": 1,
                "profession_name": "Business Owner",
                "profession_description": null,
                "profession_photo_path": null,
                "active": 1,
                "created_at": "2022-09-20T14:31:34.000000Z",
                "updated_at": "2022-09-20T14:31:34.000000Z"
            }
        }
    ]
}
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
public function getProductUserData(Request $request)
{
    $token =  $request->token;

    $invitation = Product::where('product_token', $token)->first();
    
    if($invitation){
        return response()->json(["status" => true, "data" => $invitation]);
    }
    else{
        return response()->json(["status" => true, "message" => "Product Details not found"]);
    }
}

/** 
 * @authenticated
 * @bodyParam profession_id product id required Example: 1
 * @bodyParam product_token string required Example: 123456
 * @response  {
{
    "status": true,
    "message": "Success! Product created",
    "data": {
        "profession_id": "1",
        "product_token": "12345678",
        "sender_id": 5,
        "updated_at": "2022-09-20T16:37:31.000000Z",
        "created_at": "2022-09-20T16:37:31.000000Z",
        "id": 4
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
public function saveProductUserData(Request $request)
{
        $validator      =   Validator::make($request->all(), [
            "profession_id"         =>      "required",
            "product_token"   =>      "required"            
        ]);

        if($validator->fails())
            return response()->json(["status" => false, "validation_errors" => $validator->errors()]);

        $task=new Product($request->all());
        $task->sender_id=auth()->user()->id; 
        $task->save();

        return response()->json(["status" => true, "message" => "Success! Product created", "data" => $task]);
}

   /**
 * Location Sink
 *  @bodyParam  active integer required  Example: 0/1

 * @response {
  {
    "status": true,
    "message": "Success!  update completed",
    "data": {
        "active": "1",
        "id": "4"
    }
}
     */
    public function statusProductChange(Request $request)
     {
        try{
        if ($request->has('full_name') || $request->has('email')) {
            $validator  =   Validator::make($request->all(), [
                "active"  =>  "required",
                "id"  =>  "required",

            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()],201);
            }
        }
        $device_id = $request->get('id');
        $inputs = $request->all();
    
       //dd($inputs);

        if (!empty($inputs)) {
            Product::where('id', $device_id)->update($inputs);
            
            return response()->json(["status" => true, "message" => "Success!  update completed", "data" => $inputs]);
        } else {
            return response()->json(["status" => false, "message" => "update failed!"],201);
        }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
    }
}
