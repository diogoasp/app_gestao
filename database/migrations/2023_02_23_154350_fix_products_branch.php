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
        Schema::create('branchs', function (Blueprint $table) {
            $table->id();
            $table->string('branch', 30);
            $table->timestamps();
        });

        Schema::create('product_branchs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('price', 8, 2)->default(0.01); //Até oito caracteres sendo 2 deles decimais.
            $table->integer('min_stored')->default(1);
            $table->integer('max_stored')->default(1);
            $table->timestamps();

            $table->foreign('branch_id')->references('id')->on('branchs');
            $table->foreign('product_id')->references('id')->on('products');
        });

        Schema::table('products', function(Blueprint $table){
            $table->dropColumn(['price', 'min_stored', 'max_stored']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function(Blueprint $table){
            $table->decimal('price', 8, 2)->default(0.01); //Até oito caracteres sendo 2 deles decimais.
            $table->integer('min_stored')->default(1);
            $table->integer('max_stored')->default(1);
        });

        Schema::dropIfExists('product_branchs');
        Schema::dropIfExists('branchs');
    }
};
