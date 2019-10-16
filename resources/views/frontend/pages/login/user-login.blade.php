<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Sailung Login | </title>

    <!-- Bootstrap -->
    <link href="{{asset('custom/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('custom/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('custom/backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('custom/backend/vendors/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('custom/backend/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form>
                    <h1>User Login Form</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required=""/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required=""/>
                    </div>
                    <div>
                        <label for="remember" style="cursor: pointer" class="pull-left"><input type="checkbox"
                                                                                               id="remember"
                                                                                               name="remember"
                                                                                               value="remember">
                            Remember Me</label>
                        <button type="submit" class="pull-right btn-default btn-sm">Log In</button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">New to site?
                            <a href="#signup" class="to_register">Register</a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><img src="{{asset('custom/backend/images/res1.ico')}}" alt=""></i> Sailung !</h1>
                            <p>©2016 All Rights Reserved. Sailung Restaurant. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

        <div id="register" class="animate form registration_form">
            <section class="login_content">
                <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" name="username"/>
                    </div>

                    <div>
                        <input type="email" class="form-control" placeholder="Email" name="email"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" name="password"/>
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Verify Password"
                               name="password_confirmation"/>
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="{{route('register-user')}}">Register</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                            <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br/>

                        <div>
                            <h1><img src="{{asset('custom/backend/images/res1.ico')}}" alt=""></i> Gentelella Alela!
                            </h1>
                            <p>©2016 All Rights Reserved. Sailung Restaurant. Privacy and Terms</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
