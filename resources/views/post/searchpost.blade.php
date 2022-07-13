@extends('layouts.layoutUser')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
             @foreach($posts as $post)

                    <h5><b>Title:</b>{{ $post->title }}</h5>
                    <p style="text-align: justify;"><strong>Description:</strong>{{$post->body}}</p>

                    <div class="pull-right">
                    	<a class="btn btn-info" href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Comment</a>
                    </div>

                    <hr>        

                @endforeach
            </div> 
        </div>
    </div>
</div>
@endsection