@include('includes.admin_header')

<div class="container" style="padding-top: 90px;">

	<h5>Add Ad</h5>
	<div class="row">
	
		<div class="col-md-6">
				<form method="POST" action="/addad" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label>Ad Location</label>
						<select class="form-control" name="ad_location_id">
						    <option value="0">Home</option>
						    <option value="1">Search Results</option>
						</select>
					</div>
					<div class="form-group">
						<label>Ad Title</label>
						<input type="text" name="ad_title" class="form-control" value="{{$ad->title}}">
					</div>
					<div class="form-group">
						<label>Ad Description</label>
						<textarea cols="20" rows="15" class="form-control" name="ad_description" >
							{{$ad->description}}
						</textarea>
					</div>
					 <div class="form-group">
                    	<label>Ad Image</label>
                    	<input type="file" name="ad_image" id="ad_image" class="form-control">
                    </div>
                    <div class="form-group">
						<label>Ad Target Url</label>
						<input type="url" name="ad_targeturl" class="form-control">
					</div>
					  <div class="form-group">
						<label>Ad Status</label>
						<select class="form-control" name="ad_status">
						    <option value="1">Active</option>
						    <option value="0">Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<label>Start Date</label>
						<input type="datetime-local" name="ad_startdate" value="{{$ad->start_date}}" class="form-control">
					</div>
					<div class="form-group">
						<label>End Date</label>
						<input type="datetime-local" name="ad_enddate" value="" class="form-control">
					</div>
                 	
                    
                    <div class="form-group">
                    	<input type="submit" value="Create Ad" class="btn btn-success">
                    </div>
				</form>
		</div>

	</div>
</div>

<style>
	label {
		 font-size: 14px;
	}

	form button.btn-success {
		 background: #66ef46;
		 color: #fff;
		 border: none;
	}
</style>
<script type="text/javascript">
	
	$("input[type='file']").change(function(e) {

    for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
        
        var file = e.originalEvent.srcElement.files[i];
        
        var img = document.createElement("img");
        var reader = new FileReader();
        reader.onloadend = function() {
             img.src = reader.result;
             img.width = 520;
        }
        reader.readAsDataURL(file);
        $("input[type='file']").after(img);
    }
});

</script>
@include('includes.admin_footer')