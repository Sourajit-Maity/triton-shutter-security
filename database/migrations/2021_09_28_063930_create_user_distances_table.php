<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDistancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_distances', function (Blueprint $table) {
            $table->id();
            $table->string('distance');
            $table->string('current_location')->nullable();        
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');;
            $table->boolean('hide_profile')->default(true);
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
        Schema::dropIfExists('user_distances');
    }
}
