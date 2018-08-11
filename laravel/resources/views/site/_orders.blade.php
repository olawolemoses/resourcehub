                 <h5>Orders</h5>

                 <div class="enough">
                     <table class="table table-striped" style="font-size:14px;">
                         <thead>
                             <tr>
                                 <th style="font-weight:normal;">ITEM</th>
                                 <th style="font-weight:normal;">MERCHANT</th>
                                 <th style="font-weight:normal;">DATE</th>
                                 <th style="font-weight:normal;">STATUS</th>
                                 <th style="font-weight:normal;">TOTAL (N)</th>
                                 <th style="font-weight:normal;">ACTION</th>
                             </tr>
                         </thead>
                         
                         <tbody>
                             @foreach($orders as $order)
                             <tr>
                                 <td>{{ $order->service->service_name }}</td>
                                 <td>{{ $order->service->user->name() }}</td>
                                 <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                 <td>{{ $order->tracking_status }}</td>
                                 <td>{{ number_format( $order->amount/100, 2) }}</td>
                                 <td data-toggle="modal" data-target="#exampleModalLong" style="color:red;"><i class="material-icons">delete</i> Delete</td>
                             </tr>
                            @endforeach

                         </tbody>
                     </table>
                 </div>

