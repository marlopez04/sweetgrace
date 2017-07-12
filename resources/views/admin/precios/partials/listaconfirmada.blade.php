          <h4>{{$listaconfirmada->nombre}}</h4>
          <table class="table table-striped">
              <thead>
                <th>Articulo</th>
                <th>Precio</th>
                <th>Costo</th>
                <th>Utilidad</th>
              </thead>
              <tbody>
                @foreach($listaconfirmada->articulos as $articulo)
                  <tr>
                    <td>{{ $articulo->nombre }}</td>
                    <td>{{ $articulo->precio }}</td>
                    <td>{{ $articulo->receta->costo }}</td>
                    <td>{{ $articulo->precio - $articulo->receta->costo }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>