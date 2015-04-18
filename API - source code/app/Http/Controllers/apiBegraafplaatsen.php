<?php

  namespace App\Http\Controllers;

  use App\Models\Graven;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Response;

  class apiBegraafplaatsen extends Controller {

    /**
     * Display all the graveyards.
     *
     * @access public
     * @link   GET /Graveyards/all
     * @return Response
     */
    public function Graveyards() {
      $graveyards = Graven::all();

      return response()->json([
        'Error'    => false,
        'Graveyards' => $graveyards,
      ], 200)->header('Content-Type', 'application/json');
    }


    /**
     * Display a specific graveyard.
     *
     * @access public
     * @link   GET /Graveyards/{id}
     * @param  $id, integer, the graveyards id.
     * @return Response
     */
    public function Graveyard($id) {
      $graveyard = Graven::find($id);

      return response()->json([
        'Error'    => false,
        'Graveyard' => $graveyard
      ], 200)->header('Content-Type','application/json');
    }
  }
