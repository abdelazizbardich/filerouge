<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products';
    /**
     * Run the migrations.
     * @table products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categories_id');
            $table->string('name', 70)->nullable();
            $table->decimal('price', 11, 3)->nullable();
            $table->text('description')->nullable();
            $table->json('dimentions')->nullable();
            $table->text('thumbnail')->nullable()->default('dummy path');
            $table->text('good_to_know')->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('on_sale')->default(false);
            $table->boolean('in_slider')->default(false);
            $table->longText('full_description')->nullable();
            $table->integer('points')->unsigned()->default(0);
            $table->timestamps();

            $table->index(["categories_id"], 'fk_products_categories1_idx');


            $table->foreign('categories_id', 'fk_products_categories1_idx')
                ->references('id')->on('categories')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
