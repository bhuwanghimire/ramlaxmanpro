
@foreach ($profiles as $profile)
    <div class="footer-top">
        <div class="container">
          <div class="row">
  
     
 
            <div class="col-lg-3 col-md-6 footer-contact">
              <h3> <img src="{{asset($profile->logo)}}" alt="" srcset="" class="" width="100px"></h3>
              <p>
                {{$profile->address}} <br>
                <strong>Phone:</strong>{{$profile->phone}}<br>
                <strong>Email:</strong> {{$profile->email}}<br>
              </p>
            </div>
  
            <div class="col-lg-2 col-md-6 footer-links">
              <h4>Useful Links</h4>
              <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{asset('/')}}">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{asset('/aboutus_details')}}">About us</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="#service">Services</a></li>
            
              </ul>
            </div>
  
            <div class="col-lg-3 col-md-6 footer-links">
              <h4>Our Services</h4>
              <ul>
                @foreach ($services as $service)
                  
               
                <li><i class="bx bx-chevron-right"></i> <a href="#">{{$service->title}}</a></li>
              
                @endforeach
              </ul>
            </div>
            @foreach ($profiles as $profile)
            <div class="col-lg-4 col-md-6 footer-newsletter">
              <h4>Our Location</h4>
              <iframe style="border:0; width: 100%; height: 200px;" src="{{asset($profile->map_address)}} frameborder="0" allowfullscreen></iframe>
           
            </div>
            @endforeach
          </div>
        </div>
      </div>
  
      <div class="container d-md-flex py-4">
  
        <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; Copyright <strong><span>Ramlaxman</span></strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/company-free-html-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="social-links text-center text-md-right pt-3 pt-md-0">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>
      @endforeach