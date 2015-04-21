<?php

  namespace App\Http\Controllers;

  class CallbackSoldier extends Controller {

    /**
     * [Failure]:
     *
     * @access public
     * @return callable.
     */
    public function transformNoSoldier() {
      return [
        'error'   => (bool) true,
        'message' => (string) 'Invalid parse option',
        ];
    }

    /**
     * [Success]: Callback for the soldier side.
     *
     * @access public
     * @return callable
     */
    public function transformSoldierCallback() {
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
