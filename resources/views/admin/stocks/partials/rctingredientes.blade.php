	<table class="table table-striped">
              <thead>
                <th>Ingrediente</th>
                <th>Stock</th>
                <th>Seleccionar</th>
              </thead>
              <tbody>
                 @foreach($ringredientes as $ringrediente)
                  <tr>
                    <td>{{ $ringrediente->nombre }}</td>
                    <td>{{ $ringrediente->cantidad }}</td>
                    <td>boton</td>
                  </tr>
              </tbody>
    </table>