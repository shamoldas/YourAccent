<!-- _comment_replies.blade.php -->

<h4>ShamolDas</h4>


  @foreach ($comments as $comment)

                    <p style="text-align: justify;"><strong>Description:</strong>{{ $comment->body }}</p>
                    <div class="pull-right">
                        <a class="btn btn-info" href="{{ route('display') }}" class="btn btn-primary">Comment</a>
                    </div>
                    <hr>        

                @endforeach
<!--

 @foreach($comments as $comments)
    <div class="display-comment">

        <strong>{{ $comments->user->name }}</strong>
        <p>{{ $comments->body }}</p>
        <a href="" id="reply" required></a>
        <form method="post" action="{{ route('reply.add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control" required />
                
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
    <h3>Hello Boyz</h3>
@endforeach
-->
<p> End The</p>






