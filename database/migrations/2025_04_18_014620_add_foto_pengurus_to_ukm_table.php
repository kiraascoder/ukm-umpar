<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFotoPengurusToUkmTable extends Migration
{
    public function up()
    {
        Schema::table('ukm', function (Blueprint $table) {
            $table->string('foto_pengurus')->nullable()->after('struktur_organisasi');
        });
    }

    public function down()
    {
        Schema::table('ukm', function (Blueprint $table) {
            $table->dropColumn('foto_pengurus');
        });
    }
}
