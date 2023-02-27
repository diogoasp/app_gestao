<?php

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
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('reason_id');
        });
        DB::statement('update site_contacts set reason_id = reason');
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->foreign('reason_id')->references('id')->on('contact_reasons');
            $table->dropColumn('reason');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->integer('reason');
            $table->dropForeign('site_contacts_reason_id_foreign');
        });
        DB::statement('update site_contacts set reason = reason_id');
        Schema::table('site_contacts', function (Blueprint $table) {
            $table->dropColumn('reason_id');
        });
    }
};
