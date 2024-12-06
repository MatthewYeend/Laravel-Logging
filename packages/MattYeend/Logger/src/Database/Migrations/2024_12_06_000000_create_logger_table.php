<?php 

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoggerTable extends Migration
{
    public function up()
    {
        Schema::create('logger', function (Blueprint $table){
            $table->id();
            $table->bigInteger('action_id');
            $table->text('data')->nullable();
            $table->unsignedBigInteger('logged_in_user_id')->nullable();
            $table->unsignedBigInteger('related_to_user_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logger');
    }
}