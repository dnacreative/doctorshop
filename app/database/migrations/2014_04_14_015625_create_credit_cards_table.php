<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditCardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('credit_cards', function($table)
		{
			$table->create();
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('number', 16)->unique;
			$table->timestamps();
			
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('credit_cards', function($table)
		{
			$table->dropForeign('credit_cards_user_id_foreign');
			// $table->dropForeign('{table_name}_{field_name}_foreign');
		});
		
		Schema::drop('credit_cards');
	}

}
