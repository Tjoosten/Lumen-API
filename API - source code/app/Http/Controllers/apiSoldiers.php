<?php

  namespace App\Http\Controllers;

  use App\Models\Soldaten;
  use App\Http\Controllers\Controller;
  use League\Fractal\Manager;
  use League\Fractal\Resource\Collection;
  use Illuminate\Http\Response;

  class ApiSoldiers extends Controller {

    private $fractal;

    /**
     * Class constructor
     */
    public function __construct() {
      $this->fractal = new Manager();
    }

    /**
     * Display all the soldiers.
     *
     * @access public
     * @link   GET /{parse}/soldiers/all
     * @param  $parse, string, The parsing method.
     * @return Response
     */
    public function soldiers($parse) {
      $soldaten           = Soldaten::with('begraafplaats', 'regiment');
      $variable['result'] = $soldaten->get();
      $resource           = new Collection($variable['result'], $this->transformSoldierCallback());

      if($parse === 'json') {
        return response($this->fractal->createData($resource)->toJson(), 200)
                ->header('Content-Type', 'application/json');
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
    public function soldier($parse, $id) {
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

    /**
     * Callback for the soldier side.
     *
     * @access private
     * @return callable
     */
    private function transformSoldierCallback() {
      return function($data) {
        return [
          [
            'id'                => (int)    $data['id'],
            'Voornaam'          => (string) $data['Voornaam'],
            'Achternaam'        => (string) $data['Achternaam'],
            'Geslacht'          => (string) $data['Geslacht'],
            'Burgerlijke stand' => (string) $data['Burgerlijke_stand'],
            'Geboorte datum'    => (string) $data['Geboren_datum'],
            'Geboorte plaats'   => (string) $data['Geboren_plaats'],

            'Overleden plaats'  => (string) $data['Overleden_plaats'],
            'Overleden datum'   => (string) $data['Overleden_datum'],
            'Overleden locatie' => (string) $data['Overleden_locatie'],
            'Doodsoorzaak'      => (string) $data['Doodsoorzaak'],
            'Graf referentie'   => (string) $data['Graf_referentie'],

            'begraafplaats id'  => (int)    $data['herdenking_id'],
            'begraafplaats'     => (string) $data['begraafplaats']['Begraafplaats'],
            'lengtegraad'       => (string) $data['begraafplaats']['Lengtegraad'],
            'breedtegraad'      => (string) $data['begraafplaats']['Breedtegraad'],
            'type'              => (string) $data['begraafplaats']['Type'],

            'Rang'              => (string) $data['Rang'],
            'Dienst'            => (string) $data['Dienst'],
            'Eenheid'           => (string) $data['Eenheid'],
            'Dienst nr'         => (string) $data['Stam_nr'],
            'Regiment ID'       => (int)    $data['regiment_id'],
            'Regiment'          => (string) $data['regiment']['Regiment'],

            'Notitie'           => (string) $data['Notitie']
          ],
        ];
      };
    }

  }
