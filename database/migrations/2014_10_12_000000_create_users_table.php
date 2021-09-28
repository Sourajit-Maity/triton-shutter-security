<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('user_name')->nullable()->unique();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->longtext('address')->nullable();
            $table->longtext('message')->nullable();
            $table->boolean('looking_for')->default(false);
            $table->boolean('offering')->default(false);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('otp')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_account_type')->nullable();
            $table->float('latitude', 10, 6)->nullable();
            $table->float('longitude', 10, 6)->nullable();
            $table->string('available_from')->nullable();
            $table->string('available_to')->nullable();
            //$table->string('time_available')->nullable();
            $table->json('social_info')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_token')->nullable();
            $table->foreignId('industry_id')->nullable()->references('id')->on('industries')->onDelete('cascade');
            $table->foreignId('profession_id')->nullable()->references('id')->on('professions')->onDelete('cascade');
            $table->longText('fcm_token')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('invitation_accept')->default(false);
            $table->boolean('currently_online')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
