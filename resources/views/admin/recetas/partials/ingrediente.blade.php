	<table class="table table-striped">
              <thead>
                <th>Ingrediente</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                @foreach($ingredientes as $ingrediente)
                  <tr>
                    <td>{{ $ingrediente->nombre }}</td>
                    <td>{{ $ingrediente->cantidad }}</td>
                    <td>boton</td>
                  </tr>
                @endforeach
              </tbody>
    </table>