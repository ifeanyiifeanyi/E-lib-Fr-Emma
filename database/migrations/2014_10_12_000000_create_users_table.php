<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('username')->unique();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->enum('role', ['member', 'admin'])->default('member');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pass_code')->default('null');
            $table->string('pass_code_used')->default('null');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert
        ([
            'username' => 'Admin',
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'phone' => '08132634881',
            'photo' => "https://placehold.co/600x400?text=Admin",
            'role' => 'admin',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
        DB::table('users')->insert
        ([
            'username' => 'Member',
            'name' => 'Member User',
            'email' => 'member@member.com',
            'phone' => '08132634881',
            'photo' => "https://placehold.co/600x400?text=member",
            'role' => 'member',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
