
@extends('layouts.layoutAdmin')
@section('content')


  @if(Auth::check() && Auth::user()->type == "admin")

   <div class="row mb-3">
           
            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('userList')}}"> Back</a>
            </div>
    </div>

<div class="container mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
            
                <form action="{{ route('search') }}" method="GET">

                  <div class="form-group mt-3">
                    <input type="text" name="search" id="search" class="form-control" placeholder="Search User Data" required/>
                    <!--<button type="submit">Search</button>-->
                  </div>                   
                </form>


                <div class="card-body">
                  <h3 align="center">Total Data : <span id="total_records"></span></h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                
                                <td>{{ $user->type }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

 @endif

<!--

  <div class="card-body">
                  <h3 align="center">Total Data : <span id="total_records"></span></h3>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                
                                <th>Edit</th>
                            </tr>
                        </thead>
                      <tbody>
                          @if($users->isNotEmpty())
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                
                                <td>{{ $user->type }}</td>
                                <td>
                                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                            @else 
                            <div>
                                <h2>No posts found</h2>
                            </div>
                        @endif
                      </tbody>
                    </table>
</div>


-->
@endsection


