<?php

  namespace App\Http\Controllers;

  use App\Models\Gesneuvelde;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Response;

  class apiSoldiers extends Controller {

    /**
     * Display all the soldiers.
     *
     * @access public
     * @link   GET /soldiers/all
     * @return Response
     */
    public function Soldiers() {
      $soldier = Gesneuvelde::all() ;

      return response()->json([
          'error' => false,
          'soldiers'  => $soldiers->toArray(),
        ], 200)->header('Content-Type', 'application/json');
    }

    /**
     * Get a specifuc soldier.
     *
     * @access public
     * @link   GET //soldiers/{id}
     */
    public function Soldier($id) {
      $soldier = Gesneuvelde::find($id);

      return response()->json([
          'error'    => false,
          'soldier'  => $soldier->toArray(),
        ], 200)->header('Content-Type', 'application/json');
    }

    public function delete() {
      $soldiers = Gesneuvelde::find($id);
      $soldiers->delete();

      return response()->json([
        'error'   => false,
        'soldier' => 'Soldier deleted',
      ], 200)->header('Content-Type', 'application/json');
    }

  }
