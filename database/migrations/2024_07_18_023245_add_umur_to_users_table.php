<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('umur')->nullable()->after('email');
            $table->string('alamat')->nullable()->after('umur');
            $table->string('pekerjaan')->nullable()->after('alamat');
            $table->string('jenis_kelamin')->nullable()->after('pekerjaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('umur');
            $table->dropColumn('alamat');
            $table->dropColumn('pekerjaan');
            $table->dropColumn('jenis_kelamin');
        });
    }
};
