<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teacher_name',100);
            $table->string('teacher_phone');
            $table->string('teacher_email')->unique();
            $table->string('teacher_address');
            $table->string('image');
            $table->integer('class_id');
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
        Schema::dropIfExists('tbl_teachers');
    }
}
