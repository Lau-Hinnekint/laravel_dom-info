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
        Schema::create('category_product', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('product_id');

            $table->string ('gene_brand');
            $table->string ('gene_model');
            $table->string ('proc_name');
            $table->string ('proc_type');
            $table->string ('proc_frequency');
            $table->string ('proc_chipset');
            $table->string ('memo_size');
            $table->string ('memo_type');
            $table->string ('memo_capacityMax');
            $table->string ('stor_primary');
            $table->string ('stor_secondary');
            $table->string ('stor_type');
            $table->string ('stor_interface');            
            $table->string ('disp_chipset');            
            $table->string ('disp_memory');            
            $table->string ('netw_wireless');            
            $table->string ('netw_wirelessNorm');            
            $table->string ('netw_norm');            
            $table->string ('conn_front');            
            $table->string ('conn_back');            

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_product');
    }
};
