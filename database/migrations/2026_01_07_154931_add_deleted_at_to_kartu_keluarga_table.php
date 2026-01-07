<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up()
{
    Schema::table('kartu_keluarga', function (Blueprint $table) {
        $table->softDeletes();
    });
}

public function down()
{
    Schema::table('kartu_keluarga', function (Blueprint $table) {
        $table->dropSoftDeletes();
    });
}

};
