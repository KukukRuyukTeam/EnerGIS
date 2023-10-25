<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/admin_login.css') }}">
    <title>Slide Down Animation</title>
   
</head>
<body>
    <div style="width: 100%;display: flex;">
        <div style="width: 50%;height: 100vh;">
            <img src="image/logo_biru.png" width="20%" style="margin-top: 5%;margin-left: 10%;">
            <div style="display: flex;flex-direction: column;justify-content: start;align-items: start;margin-top: 10%;width: 40%;margin-left: 25%;">
                <span style="font-weight: 600;font-size: 28px;margin-bottom: 5%;">Welcome to <span style="color: #B9D7FF;">Ener</span><span style="color: #5198F8;">GIS</span>!</span>
                <span style="font-weight: 900;font-size: 48px;margin-bottom: 2%;color: #021C3F;">Login</span>
                <form method="post" action="{{route('login.perform')}}" >
                    @csrf
                    <input type="text" placeholder="Email" id="email" name="email" class="input">
                    <input type="password" placeholder="Password" id="password" name="password" class="input">
                    <input type="submit" value="Login" class="button">
                </form>
            </div>
        </div>
        <div style="background-image: url(image/background_admin.png);width: 50%;height: 100vh;background-size: cover;display: flex;justify-content: center;align-items: center;">
            <span style="color: WHITE;font-size: 32PX;font-family: poppins;font-weight: 800;text-align: center;"><span style="color: #B9D7FF;">Keberlanjutan</span> Dimulai Dengan <br> Energi <span style="color: #B9D7FF;">Terbarukan</span></span>
        </div>
    </div>
</body>
</html>