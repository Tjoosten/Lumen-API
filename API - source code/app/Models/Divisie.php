<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisie extends Model {

  /**
   * The database table
   *
   * @access protected
   * @var    $hidden
   */
  protected $table = 'Regimenten';

  /**
   * Hidden columns
   *
   * @access protected
   * @var    $hidden
   */
  protected $hidden = ['updated_at', 'created_at'];

}
