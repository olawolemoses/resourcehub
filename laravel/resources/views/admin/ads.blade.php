@include('includes.admin_header')
<div class="container" style="padding-top: 90px;">
	<div class="modal fade col-md-6 offset-md-3" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
     <h5 class="modal-title" id="exampleModalLabel">Delete Ad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="modal">
          
       <form action="/deletead" method="get" id="delete-user-form" >
         @csrf
         <input type="hidden" name="ad_id" id="ad_id" value="">

       <p> Are You sure you want to delete this Ad </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn closeDia remove-data-from-delete-form" data-dismiss="modal">Cancel</button>     
        <button type="submit"   class="btn actionDia" > Delete</button>     
      </div>
      </form>
    </div>
  </div>
</div>

<div class="container" style="padding-top: 90px;">
	<h5>Ads Management</h5>
	@include('includes.admin.status')
	<div class="row">
		<div class="col-md-12">
			<form class="form-inline dp">

			  <div class="form-group col-md-4">
			    <a href="/addad" style="color: #66ef46; font-size: 13px;text-decoration: none;"> + Add new Ad</a>
			  </div>

			  <div class="form-group col-md-4">
			  </div>
			  
			</form>
		</div>

	</div>
	<div class="row">
		<div class="col-md-12">	

				<table class="table table-striped ned">
				  <tbody>
				      @if(count($ads) > 0)
				    	    @foreach($ads as $ad)
				    	    <tr>
							<td style="padding: 0;width=10% !important;padding-top: 10px;"><img src="/img/{{ $ad->banner_file_name }}" alt="" style="width: 70%;"></td>
							<td>@if($ad->location_name == 0){{ "Home Page Ad" }}@elseif($ad->location_name == 1){{ "Search Results Page Ad"}}@endif <br>940 X 200<br><br>Status:@if($ad->show_status == 0){{"Inactive"}}@elseif($ad->show_status == 1){{"Active"}}@endif<br><a href="/editad/{{$ad->id}}"><i class="fa fa-edit" ></i></a> &nbsp; Edit <br>
								<a class="delete-user" data-toggle="modal" data-target="#delete"  ><i data-toggle="modal" data-target="#deleteModal" class="fa fa-trash"  data-ad_id="{{ $ad->id }}" ></i> &nbsp; delete</a> 
							</td>
							<td>Target url: {{ $ad->target_url}}</td>
				        	</tr>
                          @endforeach 
                      @else
                      <tr>
                          <td>{{ "No Ads Yet..."}}</td>
                      </tr>
                      @endif
							
				   </tbody>
				</table>
		</div>
	</div>
</div>

<style>
	img {
		width: 200px;
	}
	tr {
		margin-bottom: 15px;
	}
</style>

<script>
     $('#deleteModal').on('show.bs.modal',function(event){
            var button = $(event.relatedTarget)
            var ad_id = button.data('ad_id')
            var modal = $(this)
            modal.find('.modal-body #ad_id').val(ad_id)
           // $('#delete-user-form').attr('action',"user/"+user_id)
        })  
        
    $("input").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
        
        var file = e.originalEvent.srcElement.files[i];
        
        var img = document.createElement("img");
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
             img.width = 515;
             //img.height = auto;

        }
        reader.readAsDataURL(file);
        $("input").after(img);
    }
});
$('#service_image').change(function(){

$('#img1').css('display','none');
});    
    
</script>

@include('includes.admin_footer')