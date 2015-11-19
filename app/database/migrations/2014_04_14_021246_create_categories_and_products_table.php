<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesAndProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('categories', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
		});
		
		Schema::table('products', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->string('name');
			$table->decimal('price');
			$table->timestamps();
			
			$table->foreign('category_id')->references('id')->on('categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function($table)
		{
			$table->dropForeign('products_category_id_foreign');
			// $table->dropForeign('{table_name}_{field_name}_foreign');
		});
	
		Schema::drop('products');
		Schema::drop('categories');
	}

}
