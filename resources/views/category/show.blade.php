@extends('layouts.layoutUser')
@section('content')




<div class="container mt-3">
    <div class="row ">
        <div class="col-md-10">
            <div class="row">

                <form action="{{ route('searchcategory') }}" method="GET">

                  <div class="form-group mt-3">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Searching Category" required/>
                    <!--<button type="submit">Search</button>-->
                  </div>                   
                </form>
         
            </div> 
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row">
               @foreach($category as $category)

                    <h5><b>Title:</b>{{ $category->title }}</h5>
                    <p style="text-align: justify;"><strong>Description:</strong>{{$category->description}}</p>

                    <hr>        

                @endforeach
            </div> 
        </div>
    </div>
</div>

<div class="container">


</div>
@endsection