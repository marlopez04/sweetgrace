          <table class="table table-striped">
              <thead>
                <th>ID</th>
                <th>Cliente</th>
                <th>Importe</th>
                <th>Pedido</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th>Stock_id</th>
              </thead>
              <tbody>
                  <tr>
                    <td class="pedidoid" data-id="{{ $pedido->id}}">{{ $pedido->id }}</td>
                    <td>{{ $pedido->cliente_id }}</td>
                    <td>${{ $pedido->importe }}</td>
                    <td>{{ $pedido->entrega }}</td>
                    <td>{{ $pedido->user_id }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td class="stockid" data-id="{{ $pedido->stock_id}}">{{ $pedido->stock_id }}</td>
                  </tr>
              </tbody>
            </table>
