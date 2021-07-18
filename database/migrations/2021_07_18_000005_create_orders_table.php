<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'orders';
    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('shipping_adresses_id');
            $table->timestamps();

            $table->index(["users_id"], 'fk_orders_users1_idx');

            $table->index(["shipping_adresses_id"], 'fk_orders_shipping_adresses1_idx');


            $table->foreign('users_id', 'fk_orders_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('shipping_adresses_id', 'fk_orders_shipping_adresses1_idx')
                ->references('id')->on('shipping_adresses')
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
