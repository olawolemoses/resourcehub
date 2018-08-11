@extends('layouts.layout')
@section('content')
<div class="container-fluid" style="background: #f9f9f9;padding-top: 70px;min-height: 97vh;">	

	<div class="container">
		<h4 style="font-weight: normal;">Get legal documents</h4>

		<p>Browse our vast collection of resources by topic and see what skills are popular around the world.</p>

		<div class="row">
			<div class="col-md-12" style="height: 200px; background: #d8d8d8;"></div>

			<div class="col-md-12" style="padding: 0px;">
				
				<form class="hint-form" style="margin-top: 20px;background: transparent;">
                    <div class="input-group mb-3" style="padding: 0px;">
                        <input type="text" class="form-control" placeholder="what skill do you want to Learn" style="background: transparent;border: 2px solid #eee;" >

                        <div class="input-group-append">
                        <button class="btn myBtnColor" type="button" style="background: #ffc352;"> Search</button>
                        </div>
                    </div>
                </form>

			</div>
		</div>


		<div class="row">

			<div class="col-md-3 sandals">
				<div class="list-group slab">
                    @foreach($categories as $category)
                        <a href="{{ route('resource_list', ['cat' => $category->id]) }}" class="list-group-item list-group-item-action">{{ $category->category_name }}</a>
                    @endforeach
				</div>
			</div>

			<div class="col-md-9">

				<div class="row">
                
                @foreach($documents as $document)
				<div class="col-md-6 sonic">
					<div class="bookshelf">
						<a href="{{ route('showDocument', ['document'=>$document]) }}">
							<img src="/file/documents/cover/{{ $document->photo }}" alt="">
						</a>
					</div>
					<div class="despbook">
						<h6><a href="{{ route('showDocument', ['document'=>$document]) }}">{{ $document->title }}</a></h6>
						<p>{{ \App\Helpers::trim_characters( $document->description, 30 ) }}</p>
					</div>
                </div>
                @endforeach

				<!-- pagination -->
					<center><nav aria-label="The pagination box" class="page">
                        {{ $documents->links() }}
					  {{--  <ul class="pagination">
					    <li class="page-item disabled">
					      <a class="page-link" href="#" tabindex="-1">Previous Page</a>
					    </li>
					    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
					    <li class="page-item"><a class="page-link" href="#">2</a></li>
					    <li class="page-item"><a class="page-link" href="#">3</a></li>
					    <li class="page-item"><a class="page-link" href="#">4</a></li>
					    <li class="page-item"><a class="page-link" href="#">5</a></li>
					    <li class="page-item">
					      <a class="page-link" href="#">Next Page</a>
					    </li>
					  </ul>  --}}
					</nav></center>




				</div>

			</div>
		</div>
	</div>

	<div class="container">

	</div>
</div>



<style>
	.sandals {
		padding: 0px;
	}
	.slab a {
		color: #4a4a4a;
		padding: 10px 15px;
	}
	.slab a:hover, .slab a.active {
		background: #502e7d;
		color: #fff;
		border: 1px solid #502e7d;
	}
	.bookshelf {
		width: 14%;
		float: left;
	}
	.bookshelf img {
		width: 100%;
	}
	.despbook {
		width: 82%;
		margin-left: 4%;
		float: left;
	}
	.despbook p {
		font-size: 11px;
	}
	.sonic {
		margin-bottom: 20px;
	}

	@media(max-width: 768px) {
		.sandals {
			display: none;
		}
	}
</style>
@endsection