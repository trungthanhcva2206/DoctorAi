<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('css/Admin/login.css')}}">
</head>
<body>
    <nav>
        <div class="nav_main">
            <div class="name">
                <a href=""><img src="{{asset('img/logo.png')}}" alt=""></a>
            </div>
        </div>
    </nav>
    <!-- Login -->
    <main>
        <div class="board">
                @if(session()->has('success.reset-passoword'))
                <h1>{{session('success.reset-passoword')}}</h1>
                @endif
                
            <div class="left_log">
                <div class="text_anim">
                    <h1>Khỏe mạnh cùng AI bác sĩ</h1>
                    <span>Tìm kiếm lời giải về vấn đề sức khỏe của bạn cùng chuyên gia</span>
                </div>
                <div class="img_left">
                    <img src="{{asset('img/DocTor.png')}}" alt="">
                </div>
            </div>
            <div class="right_log">


                <!-- Login -->
                <div class="login">
                    
                    <div class="login_inf">
                        <span>Đăng nhập bằng tài khoản</span>
                    </div>
                    <form action="{{route('admin.login')}}" method="POST">
                    @csrf
                        <div class="acc">
                            <div class="inf">Email</div>
                            <div class="inp">
                                <div class="sua" id="parentDiv">
                                    <input class="input_form" type="text" id="log_emailInput" placeholder="Nhập email" name = "email">
                                    @error('email')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="pass">
                            <div class="inf">Mật khẩu</div>
                            <div class="inp">
                                <div class="sua">
                                    <input class="input_form" type="password" id="log_passwordInput" placeholder="Nhập mật khẩu" name = "password">
                                    @error('password')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <a href="{{route('forget.password')}}">Quên mật khẩu</a>
                        <div class="sub">
                            <button type="submit" class="submit_form" id="log_submitButton">
                                Đăng nhập
                            </button>
                        </div>
                    </form>
                </div>

                
            </div>
        </div>
    </main>
    <script src="{{asset('js/Admin/login.jss')}}"></script>
</body>
</html>