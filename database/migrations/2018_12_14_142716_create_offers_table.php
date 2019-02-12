<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateOffersTable.
 */
class CreateOffersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title',128);
            $table->string('code',200);
            $table->string('url',2048);
            $table->unsignedInteger('story_id');
            $table->string('image',500)->default('offer-default.png');
            $table->text('gallery')->nullable();
            $table->decimal('total_price',8,2);
            $table->integer('plots')->default(12);
            $table->decimal('plots_price',8,2);
            $table->enum('available',['y','n'])->default('y');
            $table->date('available_to');
            $table->datetime('created_at');
            $table->datetime('updated_at');
            $table->datetime('deleted_at');
            $table->foreign('story_id')->references('id')->on('stores');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('offers');
	}
}
