<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveUniqueFromEmailInOwnersTable extends Migration
{
    public function up()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->dropUnique(['email']); 
        });
    }

    public function down()
    {
        Schema::table('owners', function (Blueprint $table) {
            $table->string('email')->unique()->change();
        });
    }
};