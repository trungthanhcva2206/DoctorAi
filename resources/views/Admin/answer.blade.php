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
	<link rel="stylesheet" href="{{asset('css/Admin/answer.css')}}">

	<title>AdminHub</title>
</head>

<body>
	@if(auth()->user()->role == 3)
	<h1>Bạn không có quyền truy cập</h1>
	@else
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
				<div class="stt">
					<span class="stt_m">Trạng thái:</span>
					<!-- "Chưa trả lời" in đỏ -->
					<!-- "Đã trả lời" in xanh -->
					<!-- Tự động -->
					<span class="stt_status" id="stt_status"></span>
				</div>
				<div class="quest_view">
					<div class="quest_inf">
						<p>Câu hỏi:</p>
					</div>
					<div class="quest">
						<p>{{$question->question}}</p>
					</div>
				</div>
				<div class="answ_view">
					<form action="{{route('answer.post',$question->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
					
						<div class="answ">
							<div class="answ_inf">
								<h3>Câu trả lời</h3>
							</div>
							@error('answer')                      
                            <p class="text-danger">{{ $message }}</p>
							@enderror
							<div class="answ_ls">
								<textarea id="answ_stt" name="answer" id="" cols="30" rows="10">{{$question->answer}}</textarea>
							</div>
						</div>
						<div class="update">
							<button type="submit">Sửa</button>
						</div>
						<div class="update">
							<button type="submit" formaction = "{{route('status',$question->id)}}">Duyệt</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endsection
	@endif


</body>

</html>