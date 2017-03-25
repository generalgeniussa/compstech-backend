<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternetSubcategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('internet_subcategories'))
        {
            Schema::create('internet_subcategories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name', 255)->default('');
                $table->integer('internet_category_id')->unsigned();
                $table->foreign('internet_category_id')
                    ->references('id')
                    ->on('internet_categories')
                    ->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('internet_subcategories');
    }
}