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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$12$JxhNkxp0Vu0S2n6nFUPnNehW5JaEaxm2hqTLxVYoRXu6w48scWxbG',
                'is_admin' => 1,
            )
        );

        DB::table('users')->insert(
            array(
                'name' => 'User',
                'email' => 'user@gmail.com',
                'password' => '$2y$12$JxhNkxp0Vu0S2n6nFUPnNehW5JaEaxm2hqTLxVYoRXu6w48scWxbG',
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
