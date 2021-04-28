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

 <!-- End Header -->

  <main id="main">
    @foreach ($profiles as $profile)
    <!-- ======= Breadcrumbs ======= -->
   
   

    <!-- ======= Contact Section ======= -->
    <div class="map-section">
      <iframe style="border:0; width: 100%; height: 350px;" src="{{asset($profile->map_address)}} frameborder="0" allowfullscreen></iframe>
    </div>

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>{{$profile->address}}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{$profile->email}}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>{{$profile->phone}}</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            {{-- action="{{asset('contact')}}" --}}
            <form action="javascript:sendmail()" method="POST" role="form">
                {{-- @csrf --}}
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="text-danger">{{ $errors->first('name')}}</div>

                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="text-danger">{{ $errors->first('email')}}</div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="text-danger">{{ $errors->first('subject')}}</div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" id="myTextarea" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="text-danger">{{ $errors->first('message')}}</div>
              </div>
              <div class="mb-3" style="background-color: red;color:white;">
         
                @if(session('success'))
                {{session('success')}}
              @endif
              
             
              </div>
              
              <div class="text-center  "><button class="btn btn-primary" type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

    <script>

function sendmail(){
    
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
      //  var message = $('#message').val();
        var message = document.getElementById("myTextarea").value;
     

    // var body = $('#body').val();

    var Body='Name: '+name+'<br>Email: '+email+'<br>Subject: '+subject+'<br>Message: '+message;
    //console.log(name, phone, email, message);

    Email.send({
      Host : "smtp.gmail.com",
      Username : "bhuwanghimire100@gmail.com",
      Password : "pnngveodpasgwovu",
      To: 'bhuwanghimire100@gmail.com',
      From: "bhuwanghimire100@gmail.com",
      Subject: "New message on contact from "+name,
      Body: Body
    }).then(
      message =>{
        //console.log (message);
        if(message=='OK'){
        alert('Your mail has been send. Thank you for connecting.');
        location.reload()

        }
        else{
          console.error (message);
          alert('There is error at sending message. ')
          
        }

      }
    );



  }
    </script>
@endforeach
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