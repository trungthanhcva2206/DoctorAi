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
            <div class="right_log">
                @if(session()->has('error.reset-password'))
                <h1>{{session('error.reset-password')}}</h1>
                @endif
                <!-- Login -->
                <div class="login">
                    <div class="login_inf">
                        <span>Chúng tôi sẽ gửi link đổi mật khẩu vào gmail của bạn</span>
                    </div>
                    <form action="{{route('forget.password.post')}}" method = "POST">
                        @csrf
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
                        
                        <div class="sub">
                            <button type="submit" class="submit_form" id="log_submitButton">
                                Gửi Mail
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