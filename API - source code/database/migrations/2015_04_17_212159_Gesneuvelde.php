<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Gesneuvelde extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @access public
		 * @return void
		 */
		public function up() {

			Schema::create('Gesneuvelde', function(Blueprint $table) {
				$table->increments('id');
				$table->string('Voornaam', 255);
				$table->string('Achternaam', 45);
				$table->string('Burgerlijke_stand', 255);
				$table->string('Stam_nr', 30);
				$table->integer('regiment_id');
				$table->string('Geboren_datum', 45);
				$table->string('Geboren_plaats', 200);
				$table->text('Overleden_locatie');
				$table->string('Overleden_datum', 45);
				$table->string('Overleden_plaats', 400);
				$table->text('Doodsoorzaak');
				$table->integer('herdenking_id');
				$table->string('Added', 70);
				$table->string('Geslacht', 45);
				$table->string('Eenheid', 40);
				$table->string('Rang', 45);
				$table->string('Graf_referentie', 45);
				$table->string('Dienst', 45);
				$table->timestamps();
			});

	}

		/**
		 * Reverse the migrations.
		 *
		 * @access public
		 * @return void
		 */
		public function down() {
			Schema::drop('Gesneuvelde');
		}

	}
