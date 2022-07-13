@extends('layouts.layoutAdmin')
  
@section('content')
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">{{ __('Dashboard') }}</div>
  
                <div class="card-body">
                    You are a Admin User.
                      <a href="{{route('userList')}}">Role Deliver</a>
                     <a href="{{route('live_search')}}">Search User</a>

                      <a href="{{route('search')}}">Search</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection