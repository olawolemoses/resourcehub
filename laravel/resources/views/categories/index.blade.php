@extends('layouts.layout')

@section('content')
<div class="col-md-8 col-md-offset-2">
    @foreach($categories as $category)
        <div class="panel panel-default">
            <div class="panel panel-heading">
                <a href="{{ $category->path() }}">
                    {{ $category->category_name }}
                </a>
            </div>
        
            <div class="panel-body">
                <img src="/cat_img/{{ $category->picture}}.jpg" />
                {{ $category->category_description}}
            </div>
        </div>
        <hr />
    @endforeach
</div>
@endsection