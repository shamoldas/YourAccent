@extends('layouts.layoutUser')

@section('content')




<section>
    <div class="container">
      <div class="row">
            <div class="col-lg-12 ">
                 <br />
                <div class="pull-left">
                    <h2>Add Category With Description</h2>
                </div>
                <div class="pull-left">
                    <a class="btn btn-success" href="{{ route('category.create') }}"> Create New Category</a>
                </div>
            </div>
        </div>
      </div>
</section>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </thead>
                <tbody>
                @foreach($category as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                        <!--<a href="{{ route('category.show', $category->id) }}" class="btn btn-primary">Show Post</a>-->
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection