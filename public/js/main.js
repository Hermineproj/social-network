$(document).ready(function(){
    $( ".chat_list" ).click(function( event ) {
        $('.msg_history').empty();
       var id=$(this).attr('data-id');
        $("#hidid").val(id);
        var idaj=$("#hidid").val();
        $('.chat_list').removeClass("active_chat");
        $(this).addClass('active_chat')
      //  $( "#log" ).html( "clicked: " + event.target.data-id );
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/messagesajax',
            data:{id:idaj},
            success:function(data){
   //console.log(data)
                $.each(data.messages, function(i) {
                //   alert(data.messages[i]['user_id']);
                   if (data.current_user_id==data.messages[i]['user_id'] && idaj==data.messages[i]['receiver_id'] ){
                      $('<div class="outgoing_msg"><div class="sent_msg"><span>Me</span><p>'+data.messages[i]['body']+'</p><span class="time_date">'+data.messages[i]['created_at']+'</span></div></div>').appendTo('.msg_history');
                   }
                   else if(idaj==data.messages[i]['user_id']){
                       $('<div class="incoming_msg"><div class="incoming_msg"><div class="incoming_msg_img"> <span>'+data.msg_user_name+'</span><img src="/upload/img/'+data.msg_user_image+'"  class="img-circle"  width="30" height="30"> </div><div class="received_withd_msg"><p>'+data.messages[i]['body']+'</p><span class="time_date">'+data.messages[i]['created_at']+'</span></div></div></div>').appendTo('.msg_history');
                    }
                });
            }
        });
    });
})

// @foreach($messages as $message)
// @if($message->user->name === $cuser)
// <div class="outgoing_msg">
//     {{--                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>--}}
//     <div class="sent_msg">
//     <span>Me</span>
//     <p>{{$message->body}}</p>
// <span class="time_date"> {{date('h:i a | M d',  strtotime($message->created_at))}} </span> </div>
// </div>
// @else
// <div class="incoming_msg">
//         <div class="incoming_msg_img"> <span>{{$message->user->name}}</span><img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
// //     <div class="received_msg">
//         <div class="received_withd_msg">
//
//         <p>{{$message->body}}</p>
//     <span class="time_date">{{date('h:i a | M d',  strtotime($message->created_at))}} </span></div>
//     </div>
//     </div>
// @endif
// @endforeach
