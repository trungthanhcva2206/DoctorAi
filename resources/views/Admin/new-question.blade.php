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
	<link rel="stylesheet" href="//cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

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
							<p id="local_dash">New question</p>
						</li>
					</ul>
				</div>
			</div>

			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3>Chưa trả lời</h3>
					</div>
					<table id="tb">
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
								<td class="limit-text">{{$ques->question}}</td>
								<td><span class="status">
                                    @if (!empty($ques->answer))
                                        Completed
                                    @else
                                        Waiting
                                    @endif
                                </span></td>
								<td class="dlt_mt" style="margin-bottom: 13px;">
									<a href="{{route('answer',$ques->id)}}" title="Xem"><i class="fa-solid fa-eye"></i></a>
									<a href="{{route('update.question',$ques->id)}}" title="Sửa"><i class="fa-solid fa-pen-to-square"></i></i></a>
									<form action="{{route('delete.question',$ques->id)}}" method = "POST">
											@method('DELETE')
											@csrf
										<button class="delete_moithu" type="submit"><i class="fa-solid fa-trash"></i></button>
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
	<script>$(document).ready(function () {
    $.noConflict();
    var table = $('#tb').DataTable();
});</script>
</body>
</html>