<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('verify_user_id')->nullable()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('profession_id')->nullable()->references('id')->on('professions')->onDelete('cascade');
            $table->tinyInteger('accept')->default(1)->comment('1:request, 2:accepted, 3:cancel');
            $table->longText('product_token')->unique();
            $table->string('location')->nullable();
            $table->string('location_area')->nullable();
            $table->string('sim_number')->nullable();
            $table->string('product_name')->nullable();
            $table->string('validity')->nullable();
            $table->string('buy_on')->nullable();
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
