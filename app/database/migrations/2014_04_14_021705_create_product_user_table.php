<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('product_user', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('product_id')->unsigned();
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('product_id')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('product_user', function($table)
		{
			$table->dropForeign('product_user_user_id_foreign');
			$table->dropForeign('product_user_product_id_foreign');
			// $table->dropForeign('{table_name}_{field_name}_foreign');
		});
	}

}
