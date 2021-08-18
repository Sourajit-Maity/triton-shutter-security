<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Industry;
use App\Models\Profession;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function getDashboard(){
        $count['userCount'] = User::role('CLIENT')->count();
        $count['activeUserCount'] = User::role('CLIENT')->whereActive(1)->count();
        $count['blockedUserCount'] = User::role('CLIENT')->whereActive(0)->count();


        $count['industryCount'] = Industry::count();
        $count['activeIndustryCount'] = Industry::whereActive(1)->count();
        $count['blockedIndustryCount'] = Industry::whereActive(0)->count();


        $count['professionCount'] = Profession::count();
        $count['activeProfessionCount'] = Profession::whereActive(1)->count();
        $count['blockedProfessionCount'] = Profession::whereActive(0)->count();

        $count['cityCount'] = City::count();
        $count['countryCount'] = Country::count();
        $count['stateCount'] = State::count();
        $users=User::take(5)->latest()->get();

        return view('admin.dashboard',compact('count','users'));
    }
    public function userCreateShow(){
        return view('admin.user-create');
    }
}
