<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor AI</title>
    <link rel="stylesheet" href="{{asset('css/Admin/user-info.css')}}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>

    <main>
        <div class="breadcrumb">
            <ul>
                <li><a href="/admin/dashboard">Home</a></li>
                <li> / </li>
                <li>Account</li>
            </ul>
        </div>

        <div class="account-page">
            <div class="profile">
                <div class="profile-img">
                    <label for="img_upload">
                        <img src="{{asset(auth()->user()->img_link)}}"
                            alt="Ảnh cá nhân" style="cursor: pointer">
                    </label>
                    <form action="{{route('update.img',auth()->user()->id)}}" method="POST" enctype="multipart/form-data" id="upload-form">
                        @method('PATCH')
                        @csrf
                        <input type="file" name="img_link" id="img_upload" style="display: none;">
                    </form>
                    <script>
                        const imgUploadInput = document.getElementById('img_upload');
                        imgUploadInput.addEventListener('change', () => {
                            const formData = new FormData();
                            formData.append('img_link', imgUploadInput.files[0]);

                            axios.patch('/admin/update-img/{{ auth()->user()->id }}', formData)
                                .then(response => {
                                    console.log(response.data);
                                   
                                })
                                .catch(error => {
                                    console.error(error);
                                    
                                });
                        });
                    </script>

                    <h2>{{auth()->user()->name}}</h2>
                    <p>{{auth()->user()->email}}</p>
                </div>
                <ul>
                    <li><a href="#" class="active">Tài khoản <span>></span></a></li>
                    <li><a href="#">Đổi mật khẩu <span>></span></a></li>
                    <li><a href="#">Đăng xuất <span>></span></a></li>
                </ul>
            </div>
            <div class="account-detail">
                <h2>Tài khoản</h2>
                <div class="billing-detail">
                    <form class="checkout-form" action="#" method="POST">
                        <div class="form-inline">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" id="fname" name="fname" value="{{auth()->user()->name}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" id="email" name="email" value="{{auth()->user()->email}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input type="submit" id="update" name="update" value="Update">
                            <div id="updateMessage" class="alert alert-success" style="display: none;"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>


</html>