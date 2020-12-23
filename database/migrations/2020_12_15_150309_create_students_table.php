<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_no');
            $table->date('dob');
            $table->char('gender',1);
            $table->foreignId('actclass_id')
                ->nullable()
                ->constrained()
                ->onDelete('set null')
                ->onUpdate('set null');

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('profile')->default('default.png');
            $table->string('birthplace')->nullable();
            $table->string('nationality')->nullable();
            $table->string('religion')->nullable();
            $table->string('folk')->nullable();
            $table->string('id_card_no');
            $table->date('id_card_date')->nullable();
            $table->string('id_card_place')->nullable();
            $table->text('address')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_phone')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone')->nullable();
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
        Schema::dropIfExists('students');
    }
}
