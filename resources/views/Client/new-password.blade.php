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
                <a href=""><img src="{{asset('img/2.png')}}" alt=""></a>
            </div>
        </div>
    </nav>
    <!-- Login -->
    <main>
        <div class="board">
            <div class="right_log">

                <!-- Login -->
                <div class="login">
                    <div class="login_inf">
                        <span>Đặt lại mật khẩu</span>
                    </div>
                    <form action="{{route('client.reset.password.post')}}" method = "POST">
                        @csrf
                        <input type="text" name = "token" value= "{{$token}}" hidden>
                        <div class="acc">
                            <div class="inf">Gmail</div>
                            <div class="inp">
                                <div class="sua" id="parentDiv">
                                    <input class="input_form" type="email" id="log_emailInput" placeholder="Nhập gmail" name = "email">
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
                        <div class="pass">
                            <div class="inf">Nhập lại mật khẩu</div>
                            <div class="inp">
                                <div class="sua">
                                    <input class="input_form" type="password" id="log_passwordInput" placeholder="Nhập lại mật khẩu" name = "password_confirmation">
                                    @error('password')
                                    <p>{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="sub">
                            <button type="submit" class="submit_form" id="log_submitButton">
                                Đổi mật khẩu
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