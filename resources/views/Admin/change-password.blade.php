<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor AI</title>
    <link rel="stylesheet" href="{{asset('css/Admin/change-password.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>
    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .changePassword {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .changePassword:hover {
        background-color: #0056b3;
    }
</style>
</head>

<body>
<main>
			<div class="breadcrumb">
				<ul>
					<li><a href="/admin/dashboard">Home</a></li>
					<li> / </li>
					<li><a href="/admin/user-info">Account</a></li>
					<li> / </li>
					<li>Change Password</li>
				</ul>
			</div> <!-- End of Breadcrumb-->

			
			<div class="account-page">
				<div class="profile">
					<div class="profile-img">
						<img src="{{$user -> img_link}}">
						<h2>{{$user -> name}}</h2>
						<p>{{$user -> email}}</p>
					</div>						
					<ul>
                        <li><a href="/admin/user-info" >Tài khoản <span>></span></a></li>
                        <li><a href="/change-password" class="active">Đổi mật khẩu <span>></span></a></li>
                        <li><form action="{{route('admin.logout')}}" method="POST">
                            @csrf
                            <button type = "submit" class="logout"><a href="#" class="logout">
					<i class="fa-solid fa-right-from-bracket"></i>
					<span class="text">Đăng xuất</span>
				</a></button>
                        </form></li>
					</ul>
				</div>
                <div class="account-detail">
					<h2>Change password</h2>
					<div class="billing-detail">					
                    <div class="card-body">

                    <form method="POST" action="{{ route('user.updatePass') }}" id="change_password_form">
                        @csrf
                        <div class="form-group">
                            <label for="old_password">Current Password</label>
                            <input type="password" id="old_password" name="old_password" class="form-control">

                            @if($errors->any('old_password'))
                                <span class="text-danger" style="color:red">{{$errors->first('old_password')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" id="new_password" name="new_password" class="form-control">
                            @if($errors->any('new_password'))
                                <span class="text-danger" style="color:red">{{$errors->first('new_password')}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                            @if($errors->any('confirm_password'))
                                <span class="text-danger" style="color:red">{{$errors->first('confirm_password')}}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </form>
                </div>	
					</div>
				</div>
			</div>		
		</main>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $('#change_password_form').validate({
            ignore:'.ignore',
            errorClass:'invalid',
            validClass:'success',
            rules:{
                old_password:{
                    required:true,
                    minlength:6,
                    maxlength:100
                },
                new_password:{
                    required:true,
                    minlength:6,
                    maxlength:100
                },
                confirm_password:{
                    required:true,
                    equalTo:'#new_password'
                },
            },
            messages: {
                old_password:{
                    required:"Enter your current password"
                },
                new_password:{
                    required:"Enter your new password"
                },
                confirm_password:{
                    required:"Need to confirm your new password"
                },
            },

            submitHandler:function(form){
                $.LoadingOverLay("show");
                form.submit();
            }
        })
    </script>
</body>
</html>