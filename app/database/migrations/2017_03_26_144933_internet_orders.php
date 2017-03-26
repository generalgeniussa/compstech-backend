<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InternetOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internet_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_number');
            $table->string('first_name');
            $table->string('surname');
            $table->string('cell');
            $table->string('email');
            $table->string('tel');
            $table->string('fax');
            $table->string('company_name');
            $table->string('company_reg');
            $table->string('company_vat');
            $table->string('physical_address_line_1');
            $table->string('physical_address_line_2');
            $table->string('physical_address_city');
            $table->string('physical_address_province');
            $table->string('physical_address_postal_code');
            $table->string('postal_address_line_1');
            $table->string('postal_address_line_2');
            $table->string('postal_address_city');
            $table->string('postal_address_province');
            $table->string('postal_address_postal_code');
            $table->string('billing_address_line_1');
            $table->string('billing_address_line_2');
            $table->string('billing_address_city');
            $table->string('billing_address_province');
            $table->string('billing_address_postal_code');
            $table->string('bank_name');
            $table->string('bank_branch_name');
            $table->string('bank_branch_code');
            $table->string('bank_acc_number');
            $table->string('bank_acc_type');
            $table->string('terms_agreed');
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
        Schema::dropIfExists('internet_orders');
    }
}
