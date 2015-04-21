<?php

namespace App\Http\Controllers;

Class ApiVarious extends Controller {

  /**
   * frontapge controller & returns API info
   *
   * @access public
   * @link   GET /{parse}
   * @param  $parse, sting, the output
   * @return Response.
   */
  public function frontpage($parse) {

    // Set constant to variables.
    $information = [
        'name'      => ApiVarious::NAME,
        'version'   => ApiVarious::VERSION,
        'developer' => ApiVarious::DEVELOPER,
        'email'     => ApiVarious::EMAIL,
        'git'       => ApiVarious::GIT,
        'license'   => ApiVarious::LICENSE,
        'docsCode'  => ApiVarious::DOCS_CODE,
        'docsUsage' => ApiVarious::DOCS_USAGE,
      ];

    if($parse === 'json') {
      return response()->json([
        'Name'           => $information['name'],
        'Version'        => $information['version'],
        'Developer'      => $information['developer'],
        'Email'          => $information['email'],
        'GitHub'         => $information['git'],
        'license'        => $information['license'],
        'documentation'  => [ $information['docsCode'], $information['docsUsage'] ],
      ], 200)->header('Content-Type', 'application/json');
    } elseif($parse === 'html') {
      return view('frontpage', $information);
    } elseif($parse === 'xml') {
      return response(view('xml.frontpage', $information), 200)
              ->header('Content-Type', 'text/xml');
    } else {
      return response()->json([
        'error'   => true,
        'message' => 'Invalid parse option',
      ], 200)->header('Content-Type', 'application\json');
    }
  }
}
