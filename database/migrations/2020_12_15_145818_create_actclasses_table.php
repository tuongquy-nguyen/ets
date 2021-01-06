<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actclasses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('faculty_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->foreignId('teacher_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('set null');


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
        Schema::dropIfExists('actclasses');
    }
}
