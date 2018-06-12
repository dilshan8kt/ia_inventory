<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IA | Login</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="position: relative; min-height: 100%; margin:0px; padding: 0px; background-color: #0b4182;">
    <div style="position: absolute; top: -120px; left: 0px; width: 100%; min-height: 100%; background: linear-gradient(0deg, #0b4182 1%, #1e88e5 100%);">
        <div class="loggedout_vcenter">
            <div style="padding: 8px;">
                <div style="min-height:420px; max-width: 420px; padding:40px; background-color:#ffffff; margin-left: auto; margin-right: auto; border-radius:4px; overflow-x: hidden;">
                    <a href="" style="display:block; height:58px; width:167px; margin:0 auto 30px auto; background-image:url(logo/logo_onwhite.png); background-size: auto 30px; background-repeat:no-repeat;"></a>
                    

                    @if(session()->has('error'))
                        <div class="error_message">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                    @if(session()->has('logout'))
                        <div class="info_message">
                            {{ session()->get('logout') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('signin') }}">
                        @csrf
                        <input name="username" style="width:100%;" placeholder="Email Address" value="{{ old('username') }}" required="required" autofocus="" type="text">
                        <hr class="hr15">
                        <input name="password" style="width:100%;" placeholder="Password" required="required" type="password">
                        <hr class="hr15">
                        <input value="Login" style="width:100%;" type="submit">
                        <hr class="hr20">
                        Help, I
                        <a href="">fogot my password</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>