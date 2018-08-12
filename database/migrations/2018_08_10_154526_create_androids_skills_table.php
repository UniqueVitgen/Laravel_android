<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateAndroidsSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('android_skill', function(Blueprint $table)
        {
            $table->integer('android_id')->unsigned()->nullable();
            $table->foreign('android_id')->references('id')
                ->on('androids')->onDelete('cascade');

            $table->integer('skill_id')->unsigned()->nullable();
            $table->foreign('skill_id')->references('id')
                ->on('skills')->onDelete('cascade');

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
        Schema::drop('android_skill');
    }
}
