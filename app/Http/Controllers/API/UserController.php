<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Industry;
use App\Models\Filter;
use App\Models\Profession;
use App\Models\UserDistance;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
/**
 * @group  User Authentication
 *
 * APIs for managing basic auth functionality
 */
class UserController extends Controller
{
/** 
 * Get all User
 * @response  {
    "status": true,
    "data": [
        {
            "id": 33,
            "first_name": "Sonia",
            "last_name": "Russel",
            "user_name": null,
            "email": "kskiles@example.org",
            "phone": "386.569.4741",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Sonia Russel",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Sonia&color=FFFFFF&background=a85232"
        },
        {
            "id": 34,
            "first_name": "Javonte",
            "last_name": "Quigley",
            "user_name": null,
            "email": "allie.bosco@example.net",
            "phone": "838.425.6273",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Javonte Quigley",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Javonte&color=FFFFFF&background=a85232"
        },
        {
            "id": 35,
            "first_name": "Vella",
            "last_name": "Padberg",
            "user_name": null,
            "email": "christophe03@example.org",
            "phone": "1-959-934-8275",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Vella Padberg",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Vella&color=FFFFFF&background=a85232"
        },
        {
            "id": 36,
            "first_name": "Damon",
            "last_name": "Cruickshank",
            "user_name": null,
            "email": "grace64@example.net",
            "phone": "+1-404-907-2735",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Damon Cruickshank",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Damon&color=FFFFFF&background=a85232"
        },
        {
            "id": 37,
            "first_name": "Josh",
            "last_name": "Kshlerin",
            "user_name": null,
            "email": "rigoberto.hilpert@example.org",
            "phone": "1-859-832-5532",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Josh Kshlerin",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Josh&color=FFFFFF&background=a85232"
        },
        {
            "id": 38,
            "first_name": "Annabell",
            "last_name": "Altenwerth",
            "user_name": null,
            "email": "emilia72@example.net",
            "phone": "+1.321.710.6046",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Annabell Altenwerth",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Annabell&color=FFFFFF&background=a85232"
        },
        {
            "id": 39,
            "first_name": "Khalil",
            "last_name": "Bogisich",
            "user_name": null,
            "email": "pfannerstill.mia@example.com",
            "phone": "703-659-1138",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Khalil Bogisich",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Khalil&color=FFFFFF&background=a85232"
        },
        {
            "id": 40,
            "first_name": "Dedric",
            "last_name": "Collier",
            "user_name": null,
            "email": "nabbott@example.org",
            "phone": "+13137499316",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Dedric Collier",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Dedric&color=FFFFFF&background=a85232"
        },
        {
            "id": 41,
            "first_name": "Patricia",
            "last_name": "Nienow",
            "user_name": null,
            "email": "yasmin.barrows@example.net",
            "phone": "+1-754-649-8095",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Patricia Nienow",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Patricia&color=FFFFFF&background=a85232"
        },
        {
            "id": 42,
            "first_name": "Jaylen",
            "last_name": "McClure",
            "user_name": null,
            "email": "reynolds.jonathan@example.net",
            "phone": "(253) 502-3505",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Jaylen McClure",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Jaylen&color=FFFFFF&background=a85232"
        },
        {
            "id": 43,
            "first_name": "Britney",
            "last_name": "Schaden",
            "user_name": null,
            "email": "dach.cathryn@example.com",
            "phone": "+1-432-264-3426",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Britney Schaden",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Britney&color=FFFFFF&background=a85232"
        },
        {
            "id": 44,
            "first_name": "Nicklaus",
            "last_name": "Fisher",
            "user_name": null,
            "email": "qmclaughlin@example.net",
            "phone": "1-352-707-6811",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Nicklaus Fisher",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Nicklaus&color=FFFFFF&background=a85232"
        },
        {
            "id": 45,
            "first_name": "Demetris",
            "last_name": "Gottlieb",
            "user_name": null,
            "email": "alexane.feil@example.org",
            "phone": "+1-228-755-9347",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Demetris Gottlieb",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Demetris&color=FFFFFF&background=a85232"
        },
        {
            "id": 46,
            "first_name": "Daren",
            "last_name": "Walker",
            "user_name": null,
            "email": "schumm.kailey@example.org",
            "phone": "(458) 534-7533",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Daren Walker",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Daren&color=FFFFFF&background=a85232"
        },
        {
            "id": 47,
            "first_name": "Cora",
            "last_name": "Harvey",
            "user_name": null,
            "email": "maegan15@example.org",
            "phone": "951.284.7444",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Cora Harvey",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Cora&color=FFFFFF&background=a85232"
        },
        {
            "id": 48,
            "first_name": "Mariah",
            "last_name": "Rohan",
            "user_name": null,
            "email": "angelo45@example.org",
            "phone": "+1 (862) 489-7538",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Mariah Rohan",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Mariah&color=FFFFFF&background=a85232"
        },
        {
            "id": 49,
            "first_name": "Jennie",
            "last_name": "Spencer",
            "user_name": null,
            "email": "wmiller@example.net",
            "phone": "667.658.9074",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Jennie Spencer",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Jennie&color=FFFFFF&background=a85232"
        },
        {
            "id": 50,
            "first_name": "Felipa",
            "last_name": "Reynolds",
            "user_name": null,
            "email": "jordan35@example.com",
            "phone": "+1-540-888-5894",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Felipa Reynolds",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Felipa&color=FFFFFF&background=a85232"
        },
        {
            "id": 51,
            "first_name": "Rafaela",
            "last_name": "Howe",
            "user_name": null,
            "email": "kub.kathryne@example.net",
            "phone": "843-864-0546",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:10.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:12.000000Z",
            "updated_at": "2021-09-21T11:16:12.000000Z",
            "full_name": "Rafaela Howe",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Rafaela&color=FFFFFF&background=a85232"
        },
        {
            "id": 10,
            "first_name": "Akeem",
            "last_name": "Pacocha",
            "user_name": null,
            "email": "ufahey@example.com",
            "phone": "+1-828-767-0174",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Akeem Pacocha",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Akeem&color=FFFFFF&background=a85232"
        },
        {
            "id": 11,
            "first_name": "Tressa",
            "last_name": "Wiza",
            "user_name": null,
            "email": "kelli69@example.com",
            "phone": "(726) 576-4678",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Tressa Wiza",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Tressa&color=FFFFFF&background=a85232"
        },
        {
            "id": 12,
            "first_name": "Ofelia",
            "last_name": "Skiles",
            "user_name": null,
            "email": "jerrod.nolan@example.org",
            "phone": "509.850.9927",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Ofelia Skiles",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Ofelia&color=FFFFFF&background=a85232"
        },
        {
            "id": 13,
            "first_name": "Shakira",
            "last_name": "Willms",
            "user_name": null,
            "email": "xaltenwerth@example.net",
            "phone": "+1 (209) 834-3483",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Shakira Willms",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Shakira&color=FFFFFF&background=a85232"
        },
        {
            "id": 14,
            "first_name": "Jeffrey",
            "last_name": "Crona",
            "user_name": null,
            "email": "darrin.aufderhar@example.org",
            "phone": "+1.689.756.4551",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Jeffrey Crona",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Jeffrey&color=FFFFFF&background=a85232"
        },
        {
            "id": 15,
            "first_name": "Bridget",
            "last_name": "Mosciski",
            "user_name": null,
            "email": "kaci.kihn@example.net",
            "phone": "754-731-0874",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Bridget Mosciski",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Bridget&color=FFFFFF&background=a85232"
        },
        {
            "id": 16,
            "first_name": "Reece",
            "last_name": "Robel",
            "user_name": null,
            "email": "jovani.brakus@example.com",
            "phone": "(865) 910-9680",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Reece Robel",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Reece&color=FFFFFF&background=a85232"
        },
        {
            "id": 17,
            "first_name": "Horacio",
            "last_name": "Schulist",
            "user_name": null,
            "email": "wuckert.misty@example.net",
            "phone": "+1.856.801.6175",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Horacio Schulist",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Horacio&color=FFFFFF&background=a85232"
        },
        {
            "id": 18,
            "first_name": "Gilbert",
            "last_name": "Carter",
            "user_name": null,
            "email": "merritt.murazik@example.org",
            "phone": "248.413.1524",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Gilbert Carter",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Gilbert&color=FFFFFF&background=a85232"
        },
        {
            "id": 19,
            "first_name": "Karli",
            "last_name": "Krajcik",
            "user_name": null,
            "email": "skemmer@example.org",
            "phone": "(540) 264-2393",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Karli Krajcik",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Karli&color=FFFFFF&background=a85232"
        },
        {
            "id": 20,
            "first_name": "Cydney",
            "last_name": "Kuhlman",
            "user_name": null,
            "email": "gerlach.wilfredo@example.net",
            "phone": "480-440-9901",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Cydney Kuhlman",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Cydney&color=FFFFFF&background=a85232"
        },
        {
            "id": 21,
            "first_name": "Casimir",
            "last_name": "Thiel",
            "user_name": null,
            "email": "alfreda.eichmann@example.org",
            "phone": "+1.607.689.8415",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Casimir Thiel",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Casimir&color=FFFFFF&background=a85232"
        },
        {
            "id": 22,
            "first_name": "Gonzalo",
            "last_name": "Cremin",
            "user_name": null,
            "email": "porter.luettgen@example.com",
            "phone": "949.935.8236",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Gonzalo Cremin",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Gonzalo&color=FFFFFF&background=a85232"
        },
        {
            "id": 23,
            "first_name": "Georgiana",
            "last_name": "Weber",
            "user_name": null,
            "email": "ryley.muller@example.org",
            "phone": "816.304.9518",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Georgiana Weber",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Georgiana&color=FFFFFF&background=a85232"
        },
        {
            "id": 24,
            "first_name": "Julien",
            "last_name": "Metz",
            "user_name": null,
            "email": "ibotsford@example.com",
            "phone": "+1-503-624-9161",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Julien Metz",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Julien&color=FFFFFF&background=a85232"
        },
        {
            "id": 25,
            "first_name": "Bridget",
            "last_name": "Mraz",
            "user_name": null,
            "email": "kkautzer@example.org",
            "phone": "+1.862.230.3181",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Bridget Mraz",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Bridget&color=FFFFFF&background=a85232"
        },
        {
            "id": 26,
            "first_name": "Myrtie",
            "last_name": "Littel",
            "user_name": null,
            "email": "satterfield.keara@example.net",
            "phone": "(337) 648-5925",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Myrtie Littel",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Myrtie&color=FFFFFF&background=a85232"
        },
        {
            "id": 27,
            "first_name": "Bennett",
            "last_name": "Hintz",
            "user_name": null,
            "email": "susie.vandervort@example.com",
            "phone": "(973) 729-0240",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Bennett Hintz",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Bennett&color=FFFFFF&background=a85232"
        },
        {
            "id": 28,
            "first_name": "Kurt",
            "last_name": "Dickens",
            "user_name": null,
            "email": "murazik.alda@example.org",
            "phone": "+1-626-892-8939",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Kurt Dickens",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Kurt&color=FFFFFF&background=a85232"
        },
        {
            "id": 29,
            "first_name": "Arturo",
            "last_name": "Volkman",
            "user_name": null,
            "email": "sienna.rosenbaum@example.net",
            "phone": "512.236.8829",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Arturo Volkman",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Arturo&color=FFFFFF&background=a85232"
        },
        {
            "id": 30,
            "first_name": "Cleveland",
            "last_name": "Pfeffer",
            "user_name": null,
            "email": "bart06@example.net",
            "phone": "+15515755445",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Cleveland Pfeffer",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Cleveland&color=FFFFFF&background=a85232"
        },
        {
            "id": 31,
            "first_name": "Hazle",
            "last_name": "Kuhlman",
            "user_name": null,
            "email": "mharris@example.com",
            "phone": "423-774-6955",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Hazle Kuhlman",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Hazle&color=FFFFFF&background=a85232"
        },
        {
            "id": 32,
            "first_name": "Genevieve",
            "last_name": "Mills",
            "user_name": null,
            "email": "bethany49@example.net",
            "phone": "985.629.2363",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:09.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:11.000000Z",
            "updated_at": "2021-09-21T11:16:11.000000Z",
            "full_name": "Genevieve Mills",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Genevieve&color=FFFFFF&background=a85232"
        },
        {
            "id": 2,
            "first_name": "Van",
            "last_name": "Lang",
            "user_name": null,
            "email": "iraynor@example.com",
            "phone": "(276) 431-2962",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:07.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Van Lang",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Van&color=FFFFFF&background=a85232"
        },
        {
            "id": 3,
            "first_name": "Heber",
            "last_name": "Beatty",
            "user_name": null,
            "email": "breanna22@example.com",
            "phone": "+1.786.845.7808",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:07.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Heber Beatty",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Heber&color=FFFFFF&background=a85232"
        },
        {
            "id": 4,
            "first_name": "Conner",
            "last_name": "Hickle",
            "user_name": null,
            "email": "alvena36@example.com",
            "phone": "+12312838523",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:07.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Conner Hickle",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Conner&color=FFFFFF&background=a85232"
        },
        {
            "id": 5,
            "first_name": "Thomas",
            "last_name": "Moen",
            "user_name": null,
            "email": "jeramy.cormier@example.com",
            "phone": "574-271-1037",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:07.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Thomas Moen",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Thomas&color=FFFFFF&background=a85232"
        },
        {
            "id": 6,
            "first_name": "Kaylin",
            "last_name": "Fay",
            "user_name": null,
            "email": "athena01@example.com",
            "phone": "1-210-647-5284",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:07.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Kaylin Fay",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Kaylin&color=FFFFFF&background=a85232"
        },
        {
            "id": 7,
            "first_name": "Cole",
            "last_name": "Kohler",
            "user_name": null,
            "email": "daren.spencer@example.net",
            "phone": "906-359-7474",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:07.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Cole Kohler",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Cole&color=FFFFFF&background=a85232"
        },
        {
            "id": 8,
            "first_name": "Vilma",
            "last_name": "Donnelly",
            "user_name": null,
            "email": "luz15@example.net",
            "phone": "+1-678-561-7114",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Vilma Donnelly",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Vilma&color=FFFFFF&background=a85232"
        },
        {
            "id": 9,
            "first_name": "Alysson",
            "last_name": "Grant",
            "user_name": null,
            "email": "mcglynn.heaven@example.org",
            "phone": "+1 (619) 950-1556",
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": "2021-09-21T11:16:08.000000Z",
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 0,
            "created_at": "2021-09-21T11:16:10.000000Z",
            "updated_at": "2021-09-21T11:16:10.000000Z",
            "full_name": "Alysson Grant",
            "role_name": "CLIENT",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Alysson&color=FFFFFF&background=a85232"
        },
        {
            "id": 1,
            "first_name": "Admin",
            "last_name": "Admin",
            "user_name": null,
            "email": "admin@admin.com",
            "phone": null,
            "address": null,
            "message": null,
            "looking_for": 0,
            "offering": 0,
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": null,
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": null,
            "longitude": null,
            "available_from": null,
            "available_to": null,
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": null,
            "profession_id": null,
            "active": 1,
            "created_at": "2021-09-21T11:16:06.000000Z",
            "updated_at": "2021-09-21T11:16:06.000000Z",
            "full_name": "Admin Admin",
            "role_name": "SUPER-ADMIN",
            "profile_photo_url": "https://ui-avatars.com/api/?name=Admin&color=FFFFFF&background=a85232"
        }
    ]
}
}
 
 */
public function getAllUser()
{
    $alluser = User::where('id', '!=', auth()->id())->latest()->get();
    
    if(count($alluser) > 0){
        return response()->json(["status" => true, "data" => $alluser]);
    }
    else{
        return response()->json(["status" => false, "message" => "user not found"]);
    }
}
/** 
 * Get-Profession
 * @response  {
    "status": true,
    "data": [
        {
            "id": 2,
            "profession_name": "profession2",
            "active": 1,
            "created_at": "2021-08-19T06:20:27.000000Z",
            "updated_at": "2021-08-19T06:20:27.000000Z"
        },
        {
            "id": 1,
            "profession_name": "profession1",
            "active": 1,
            "created_at": "2021-08-19T05:07:30.000000Z",
            "updated_at": "2021-08-19T05:07:30.000000Z"
        }
    ]
}
 
 */
public function getprofession()
{
    $profession = Profession::where(['active'=>1])->latest()->get();
    
    if(count($profession) > 0){
        return response()->json(["status" => true, "data" => $profession]);
    }
    else{
        return response()->json(["status" => false, "message" => "Profession not found"]);
    }
}
/** 
 * Get-Industry
 * @response  {
    "status": true,
    "data": [
        {
            "id": 2,
            "industry_name": "industry2",
            "industry_description": "industry details",
            "active": 1,
            "created_at": "2021-08-19T06:20:51.000000Z",
            "updated_at": "2021-08-19T06:20:51.000000Z",
            "deleted_at": null
        },
        {
            "id": 1,
            "industry_name": "industry1",
            "industry_description": "industry details",
            "active": 1,
            "created_at": "2021-08-19T05:05:40.000000Z",
            "updated_at": "2021-08-19T05:05:40.000000Z",
            "deleted_at": null
        }
    ]
}
 
 */
public function getindustry()
{
    $industry = Industry::where(['active'=>1])->latest()->get();
    
    if(count($industry) > 0){
        return response()->json(["status" => true, "data" => $industry]);
    }
    else{
        return response()->json(["status" => false, "message" => "Industry not found"]);
    }
}
/** 
 * Register
     * @bodyParam  full_name string required  Example: John
     * @bodyParam  email string required  Example: John@gmail.com
     * @bodyParam user_name string required  Example: John
     * @bodyParam  phone string required  Example: 1122334455
     * @bodyParam  address string required  Example: address
     * @bodyParam  Profile Photo string required  Example: image
     *  @bodyParam  looking for string required  Example: 1
     * @bodyParam  profession_id  required  Example: 1
     * @bodyParam  industry_id  required  Example: 1
     *  @bodyParam  offering for string required  Example: 1
     * * @bodyParam  password password required  Example: password
     * @response  {
    "status": true,
    "message": "Success! Registration completed",
    "token": "89|wTbWEMzBDJo5HakTF3JeCQWgntkTb4lrdfAHQKDw",
    "data": {
        "first_name": "Jay",
        "last_name": "Sinha",
        "user_name": "jay12",
        "email": "jay12@yopmail.com",
        "phone": null,
        "profession_id": "1",
        "industry_id": "1",
        "address": null,
        "message": null,
        "looking_for": "1",
        "offering": "0",
        "updated_at": "2021-09-15T15:43:33.000000Z",
        "created_at": "2021-09-15T15:43:33.000000Z",
        "id": 82,
        "full_name": "Jay Sinha",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Jay&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-09-10T13:37:58.000000Z",
                "updated_at": "2021-09-10T13:37:58.000000Z",
                "pivot": {
                    "model_id": 82,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
}
 */
    public function register(Request $request) {
     try{

        $rules = [
                "full_name"  =>  'required|max:255',
                 "user_name"  =>  "required|unique:users",
                 "email"  =>  "required|email|unique:users",           
                 "password"  =>  "required",
                "profession_id"  =>  "required",
                 "industry_id"  =>  "required",     
                 "looking_for"  =>  "required",
                "offering"  =>  "required", 
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
          
            return response()->json([
                'status'=>false,
                'message' => $validator->errors()->all()[0],
                'data'=> new \stdClass()
            ]);
            
        }

        $inputs = $request->all();


        // $user   =   User::create($inputs);
        // $user->assignRole('CLIENT');
        $name = $request->get('full_name');

        $splitName = explode(' ', $name, 2); 

        $first_name = $splitName[0];
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';

        $user = new User();
        $user->first_name = $first_name;
        $user->last_name= $last_name;
        $user->user_name= $request->get('user_name');
        $user->email= $request->get('email');
        $user->phone= $request->get('phone');
        $user->password= $request->get('password');
        $user->profession_id= $request->get('profession_id');
        $user->industry_id= $request->get('industry_id');
        $user->address= $request->get('address');
        $user->message= $request->get('message');
        $user->looking_for= $request->get('looking_for');
        $user->offering= $request->get('offering');
        $user->assignRole('CLIENT');
        $user->save();

        if(!is_null($user)) {
            $token  =   $user->createToken('token')->plainTextToken;
            return response()->json(["status" => true, "message" => "Success! Registration completed","token" => $token, "data" => $user]);
        }
        else {
            return response()->json(["status" => false, "message" => "Registration failed!"]);
        }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }       
    }
    /**
     * @bodyParam username string required Example: user@user.com or user
     * @bodyParam password string required Example: 12345678
     * @bodyParam  device_type string required Example: device type
     * @bodyParam  device_token string required Example: device token
     * @response  {
    "status": true,
    "token": "3|VKeacEjkrbok1aDKxqTa1eIgEXgoi8rPPWRFpTJr",
    "data": {
        "id": 1,
        "first_name": "Admin",
        "last_name": "Admin",
        "user_name": "Admin1",
        "email": "admin@admin.com",
        "phone": null,
        "address": null,
        "looking_for": null,
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "social_info": null,
        "device_type": "1",
        "device_token": "1",
        "industry_id": null,
        "profession_id": null,
        "active": 1,
        "created_at": "2021-08-30T05:05:39.000000Z",
        "updated_at": "2021-08-30T06:58:57.000000Z",
        "full_name": "Admin Admin",
        "role_name": "SUPER-ADMIN",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Admin&color=7F9CF5&background=EBF4FF"
    }
}
     */
public function login(Request $request)
{

try{
    $input = $request->all();

  

                $rules = [
                    "username" =>  "required",
                    "password" =>  "required",
            ];
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()){
            
                return response()->json([
                    'status'=>false,
                    'message' => $validator->errors()->all()[0],
                    'data'=> new \stdClass()
                ]);
                
            }

    $useremail = User::where("email", $request->email)->first();
    $username = User::where("user_name", $request->user_name)->first();

    $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_name';

    // if (is_null($useremail || $username)) {
    //     return response()->json(["status" => false, "message" => "Failed! email or username not found"],201);
    // }
   
    if(Auth::attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
        $user       =       Auth::user();
        //dd($user);
        $token      =       $user->createToken('token')->plainTextToken;
        // dd($request);
        User::where("id", $user->id)->update(array("device_type" => $request->device_type, "device_token" => $request->device_token));

        return response()->json(["status" => true,  "token" => $token, "data" => $user]);
    } else {

        return response()->json(["status" => false, "message" => "Whoops! invalid username or password"]);
    }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
}


/** 
 * User View
 * @authenticated
 * @response  {
    "status": true,
    "data": {
        "id": 54,
        "first_name": "test",
        "last_name": "test",
        "email": "test@test.com",
        "phone": "123456789",
        "address": null,
        "message": "message",
        "looking_for": 1,
        "offering": 0,
        "email_verified_at": null,
        "current_team_id": null,
        "profile_photo_path": null,
        "otp": null,
        "social_id": null,
        "social_account_type": null,
        "social_info": null,
        "device_type": null,
        "device_token": null,
        "industry_id": 1,
        "profession_id": 1,
         "latitude": null,
        "longitude": null,
        "available_from": "00:00:23",
        "available_to": "00:00:05",
        "active": 0,
        "created_at": "2021-08-19T05:07:36.000000Z",
        "updated_at": "2021-08-19T05:07:36.000000Z",
        "full_name": "test test",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=test&color=7F9CF5&background=EBF4FF"
    }
}
 * @response  401 {
 *   "message": "Unauthenticated."
*}
 */
    public function user() {
        $user= Auth::user();
        if(!is_null($user)) { 
            return response()->json(["status" => true, "data" => $user]);
        }

        else {
            return response()->json(["status" => false, "message" => "Whoops! no user found"]);
        }        
    }




/**
 * Profile update
     * @authenticated
     * @bodyParam  first_name string Example: Emoryy
     * @bodyParam  last_name string Example: Wiza
     * @bodyParam  email string Example: lueilwitz.caterina@example.com
     * @bodyParam  phone string Example: (345) 744-1545
     * @response  {
    "status": true,
    "message": "Success! user profile updated",
    "data": {
        "id": 2,
        "first_name": "Emoryy",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-05T10:41:07.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Emory&color=7F9CF5&background=EBF4FF"
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */
    public function profile_update(Request $request)
    {

        User::where('id', auth()->user()->id)->update($request->all());
        $user = User::where('id', auth()->user()->id)->get();
        return response()->json(["status" => true, "message" => "Success! user profile updated", "data" => $user]);
    }

