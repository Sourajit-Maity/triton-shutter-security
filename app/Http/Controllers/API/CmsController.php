<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ContactPage;
use App\Models\AboutPage;
use App\Models\Cms;
use App\Models\HomePage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
/**
 * @group  CMS Management
 *
 * APIs for managing basic cms functionality
 */
class CmsController extends Controller
{
    /** 
 * CMS Homepage
 * @response{
    "status": true,
    "data": {
        "id": 1,
        "cms_id": 1,
        "banner_heading": "Home page heading",
        "banner_sub_heading": "Home page sub heading",
        "banner_description": "<p>Home page Description&nbsp;</p>\n",
        "banner_image": "cms_images/436c35208ced04ea9dec31bd037036fc.png",
        "created_at": "2021-08-18T10:15:38.000000Z",
        "updated_at": "2021-08-19T11:02:44.000000Z"
    }
}

 */


public function gethomepage(){

    $home = HomePage::first();          
    return response()->json(["status" => true, "data" => $home]);
   
    
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
