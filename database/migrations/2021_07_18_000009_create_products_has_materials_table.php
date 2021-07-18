<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductsHasMaterialsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products_has_materials';
    /**
     * Run the migrations.
     * @table products_has_materials
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('materials_id');
            $table->timestamps();

            $table->index(["materials_id"], 'fk_products_has_materials_materials1_idx');

            $table->index(["products_id"], 'fk_products_has_materials_products1_idx');


            $table->foreign('products_id', 'fk_products_has_materials_products1_idx')
                ->references('id')->on('products')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('materials_id', 'fk_products_has_materials_materials1_idx')
                ->references('id')->on('materials')
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
