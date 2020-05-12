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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
span.stars ol li:hover {
  background-image: url(../images/starHover.png);
}
</style>
</head>

<body>
@if(!session()->has('user'))
   <h2>this page not found</h2>
                   @else
           $e=session()->get('mode');
    <!-- Page Preloder -->
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
                        <li class="active"><a href="comment">Home</a></li>
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
              <a href="/add" class="primary-btn signup-btn">ask quetion</a>
              @endif
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>

    <!-- Header End -->

    <!-- Hero Section Begin -->

    </div>
    <!-- Hero Section End -->

    <!-- About Section Begin -->
   @if(session()->get('mode')[0]['m']==0)
        <section class="trainer-section spad" >
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>EXPERT TRAINERS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                
                  @foreach($coaches as $coach)
                <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        <a href="profile{{$coach->coach_id}}">
                        <img src="trainer-1.jpg" alt="">
                        <div class="trainer-text">
                            <h5>{{$coach->coach_name}}</h5>
                            <span>Leader</span>
                            <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>
                            <div class="trainer-social">
                            
                            </div>
                        </div>
                       </a>                   
                    </div>
                </div>
                @endforeach
                
        </div>
    </section>

     @if(count($posts)>0 )
    @foreach($posts as $post)
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                @if($post->post_media)
                <div class="col-lg-6">
                    <div class="about-pic">
                        <img src="{{$post->post_media}}" alt="">

                        </a>
                    </div>
                </div>
                @endif
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>{{$post->coach_name}}</h2>
                        <p class="first-para">{{ Str::limit($post->post_description, 300)}}</p>
                        <a href="#">read more</a><br><br>
                        <a href="/comment{{$post->post_id}}"class="primary-btn" class='col-lg-12'  onclick="coment()" ><i class="fa fa-comment"></i>comment</a>
                 <br<br><a href="#" class="primary-btn"><i class="fa fa-thumbs-up"></i>like</a>
                 <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
<span class="rate-this-stars">
  <h5>Rate this page</h5>
  <ol class="rate-this-stars-list">
    <li class="star" value="5"></li>
    <li class="star" value="4"></li>
    <li class="star" value="3"></li>
    <li class="star" value="2"></li>
    <li class="star" value="1"></li>
  </ol>
</span>
                   <br><br>
                   <div>  
                   <div class="container">     
            <div class="nav-men">
                <nav class="mainmenu mobile-menu">
                    <ul class="hidden"id="fo">
                          <form  action="comment/{{$post->post_id}}" method="post" >
                   {{ csrf_field() }}
                        <li> 
                            <input type="text" class="form-control" name="description" >
                        </li>
                        <li><input type="submit" value="send" class="btn btn-primary"></li>
                                      </form>

                    </ul>
                   
                </nav>
   
             </div>
               

       
                    <script type="text/javascript">
                  function coment(){
                 document.getElementById("fo").style.display="block";
                   }
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
       @else
           <section class="about-section spad">
                 <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Dont Find Any Post</h2>
                    </div>
                </div>
            </div>
    </section>
@endif
    <!-- Services Section End -->

    <!-- Classes Section Begin -->

    <!-- Classes Section End -->

    <!-- Trainer Section Begin -->
@else //coach view
 <div class="col-lg-4 col-md-6">
                    <div class="single-trainer-item">
                        
                        <img src="trainer-1.jpg" alt="">
                        <div class="trainer-text">
                            <h5>{{$coach[0]->coach_name}}</h5>
                            <span>Leader</span>
                            <p>non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                                voluptatem.</p>
                            <div class="trainer-social">
                            
                            </div>
                        </div>
                                     
                    </div>
                </div>

     @if(count($posts)>0 )
    @foreach($posts as $post)
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                @if($post->post_media)
                <div class="col-lg-6">
                    <div class="about-pic">
                        <img src="{{$post->post_media}}" alt="">

                        </a>
                    </div>
                </div>
                @endif
                <div class="col-lg-6">
                    <div class="about-text">
                        <h2>{{$post->coach_name}}</h2>
                        <p class="first-para">{{ Str::limit($post->post_description, 300)}}</p>
                        <a href="#">read more</a><br><br>
                        <a href="/comment{{$post->post_id}}"class="primary-btn" class='col-lg-12'  onclick="coment()" ><i class="fa fa-comment"></i>comment</a>
                 <br<br><a href="#" class="primary-btn"><i class="fa fa-thumbs-up"></i>like</a>
                   <br><br>
                   <div>  
                   <div class="container">     
            <div class="nav-men">
                <nav class="mainmenu mobile-menu">
                    <ul class="hidden"id="fo">
                          <form  action="comment/{{$post->post_id}}" method="post" >
                   {{ csrf_field() }}
                        <li> 
                            <input type="text" class="form-control" name="description" >
                        </li>
                        <li><input type="submit" value="send" class="btn btn-primary"></li>
                                      </form>

                    </ul>
                   
                </nav>
   
             </div>
               

       
                    <script type="text/javascript">
                  function coment(){
                 document.getElementById("fo").style.display="block";
                   }
                    </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach
       @else
           <section class="about-section spad">
                 <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Dont Find Any Post</h2>
                    </div>
                </div>
            </div>
    </section>
@endif
    @endif
                @endif
</body>

</html>
