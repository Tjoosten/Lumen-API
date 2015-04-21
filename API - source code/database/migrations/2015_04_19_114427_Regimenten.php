<?php

	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Database\Migrations\Migration;

	class Regimenten extends Migration {

		/**
		 * Run the migrations.
		 *
		 * @access public
		 * @return void
		 */
		public function up() {

			Schema::create('Regimenten', function(Blueprint $table) {
				$table->increments('id');
				$table->string('Regiment');
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
			Schema::drop('Regimenten');
		}

	}
