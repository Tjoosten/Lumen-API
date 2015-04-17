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
     * @return Response
     */
    public function Soldiers() {
      $query = Gesneuvelde::all();

      return response()->json([
          'error' => false,
          'soldiers'  => $query->toArray(),
          200
        ])->header('Content-Type', 'application/json');
    }

    /**
     * Get a specifuc soldier.
     *
     *
     */
    public function Soldier($id) {
      $query = Gesneuvelde::findOrFail($id);

      return response()->json([
          'error'    => false,
          'soldier'  => $query->toArray(),
          200
        ])->header('Content-Type', 'application/json');
    }

  }
