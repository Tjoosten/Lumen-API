<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Begraafplaatsen extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {

			Schema::create('Gesneuvelde', function(Blueprint $table) {
				$table->increments('id');
				$table->text('Begraafplaats');
				$table->string('Lengtegraad', 255);
				$table->string('Breedtegraad', 255);
				$table->string('Type', 45);
				$table->timestamps();
			});

		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schama::drop('Begraafplaatsen');
		}

	}
