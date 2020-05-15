@extends('layouts.app')
@section('content')
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="members">
              <h1 class="page-header">Friends</h1>
{{--                @foreach($user->friends() as $friend)--}}
{{--                <h2>{{$friend}}</h2>--}}
{{--                @endforeach--}}
              <div class="row member-row">
                  @if($friends->count()>0)
                  @foreach($friends as $friend)
                <div class="col-md-3" >
                    <div class="bordred-div">
                        @if($friend->profile->image!=null)
                            <img src="{{asset('upload/img/'.$friend->profile->image)}}" class="img-thumbnail" alt="">
                        @else
                            <img src="img/user.png" class="img-thumbnail" alt="">

                        @endif
                      <div class="text-center">
                          {{$friend->name}}
                      </div>
                      <p><a href="{{route('remfriend', ['id'=>$friend->id])}}" class="btn btn-warning btn-block"><i class="fa fa-users"></i>UnFriend</a></p>
                      <p><a href="{{route('messages')}}" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>
                      <p><a href="{{route('memberprofile', ['id'=>$friend->id])}}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>
                </div>
                  </div>
                  @endforeach
                      @endif
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
          </div>
        </div>
    </section>
  @endsection
