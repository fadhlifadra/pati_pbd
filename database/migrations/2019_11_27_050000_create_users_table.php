<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('nama')->nullable();
            $table->string('password');
           // $table->integer('obj_audit_id')->unsigned()->nullable();
           // $table->integer('bag_unit_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned();
           
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

           // $table->foreign('obj_audit_id')->references('id')->on('m_obj_audits')
          //      ->onUpdate('cascade')->onDelete('cascade');
          //  $table->foreign('bag_unit_id')->references('id')->on('m_bag_units')
        //        ->onUpdate('cascade')->onDelete('cascade');  
            $table->foreign('role_id')->references('id')->on('roles')
                ->onUpdate('cascade')->onDelete('cascade');               
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
