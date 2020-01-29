@extends('layouts.app')


@section('content')
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Latest Posts</h3>
              </div>

            </div>

          @foreach($posts as $post)
            <div class="panel panel-default post">
              <div class="panel-body">
                 <div class="row">
                   <div class="col-sm-2">
                     <a href="profile.blade.php" class="post-avatar thumbnail"><img src="{{ asset('/upload/img/' . $post->user->profile->image) }}" alt=""><div class="text-center"></div></a>
                     <div class="likes text-center">{{$post->likes->count() }} Likes</div>
                   </div>
                   <div class="col-sm-10">
                     <div class="bubble">
                       <div class="pointer">
                           <p>{{$post->created_at}}</p>
                           <p>{{$post->title}}</p>
                         <p>{{$post->body}}</p>
                       </div>
                       <div class="pointer-border"></div>
                     </div>
                       <form action="{{route('like')}}" method="post">
                           @csrf
                           <input type="hidden" name="likable_id" value="{{ $post->id }}">
                           <input type="hidden" name="likable_type" value="{{ get_class ($post) }}">
                           <button type="submit" class="btn btn-primary">Like</button>
                       </form>
                     <div class="comment-form">

                         <form action="{{route('create_comment')}}" class="form-inline" method="post">
                           @csrf
                             <input type="hidden" name="commentable_id" value="{{ $post->id }}">
                             <input type="hidden" name="commentable_type" value="{{ get_class ($post) }}">
                             <div class="form-group">
                                <input type="text" class="form-control" placeholder="enter comment" name="body">
                            </div>
                                <button type="submit" class="btn btn-default">Add</button>
                         </form>

                     </div>
                       @foreach($post->comments as $comment)
                       <div class="clearfix"></div>
                     <div class="comments">
                       <div class="comment">
                         <a href="#" class="comment-avatar pull-left"><img src="{{ asset('/upload/img/' . $comment->user->profile->image) }}" alt=""></a>
                         <div class="comment-text">
                           <p>{{$comment->created_at}}</p>
                             <p>  {{$comment->body}}</p>
                         </div>
                       </div>
                       <div class="clearfix"></div>
                     </div>
                       @endforeach
                   </div>
                 </div>
              </div>
            </div>
              @endforeach
          </div>
          <div class="col-md-4">
            <div class="panel panel-default friends">
              <div class="panel-heading">
                <h3 class="panel-title">My Friends</h3>
              </div>
              <div class="panel-body">
                <ul>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                  <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                </ul>
                <div class="clearfix"></div>
                <a class="btn btn-primary" href="#">View All Friends</a>
              </div>
            </div>
            <div class="panel panel-default groups">
              <div class="panel-heading">
                <h3 class="panel-title">Latest Groups</h3>
              </div>
              <div class="panel-body">
                <div class="group-item">
                  <img src="img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group One</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <div class="group-item">
                  <img src="img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group Two</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <div class="group-item">
                  <img src="img/group.png" alt="">
                  <h4><a href="#" class="">Sample Group Three</a></h4>
                  <p>This is a paragraph of intro text, or whatever I want to call it.</p>
                </div>
                <div class="clearfix"></div>
                <a href="#" class="btn btn-primary">View All Groups</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
