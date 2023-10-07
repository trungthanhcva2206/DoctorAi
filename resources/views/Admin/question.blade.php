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
	<link rel="stylesheet" href="{{asset('css/Admin/ques.css')}}">

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
							<p id="local_dash">All question</p>
							@if(session()->has('success.answer'))
							<h1>{{session('success.answer')}}</h1>
							@endif
							@if(session()->has('success.add-question'))
							<h1>{{session('success.add-question')}}</h1>
							@endif
							@if(session()->has('success.update-question'))
							<h1>{{session('success.update-question')}}</h1>
							@endif
							@if(session()->has('error.update-question'))
							<h1>{{session('error.update-question')}}</h1>
							@endif
							@if(session()->has('error.delete-question'))
							<h1>{{session('error.delete-question')}}</h1>
							@endif
							@if(session()->has('success.delete-question'))
							<h1>{{session('success.delete-question')}}</h1>
							@endif

						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Tất cả câu hỏi</h3>
						<button id="add-button">
						<i class="fa-solid fa-plus"></i><a href="{{route('add.question')}}"> Thêm câu hỏi</a>
					</button>
					</div>
					<table>
                        <thead>
							<tr>
								<th>User</th>
								<th>Date</th>
								<th>Quest</th>
								<th>Status</th>
								<th>Work</th>
							</tr>
						</thead>
						@foreach($questions as $ques)
							<tr>
								<td>
									<img src="{{asset($ques->user_info->img_link)}}">
									<p>{{$ques->user_info->name}}</p>
								</td>
								<td>{{$ques->created_at->format('d-m-Y')}}</td>
								<td>{{$ques->question}}</td>
								<td><span class="status">
                                    @if (!empty($ques->answer))
                                        Completed
                                    @else
                                        Waiting
                                    @endif
                                </span></td>
								<td>
									<a href="{{route('answer',$ques->id)}}" title="Xem"><i class="fa-solid fa-eye"></i></a>
									<a href="{{route('update.question',$ques->id)}}" title="Sửa"><i class="fa-solid fa-pen-to-square"></i></i></a>
									
										<form action="{{route('delete.question',$ques->id)}}" method = "POST">
											@method('DELETE')
											@csrf
										<button type="submit"><i class="fa-solid fa-trash"></i></button>
										</form>
									
								</td>
							</tr>
                        @endforeach
					</table>
				</div>
            </div>
    @endsection
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready(function () {
    $('#tb').DataTable();
		});
	</script>
</body>
</html>