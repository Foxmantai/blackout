<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('radio')->nullable();
            $table->string('select')->nullable();
            $table->boolean('checkbox')->default(0)->nullable();
            $table->string('test')->nullable();
            $table->string('email')->nullable();
            $table->longText('textarea')->nullable();
            $table->string('password')->nullable();
            $table->integer('integer')->nullable();
            $table->float('float', 15, 2)->nullable();
            $table->decimal('money', 15, 2)->nullable();
            $table->date('data_picker')->nullable();
            $table->datetime('data_time_picker')->nullable();
            $table->time('time_picker')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
