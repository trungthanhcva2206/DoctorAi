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
	<link rel="stylesheet" href="{{asset('css/Admin/user.css')}}">
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

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
							<p id="local_dash">User</p>
							@if(session()->has('success.add-user'))
							<div class="popup" id="myPopup">
								<span class="popup-content"><h1>{{session('success.add-user')}}</h1></span>
								<button class="close" id="closePopup">Đóng</button>
							</div>
							<script>
								document.getElementById("myPopup").style.display = "block";
								document.getElementById("closePopup").addEventListener("click", function() {
									document.getElementById("myPopup").style.display = "none";
							});
							</script>
							@endif
							@if(session()->has('success.update-user'))
							<div class="popup" id="myPopup">
								<span class="popup-content"><h1>{{session('success.update-user')}}</h1></span>
								<button class="close" id="closePopup">Đóng</button>
							</div>
							<script>
								document.getElementById("myPopup").style.display = "block";
								document.getElementById("closePopup").addEventListener("click", function() {
									document.getElementById("myPopup").style.display = "none";
							});
							</script>
							@endif
							@if(session()->has('error.update-user'))
							<div class="popup" id="myPopup">
								<span class="popup-content"><h1>{{session('error.update-user')}}</h1></span>
								<button class="close" id="closePopup">Đóng</button>
							</div>
							<script>
								document.getElementById("myPopup").style.display = "block";
								document.getElementById("closePopup").addEventListener("click", function() {
									document.getElementById("myPopup").style.display = "none";
							});
							</script>
							@endif
							@if(session()->has('success.delete-user'))
							<div class="popup" id="myPopup">
								<span class="popup-content"><h1><h1>{{session('success.delete-user')}}</h1></h1></span>
								<button class="close" id="closePopup">Đóng</button>
							</div>
							<script>
								document.getElementById("myPopup").style.display = "block";
								document.getElementById("closePopup").addEventListener("click", function() {
									document.getElementById("myPopup").style.display = "none";
							});
							</script>
							@endif
							@if(session()->has('error.delete-user'))
							<div class="popup" id="myPopup">
								<span class="popup-content"><h1><h1><h1>{{session('error.delete-user')}}</h1></h1></h1></span>
								<button class="close" id="closePopup">Đóng</button>
							</div>
							<script>
								document.getElementById("myPopup").style.display = "block";
								document.getElementById("closePopup").addEventListener("click", function() {
									document.getElementById("myPopup").style.display = "none";
							});
							</script>
							@endif
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>User</h3>
					</div>
					<button id="add-button">
						<i class="fa-solid fa-plus"></i><a href="{{route('add.user')}}"> Thêm nhân viên</a>
					</button>
					<table id="tb">
						<thead>
							<tr>
								<th>User</th>
								<th>Gmail</th>
								<th>Role</th>
								<th>Work</th>
							</tr>
						</thead>
						<tbody id="data_prd">
						@foreach($users as $user)
							<tr>
								<td>
									<img src="{{asset($user->img_link)}}" style="margin-right: 20px;">
									<p>{{$user->name}}</p>
								</td>
								<td>{{$user->email}}</td>
								<td><span class="user_role">
								@if ($user->role == 1)
									Quản lý
								@elseif ($user->role == 2)
									Chuyên gia
								@elseif ($user->role == 3)
									Chuyên viên
								@else
									Người dùng
								@endif
								</span></td>
								<td class="dlt_mt" style="margin-bottom: 20px;">
									<a href="{{route('update.user',$user->id)}}" title="Sửa"><i class="fa-solid fa-pen-to-square"></i></a>
									<form action="{{route('delete.user',$user->id)}}" method = "POST">
											@method('DELETE')
											@csrf
										<button class="delete_moithu" type="submit"><i class="fa-solid fa-trash"></i></button>
										</form>
						        </td>
							</tr>
							@endforeach
							
						</tbody>
					</table>
				</div>
			</div>
@endsection
	@else
	<div class="thong_bao">
	    <h1>Bạn không có quyền truy cập</h1>
	</div>
    @endif

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>$(document).ready(function () {
    $.noConflict();
    var table = $('#tb').DataTable();
});</script>
	
</body>
</html>