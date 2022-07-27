@extends('layouts.layoutUser')
@section('content')




<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
            <!--
                <form action="" method="GET">
                    <input type="text" name="search" required/>
                    <button type="submit">Search</button>
                </form>
            -->

                <form action="{{ route('searchpost') }}" method="GET">

                  <div class="form-group mt-3">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Searching Content" required/>
                    <!--<button type="submit">Search</button>-->
                  </div>                   
                </form>
         
            </div> 
        </div>
    </div>
</div>

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