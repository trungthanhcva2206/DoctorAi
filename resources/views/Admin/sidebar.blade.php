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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
        <a href="#" class="brand" onclick="dash();">
            <i class="fa-solid fa-hand-holding-medical"></i>
            <h3 class="title">AdminHub</h3>
        </a>
		<ul class="side-menu top">
			<li>
				<a href="{{route('show.dashboard')}}" onclick="dash();">
					<i class='bx bxs-dashboard'></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="{{route('new.question')}}" onclick="newquest();">
					<i class='bx bxs-bell' ></i>
					<span class="text">New Question</span>
				</a>
			</li>
			<li>
				<a href="{{route('show.question')}}" onclick="quest();">
					<i class='bx bx-message-rounded-detail'></i>
					<span class="text">Question</span>
				</a>
			</li>
			<li>
				<a href="{{route('show.user')}}" onclick="team();">
					<i class='bx bxs-group' ></i>
					<span class="text">User</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
			<form action="{{route('admin.logout')}}" method="POST">
                            @csrf
                            <button type = "submit" class="logout"><a href="#" class="logout">
					<i class="fa-solid fa-right-from-bracket"></i>
					<span class="text">Logout</span>
				</a></button>
                        </form>
			</li>
            <li>
                <div class="hai">
                    <input type="checkbox" id="switch-mode" hidden>
			        <label for="switch-mode" class="switch-mode"></label>
                </div>
                <div class="mot">
                    <span class="text">Switch Mode</span>
                </div>
            </li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="{{route('new.question')}}" class="notification" onclick="newquest();">
				<i class='bx bxs-bell' ></i>
				<span class="num"></span>
			</a>
			<button class="profile" type="button" onclick="toggleMenu()">
				<img src="{{asset(auth()->user()->img_link)}}">
			</button>
			<div class="dropdown" id="myDropdown">
				<div class="drop_ab">
					<div class="img_ab">
						<img src="{{asset(auth()->user()->img_link)}}" alt="">
					</div>
					<div class="list_ab">
						<div class="name_ab">
						    <h3>{{auth()->user()->name}}</h3>
						</div>
						<div class="profile_ab">
							<a href="{{route('user.info')}}">
								<div class="prf">
									<i class='bx bxs-user'></i>
							        <span>Thông tin cá nhân</span>
									<i class="nx fa-solid fa-chevron-right"></i>
								</div>
							</a>
						</div>
						<div class="logout_ab">
						
								<div class="lgf">
								<form action="{{route('admin.logout')}}" method="POST">
                            @csrf
                            <button type = "submit" class="logout"><a href="#" class="logout">
							<i class='bx bx-log-out'></i>
					<span class="text">Logout</span>
				</a></button>
                        </form>
							
							
							
						</div>
					</div>
				</div>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			@yield('admin')
		</main>
		<!-- MAIN -->
</section>
	<!-- CONTENT -->
	<script>

    function updateUnansweredQuestionCount() {
       
        fetch('/get-unanswered-question-count')
            .then(response => response.json())
            .then(data => {
               
                const unansweredCountElement = document.querySelector('.num');
                unansweredCountElement.textContent = data.unansweredCount;
            })
            .catch(error => {
                console.error('Lỗi khi lấy số lượng câu hỏi chưa trả lời:', error);
            });
    }


    window.addEventListener('load', updateUnansweredQuestionCount);

    
    function newquest() {
        updateUnansweredQuestionCount();
    }
</script>


	<script src="{{asset('js/Admin/admin.js')}}"></script>
</body>
</html>