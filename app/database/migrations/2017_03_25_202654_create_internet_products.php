<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternetProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255)->default('');
            $table->string('shortcode', 255)->default('');
            $table->text('description');
            $table->boolean('capped')->default(false);
            $table->boolean('shaped')->default(false);
            $table->float('cap')->default(0.00);
            $table->float('speed')->default(0.00);
            $table->float('price')->default(0.00);
            $table->integer('internet_category_id')->unsigned();
            $table->foreign('internet_category_id')->references('id')->on('internet_categories');
            $table->integer('internet_subcategory_id')->unsigned();
            $table->foreign('internet_subcategory_id')->references('id')->on('internet_subcategories');
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
        Schema::dropIfExists('internet_products');
    }
}
