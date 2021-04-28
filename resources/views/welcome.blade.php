<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.style')

<style>


</style>
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.navigation')
 <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    
    

      <div class="carousel-inner" role="listbox">

        <!-- Slide 1 -->@foreach ($sliders as $slider)
        <div class="carousel-item  @if($loop->first) active @endif  data-slide-to="{{ $loop->index }}"  style="background-image: url({{asset($slider->slider_image)}});">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2>{{$slider->title}}</span></h2>
              <p style="text-align: justify;">{!!$slider->description!!}</p>
              {{-- <div class="text-center"><a href="" class="btn-get-started">Read More</a></div> --}}
            </div>
          </div>
        </div>
        @endforeach
        

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators "  id="hero-carousel-indicators"></ol>
     
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>

        <div class="row content">
          @foreach ($aboutus as $about)
              
        
          <div class="col-lg-6 shadow p-3 mb-5 bg-white rounded" data-aos="fade-right">
          {{-- imge effect --}}
       
			
            <img src="{{ asset($about->image) }}"  class="" height="450px" width="540px"   alt="img06"/>
					
					


         
          {{-- end image effect --}}
         
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <h3>    {!!$about->title!!}</h3>
            <p style="text-align: justify;">
             {!!$about->description!!}
            </p>
            <ul>
            

              <li></li>
            </ul>
           
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">
      
        <div class="section-title">
          <h2>Services</strong></h2>
          <p>Laborum repudiandae omnis voluptatum consequatur mollitia ea est voluptas ut</p>
        </div>

        <div class="row" >
          @foreach ($services as $service)
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100" style="margin-bottom: 12px;">
           
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <img src="{{ asset($service->icon) }}" class="img-fluid" >
               
           
              
              </div>
              <h4><a href="">{{$service->title}}</a></h4>
              <p>{!!$service->description!!}</p>
            </div>
          </div>@endforeach


         

          

         
       
        </div>
     
      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio"> 
      <div class="container">
     
        <div class="section-title" data-aos="fade-up">
          <h2>Portfolio</h2>
        </div>
       
        <div class="row" data-aos="fade-up">
      
          <div class="col-lg-12 d-flex justify-content-center">
           
            <ul id="portfolio-flters">
            
              <li data-filter="*" class="filter-active">All</li>  
             
              @foreach ($portfolios as $portfolio)
            
              <li data-filter=".{{$portfolio->category->category}}"> {{$portfolio->category->category}}</li>
               
              @endforeach
            </ul>
         
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">
         
          @foreach ($portfolios as $portfolio)
          
          <div class="col-lg-4 col-md-6 portfolio-item {{$portfolio->category->category}}">
            <img src="{{ asset($portfolio->image) }}" class="img-fluid" >
        
            <div class="portfolio-info">
              <h4>App 1</h4>
              <p>App</p>
              <a href="{{ asset($portfolio->image) }}" data-gall="portfolioGallery" class="venobox preview-link" title="App 1"><i class="bx bx-plus"></i></a>
              <a href="{{route('portfolio_details',$portfolio->id)}}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
          
          @endforeach
        
        
        </div>
      
      </div>  
    </section>  <!-- End Portfolio Section -->

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
        </div>

        <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

         @foreach ($clients as $client)
             
        
          <div class="col-lg-3 col-md-4 col-6">
            <div class="client-logo">
             <a href="{{$client->client_link}}"> <img src="{{asset($client->client_logo)}}" class="img-fluid" alt=""></a>
            </div>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Our Clients Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    @include('layouts.footer')
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  @include('layouts.script')
</body>

</html>