    /**
     * Password Change
     * @authenticated
     * @bodyParam  old_password string required Example: 11111111
     * @bodyParam  new_password string required Example: 22222222
     * @bodyParam  confirm_password string required Example: 22222222
     * @response  {
    "status": true,
    "message": "Success! password change successfully",
    "data": {
        "id": 2,
        "first_name": "Emory",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-08T07:50:35.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Emory&color=7F9CF5&background=EBF4FF"
    }
}
     * @response  401 {
     *   "message": "Unauthenticated."
     *}
     */

    public function password_change(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $password = $user->password;
        if (Hash::check($request->old_password, $password)) {

            $validator = Validator::make($request->all(), [
                "old_password" =>  "required",
                "new_password" =>  "required|min:8",
                "confirm_password" =>  "required|same:new_password",
            ]);

            if ($validator->fails()) {
                return response()->json(["status" => false, "validation_errors" => $validator->errors()],201);
            }

            $user->password = $request->confirm_password;
            $user->save();

            return response()->json(["status" => true, "message" => "Success! password change successfully", "data" => $user]);
        } else {
            return response()->json(["status" => false, "message" => "Whoops! Old password is invalid"],201);
        }
    }

    /**
     * Forgot password
     * @bodyParam  email string required Example: lueilwitz.caterina@example.com
     * @bodyParam  password string required Example: danwdjdajw
     * @response  {
    "status": true,
    "message": "Success! password change successfully",
    "data": {
        "id": 2,
        "first_name": "Emory",
        "last_name": "Wiza",
        "email": "lueilwitz.caterina@example.com",
        "phone": "(345) 744-1545",
        "email_verified_at": "2021-03-05T06:49:30.000000Z",
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-05T06:49:37.000000Z",
        "updated_at": "2021-03-08T07:50:35.000000Z",
        "full_name": "Emory Wiza",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Emory&color=7F9CF5&background=EBF4FF"
    }
}
     */

