{!! Form::hidden('id_pedido',$pedido->id,['class'=>'pedidoid'])!!}
{!! Form::hidden('id_stock',$pedido->stock_id,['class'=>'stockid'])!!}
          <table class="table table-striped">
              <thead>
                <th>Cliente</th>
                <th>Pedido</th>
                <th>Fecha</th>
                <th>Usuario</th>
                <th>Estado</th>
                <th></th>
              </thead>
              <tbody>
                  <tr>
<!--                
                    <td class="pedidoid" data-id="{{ $pedido->id}}">{{ $pedido->id }}</td>
-->
                    <td>{{ $pedido->cliente->nombre }}</td>
                    <td>{!! Form::date('pedido',null,['class'=>'form-control', 'required'])!!}</td>
                    <td>{!! Form::date('entrega',null,['class'=>'form-control', 'required'])!!}</td>
                    <td>{{ $pedido->user->name }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td><button type="button" class="btn btn-danger" id="buscar">Confirmar</button></td>
<!--
                    <td class="stockid" data-id="{{ $pedido->stock_id}}">{{ $pedido->stock_id }}</td>
-->
                  </tr>
              </tbody>
            </table>
