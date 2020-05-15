@extends('layouts.app')
@section('content')
{{--    <div class="container">--}}
{{--    <h1>See all messages!</h1>--}}
{{--    @foreach($messages as $message)--}}
{{--            <div class="border-bottom">--}}
{{--            <span style="color: #9d9d9d">{{$message->created_at}}</span>--}}
{{--        @if($message->user->name === $cuser)--}}
{{--        @if($message->user->name)--}}
{{--        <h3>{{$message->title}}</h3>--}}
{{--        <h4>ME</h4>--}}
{{--            @else--}}
{{--        <h4 style="color: #1d68a7">{{$message->user->name}}</h4>--}}
{{--            @endif--}}
{{--        <h5>{{$message->title}}</h5>--}}
{{--        <p>{{$message->body}}</p>--}}
{{--     </div>--}}
{{--        @endforeach--}}

{{--    </div>--}}



<div class="container">
    <h3 class=" text-center">Messaging</h3>
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Recent</h4>
                    </div>
                    <div class="srch_bar">
                    </div>
                </div>
                <div class="inbox_chat">
{{--                  //  @if(count($messages))--}}
                    @if($friends->count() )
                    @foreach($friends as $friend)
                    <div class="chat_list" data-id="{{$friend->id}}">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="/upload/img/{{$friend->profile->image}}"  class="img-circle"  width="50" height="50"> </div>
                            <div class="chat_ib">
                                <h5>{{$friend->name}}<span class="chat_date"></span></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
{{--                        @endif--}}
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history">
{{--                    @foreach($messages as $message)--}}
{{--                        @if($message->user->name === $cuser )--}}
{{--                            <div class="outgoing_msg">--}}
{{--                                --}}{{--                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                <div class="sent_msg">--}}
{{--                                    <span>Me</span>--}}
{{--                                    <p>{{$message->body}}</p>--}}
{{--                                    <span class="time_date"> {{date('h:i a | M d',  strtotime($message->created_at))}} </span> </div>--}}
{{--                            </div>--}}
{{--                        @else--}}
{{--                            <div class="incoming_msg">--}}
{{--                                <div class="incoming_msg_img"> <span>{{$message->user->name}}</span><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
{{--                                <div class="received_msg">--}}
{{--                                    <div class="received_withd_msg">--}}

{{--                                        <p>{{$message->body}}</p>--}}
{{--                                        <span class="time_date">{{date('h:i a | M d',  strtotime($message->created_at))}} </span></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}

                </div>
                <div class="type_msg">
                    <div class="input_msg_write">
                        <form method="post" action="{{route('messages')}}" enctype="multipart/form-data">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{ csrf_field() }}
                            <input type="hidden" class="form-control" id="hidid" name='receiver_id' value="">
                        <input type="text" class="write_msg"  id="textm" name="body"  placeholder="Type a message" />
                        <button class="msg_send_btn" type="submit" ><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{--        <form method="post" action="/message" enctype="multipart/form-data">--}}
{{--            @if ($errors->any())--}}
{{--                <div class="alert alert-danger">--}}
{{--                    <ul>--}}
{{--                        @foreach ($errors->all() as $error)--}}
{{--                            <li>{{ $error }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            {{ csrf_field() }}--}}
{{--            <div class="form-group">--}}
{{--                <label for="textm">Text</label>--}}
{{--                <input type="hidden" class="form-control" id="hidid" name='receiver_id' value="{{$friend->id}}">--}}
{{--                <textarea class="form-control" rows="3" id="textm" name="body" ></textarea>--}}
{{--            </div>--}}
{{--            <button type="submit" class="btn btn-default">Submit</button>--}}
{{--        </form>--}}


        <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p>

    </div></div>
    <div id="log"></div>
@endsection