    public function forgot_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }

        $user = User::where("email", $request->email)->first();

        if (is_null($user)) {
            return response()->json(["status" => false, "message" => "Failed! email not found"]);
        }

        // $new_pass = substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstvwxyzABCDEFGGHIJKLMNOPQRSTUVWXYZ', 36)), 0, 8);

        $details = [
            'title' =>  "Change password  request for HeartTheLook",
            'body'  =>  "Your password is reset.",
        ];

        Mail::to($user->email)->send(new ForgotPasswordMail($details));

        if (Mail::failures()) {
            return response()->json(["status" => false, "message" => "Failed! unable to send password to your mail"]);
        } else {

            $update_pass = User::find($user->id);
            $update_pass->password = ($request->password);
            $update_pass->save();

            return response()->json(["status" => true, "message" => "Success! password change successfully", "data" => $user]);
        }
    }

/**
    * Otp Verification
    * @bodyParam  email string required Example: lueilwitz.caterina@example.com
    * @bodyParam  otp number  Example: 1234
    * @response  {

    "status": true,
    "message": "Success! Otp Send successfully",
    "data": {
        "id": 3,
        "first_name": "Makayla",
        "last_name": "Runte",
        "email": "cedrick.schmitt@example.com",
        "phone": "609.587.7230",
        "email_verified_at": "2021-03-11T07:39:50.000000Z",
        "otp": 2430,
        "current_team_id": null,
        "profile_photo_path": null,
        "active": 0,
        "created_at": "2021-03-11T07:39:54.000000Z",
        "updated_at": "2021-03-12T06:36:42.000000Z",
        "full_name": "Makayla Runte",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=Makayla&color=7F9CF5&background=EBF4FF"
    }
 }
     */
    public function otpverification(Request $request)
    {
        $user = User::where("email", $request->email)->first();

        if (is_null($request->otp)) {
            $validator = Validator::make($request->all(), [
                "email" =>  "required|email",
            ]);
            if ($validator->fails()) {
                return response()->json(["validation_errors" => $validator->errors()]);
            }
            $otp = rand(1000, 9999);
            $details = [
                'title' =>  "OTP for HeartTheLook",
                'body'  =>  "Your Email Verification otp is - " . $otp,
            ];

            Mail::to($request->email)->send(new OtpVerificationMail($details));
            if (Mail::failures()) {
                return response()->json(["status" => false, "message" => "Failed! unable to send password to your mail"]);
            } else {
                $userdetail = User::find($user->id);
                $userdetail->otp = $otp;
                $userdetail->save();
                return response()->json(["status" => true, "message" => "Success! Otp Send successfully", "data" => $userdetail]);
            }
        } else {

            $validator = Validator::make($request->all(), [
                "email" =>  "required|email",
                "otp"   =>  "required|max:4"
            ]);
            if ($validator->fails()) {
                return response()->json(["validation_errors" => $validator->errors()]);
            }

            $userdetail = User::find($user->id);
            if ($userdetail->otp == $request->otp) {
                $userdetail->otp = '';
                $userdetail->email_verified_at = \Carbon\Carbon::now()->timestamp;
                $userdetail->save();
                return response()->json(["status" => true, "message" => "Success! Otp Verified successfully"]);
            } else {
                return response()->json(["status" => true, "message" => "Fail! Otp Not Verified"]);
            }
        }
    }


