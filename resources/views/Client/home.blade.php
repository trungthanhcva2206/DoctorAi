<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor AI</title>
    <link rel="stylesheet" href="{{asset('css/Client/home.css')}}">
     <!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <nav>
        <div class="nav_main">
            <div class="name">
                <a href="/">
                    <span>Doctor AI</span>
                </a>
            </div>
            <div class="right_name">
                <div class="chosse">
                    <a href="{{route('show.client.login')}}">
                        <span>Đăng nhập / Đăng ký</span>
                    </a>
                </div>
                <div class="go_chat">
                    <a href="{{route('chat')}}">
                        <span>Doctor AI now</span>
                        <i class="fa-solid fa-arrow-trend-up"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </nav>
    <div class="header">
        <div class="head_main">
            <div class="auto_title">
                <div class="title_main">
                    <span>Doctor AI:</span>
                    <h2 id="dynamic-heading">Nhận tất cả câu hỏi sức khỏe</h2>
                </div>
                <div class="title_head">
                    <div class="inf_head">
                        <p>Tìm kiếm câu trả lời cho vấn đề sức khỏe mà bạn thắc mắc ngay thôi!</p>
                    </div>
                    <div class="go_head">
                        <a href="{{route('chat')}}">
                            <span>Đặt câu hỏi ngay</span>
                            <i class="fa-solid fa-arrow-trend-up"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="img_head">
                <img src="{{asset('img/home1.png')}}" alt="">
            </div>
        </div>
    </div>
    <div class="body_ai">
        <div class="bodyai_main">
            <div class="head">
                <img src="{{asset('img/2.png')}}" alt="">
            </div>
            <div class="bd">
                <span>Doctor AI được tạo để trả lời câu hỏi về sức khỏe một cách 
                    nhanh chóng và đưa ra phản hồi chi tiết.
                </span>
                <span>Chúng tôi rất vui mừng được giới thiệu 
                    Doctor AI để nhận phản hồi của người dùng 
                    và tìm hiểu về điểm mạnh và điểm yếu của nó. 
                </span>
            </div>
        </div>
    </div>
    <div class="body_hoi">
        <div class="bodyhoi_main">
            <div class="left">
                <h1>Tìm kiếm câu hỏi</h1>
                <span>Sức khỏe có vấn đề
                    Hãy thử gửi một câu hỏi nhé!
                    Rất nhiều lời giải đáp về sức khỏe từ những chuyên gia của chúng tôi^^</span>
            </div>
            <div class="right">
                <img src="{{asset('img/chat.png')}}" alt="">
            </div>
        </div>
    </div>
    <div class="body_dap">
        <div class="bodydap_main">
            <div class="left">
                <img src="{{asset('img/3.png')}}" alt="">
            </div>
            <div class="right">
            <h1>Trao đổi trực tiếp</h1>
            <span>Bạn có thể trao đổi trực tiếp với những chuyên gia của chúng tôi! <br>
            Các chuyên gia luôn nhiệt tình với bạn
            </span>
            </div>
        </div>
    </div>


    <script src="{{asset('js/Client/home.js')}}"></script>
</body>
</html>