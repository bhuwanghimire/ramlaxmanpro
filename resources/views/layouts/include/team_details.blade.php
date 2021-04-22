<!DOCTYPE html>
<html lang="en">

<head>
 @include('layouts.style')

  <!-- =======================================================
  * Template Name: Company - v2.2.1
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.navigation')


  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="{{asset('/')}}">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

  
   
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
       
        <div class="row">
            @foreach ($teams as $team)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
            
              <div class="member-img">
                <img src="{{asset($team->image)}}" class="img-fluid" alt="">
               
              </div>
              <div class="member-info">
                <h4>{{$team->name}}</h4>
                <span>{{$team->designation}}</span>
              </div> 

            </div>
          </div>

          @endforeach

        

        
        </div>

      </div>
    </section><!-- End Our Team Section -->

  

   

  </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer">

    @include('layouts.footer')

   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
 @include('layouts.script')

</body>

</html>