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
	<link rel="stylesheet" href="{{asset('css/Admin/add-question.css')}}">

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
					<p id="local_dash">Add Question</p>
				</li>
			</ul>
		</div>
	</div>

	<div class="table-data">


		<div class="order view_or">
			<div class="head_view">
				<div class="back_view">
					<a href="{{route('show.question')}}">
						<i class="fa-solid fa-chevron-left"></i>
						<span>Back</span>
					</a>
				</div>
			</div>
			<div class="main_view">
				<div class="quest_view">
					<form action="{{route('add.question.post')}}" method="POST">
						@csrf
						@error('question')                      
                            <p class="text-danger">{{ $message }}</p>
						@enderror
						<div class="quest_inf">
							<p>Câu hỏi:</p>
						</div>
						<div class="quest">
							<textarea name="question" id="" cols="30"
								rows="10"></textarea>

						</div>
						<div class="update">
							<button type="submit">Thêm</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection



</body>

</html>