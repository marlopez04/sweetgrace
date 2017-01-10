	<table class="table table-striped">
              <thead>
                <th>Insumo</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                @foreach($rinsumos as $rinsumo)
                  <tr>
                    <td>{{ $rinsumo->nombre }}</td>
                    <td>{{ $rinsumo->cantidad }}</td>
                    <td>boton</td>
                  </tr>
                @endforeach
              </tbody>
    </table>