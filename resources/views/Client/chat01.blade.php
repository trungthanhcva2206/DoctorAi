<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhatsApp UI Clone</title>
    <link rel="stylesheet" href="{{asset('css/Client/chat.css')}}">
    <!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<body>

    <div class="container">
        <div class="leftSide">
            <!-- Search Chat -->
            <!-- Header -->
            <div class="header">
                <div class="new_chat">
                    <a href="{{route('chat')}}">
                        <div class="new_bt">
                            <i class="fa-solid fa-plus"></i>
                            <span>New Chat</span>
                        </div>
                    </a>
                </div>
                <div class="more_chat">
                    <span>More</span>
                    <i class="fa-solid fa-caret-down"></i>
                </div>
                <div class="more_drop">
                    <div class="clear_all">
                            <div>
                            <form class="chat_delete" action="{{route('delete.all.question',auth()->user()->id)}}" method="POST" >
                        @csrf  
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash-can"></i>
                                <span>Clear all chats</span></button>
                    </form> 
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- CHAT LIST -->
            <div class="chatlist">
                @foreach($askedQuestions as $item)
                <div class="li_chat">
                    <a href="{{route('asked.question',$item->question_id)}}" class="chat_main">
                        <div class="block">
                            <div class="details">
                                <div class="listHead">
                                    <h4>{{$item->question}}</h4>
                                    <p class="time">{{$item->created_at}}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                    <form class="chat_delete" action="{{route('delete.asked.question',$item->id)}}" method="POST" >
                        @csrf  
                        @method('DELETE')
                        <button type="submit"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                </div>
                @endforeach
            
            </div>
        </div>
        <div class="rightSide">
            <div class="header">
                <div class="imgText">
                    <div class="userimg">
                        <i class="fa-solid fa-bars" title="Bars" id="bars"></i>
                    </div>
                </div>
                <div class="user_tt" onclick="toggleMenu()">
                    <img src="{{asset(auth()->user()->img_link)}}" alt="">
                </div>
                <div class="dropdown" id="myDropdown">
                    <div class="drop_ab">
                        <div class="img_ab">
                            <img src="{{asset(auth()->user()->img_link)}}" alt="">
                        </div>
                        <div class="list_ab">
                            <div class="name_ab">
                                <h3>{{auth()->user()->name}}</h3>
                            </div>
                            <div class="profile_ab">
                                <a href="{{route('user.info')}}">
                                    <div class="prf">
                                        <i class='bx bxs-user'></i>
                                        <span>Thông tin cá nhân</span>
                                        <i class="nx fa-solid fa-chevron-right"></i>
                                    </div>
                                </a>
                            </div>
                            <div class="logout_ab">
                            <form action="{{route('client.logout')}}" method="POST">
                            @csrf
                            <button type = "submit" class="logout"><a href="#" class="logout">
                                    <i class='bx bx-log-out'></i>
                            <span class="text">Logout</span>
                        </a></button>
                                </form>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CHAT-BOX -->
            <div class="chatbox">
                <div class="message my_msg">
                    <p>{{$question->question}}</p>
                </div>
                
                <div class="message friend_msg">
                @if($question->answer == null)
                <p>Chúng tôi vẫn chưa cập nhật câu trả lời</p>
                @else
                <p>{{$question->answer}}</p>
                @endif
                </div>
            </div>
            
            <!-- CHAT INPUT -->
            <div class="chat_input">
                <form action="{{route('chat.post')}}" method="post" id="chat-form">
                    @csrf
                    <input type="text" placeholder="Vì là bản thử nghiệm nên vui lòng nhập 'Triệu chứng bệnh + tên bệnh' hoặc 'Phương pháp điều trị bệnh + tên bệnh'" name="question">
                    <button type="submit" title="Send message">
                        <i class="fa-solid fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{asset('js/Client/chat.js')}}"></script>
    <script>
$(document).ready(function () {
    $('#chat-form').on('submit', function (e) {
        e.preventDefault(); // Ngăn chặn sự kiện submit mặc định của form

        // Lấy giá trị từ input
        const question = $('input[type="text"]').val();

        // Tạo yêu cầu AJAX
        $.ajax({
            url: '/chat-post',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                question: question
            },
            success: function (response) {
                // Xử lý phản hồi thành công
                const chatbox = $('.chatbox');

                // Tạo và thêm câu hỏi vào `.chatbox` với lớp "message my_msg"
                const questionElement = $('<div class="message my_msg">')
                    .html('<p>' + question + '</p>');
                chatbox.append(questionElement);

                // Tạo và thêm câu trả lời vào `.chatbox` với lớp "message friend_msg"
                const answerElement = $('<div class="message friend_msg">')
                    .html('<p>' + response.answer + '</p>');
                chatbox.append(answerElement);

                // Xóa giá trị trong input
                $('input[type="text"]').val('');
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});

    </script>
</body>
</html>