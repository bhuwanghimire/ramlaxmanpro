<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      @foreach ($profiles as $profile)
      <h1 class="logo mr-auto"><a href="{{asset('/')}}"><img src="{{asset($profile->logo)}}" alt="" srcset=""></a></h1>
      @endforeach
     
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{asset('/')}}">Home</a></li>
          
          <li class="drop-down"><a href="">About</a>
            <ul>
              <li><a href="{{asset('aboutus_details')}}">About Us</a></li>
              <li><a href="{{asset('team_details')}}">Team</a></li>
              <li><a href="{{asset('testimonials')}}">Testimonials</a></li>           
            </ul>
          </li>

        
    
          <li><a href="{{asset('contact')}}">Contact</a></li>
          @if(Auth::user())   
            <li><a href="{{asset('home')}}">Dashboard</a></li>
            @else
            <li><a href="{{asset('login')}}">Login</a></li>
            @endif
        
         

        </ul>
      </nav><!-- .nav-menu -->

      <div class="header-social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>

    </div>
  </header>