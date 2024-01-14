<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProductsTableAddFeatured extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->enum('featured',['Yes','No'])->default('No')->after('brand_id');
        });
        $table->string('name');
        $table->string('slug');
        $table->string('file');
        $table->enum('status',['Active','Inactive'])->default('active');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('featured');
        });
    }
}
