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
          <h2>Portfolio Details</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portfolio Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
    
          
   
      <div class="container" data-aos="fade-up">
        <div class="portfolio-details-container">

          <div class="owl-carousel portfolio-details-carousel">
           
            <img src="{{ asset($portfolio->image) }}" class="img-fluid" alt="">
          </div>

          <div class="portfolio-info">
            <h3>{{$portfolio->project_name}}</h3>
            <ul>
              <li><strong>Category</strong>: {{$portfolio->category->category}}</li>
              <li><strong>Client</strong>:{{$portfolio->company_name}}</li>
              <li><strong>Project date</strong>: {{$portfolio->date}}</li>
              <li><strong>Project URL</strong>: <a href="#">{{$portfolio->link}}</a></li>
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2>{{$portfolio->project_name}}</h2>
          <p>
            {!!$portfolio->description!!}
          </p>
        </div>

      </div> 
    </section><!-- End Portfolio Details Section -->

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