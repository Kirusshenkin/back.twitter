<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('email')->unique();
            $table->string('email_verified_at')->nullable();
            $table->string('password');
            $table->datetime('birthday')->nullable();
            $table->enum('gender', User::GENDERS)->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->jsonb('deeplinks')->default('{}');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
