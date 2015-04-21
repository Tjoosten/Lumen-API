<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Burgerslachtoffers extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {

			Schema::create('Burgerslachtoffers', function(Blueprint $table) {
				$table->increments('id');
				$table->string('Voornaam', 255);
				$table->string('Achternaam', 255);
				$table->string('Burgerlijke_stand', 45);
				$table->string('Geboren_plaats', 255);
				$table->string('Geboren_datum', 255);
				$table->string('Leeftijd', 45);
				$table->string('Geslacht', 10);
				$table->string('Beroep', 45);
				$table->string('Werkgever', 45);
				$table->strng('Overleden_plaats', 45);
				$table->string('Overleden_datum', 255);
				$table->text('Overleden_locatie');
				$table->text('Woonplaats_straat');
				$table->text('Woonplaats_gemeente');
				$table->integer('HerdenkingID');
				$table->string('Foto', 45);
				$table->timestamps();
			});

		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::drop('Burgerslachtoffers');
		}

	}
