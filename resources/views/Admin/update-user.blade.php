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
                    <p id="local_dash">Update User</p>
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
                <form action="{{route('update.user.post',$user->id)}}" method = "POST" enctype="multipart/form-data" >
                    @method('PATCH')
                    @csrf
                    <div class="name">
                        @error('name')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Họ và Tên :</p>
                        <input type="text" name="name" id="" placeholder="Họ và Tên" value = "{{$user->name}}">
                    </div>
                    @if($user->role != 0)
                    <div class="chuc">
                        @error('role')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Chức vụ :</p>
                        <select name="role" id="">
                            <option value="1" @if($user->role == 1) selected @endif>Quản lí</option>
                            <option value="2" @if($user->role == 2) selected @endif>Chuyên gia</option>
                            <option value="3" @if($user->role == 3) selected @endif>Chuyên viên</option>
                        </select>
                    </div>
                    @else
                        <input type="hidden" name="role" value = "0">
                    @endif
                    <div class="email">
                        @error('email')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Email :</p>
                        <input type="email" name="email" id="" placeholder="Email" value="{{$user->email}}">
                    </div>
                    <div class="avatar">
                        @error('img_link')
                        <p style ="color: red;">{{$message}}</p>
                        @enderror
                        <p>Ảnh đại diện:</p>
                        <input type="file" name="img_link" id="fileInput" accept="image/*" onchange="previewImage()" >
                        <img src="{{asset($user->img_link)}}" alt="" id="preview" style="max-width: 100px;">
                    </div>
                    <button type="submit">Sửa</button>
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
            }
        }

    </script>
</body>
</html>