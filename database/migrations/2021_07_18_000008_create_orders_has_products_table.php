<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateOrdersHasProductsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'orders_has_products';
    /**
     * Run the migrations.
     * @table orders_has_products
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('orders_id');
            $table->unsignedBigInteger('products_id');
            $table->timestamps();

            $table->index(["products_id"], 'fk_orders_has_products_products1_idx');

            $table->index(["orders_id"], 'fk_orders_has_products_orders1_idx');


            $table->foreign('orders_id', 'fk_orders_has_products_orders1_idx')
                ->references('id')->on('orders')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('products_id', 'fk_orders_has_products_products1_idx')
                ->references('id')->on('products')
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
