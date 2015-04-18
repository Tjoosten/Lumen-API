<?php

  namespace App\Models;

  use Illuminate\Database\Eloquent\Model;

  class Soldaten extends Model {

    /**
     * The database table
     *
     * @access protected
     * @var    $hidden
     */
  	protected $table = 'Gesneuvelde';

    /**
     * Hidden columns
     *
     * @access protected
     * @var    $hidden
     */
    protected $hidden = ['updated_at', 'created_at'];

    /**
     * Make the graveyard relation
     *
     * @access public
     * @return Array
     */
  	public function begraafplaats() {
  		return $this->hasOne('App\Models\Graven', 'id', 'herdenking_id');
  	}

    /**
     * Make the regiment relation
     *
     * @access public
     * @return Array
     */
    public function regiment() {
      return $this->hasOne('App\Models\Divisie','ID', 'regiment_id');
    }

  }
