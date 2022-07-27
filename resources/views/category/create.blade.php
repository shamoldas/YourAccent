@extends('layouts.layoutUser')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Create Category</div>
                <div class="card-body">
                    <form method="post" action="{{ route('category.store') }}">
                        <div class="form-group">
                        @csrf
                            <label class="label">Category Name: </label>
                            <input type="text" name="title" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label class="label">Category Description: </label>
                            <textarea name="description" rows="10" cols="30" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="user_id" value="3">
                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection