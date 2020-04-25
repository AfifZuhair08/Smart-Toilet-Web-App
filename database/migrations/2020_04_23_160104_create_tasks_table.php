<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('task_title');
            $table->mediumText('task_description');
            $table->boolean('is_complete');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('staff_id');

            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table
                ->foreign('staff_id')
                ->references('id')
                ->on('staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
