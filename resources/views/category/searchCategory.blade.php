@extends('layouts.layoutUser')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
             @foreach($categorys as $category)

                    <h5><b>Title:</b>{{ $category->title }}</h5>
                    <p style="text-align: justify;"><strong>Description:</strong>{{$category->description}}</p>

                    <hr>        

                @endforeach
            </div> 
        </div>
    </div>
</div>
@endsection