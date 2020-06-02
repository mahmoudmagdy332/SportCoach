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
                        <li class="active"><a href='/home'>Home</a></li>
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
     
    </header>

    <!-- Header End -->

    <!-- Hero Section Begin -->

    </div>
    <!-- Hero Section End -->

    <!-- About Section Begin -->

        
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
                       
                        <p class="first-para">{{ Str::limit($post->post_description, 500)}}.</p>
                        <a href="#">read more</a><br><br>
                        @if ($post->post_rank>0)
                        <label>{{$post->post_rank}}<i class="fa fa-thumbs-up" wedth="5"></i></label>
                        @endif
                         @if ($post->post_rank<0)
                        <label>{{$post->post_rank*-1}}<i class="fa fa-thumbs-down" wedth="10"></i></label>
                        @endif
                        <br><br>
                        <a href="/comment{{$post->post_id}}"class="primary-btn" class='col-lg-12'  onclick="coment()" ><i class="fa fa-comment"></i>comment</a>
                        <br<br>
                        @if($post->like==1)
                        <a href="/like/{{$post->post_id}}" style="color:blueviolet " class="primary-btn"><i class="fa fa-thumbs-up" wedth="5" ></i>like</a>
                       @else
                       <a href="/like/{{$post->post_id}}"  class="primary-btn"><i class="fa fa-thumbs-up" wedth="5" ></i>like</a>
                        @endif
                        @if($post->dislike==1)
                       <a href="/dislike/{{$post->post_id}}" style="color:blueviolet " class="primary-btn"><i class="fa fa-thumbs-down" wedth="5"></i>dislike</a>
                       @else
                       
                       <a href="/dislike/{{$post->post_id}}"  class="primary-btn"><i class="fa fa-thumbs-down" wedth="5"></i>dislike</a>
                    @endif
                       <br><br>
                     
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

</body>

</html>


