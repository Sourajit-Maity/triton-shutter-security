<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cms;
class CmsController extends Controller
{
    public function index() {
        return view('admin.pages.list');
    }

    public function edit($id)
    {        
        $cms = Cms::findOrFail($id);
        if( !empty($cms) ) {
            // echo $cms->slug;die;
            if($cms->slug=='home_page') {
               $details = Cms::with(['home'])->findOrFail($id);
               return view('admin.cms.home-page-edit',compact('details'));
            }
        } 
        // return view('admin.industry.create-edit',compact('industry'));
    }
}
