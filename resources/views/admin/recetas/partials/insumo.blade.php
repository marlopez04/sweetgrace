	<table class="table table-striped">
              <thead>
                <th>Insumo</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                @foreach($insumos as $insumo)
                  <tr>
                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->cantidad }}</td>
                    <td>boton</td>
                  </tr>
                @endforeach
              </tbody>
    </table>