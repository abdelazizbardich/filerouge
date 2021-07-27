<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'users';
    /**
     * Run the migrations.
     * @table users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->id();
            $table->string('fname', 70)->nullable();
            $table->string('lname', 70)->nullable();
            $table->string('email', 150)->nullable();
            $table->string('password', 250)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('region', 150)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('street', 150)->nullable();
            $table->string('zip_code', 45)->nullable();
            $table->integer('state')->nullable()->default(1);
            $table->text('remember_token')->nullable();
            $table->string('api_token', 250)->unique()->nullable();
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
        Schema::dropIfExists($this->tableName);
    }
}
