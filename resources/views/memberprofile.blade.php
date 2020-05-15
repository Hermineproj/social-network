@extends('layouts.app')
@section('content')

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="profile">
                        <h1 class="page-header">{{$member->name}}</h1>
                        <div class="row">
                            <div class="col-md-4">
                                @if($profile->image!=null)
                                    <img src="{{asset('upload/img/'.$profile->image)}}" class="img-thumbnail" alt="">
                                @else
                                    <img src="img/user.png" class="img-thumbnail" alt="">

                                @endif
                            </div>
                            <div class="col-md-8">
                                <ul>
                                    <li><strong>Name:</strong>{{$member->name}}</li>
                                    <li><strong>Email:</strong>{{$member->email}}</li>
                                    <li><strong>Country:</strong>{{$profile->country}}</li>
                                    <li><strong>Gender:</strong>{{$profile->gender}}</li>
                                    <li><strong>DOB:</strong>{{$profile->dob}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">{{$member->name}} Friends</h3>
                                    </div>
                                    @if(is_object($friendsOf) )
                                            @foreach($friendsOf as $memberf)
                                            <div class="col-md-3" >
                                                <div class="bordred-div">
                                                    @if($memberf->profile->image===null)
                                                        <img src="img/user.png" class="img-thumbnail" alt="">
                                                    @else
                                                        <img src="{{asset('upload/img/'.$memberf->profile->image)}}" class="img-thumbnail" alt="" style="width:150px;height:150px">                                    @endif
                                                    <div class="text-center">
                                                        {{$memberf->name}}
                                                        {{$memberf->accept}}
                                                    </div>
{{--                                                    <p><a href="message/{{$memberf->id}}/create" class="btn btn-default btn-block"><i class="fa fa-envelope"></i> Send Message</a></p>--}}
{{--                                                    <p><a href="#" class="btn btn-primary btn-block"><i class="fa fa-edit"></i> View Profile</a></p>--}}
                                                </div>
                                            </div>
                                        @endforeach
                                     @else
                                    <h4>{{$friendsOf}}</h4>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
