<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- font-awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="{{asset('css/Admin/add-user.css')}}">

	<title>AdminHub</title>
</head>
<body>
    @if(auth()->user()->role == 1)
    @extends('Admin.sidebar')
	@section('admin')
    <div class="head-title">
        <div class="left">
            <ul class="breadcrumb">
                <li>
                    <a>Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right' ></i></li>
                <li>
                    <p id="local_dash">Add User</p>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">


        <div class="order view_or">
            <div class="head_view">
                <div class="back_view">
                    <a href="{{route('show.user')}}">
                        <i class="fa-solid fa-chevron-left"></i>
                        <span>Back</span>
                    </a>
                </div>
            </div>
            <div class="main_view">
                <form action="{{route('add.user.post')}}" method = "POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="name">
                        @error('name')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Họ và Tên :</p>
                        <input type="text" name="name" id="" placeholder="Họ và Tên">
                    </div>
                
                    <div class="chuc">
                        @error('role')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Chức vụ :</p>
                        <select name="role" id="">
                            <option value="1" selected>Quản lý</option>
                            <option value="2">Chuyên gia</option>
                            <option value="3">Chuyên viên</option>
                        </select>
                    </div>
                    <div class="email">
                        @error('email')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Email :</p>
                        <input type="email" name="email" id="" placeholder="Email">
                    </div>
                    <div class="pass">
                        @error('password')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Mật Khẩu :</p>
                        <input type="password" name="password" id="" placeholder="Mật khẩu">
                    </div>
                    <div class="pass">
                        @error('password_confirmation')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Nhập lại mật khẩu :</p>
                        <input type="password" name="password_confirmation" id="" placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="avatar">
                        @error('img_link')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Ảnh đại diện:</p>
                        <input type="file" name="img_link" id="fileInput" accept="image/*" onchange="previewImage()" >
                        <img src="" alt="" id="preview" style="max-width: 100px;">
                    </div>
                    <button type="submit">Thêm</button>
                </form>
            </div>
        </div>
    </div>
    @endsection
    <script>
        
        function previewImage() {
            var preview = document.querySelector('#preview');
            var file = document.querySelector('#fileInput').files[0];
            var reader = new FileReader();

            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }

    </script>
    @else
	<div class="thong_bao">
	    <h1>Bạn không có quyền truy cập</h1>
	</div>
    @endif
</body>
</html>