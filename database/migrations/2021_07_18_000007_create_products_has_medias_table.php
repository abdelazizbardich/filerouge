<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateProductsHasMediasTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'products_has_medias';
    /**
     * Run the migrations.
     * @table products_has_medias
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('medias_id');
            $table->string('type', 45)->default('thumbnail');
            $table->timestamps();
            $table->index(["medias_id"], 'fk_products_has_medias_medias1_idx');
            $table->index(["products_id"], 'fk_products_has_medias_products1_idx');
            $table->foreign('products_id', 'fk_products_has_medias_products1_idx')->references('id')->on('products')->onDelete('no action')->onUpdate('no action');
            $table->foreign('medias_id', 'fk_products_has_medias_medias1_idx')->references('id')->on('medias')->onDelete('no action')->onUpdate('no action');
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
