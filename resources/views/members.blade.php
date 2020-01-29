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
                            @foreach($members as $member)
                                <div class="col-md-3" >
                                    <div class="bordred-div">
                                        <img src="img/user.png" class="img-thumbnail" alt="">
                                        <div class="text-center">
                                            {{$member->name}}
                                        </div>
                                                              <p><a href="#" class="btn btn-success btn-block"><i class="fa fa-users"></i> Add Friend</a></p>
{{--                                        <p><a href="message/{{$member->id}}/create" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>--}}
{{--                                        <p><a href="#" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default friends">
                        <div class="panel-heading">
                            <h3 class="panel-title">My Friends</h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                                @foreach($members as $member)
                                    <li><a href="profile.blade.php" class="thumbnail"><img src="img/user.png" alt=""></a></li>
                                @endforeach
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
