<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profession;
class ProfessionController extends Controller
{
    public function index() {
        return view('admin.profession.list',['user'=>null]);
    }

    public function create()
    {
        return view('admin.profession.create-edit',['profession'=>null]);
    }

    public function show($id){
        /*try {
            $Profession = Profession::where('id',$id)->first();
            dd($Profession);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }*/
        try {
            $user= Profession::findOrFail($id);
            return response()->json(['user'=>$user], 200);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
           
           
        }

    }
    
}
