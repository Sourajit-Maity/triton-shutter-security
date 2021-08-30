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
            $table->longtext('looking_for')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            $table->string('otp')->nullable();
            $table->string('social_id')->nullable();
            $table->string('social_account_type')->nullable();
            $table->json('social_info')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device_token')->nullable();
            $table->foreignId('industry_id')->nullable()->references('id')->on('industries')->onDelete('cascade');
            $table->foreignId('profession_id')->nullable()->references('id')->on('professions')->onDelete('cascade');
            $table->boolean('active')->default(false);
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
