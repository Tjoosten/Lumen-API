<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graven extends Model {

  /**
   * The database table
   *
   * @access protected
   * @var    $hidden
   */
  protected $table = 'Begraafplaatsen';

  /**
   * Hidden columns
   *
   * @access protected
   * @var    $hidden
   */
  protected $hidden = ['updated_at', 'created_at'];

}
