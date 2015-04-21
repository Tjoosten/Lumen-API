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
				$this->increments('id');
				$this->text('Begraafplaats');
				$this->string('Lengtegraad', 255);
				$this->string('Breedtegraad', 255);
				$this->string('Type', 45);
				$this->timestamps();
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
