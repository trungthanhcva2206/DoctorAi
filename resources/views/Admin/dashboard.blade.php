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
	<link rel="stylesheet" href="{{asset('css/Admin/dashboard.css')}}">

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
				<li><i class='bx bx-chevron-right'></i></li>
				<li>
					<p id="local_dash">Home</p>
				</li>
			</ul>
		</div>
	</div>

	<ul class="box-info">
		<li class="background_li">
			<a href="{{route('new.question')}}" onclick="newquest();">
				<div>
					<i class='bx bxs-bell'></i>
					<span class="text">
						<p>New Question</p>
					</span>
				</div>
			</a>
		</li>
		<li class="background_li">
			<a href="{{route('show.question')}}" onclick="quest();">
				<div>
					<i class='bx bx-message-rounded-detail'></i>
					<span class="text">
						<p>Question</p>
					</span>
				</div>
			</a>
		</li>
		<li class="background_li">
			<a href="{{route('show.user')}}" onclick="team();">
				<div>
					<i class='bx bxs-group'></i>
					<span class="text">
						<p>User</p>
					</span>
				</div>
			</a>
		</li>
	</ul>
@endsection



</body>

</html>