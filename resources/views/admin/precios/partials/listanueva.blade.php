          <table class="table table-striped">
              <thead>
                <th></th>
                <th>Ingrediente</th>
                <th>Cantidad</th>
              </thead>
              <tbody>
                @foreach($receta->recetaingredientes as $recetaingrediente)
                  <tr>
                    <td>
                    <a href="javascript:void(0)" class="btn btn-danger" onclick='borraringrdiente(this)' data-id="{{ $recetaingrediente->id}}"><span class="glyphicon glyphicon-remove-circle"></span></a>
                    </td>
                    <td>{{ $recetaingrediente->nombre }}</td>
                    <td>{{ $recetaingrediente->cantidad }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>