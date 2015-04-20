<?php

  namespace App\Http\Controllers;

  use App\Models\Soldaten;
  use App\Http\Controllers\Controller;

  use Illuminate\Http\Response;

  class apiSoldiers extends Controller {

    /**
     * Display all the soldiers.
     *
     * @access public
     * @link   GET /{parse}/soldiers/all
     * @param  $parse, string, The parsing method.
     * @return Response
     */
    public function Soldiers($parse) {
      $soldaten           = Soldaten::with('begraafplaats', 'regiment');
      $variable['result'] = $soldaten->get();

      if($parse === 'json') {
        return response()->json([
            'error'    => false,
            'soldiers' => $variable['result'],
          ], 200)->header('Content-Type', 'application/json');
      } elseif($parse === 'html') {
        return view('soldiersTable', $variable);
      } else {
        return response()->json([
          'error'   => true,
          'message' => 'Invalid parse option',
        ], 200)->header('Content-Type', 'application/json');
      }
    }

    /**
     * Get a specific soldier.
     *
     * @access public
     * @link   GET /soldiers/{id}
     * @param  $id, integer, soldiers DB id.
     * @param  $pase, string, the parsing option.
     * @return Response.
     */
    public function Soldier($parse, $id) {
      $soldier            = Soldaten::with('begraafplaats', 'regiment')->where('id', $id);
      $variable['result'] = $soldier->get();

      if(count($variable['result']) === 0) {
        return response()->json([
          'Error'   => true,
          'Rows'    => count($variable['result']),
          'message' => 'No soldier found.',
        ], 200)->header('Content-type', 'application/json');
      }

      if($parse === 'json') {
        return response()->json([
            'error'    => false,
            'soldiers' => $variable['result'],
          ], 200)->header('Content-Type', 'application/json');
      } elseif($parse === 'html') {
        return view('soldiersInfo', $variable);
      } else {
        return response()->json([
          'error'   => true,
          'message' => 'Invalid parse option',
        ], 200)->header('Content-Type', 'application/json');
      }
    }

    /**
     * Delete a soldier.
     *
     * @access public
     * @link   GET /soldiers/delete/{id}
     * @param  $id, integer, soldiers DB id.
     * @return Response
     */
    public function delete() {
      $soldiers = Soldaten::find($id);
      $soldiers->delete();

      return response()->json([
        'error'   => false,
        'soldier' => 'Soldier deleted',
      ], 200)->header('Content-Type', 'application/json');
    }

  }