/**
 * Edit Profile
 * @bodyParam  full_name string required  Example: John Doe
 * @bodyParam user_name string required  Example: John
 * @bodyParam  profession_id string required  Example: 1
 * @bodyParam  industry_id string required  Example: 1
 *  @bodyParam  latitude string required  Example: lat
 *  @bodyParam  longitude string required  Example: long
 * @bodyParam  email string   Example: John@gmail.com
 * @bodyParam  phone string   Example: 1122334455
 * @bodyParam  address string   Example: address
 * @bodyParam  available_to  required  Example: 1630651142
 *  @bodyParam  looking for  required  Example: 1
 * @bodyParam  offering  required  Example: 1
 * @bodyParam  available_from    Example: 1630651142
 * @bodyParam  profile_photo_path  file 
 * @response {
    "status": true,
    "message": "Success! Profile update completed",
    "data": {
        "first_name": "sourajit",
        "last_name": "m",
        "user_name": "sourm",
        "email": "sourajitm8@gmail.com1",
        "address": "test address",
        "phone": null,
        "profession_id": "1",
        "industry_id": "1",
        "message": "message",
        "looking_for": "1",
        "offering": "0",
        "available_from": "23.14",
        "available_to": "5.01",
        "longitude": "74.52",
        "latitude": "45.12",
        "profile_photo_path": "/uploads/profile-photos/16304800051228993330.png"
    }
}
     * @response  401 {
    "status": false,
    "message": "Profile update failed!"
    }
     */
    public function editprofile(Request $request)
    {
        try{
            if ($request->has('full_name') && $request->has('profession_id') && $request->has('email') && $request->has('industry_id')) {
                
                

                $rules = [
                    "full_name"  =>  "required",
                    "email"  =>  "required|email",
                    "user_name"  =>  "required",
                    "address" => "required",
                    "profession_id"  =>  "required",
                    "industry_id"  =>  "required",
                    "message"  =>  "required",
                    "available_from"  =>  "required",
                    "available_to"  =>  "required",
                    "time_available" =>  "required",
                    "latitude"  =>  "required",
                    "longitude"  =>  "required",
                ];
                $validator = Validator::make($request->all(),$rules);
                if ($validator->fails()){
                  
                    return response()->json([
                        'status'=>false,
                        'message' => $validator->errors()->all()[0],
                        'data'=> new \stdClass()
                    ]);
                    
                }

            }

        // $inputs = $request->all();

        $name = $request->get('full_name');
            //$available_form = $request->get('available_from');
        //    $available_to = $request->get('available_to');          
           // dd($available_form);
            //$available_form_convert = (date("Y-m-d",$available_form)); 
            // $dt1 = new DateTime("@$available_form");
            // $available_form_convert = $dt1->format('Y-m-d H:i:s');
            // $dt2 = new DateTime("@$available_to");
            // $available_to_convert = $dt1->format('Y-m-d H:i:s');
            //dd($available_to_convert);
            $splitName = explode(' ', $name, 2); 

        $first_name = $splitName[0];
        
        $last_name = !empty($splitName[1]) ? $splitName[1] : '';
        
        $inputs['first_name'] = $first_name;
        $inputs['last_name'] = $last_name;
        $inputs['user_name'] = $request->get('user_name');
        $inputs['email'] = $request->get('email');
        $inputs['address'] = $request->get('address');
        $inputs['phone'] = $request->get('phone');
        $inputs['profession_id'] = $request->get('profession_id');
        $inputs['industry_id'] = $request->get('industry_id');
        $inputs['message'] = $request->get('message');
        $inputs['looking_for'] = $request->get('looking_for');
        $inputs['offering'] = $request->get('offering');
        $inputs['available_from'] = $request->get('available_from');
        $inputs['available_to'] = $request->get('available_to');
        $inputs['time_available'] = $request->get('time_available');
        $inputs['longitude'] = $request->get('longitude');
        $inputs['latitude'] = $request->get('latitude');

        $full_name = $request->get('full_name');
        //dd($inputs);

            if ($request->hasFile('profile_photo_path')) {
                $this->validate(request(), [
                    'profile_photo_path' => 'mimes:jpeg,jpg,png',
                ], [
                    'profile_photo_path.mimes' => 'Image must be jpeg,jpg or png type.',
                ]);

                $fileName = time() . rand() . '.' . $request->profile_photo_path->extension();
                $request->file('profile_photo_path')->storeAs(
                    'public/uploads/profile-photos/',
                    $fileName
                );
                $inputs['profile_photo_path'] = '/uploads/profile-photos/' . $fileName;
            }

            if (!empty($inputs)) {
                User::where('id', auth()->user()->id)->update($inputs);
                
                return response()->json(["status" => true, "message" => "Success! Profile update completed", "data" => $inputs, $full_name]);
            } else {
                return response()->json(["status" => false, "message" => "Profile update failed!"]);
            }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
    }

/**
 * Location Sink
 *  @bodyParam  latitude string required  Example: 33.15
 *  @bodyParam  longitude string required  Example: 85.14

 * @response {
    "status": true,
    "message": "Success! Location update completed",
    "data": {
        "longitude": "33.15",
        "latitude": "85.14"
    }
}
     * @response  401 {
    "status": false,
    "message": "Location update failed!"
    }
     */
    public function sinklocation(Request $request)
     {
        try{
        if ($request->has('full_name') && $request->has('profession_id') && $request->has('email') && $request->has('industry_id')) {
            $validator  =   Validator::make($request->all(), [
                "latitude"  =>  "required",
                "longitude"  =>  "required",


            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()],201);
            }
        }

        $inputs = $request->all();
    
       //dd($inputs);

        if (!empty($inputs)) {
            User::where('id', auth()->user()->id)->update($inputs);
            
            return response()->json(["status" => true, "message" => "Success! Location update completed", "data" => $inputs]);
        } else {
            return response()->json(["status" => false, "message" => "Profile update failed!"],201);
        }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
    }
/**
 *Social signup
 * @bodyParam  first_name string required  Example: John
 * @bodyParam  last_name string required  Example: Doe
 * @bodyParam  email string required  Example: John@gmail.com
 * @bodyParam  social_id string required  Example: 1122334455
 * @bodyParam  social_account_type string required  Example: social_account_type
 * @bodyParam  device_type string required Example: device type
 * @bodyParam  device_token string required Example: device token 
 * @bodyParam  password string required Example: password
 * @bodyParam  password_confirmation string required Example: password
    
     * @response {
    "status": true,
    "token": "2|TskImAyBQSIUR58AS5sGMUvyEIHe8nUiHTteVV4h",
    "message": "Success! registration completed",
    "data": {
        "first_name": "ranit",
        "last_name": "ray",
        "email": "ranit@rc.com",
        "updated_at": "2021-08-19T05:55:18.000000Z",
        "created_at": "2021-08-19T05:55:18.000000Z",
        "id": 55,
        "full_name": "ranit ray",
        "role_name": "CLIENT",
        "profile_photo_url": "https://ui-avatars.com/api/?name=tghfh&color=7F9CF5&background=EBF4FF",
        "roles": [
            {
                "id": 2,
                "name": "CLIENT",
                "guard_name": "web",
                "created_at": "2021-08-18T10:15:30.000000Z",
                "updated_at": "2021-08-18T10:15:30.000000Z",
                "pivot": {
                    "model_id": 55,
                    "role_id": 2,
                    "model_type": "App\\Models\\User"
                }
            }
        ]
    }
}
     
     */
  
    public function socialsignup(Request $request)
    {
        try{
            $validator  =   Validator::make($request->all(), [
                "first_name"  =>  "required",
                "last_name"  =>  "required",
                "email"  =>  "required|email",
                "social_id"  =>  "required",
                "social_account_type"  =>  "required",
                "device_token" => "required",
                "device_type" => "required",

            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()]);
            }
            $user = User::where('social_id', $request->social_id)->first();
            //dd($user);
            if (empty($user)) {
                $inputs = $request->all();

                $user   =   User::create($inputs);
                $token  =   $user->createToken('token')->plainTextToken;
                $user->assignRole('CLIENT');
                return response()->json(["status" => true, "token" => $token, "message" => "Success! registration completed", "data" => $user]);
            } else {
                $token      =       $user->createToken('token')->plainTextToken;
                // dd($request);
                User::where("id", $user->id)->update(array("device_type" => $request->device_type, "device_token" => $request->device_token));

                return response()->json(["status" => true,  "token" => $token, "message" => "Success! login successfull",  "data" => $user->assignRole('CLIENT')]);
                // return response()->json(["status" => false, "message" => "Registration failed!"]);
            }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
    }
  

// Filter Data
    /**
 
 * @response {
    "status": true,
    "data": {
        "id": 9,
        "latitude": 45.15,
        "longitude": 74.52,
        "looking_for": 1,
        "offering": 0,
        "industry_id": null,
        "profession_id": null,
        "user_id": 56,
        "radius": null,
        "created_at": "2021-09-21T14:27:41.000000Z",
        "updated_at": "2021-09-21T14:27:41.000000Z",
        "user": {
            "id": 56,
            "first_name": "East",
            "last_name": "Zones1121",
            "user_name": "ray11121121",
            "email": "ra@gmail.com1121",
            "phone": null,
            "address": "seminyak",
            "message": "ghfhg",
            "looking_for": 1,
            "offering": 0,
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": "/uploads/profile-photos/1632234398932385192.png",
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": 22.14,
            "longitude": 88.21,
            "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
            "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
            "social_info": null,
            "device_type": null,
            "device_token": null,
            "industry_id": 1,
            "profession_id": 1,
            "active": 0,
            "created_at": "2021-09-21T14:25:29.000000Z",
            "updated_at": "2021-09-21T14:26:38.000000Z",
            "full_name": "East Zones1121",
            "role_name": "CLIENT",
            "profile_photo_url": "http://localhost/storage/uploads/profile-photos/1632234398932385192.png"
        }
    }
}
     */
    public function lastFilterData() {
        $userid= Auth::user()->id;
        $filterdata = Filter::where('user_id', $userid)->first();

        if(!is_null($filterdata)) { 
            return response()->json(["status" => true, "data" => $filterdata]);
        }

        else {
            return response()->json(["status" => false, "message" => "Whoops! no data found"]);
        }        
    }


    public function filter(Request $request, User $user)
    {

        $userid= Auth::user()->id;
        //$filterdata = Filter::where('user_id', $userid)->latest()->first();

        $industryid = Filter::where('user_id', $userid)->latest()->value('industry_id');
        $professionid = Filter::where('user_id', $userid)->latest()->value('profession_id');
        $lookingforid = Filter::where('user_id', $userid)->latest()->value('looking_for');
        $offeringid = Filter::where('user_id', $userid)->latest()->value('offering');
        $radius = Filter::where('user_id', $userid)->latest()->value('radius');
        // if ($request->input('radius')) {
        //     $radius = $request->input('radius');
        // }
        // else{
        //     $radius = 5;
        // }
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        //$radius = $request->input('radius');
        //$radius = 5;
        $user = $user->newQuery();
    

        if ($request->has('industry_id')) {
            $user->where('industry_id', $industryid);
        }
    

        if ($request->has('profession_id')) {
            $user->where('profession_id', $professionid);
        }
    

        if ($request->has('offering')) {
            $user->where('offering', $offeringid);
        }

        if ($request->has('looking_for')) {
            $user->where('looking_for', $lookingforid);
        }
        
       

        $userdata = $user->selectRaw("id, user_name,first_name,last_name,looking_for,available_from,available_to,offering,email,industry_id,profession_id, address, latitude, longitude, status,
        ( 6371 * acos( cos( radians(?) ) *
          cos( radians( latitude ) )
          * cos( radians( longitude ) - radians(?)
          ) + sin( radians(?) ) *
          sin( radians( latitude ) ) )
        ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->where('id', '!=', auth()->id())
            ->with(['industries','professions'])
            ->offset(0)
            ->limit(20)            
        ->get();
        //$userlatitide = $userdata->

        if(count($userdata) > 0){
            return response()->json(["status" => true, "data" => $userdata]);
            
        }
        else{
           return response()->json(["status" => true, "message" => "List not found"]);
        }
    }


    public function storeFilterData(Request $request, User $user)
    { 
       
        $user = Filter::where('user_id', Auth::user()->id)->first();
        if (empty($user)) {

            $filter=new Filter($request->all());
            $filter->user_id=auth()->user()->id;
            $filter->save();

            return response()->json(["status" => true,  "message" => "Success! data save completed", "data" => $filter]);
        } else {
            $inputs = $request->all();
            $filter = Filter::where('user_id', Auth::user()->id)->update(array("industry_id" => $request->industry_id, "profession_id" => $request->profession_id,
            "looking_for" => $request->looking_for,"online" => $request->online, "offering" => $request->offering,"radius" => $request->radius));

            return response()->json(["status" => true,   "message" => "Success! update successfull",  "data" => $inputs]);
           
        }
    
    }



    /**
 * Location Sink
 *  @bodyParam  latitude string required  Example: 33.15
 *  @bodyParam  longitude string required  Example: 85.14

 * @response {
    "status": true,
    "message": "Success! Location update completed",
    "data": {
        "longitude": "33.15",
        "latitude": "85.14"
    }
}
     * @response  401 {
    "status": false,
    "message": "Location update failed!"
    }
     */
    public function userOnlineUpdate(Request $request)
     {
        try{
        if ($request->has('full_name') && $request->has('email')) {
            $validator  =   Validator::make($request->all(), [
                "currently_online"  =>  "required",

            ]);
            if ($validator->fails()) {
                return response()->json(["status" => false, "message" => $validator->errors()],201);
            }
        }

        $inputs = $request->all();
    
       //dd($inputs);

        if (!empty($inputs)) {
            User::where('id', auth()->user()->id)->update($inputs);
            
            return response()->json(["status" => true, "message" => "Success!  update completed", "data" => $inputs]);
        } else {
            return response()->json(["status" => false, "message" => "update failed!"],201);
        }
    }
    catch(\Exception $e) {
        return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
    }
    }

 // Filter Data Store
    /**
     *  @bodyParam  distance int required  Example: 1-15
     * @bodyParam  current_location string required  Example: address
     * @bodyParam  hide_profile required  Example: 1
 
 * @response{
    "status": true,
    "message": "Success! data save completed",
    "data": {
        "distance": "5",
        "share_current_loc": "1",
        "hide_profile": "0",
        "user_id": 53,
        "updated_at": "2021-09-28T07:13:27.000000Z",
        "created_at": "2021-09-28T07:13:27.000000Z",
        "id": 2
    }
}
*/

    public function saveUserSetting(Request $request)
     {
        try{

                $rules = [
                    "distance"   =>      "required",  
                    "hide_profile"    =>      "required",     
                ];
                $validator = Validator::make($request->all(),$rules);
                if ($validator->fails()){
                
                    return response()->json([
                        'status'=>false,
                        'message' => $validator->errors()->all()[0],
                        'data'=> new \stdClass()
                    ]);
                    
                }
    
        $user = UserDistance::where('user_id', Auth::user()->id)->first();
        $userHideProfile = User::find(Auth::user()->id);
        if (empty($user)) {

            $distance=new UserDistance($request->all());
            if ($request->has('online')) {
                $distance->online = $request->online;
            }
            $distance->user_id=auth()->user()->id;
            $distance->save();

            if ($request->has('online')) {
                $userHideProfile->status = $request->online;
            }
            $userHideProfile->hide_profile = $request->hide_profile;
            $userHideProfile->save();

            return response()->json(["status" => true,  "message" => "Success! Setting save completed", "data" => $distance]);
        } else {
            $inputs = $request->all();
            $online = "0";

            if ($request->has('online')) {
                $userHideProfile->status = $request->online;
                $online = $request->online;
            }
            $userHideProfile->hide_profile = $request->hide_profile;
            $userHideProfile->save();

            $distance = UserDistance::where('user_id', Auth::user()->id)->update(array("distance" => $request->distance, "hide_profile" => $request->hide_profile, "online" => $online));

            return response()->json(["status" => true,   "message" => "Success! Setting update successfull",  "data" => $inputs]);
           
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
    "data": {
        "id": 1,
        "distance": "5",
        "current_location": "abc abjgdfhfgh",
        "user_id": 53,
        "hide_profile": 0,
        "created_at": "2021-09-28T07:07:26.000000Z",
        "updated_at": "2021-09-28T07:08:12.000000Z",
        "user": {
            "id": 53,
            "first_name": "Ray",
            "last_name": "Martin",
            "user_name": "ray",
            "email": "ray@test.com",
            "phone": null,
            "address": "seminyak",
            "message": "ghfhg",
            "looking_for": 1,
            "offering": 1,
            "email_verified_at": null,
            "current_team_id": null,
            "profile_photo_path": "/uploads/profile-photos/1632807017436204422.png",
            "otp": null,
            "social_id": null,
            "social_account_type": null,
            "latitude": 42.75,
            "longitude": 88.21,
            "available_from": "Thu Sep 16 2021 15:12:23 GMT+0530 (India Standard Time)",
            "available_to": "Fri Sep 16 2021 14:56:34 GMT+0530 (India Standard Time)",
            "social_info": null,
            "device_type": null,
            "device_token": "22",
            "industry_id": 1,
            "profession_id": 1,
            "fcm_token": null,
            "active": 1,
            "invitation_accept": 0,
            "created_at": "2021-09-24T10:14:15.000000Z",
            "updated_at": "2021-09-28T05:38:20.000000Z",
            "full_name": "Ray Martin",
            "role_name": "CLIENT",
            "profile_photo_url": "http://localhost/storage/uploads/profile-photos/1632807017436204422.png"
        }
    }
}
     */
 
        public function getUserSetting() {
            $userid= Auth::user()->id;
            $distancedata = UserDistance::where('user_id', $userid)->first();
    
            if(!is_null($distancedata)) { 
                return response()->json(["status" => true, "data" => $distancedata]);
            }
    
            else {
                return response()->json(["status" => false, "message" => "Whoops! no data found"]);
            }        
        }

//////////////////


        public function getFilterData(Request $request, User $user)
    { 

    try{

        $validator      =   Validator::make($request->all(), [
            "latitude"   =>      "required",
            "longitude"   =>      "required",         
        ]);



        if($validator->fails())
        return response()->json(["status" => false, "message" => $validator->errors()]);

        
            $userid= Auth::user()->id;

            $industryid = Filter::where('user_id', $userid)->value('industry_id');
            $professionid = Filter::where('user_id', $userid)->value('profession_id');
            $lookingfor = Filter::where('user_id', $userid)->value('looking_for');
            $offeringid = Filter::where('user_id', $userid)->value('offering');
            $radiusid = Filter::where('user_id', $userid)->value('radius');
            $currentlyonline = Filter::where('user_id', $userid)->value('online');
            //dd($professionid);

            if ($lookingfor != NULL) {
                $lookingforid = Filter::where('user_id', $userid)->value('looking_for');
            }
            else{
                $lookingforid = 1;
            }
            if ($radiusid != NULL) {
                $radius = Filter::where('user_id', $userid)->value('radius');
            }
            else{
                $radius = 5;
            }

            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');

            $user = $user->newQuery();    

            // if (isset($industryid)) 
            if($industryid != NULL) {
                $user->where('industry_id', $industryid);
            }
        
            if ($professionid != NULL) {
                $user->where('profession_id', $professionid);
            }
        
            if ($offeringid !='0') {
                $user->where('offering', $offeringid);
            }else{
                $user->where('offering', 0);
            }

            if ($lookingforid !='0') {
                $user->where('looking_for', $lookingforid);
            }else{
                $user->where('looking_for', 0);
            }
            // if ($currentlyonline !='0') {
            //     $user->where('online', $currentlyonline);
            // }
            
            $userdata = $user->selectRaw("id, user_name,message,first_name,last_name,looking_for,available_from,available_to,offering,email,industry_id,profession_id, address, latitude, longitude, status,
            ( 6371 * acos( cos( radians(?) ) *
            cos( radians( latitude ) )
            * cos( radians( longitude ) - radians(?)
            ) + sin( radians(?) ) *
            sin( radians( latitude ) ) )
            ) AS distance", [$latitude, $longitude, $latitude])
                ->having("distance", "<", $radius)
                ->orderBy("distance",'asc')
                ->where('id', '!=', auth()->id())
                ->where('hide_profile', 1)
                ->with(['industries','professions'])
                ->offset(0)
                ->limit(20)            
            ->get();

            //  Log::debug("userdata".print_r($userdata,true));
            
             //return $userdata;

            //  $userlatitude = User::select('user_name','id','latitude')->where('id',$userdata->id)->get();
            //  $userlongitude = User::select('user_name','id','longitude')->where('id',$userdataid)->get();
            
         if(count($userdata) > 0){
                return response()->json(["status" => true, "data" => $userdata]);
                
            }
            else{
                return response()->json(["status" => true, "data" => $userdata, "message" => "List not found"]);
            }
        }
        
        catch(\Exception $e) {
            return Response()->Json(["status"=>false,"message"=> 'Something went wrong. Please try again.'],500);
        }

        
    }
}
