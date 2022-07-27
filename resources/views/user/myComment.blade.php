
@extends('layouts.layoutUser')
@section('content')


<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">

			    @if ($message = Session::get('success'))
			        <div class="alert alert-success">
			            <p>{{ $message }}</p>
			        </div>
    			@endif
			<table class="table table-striped">
			<thead>
				<th>Comment No</th>
				
				<th>Comment Body</th>
				<th>Action</th>
			</thead>
				<tbody>


	<?php $i = 0; ?>

				@foreach($comments as $comment)

				
			<!--
				if(Auth::user()->id == $post->user_id)
				if($post->user_id==Auth::user()->id)
			-->
				<tr>
					<td>{{  $i+=1 }}</td>
					
					<td>{{$comment->body}}</td>


						
					<td>{{ route('display')}}</td>	
				</tr>

				@endforeach



				</tbody>
			</table>
		</div>
	</div>

	<ul class="pagination">
	


	</ul>

</div>
@endsection