<div class="container" style="padding: 20px;">
   		@foreach($tagsList as $tag => $count)
            <a href="{{ route('tags', ['tag' => $tag]) }}" class="badge badge-dark">{{ $tag }}</a>        
        @endforeach
   	</div>