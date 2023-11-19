<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="/bootstrap/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="/template/css/reset.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="login-form" id="login-form">
        <img id="logo" src="/template/img/logoVLU.jpg" title="logo">
        <h4 id="schoolname">Trường Đại Học Văn Lang</h4><br>
        <div class="desc">Cổng thông tin đào tạo</div>
        <form action="/check-login" method="post" class="login">

            <div class="login-input">
                <input type="text" id="username" name="username" placeholder="Mã đăng nhập"><br>
            </div>

            <div class="login-input">
                <input type="password" id="password" name="password" rules="required" placeholder="Mật khẩu đăng nhập"><br>
                <span class="login-message"></span>
            </div>

            @include('alert')
            
            <div class="login-submit">
                <input type="submit" value="Đăng nhập">
            </div>
            @csrf
        </form>
    </div>
</body>
</html>