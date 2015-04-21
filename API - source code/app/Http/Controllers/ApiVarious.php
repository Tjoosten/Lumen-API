<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

Class ApiVarious extends BaseController {

  // Constants to define our api information.
  const VERSION     = "1.0.*-dev";
  const DEVELOPER   = "";
  const EMAIL       = "",
  const GIT         = "",
  const LICENSE     = "",
  const DOCS_CODE   = "",
  const DOCS_USEAGE = "",

  /**
   * frontapge controller
   *
   * @access public
   * @link   GET /
   * @return Response.
   */
  public function frontpage() {
    return response()->json([
      'Error'   => false,
      'Message' => 'Fallen Soldiers API'
    ], 200)->header('Content-Type', 'application/json');
  }

  /**
   * API Info
   *
   * Display the information of the API.
   *
   * @access public
   * @link /{pars}/info
   * @return
   */
  public function info($parse) {
    // Output layout in the controller becasue it is only one layout.
    // And no callback method needed.

    if($parse === 'json') {
      return response()->json([
        'Error'   => false,
        'Version' => ApiVarious::VERSION,
      ], 200)->header('Content-Type', 'application/json');
    } elseif($paser === 'html') {

    } else {
      return reponse()->json([

        ]);
    }
  }

}
