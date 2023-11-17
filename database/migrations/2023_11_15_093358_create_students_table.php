<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            $table->string('studentId')->unique();
            $table->string('name');
            $table->date('birthday');
            $table->string('gender')->nullable()->default('Male');
            // $table->string('phone')->nullable();
            // $table->string('address')->nullable();
            // $table->unsignedInteger('sum_of_credits')->nullable();
            $table->float('gpa')->nullable();
            $table->string('lop')->nullable();

            $table->string('status')->default('Active');

            $table->timestamps();
        });

        DB::table('students')->insert(
            array(
                'studentId' => '10524',
                'name' => 'Nghi',
                'birthday' => '17/09/01',
                'gpa' => '3.74',
                'lop' => 'T18',
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
