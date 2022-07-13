
<!--extends('layouts.appLogin')-->

@extends('layouts.layoutAdmin')
@section('content')

@if(Auth::check() && Auth::user()->type == "admin")

<div class="container mb-3">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4> User Data 
                    </h4>
                </div>
              

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
<script>
$(document).ready(function(){

 fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>

-->
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



<!--


<table class="table table-bordered table-striped table-hover dataTable js-exportable">
  <thead>
    <tr>
      <th>ID</th>
      <th>User Name</th>
      <th>Role</th>
      <th>Is Approved</th>
      <th>Status</th>
      <th>Action</th>
   </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
     <tr>
        

       <td>{{ $user->id }}</td>
       <td>{{ $user->name }}</td>
       <td>{{ $user->type }}</td>
      <td> <a class="btn btn-primary" href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Edit Role</a></td>

       <td>
         @if($user->is_approved == true)
            <span class="badge bg-blue">Approved</span>
         @else
            <span class="badge bg-pink">Pending</span>
         @endif
       </td>
       <td>
          @if($user->status == true)
             <span class="badge bg-blue">Published</span>
          @else
             <span class="badge bg-pink">Pending</span>
          @endif
        </td>
       </tr>
         @endforeach
  </tbody>
</table>











@foreach($users as $user)
{{$user->name}}
@endforeach

<select name="user" id="user" class="form-control">
    <option value=""> -- Select One --</option>
    @foreach ($users as $user)
        <option value="{{ $user->id }}">{{ $user->name }}<p>  Role: </p>{{$user->type}}</option>
    @endforeach 
</select>
-->