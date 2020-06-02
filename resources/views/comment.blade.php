<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gutim Template">
    <meta name="keywords" content="Gutim, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sport Coach</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
@if(!session()->has('user'))
   <h2>this page not found</h2>
                   @else
                   <div id="preloder">
        <div class="loader"></div>
    </div>
    <div id="hea">
    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">

            <div class="logo">
                <a href="">
                    <img src="logo.png" alt="">
                </a>
            </div>
            <div class="nav-menu">
                <nav class="mainmenu mobile-menu">
                    <ul>
                        <li class="active"><a href="/home">Home</a></li>
                        <li class="active"><a href="logout">logout</a></li>
                        <li><form action='search' method="post">
                         {{ csrf_field() }}
                        <input type="text" name="q">
                        <input type="submit" value="search">
                        </form></li>

                    </ul>
                </nav>
            
              @if(session()->get('mode')[0]['m']==1)
                <a href="/add" class="primary-btn signup-btn">write post</a>
              @else
              <a href="#" class="primary-btn signup-btn">ask quetion</a>
              @endif
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    <!-- Header End -->

    <!-- Hero Section Begin -->

    </div>
                     <section class="register-section spad">
    <div class="container">
	<div class="row">

	    <div class="col-md-8 col-md-offset-2">

    		<h5>comment</h5>

    		<form  action="comment{{$post}}" method="post">
                    {{ csrf_field() }}

    
    		    <div class="form-group">
    		      
    		        <textarea rows="3" class="form-control" name="description" ></textarea>
    		    </div>

    		  
    		     
    		    <div class="form-group">
    		        <button type="submit" class="btn btn-primary">
    		            Create
    		        </button>
    		       
    		    </div>

    		</form>
		</div>

	</div>
</div>
               </section>
                     <div id="preloder">
        <div class="loader"></div>
    </div>
    <div id="hea">
    <!-- Header Section Begin -->

                 <div class="table-history-user">
                     <table class="">
@foreach($comments as $comment)
            <tr>
             
            
            <td>{{$comment->comment_description}}</td>
         
    
              </tr>
@endforeach
    </table>
</div>
                    @endif
</body>

</html>