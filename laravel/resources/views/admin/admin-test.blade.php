@include('includes.admin_header')

<script>

    /**var url = "{{url('admin-dashoard')}}";
        var days = new Array();
        var deposits = new Array();
        var withdrawal = new Array();
        $(document).ready(function(){
          $.get(url, function(response){
            response.forEach(function(data){
                days.push(data.Appdays);
                deposits.push(data.deposits);
                withdrawal.push(data.Appwithdrawal);
            });**/
            
  var ctx = document.getElementById('myBarGraph').getContext('2d');

  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ["Mon", "Tue", "Wed", "thu", "Fri","Sat","Sun"],
          datasets: [
          {
              label: 'deposits',
              data: [120000, 25000, 108000, 4000, 58000, 140000,100000],
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