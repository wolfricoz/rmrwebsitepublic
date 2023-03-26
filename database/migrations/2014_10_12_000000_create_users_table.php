<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('dob');
            $table->string('password');
            $table->boolean('IsAdmin')->default(false);
            $table->boolean('IsMod')->default(false);
            $table->boolean('IsPatron')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->dateTime('last_login_at')->nullable();
            $table->string('last_login_ip')->nullable();
            $table->string('discord')->nullable();
            $table->string('telegram')->nullable();
            $table->string('flist')->nullable();
            $table->string('Card')->nullable();
            $table->string('other')->nullable();
            $table->boolean('banned')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
