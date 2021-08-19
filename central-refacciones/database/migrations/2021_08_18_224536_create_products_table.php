<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('key_prod')->unique();
            $table->string('name');
            $table->string('measure');
            $table->string('m_unit');
            $table->string('equivalence');
            $table->text('description');
            $table->string('alternate');
            $table->unsignedBigInteger('Line_id');
            $table->foreign('Line_id')->references('id')->on('lines');
            $table->unsignedBigInteger('Trademarks__id');
            $table->foreign('Trademarks__id')->references('id')->on('trademarks');
            $table->unsignedBigInteger('Element_type_id');
            $table->foreign('Element_type_id')->references('id')->on('element_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
