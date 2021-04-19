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
          <h2>Testimonials</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Testimonials</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">
       
            
      
        <div class="row">
            @foreach ($testimonials as $testimonial)
          <div class="col-lg-6" data-aos="fade-up">
            <div class="testimonial-item">
              <img src="{{asset($testimonial->image)}}" class="testimonial-img" alt="">
              <h3>{{$testimonial->name}}</h3>
              <h4>{{$testimonial->designation}}</h4>
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                {!!$testimonial->description!!}
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
          </div>

          @endforeach
       
        </div>
      
      </div>
    </section><!-- End Testimonials Section -->

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