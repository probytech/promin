<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('collections', function (Blueprint $table) {
			$table->id();
			$table->string('title');
			$table->string('table_name');
			$table->json('fields');
			$table->integer('is_dev');
			$table->integer('sort');
			$table->unsignedBigInteger('dropdown_id')->nullable();
			$table->string('icon')->nullable();
			$table->string("model")->nullable();
			$table->timestamps();

			$table->foreign('dropdown_id')->references('id')->on('dropdowns');
		});

		DB::table('collections')->insert([
			[
				'title'             => 'Roles',
				'table_name'        => 'roles',
				'fields'            => '[{"id":0,"is_translatable":0,"is_required":0,"is_visible":1,"is_show_in_list":1,"type":"text","db_title":"title","title":"Title"}]',
				'is_dev'            => '1',
				'sort'              => '0',
				'model'				=> '',
			],
			[
				'title'             => 'Users',
				'table_name'        => 'users',
				'fields'            => '[{"id":0,"is_translatable":0,"is_required":0,"is_visible":1,"is_show_in_list":1,"type":"text","db_title":"name","title":"Name"},{"id":1,"is_translatable":0,"is_required":0,"is_visible":1,"is_show_in_list":0,"type":"relationship","relationship_type":"single","relationship_table_name":"roles","title":"Role","relationship_view_field":"title"},{"id":2,"is_translatable":0,"is_required":0,"is_visible":1,"is_show_in_list":1,"type":"text","db_title":"email","title":"Email"},{"id":3,"is_translatable":0,"is_required":0,"is_visible":1,"is_show_in_list":0,"type":"password","db_title":"password","title":"Password"}]',
				'is_dev'            => '0',
				'sort'              => '1',
				'model'				=> 'User',
			]
		]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('collections', function (Blueprint $table) {
			$table->dropForeign('collections_dropdown_id_foreign');
		});

		Schema::dropIfExists('collections');
	}
};
