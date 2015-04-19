<html>
  <head>
    <title>API Output</title>
  </head>
  <body>
      @foreach($result as $output)
        <strong>Voornaam:</strong> {!! $output->Voornaam !!} <br>
        <strong>Achternaam:</strong> {!! $output->Achternaam !!} <br>
        <strong>Geboorte datum:</strong> {!! $output->Geboren_datum !!} <br>
        <strong>Geboorteplaats:</strong> {!! $output->Geboren_plaats !!} <br>
        <strong>Burgerlijke stand:</strong> {!! $output->Burgerlijke_stand !!} <br><br>

        <strong>Dienst nr: </strong> {!! $output->Stam_nr !!} <br>
        <strong>Regiment ID: </strong> {!! $output->regiment_id !!} <br>
        <strong>Regiment:</strong> {!! $output['Regiment']->Regiment !!} <br>
      @endforeach
  </body>
</html>
