
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>User Deatils</title>
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

        
        <!-- Custom Css -->
        <link href="{{asset('css/style.css')}}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{asset('css/style2.css')}}" rel="stylesheet">
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
            selector: 'textarea#tiny'
            });
        </script>
    </head>

    <body>
        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="#" class="navbar-brand"><h1 class="text-primary display-6">{{ $_SESSION['setting']->name ? $_SESSION['setting']->name :'' }}</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="{{route('userdashboard')}}" class="nav-item nav-link active">Home</a>
                            <!-- <a href="shop.html" class="nav-item nav-link">Tech</a>
                            <a href="shop-detail.html" class="nav-item nav-link">Health</a>
                            <a href="shop-detail.html" class="nav-item nav-link">Education</a> -->

                            <a href="contact.html" class="nav-item nav-link">About Us</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            <div class="nav-item dropdown">
                            <a href="#" class="my-auto" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                           <!-- <i class="fas fa-user fa-2x"> --><img  src="{{Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::user()->profile: 'Please Login first'}}"   class="img-fluid rounded-circle" alt="Profile Image" style="width: 50px; height: 50px;" >
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                <a href="#" class="dropdown-item">{{Illuminate\Support\Facades\Auth::check() ? Illuminate\Support\Facades\Auth::user()->name: 'Please Login first'}}</a>
                                <a href="{{route('userlogout')}}" class="dropdown-item">Log Out</a>
                                </div>
                            </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        

   
        <!-- Modal Search End -->


        <!-- Hero Start -->

        <!-- Hero End -->


        <!-- Featurs Section Start -->
   
        
@if(session('success'))
    <div class="alert alert-success">
         {{ session('success') }}
    </div>
@endif


<div class="container-fluid fruite py-5">
     <div class="container py-5">
     <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                        <div class="header">
                            <h1>
                                <b>
                               News Form
                                </b>
                            </h1>
                           
                        </div>
                    <div class="body">
                        <form action="{{route('news.data')}}" method='POST'  enctype='multipart/form-data'>
                            @csrf
                            <label >Created_By</label>
                                <div class="form-group"> 
                                <select  name="Created_By"> 
                                    <option value="User">User</option>
                                    </select >
                                </div>
                                <label >User Name</label>
                                <div class="form-group"> 
                                <select  name="user_id"> 
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                    </select >
                                </div>
                                <label >Heading</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('heading'))
                                            <span style='color:red;'>{{$errors->first('heading')}}</span>
                                            @endif 
                                        <input type="text" name="heading" class="form-control"   value="{{ old('heading') }}" placeholder="Enter Heading">
                                       
                                    </div>
                                </div>
                                <label >Sub Heading</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('subheading'))
                                            <span style='color:red;'>{{$errors->first('subheading')}}</span>
                                            @endif
                                        <input type="text" name="subheading" class="form-control" value="{{ old('subheading') }}" placeholder="Enter Heading">

                                    </div>
                                </div>
                                <label >Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('image'))
                                            <span style='color:red;'>{{$errors->first('image')}}</span>
                                            @endif 
                                        <input type="file" name="image" value="{{ old('image') }}" class="form-control" placeholder="Image">
                                    </div>
                                </div>
                                <label >Video Link</label>
                                <div class="form-group">
                                    <div class="form-line">                                    
                                        <input type="text" name="link" value="{{ old('link') }}" class="form-control" placeholder="Video Link">
                                    </div>
                                </div>
                                <label for="password">Category</label>
                                <div class="form-group"> 
                                <select  name="category_id"> 
                                @forelse($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @empty
                                    <option value="">No Category</option>
                                    @endforelse
                                    </select >
                                </div>
                                <div class="form-group">
                                <label for="password">Status</label>  
                                <select name ='status'> 
                                        <option  value='0'> Inactive</option>
                                    </select >
                                </div>

                                <label >Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    @if($errors->first('description'))
                                            <span style='color:red;'>{{$errors->first('description')}}</span>
                                            @endif  
                                    <textarea id="tiny" class="form-control" value="{{ old('description') }}" id="exampleTextarea1" placeholder="Description" rows="8" name="description"  value="{{ old('description') }}"></textarea>
                                    </div>
                                </div>
                                
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


       


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