<div class="price-details">
                 <h3>Articulos</h3>
          <table class="table table-striped">
              <thead>
                <th>articulo</th>
                <th>cantidad</th>
                <th>precio</th>
              </thead>
              <tbody>
                  <tr>
                    <td>{{ $pedidoarticulo->articulo_id}}</td>
                    <td>$ {{ $pedidoarticulo->cantidad }}</td>
                    <td>$ {{ $pedidoarticulo->precio }}</td>
                  </tr>
              </tbody>
            </table>

<!--

                 <span>{{ $pedidoarticulo->articulo_id}}</span>
                 <span class="total1">$ {{ $pedidoarticulo->precio }}</span>
                 <span>Budin</span>
                 <span class="total1">80.00</span>
                 <span>Pan Dulce</span>
                 <span class="total1">150.00</span>
-->                 
                 <div class="clearfix"></div>                
             </div> 
             <ul class="total_price">
               <li class="last_price"> <h4>TOTAL</h4></li>  
               <li class="last_price"><span>350.00</span></li>
               <div class="clearfix"> </div>
             </ul>