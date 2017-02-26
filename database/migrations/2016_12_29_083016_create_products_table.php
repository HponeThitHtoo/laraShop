<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
            $table->increments("id");
            $table->string("title", 255);
            $table->text("description");
            $table->decimal("price", 10, 2);
            $table->string("image")->nullable();
            $table->integer("user_id");
            $table->integer("category_id");
            $table->integer("quantity")->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("products");
    }
}
