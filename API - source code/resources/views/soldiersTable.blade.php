<html>
  <head>
    <title> API Output</title>

    <link rel="stylesheet" href="/css/master.css">
  </head>
  <body>

    {{-- Table output --}}
    <table>
      <thead>
        <tr>
          <th class="id">#</th>
          <th class="Voornaam">Voornaam:</th>
          <th class="Achternaam">Achternaam:</th>
          <th class="Overleden">Overleden Datum:</th>
          <th></th> {{-- Options --}}
        </tr>
      </thead>
      <tbody>
        @foreach($result as $output)
          <tr>
            <td><code>#{!! $output->id !!}</code></td>
            <td>{!! $output->Voornaam !!}</td>
            <td>{!! $output->Achternaam !!}</td>
            <td>{!! $output->Overleden_datum !!}</td>
            <td><a href="/html/soldiers/{!! $output->id !!}">View</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- END Table output --}}

  </body>
</html>
