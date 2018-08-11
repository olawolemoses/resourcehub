@include('includes.admin_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

  <div class="container" style="padding-top: 90px;">
     
<h5>Dashboard</h5>

     <div class="row">
      

       <div class="col-md-3 patnet">
         <div class="row">
           <div class="col-12">
             <div class="crossPat" style="background: #50e3c2;"></div>
           </div>

           <div class="col-8">
            Total number of vendors
           </div>

           <div class="col-4">
             {{ App\Models\Merchant::count() }}
           </div>

         </div>
       </div>


    <div class="col-md-3 patnet">
         <div class="row">
           <div class="col-12">
             <div class="crossPat" style="background: #4a90e2;"></div>
           </div>

           <div class="col-8">
            Total number of users
           </div>

           <div class="col-4">
            {{ App\Models\User::count() }}
           </div>

         </div>
       </div>



       <div class="col-md-3 patnet">
         <div class="row">
           <div class="col-12">
             <div class="crossPat" style="background: #f8e71c;"></div>
           </div>

           <div class="col-8">
            Total resource downloaded
           </div>

           <div class="col-4">
            {{ App\Models\Order::where('paid', '=' , 1)->count() }}
           </div>

         </div>
       </div>

       <div class="col-md-3 patnet">
         <div class="row">
           <div class="col-12">
             <div class="crossPat" style="background: #1cedf8;"></div>
           </div>

           <div class="col-8">
            Number of visitors today
           </div>

           <div class="col-4">
            {{ App\Http\Controllers\AdminDashboardController::visitors()}} 
                     
               
           </div>
        

         </div>
       </div>

     </div>


     <div class="row" style="margin-top: 50px;">
       
       <div class="col-md-12">
          <h5>Financial management</h5>

          <div class="graph bar-graph">
            <canvas id="myBarGraph"></canvas>
          </div>
       </div>

     </div>

     <div class="row" style="margin-top: 50px;">
      <h5>New Orders</h5>

      <div class="col-md-6">
        
        <table class="table table-striped sta" style="background: #fff;">
          <thead>
            <tr>
              <th scope="col">Clients</th>
              <th scope="col">Price</th>
              <th scope="col">Status</th>
              <th scope="col">Order Date</th>
            </tr>
          </thead>
          <tbody>
         @foreach($orders as $order)
    <tr>
    <td> 	
    @if($customer = App\Models\Customer::where('id','=',$order->customer_id)->first())
        	{{ $customer->name() }}
        	@endif 
    </td>
     <td> {{ App\Models\Order::find($order->id)->Service->price }} </td>
     <td>@if($order->paid === 1)
           PAID 
           @elseif($order->paid === 0)
           PENDING
           @endif
             </td>
    <td> {{ $order->order_date->format('jS F Y')}}  </td>
   </tr>   
      @endforeach
           
          </tbody>
        </table>

      </div>
      
      <div class="col-md-6">
        
      <table class="table table-striped sta" style="background: #fff;">
          <thead>
            <tr style=>
              <th scope="col">Email</th>
              <th scope="col">Account type</th>
              <th scope="col">Created at</th>
            </tr>
          </thead>
          <tbody>
        @foreach( $users as $user)
        <tr>
       <td>{{ $user->username }}</td>
       <td>
        @if($user->user_type === 0)
           Administrator 
           @elseif($user->user_type === 1)
           Customer
           @elseif($user->user_type === 2)
           Merchant
           @endif
       </td>
       <td>{{ $user->created_at }}</td>
       </tr>
       @endforeach
          </tbody>
        </table>


      </div>
     </div>
  </div>


<script>

    
            
  var ctx = document.getElementById('myBarGraph').getContext('2d');

  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Mon", "Tue", "Wed", "thu", "Fri","Sat","Sun"],
          datasets: [
          {
              label: 'deposits',
              data: [98000, 50000, 71000, 10000, 105000,140000,105000],
              backgroundColor: [
                  '#795f9d',
                  '#795f9d',
                  '#795f9d',
                  '#795f9d',
                  '#795f9d',
                  '#795f9d',
                  '#795f9d'
                  
              ]
          },
          {
            label: 'witddrawn',
            data: [98000, 50000, 71000, 10000, 105000],
            backgroundColor: [
          '#d3bfec',
          '#d3bfec',
          '#d3bfec',
          '#d3bfec',
          '#d3bfec'
            ]
          }]
      },
      options: {

        reponsive: false,

        scales: {
            xAxes: [{
                barThickness : 15
            }]
        }
      }

  });

</script>
@include('includes.admin_footer')