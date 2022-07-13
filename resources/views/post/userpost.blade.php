<!--extends('layouts.app')-->
@extends('layouts.layoutUser')
@section('content')


<style>
 .display-comment .display-comment {
 margin-left: 40px
 }
</style>


<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
              @foreach ($posts as $posts)

                    <h5><b>Book Name:</b>{{ $posts->title }}</h5>
                    <p style="text-align: justify;"><strong>Description:</strong>{{ $posts->body }}</p>
                    <div class="pull-right">
                    	<a class="btn btn-info" href="{{ route('display') }}" class="btn btn-primary">Comment</a>
                    </div>
                    <hr>        

                @endforeach
            </div> 
        </div>
    </div>
</div>
</section>

@endsection