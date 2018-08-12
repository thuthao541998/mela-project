<?php /** @noinspection ALL */

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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->string('images');
            $table->string('overview');
            $table->string('description');
            $table->integer('categoryId')->unsigned();
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->integer('brandId')->unsigned();
            $table->foreign('brandId')->references('id')->on('brands');
            $table->timestamps(true);
            $table->string('status')->default(1);
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
