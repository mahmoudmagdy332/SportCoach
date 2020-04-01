<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gutim | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
        <header class="header-section">
        <div class="container">
           
            <div class="logo">
                <a href="">
                    <img src="logo.png" alt="">
                </a>
             </div>
  <div class="nav-menu">
       <nav class="mainmenu mobile-menu">
            <a href="/login" class="primary-btn signup-btn">Login</a>  
       </nav>
  </div>
</div>
  
    </header>
    <section class="register-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="register-text">
                        <div class="section-title">
                            <h2>Register Now</h2>
                          
                        </div>
                        <form action="/" class="register-form" method="post">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name"> Name</label>
                                    <input type="text" id="name" name="name" required value="{{Request::old('name')}}">
                                  <span class="error">{{$ne}}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label for="email">Your email address</label>
                                    <input type="text" id="email" name="email" required value="{{Request::old('email')}}">
                                <span class="error">{{$ee}}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label for="last-name">password</label>
                                    <input type="password" id="last-name" name="pass" required value="{{Request::old('pass')}}">
                                    <span class="error">{{$pe}}</span>
                                </div>
                                <div class="col-lg-6">
                                    <label for="mobile">age</label>
                                    <input type="nomber" id="mobile" name="age" required value="{{Request::old('age')}}">
                                <span class="error">{{$ae}}</span>
                                </div>
                                 <div class="col-lg-6">
                                   <label for="coach">gender</label><select class="form-control" id="Places"name="gender" required>
									<option>male</option>
									<option>female</option>
								</select>
                                </div>
                                <div class="col-lg-6">
                                     <label for="coach">Category</label>
                           <select class="form-control" id="Places"name="place" required>
									<option>coach</option>
									<option>trainee</option>
								</select>
                                </div>
                            </div>
                            <input type="submit" class="register-btn" value="Get Started" onclick="myFunction()">
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="register-pic">
                        <img src="register-pic.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
