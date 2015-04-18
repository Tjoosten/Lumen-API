<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soldaten extends Model {
	protected $table = 'Gesneuvelde';

	public function begraafplaats() {
		return $this->hasOne('App\Models\Graven', 'GID', 'herdenking_id');
	}

}
