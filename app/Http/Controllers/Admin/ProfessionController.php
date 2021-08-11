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
        try {
            $profession= Profession::findOrFail($id);
            return view('admin.profession.create-edit',['profession'=>$profession]);
        } catch (Illuminate\Database\Eloquent\ModelNotFoundException $e) {
           
           
        }

    }
    
}
