<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('user_sessions', function (Blueprint $table) {
            $table->addColumn('integer' , 'user_id')->after('session_id');
        });
    }

    public function down(): void
    {
        Schema::table('user_sessions', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
};
