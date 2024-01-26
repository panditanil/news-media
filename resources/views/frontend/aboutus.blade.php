
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>User Details</title>
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
                    <a href="" class="navbar-brand"><h1 class="text-primary display-6">{{ $_SESSION['setting']->name ? $_SESSION['setting']->name :'' }}</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('userdashboard')}}" class="nav-item nav-link active">Home</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <div class="nav-item dropdown">
                            <a href="#" class="my-auto" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                               
                           <!-- <i class="fas fa-user fa-2x"> --><img  src="{{Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::user()->profile: 'Please Login first'}}"   class="img-fluid rounded-circle" alt="Profile Image" style="width: 50px; height: 50px;" >
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">

                                <a href="#" class="dropdown-item">{{Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::user()->name: 'Please Login first'}}</a>
                                @if(auth()->check())
                                <a href="{{route('user.details',Auth::user()->id)}}" class="dropdown-item">Profile Details</a>
                                <a href="{{route('userlogout')}}" class="dropdown-item">Log Out</a>
                                @endif
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        




        <!-- Hero Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                @forelse($data as $data)
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                        <img src="{{asset('uploads').'/'.$_SESSION['setting']->logo}}" class="img-fluid rounded" alt="Image">
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                 
                            </div>
                            <div class="col-lg-12">
                                <nav>
                                    <div class="nav nav-tabs mb-3">
                                        <h1 class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                            aria-controls="nav-about" aria-selected="true">Details</h1>
                                    
                                    </div>
                                </nav>
                            
                                <div class="tab-content mb-5">
                                    <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                      
                                    <h4 class="fw-bold mb-3">Name: {{$data->name}}</h4>  
                                    <h4 class="fw-bold mb-3">Email: {{$data->email}}</h4> 
                                    <h4 class="fw-bold mb-3">Adress: {{$data->address}}</h4>
                                    <h4 class="fw-bold mb-3">Phone No: {{$data->phone}}</h4> 
                                    <h4 class="fw-bold mb-3">Slogan: {{$data->slogan}}</h4>  
                                      
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>No thing</p>
                @endforelse
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





