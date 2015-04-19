<html>
  <head>
    <title> API Output</title>
  </head>
  <body>

    {{-- Table output --}}
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Voornaam:</th>
          <th>Achternaam:</th>
        </tr>
      </thead>
      <tbody>
        @foreach($result as $output)
          <tr>
            <td><code>#{!! $output->id !!}</code></td>
            <td>{!! $output->Voornaam !!}</td>
            <td>{!! $output->Achternaam !!}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{-- END Table output --}}

  </body>
</html>
