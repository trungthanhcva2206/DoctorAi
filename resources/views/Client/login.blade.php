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
	<link rel="stylesheet" href="{{asset('css/Client/login.css')}}">
</head>
<body>
    @if(session()->has('success.reset-password'))
        <div class="popup" id="myPopup">
            <span class="popup-content"><h1>{{session('success.reset-password')}}</h1></span>
            <span>Vui lòng đăng nhập lại</span>
            <button class="close" id="closePopup">Đóng</button>
        </div>
        <script>
            document.getElementById("myPopup").style.display = "block";
            document.getElementById("closePopup").addEventListener("click", function() {
                document.getElementById("myPopup").style.display = "none";
        });
        </script>
    @endif
    @if(session()->has('success.register'))
        <div class="popup" id="myPopup">
            <span class="popup-content"><h1>{{session('success.register')}}</h1></span>
            <span>Vui lòng đăng nhập lại</span>
            <button class="close" id="closePopup">Đóng</button>
        </div>
        <script>
            document.getElementById("myPopup").style.display = "block";
            document.getElementById("closePopup").addEventListener("click", function() {
                document.getElementById("myPopup").style.display = "none";
            });
        </script>
    @endif
    <nav>
        <div class="nav_main">
            <div class="name">
                <a href="/"><span>Doctor AI</span></a>
            </div>
        </div>
    </nav>
    <!-- Login -->
    <main>
        <div class="board">
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
                <!-- Chosse -->
                <div class="chosse" id="chosse">
                    <div class="chosse_inf">
                        <span>Đăng nhập / Đăng ký</span>
                    </div>
                    <div class="log">
                        <button>Đăng nhập tài khoản</button>
                    </div>
                    <div class="reg">
                        <button>Đăng ký tài khoản</button>
                    </div>
                </div>

                <!-- Login -->
                <div class="login">
                    <div class="back">
                        <i class="fa-solid fa-arrow-left-long"></i>
                        <span>Trở lại</span>
                    </div>
                    <div class="login_inf">
                        <span>Đăng nhập bằng tài khoản</span>
                    </div>
                    <form href="#" action="{{route('client.login')}}" method = "POST">
                        @csrf
                        <div class="acc">
                            <div class="inf">Email:</div>
                            <div class="inp">
                                <div class="sua" id="parentDiv">
                                    <input class="input_form" type="text" id="log_emailInput" placeholder="Nhập email" name = "email">
                                </div>

                            </div>
                        </div>
                        <div class="pass">
                            <div class="inf">Mật khẩu</div>
                            <div class="inp">
                                <div class="sua">
                                    <input class="input_form" type="password" id="log_passwordInput" placeholder="Nhập mật khẩu" name = "password">
                                </div>
                            </div>
                        </div>
                        <div class="quenmk">
                            <a href="{{route('client.forget.password')}}">Quên mật khẩu</a>
                        </div>
                        <div class="view_error">
                            @error('email')
                                <p>{{$message}}</p>
                            @enderror
                            @if (!$errors->has('email'))
                                @error('password')
                                    <p>{{$message}}</p>
                                @enderror
                            @endif
                        </div>
                        <div class="sub">
                            <button type="submit" class="submit_form" id="log_submitButton" >
                                Đăng nhập
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Register -->
                <div class="register">
                    <div class="back">
                        <i class="fa-solid fa-arrow-left-long"></i>
                        <span>Trở lại</span>
                    </div>
                    <div class="register_inf">
                        <span>Đăng ký tài khoản</span>
                    </div>
                    <form action="{{route('register')}}" method = "POST">
                        @csrf
                        <div class="inf_m">
                        @error('name')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                            <div class="inf">Tên:</div>
                            <div class="inp">
                                <div class="sua" id="parentDiv">
                                    <input class="input_form" type="text" id="reg_name" placeholder="Nhập tên của bạn" name = "name">
                                </div>
                            </div>
                        </div>
                        <div class="inf_m">
                        @error('email')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                            <div class="inf">Email:</div>
                            <div class="inp">
                                <div class="sua" id="parentDiv">
                                    <input class="input_form" type="email" id="reg_email" placeholder="Nhập email" name = "email">
                                </div>
                            </div>
                        </div>
                        <div class="inf_m">
                        @error('password')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                            <div class="inf">Mật khẩu:</div>
                            <div class="inp">
                                <div class="sua">
                                    <input class="input_form" type="password" id="reg_pass" placeholder="Nhập mật khẩu" name = "password">
                                </div>
                            </div>
                        </div>
                        <div class="inf_m">
                        @error('password_confirmation')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <div class="inf">Nhập lại mật khẩu:</div>
                            <div class="inp">
                                <div class="sua">
                                    <input class="input_form" type="password" id="reg_repass" placeholder="Nhập lại mật khẩu" name = "password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="sub">
                            <button type="submit" class="submit_form" id="reg_submitButton" disabled>
                                Đăng ký
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{asset('js/Client/login.js')}}"></script>
</body>
</html>