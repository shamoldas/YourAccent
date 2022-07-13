<!--extends('layouts.appLogin') -->
@extends('layouts.layoutAdmin')    
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Role Change</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('userList')}}"> Back</a>
            </div>
        </div>
    </div>





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-body">
                    <h5><b>User Name:{{ $user->name }}</b></h5>
                        <p><b>Role:</b>
                        {{ $user->type }}
                        </p>
                        <hr />                      
                  </div>
            </div>
        </div>
    </div>
</div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.update',$user->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <!--
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="title" value="{{ $user->name }}" class="form-control" placeholder="Name">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Current Role:</strong>
                    <input type="text" name="title" value="{{ $user->type }}" class="form-control" placeholder="Name">
                </div>
            </div>

        -->
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Role Declare:</strong>
                    
                        <select name="type" id="type" class="form-control">
                            <option value=""> -- Select One --</option>
                            <option value="user">User</option>
                            <option value="manager">Manager</option>
                            <option value="admin">Admin</option>
                        </select>
                   
                </div>
            </div>
        
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection