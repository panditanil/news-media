
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>News Details</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style2.css')}}" rel="stylesheet">
    </head>

    <body>
        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="{{route('userdashboard')}}" class="navbar-brand"><h1 class="text-primary display-6">{{ $_SESSION['setting']->name ? $_SESSION['setting']->name :'' }}</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('userdashboard')}}" class="nav-item nav-link active">Home</a>
                            <a href="{{route('system.details')}}" class="nav-item nav-link">About Us</a>
                            <a href="{{route('newscreate')}}" class="nav-item nav-link">Create News</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <div class="nav-item dropdown">
                            <a href="#" class="my-auto" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                           <!-- <i class="fas fa-user fa-2x"> --><img  src="{{Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::user()->profile: 'Please Login first'}}"   class="img-fluid rounded-circle" alt="Profile Image" style="width: 50px; height: 50px;" >
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="#" class="dropdown-item">{{Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::user()->name: 'Please Login first'}}</a>
                                <a href="{{route('user.details',Auth::user()->id)}}" class="dropdown-item">Profile </a>
                                <a href="{{route('userlogout')}}" class="dropdown-item">Log Out</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        




        <!-- Hero Start -->

        <!-- Modal Search Start -->
        <form action="{{route('posts.search') }}" method="GET">
            @csrf
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="text" class="form-control p-3" Name='search'placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            <button type="submit" >Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <!-- <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Shop Detail</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Shop Detail</li>
            </ol>
        </div> -->
        <!-- Single Page Header End -->


        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
           
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <a href="#">
                                        <img src="{{$news->image}}" class="img-fluid rounded" alt="Image">
                                    </a>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3">{{$news->heading}}</h4>
                                <p class="mb-4">{{$news->subheading}}</p> 
                              
                                
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Description</button>
                                    
                                    </div>
                                </nav>
                            
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                      
                                    {!! $news->description !!}
                                        <iframe allow="autoplay"   height="360" src="{{$news->link}}" width="640"></iframe>
                                  
                                </div>
                            </div>

                            <!-- Comment  -->
                            <form action="{{route('comment.user')}}" method="post">
                                @csrf
                                <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                                <div class="row g-4">

                                <div class="col-lg-6">
                                <label for="">Category</label>
                                    <select  name="category_id"> 
                                        <div class="border-bottom rounded">
                                        <option value="{{$news->category_id}}">Category:{{$news->category_id}}</option>
                                        </div>
                                    </select>
                                    </div>  
                                    <div class="col-lg-6">
                                    <label for="">News</label>
                                    <select  name="news_id"> 
                                        <div class="border-bottom rounded">
                                        <option value="{{$news->id}}">News:{{$news->heading}}</option>
                                        </div>
                                    </select>
                                    </div>  
                                    <div class="col-lg-6">
                                    <label >user Name</label>
                                    <select  name="user_id"> 
                                        <div class="border-bottom rounded">
                                        <option value="{{ auth()->user()->id }}">{{ auth()->user()->name }}</option>
                                        </div>
                                    </select>
                                    </div>  
                                    <div class="col-lg-6">
                                        <div class="border-bottom rounded">
                                            <input  class="form-control border-0 me-4" value="{{ auth()->user()->email }}" placeholder="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="comment" id="" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <!-- <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 12px;">
                                                    <i class="fa fa-star text-muted"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div> -->
                                            </div>
                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Post Comment</button> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Comment -->
                    <h4 class="mb-5 fw-bold alert bg-danger text-white rounded"> Your Comments</h4>
                    @forelse($news->comments as $comment)
                                   <!-- Another stylish comment -->
                                    <div >
                                        <div class="alert alert-info rounded" role="alert">
                                            <strong></strong> {{ $comment->comment }}
                                        </div>
                                    </div>
                                @empty
                                <p>No Comments</p>
                                @endforelse
                       




                    <!-- <div class="col-lg-4 col-xl-3">
                        <div class="row g-4 fruite">
                            <div class="col-lg-12">
                                <div class="input-group w-100 mx-auto d-flex mb-4">
                                    <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                                    <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                                </div>
                                <div class="mb-4">
                                    <h4>Categories</h4>
                                    
                                    <ul class="list-unstyled fruite-categorie">
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>Apple</a>
                                                <span>(3)</span>
                                            </div>
                                        </li>
                                      
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>Oranges</a>
                                                <span>(5)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>Strawbery</a>
                                                <span>(2)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>Banana</a>
                                                <span>(8)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex justify-content-between fruite-name">
                                                <a href="#"><i class="fas fa-apple-alt me-2"></i>Pumpkin</a>
                                                <span>(5)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                       
                           
                        </div>
                    </div> -->
                </div>
                


        <div class="container-fluid fruite py-5">
            <div class="container py-5">
            <h1 class="fw-bold mb-0  ">News</h1>
                <div class="tab-class text-center">
                
                    <div class="row g-4">
                        
                        <div class="col-lg-4 text-start">
                            <h2></h2>
                           
                        </div>
                        
                    </div>
                
                    <div class="tab-content">
                  
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                             
                        <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @forelse($related as $relate)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="{{$relate->image}}" class=" rounded-top" width="260" height="130" alt="">
                                                </div>
                                                <div class="text-white  rounded position-absolute" style="top: 10px; left: 10px;"></div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h5>{{ Illuminate\Support\Str::limit($relate->heading,'20','...')}}</h5>
                                                    <p> {{ Illuminate\Support\Str::limit($relate->subheading,'40','...') }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <a href="{{ route('news.details', $news->id)}} " target='_blank' > See more</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
      



                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Featurs Section Start -->
   
        
  


        <!-- Footer Start -->
        <div class="container-fluid">
            <div class="container py-5">
              
               
                 
                    </div>
                  
                 
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>{{ $_SESSION['setting']->name ? $_SESSION['setting']->name :'' }}</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Phone number <a class="border-bottom" href="#">  {{ $_SESSION['setting']->phone ? $_SESSION['setting']->phone :'' }}</a>    Email<a class="border-bottom" href="#">  {{ $_SESSION['setting']->name ? $_SESSION['setting']->email :'' }}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('js/main.js')}}"></script>
    </body>

</html>





