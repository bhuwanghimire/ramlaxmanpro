<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ramlaxman</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Ramlaxman</a>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              
             
            </ul>
          </li>
          
       
          <li class="nav-item">
            <a href="{{route('slider.index')}} " class="nav-link {{Request::is('*slider*') ? 'active': ''}}">
              <i class="nav-icon fas fa-chart-pie" style="color:green"></i>
              <p>
                Slider
              
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="{{route('about.index')}} " class="nav-link {{Request::is('*about*') ? 'active': ''}}">
              <i class="fas fa-address-card" style="color:rgb(231, 14, 104)"></i>
              <p>
                About
              
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="{{route('service.index')}} " class="nav-link {{Request::is('*service*') ? 'active': ''}}">
              <i class="fab fa-servicestack" style="color:rgb(148, 14, 238)"></i>
              <p>
                Service
              
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="{{route('category.index')}} " class="nav-link {{Request::is('*category*') ? 'active': ''}}">
              <i class="fas fa-certificate" style="color:rgb(228, 13, 85)"></i>
              <p>
                Category
              
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="{{route('portfolio.index')}} " class="nav-link {{Request::is('*portfolio*') ? 'active': ''}}">
              <i class="fas fa-passport" style="color:rgb(201, 235, 12)"></i>
              <p>
                Portfolio
              
              </p>
            </a>
           
          </li>
       
          <li class="nav-item">
            <a href="{{route('profile.index')}} " class="nav-link {{Request::is('*profile*') ? 'active': ''}}">
              <i class="fas fa-users" style="color:rgb(8, 107, 236)"></i>
              <p>
                Profile
              
              </p>
            </a>
           
          </li>

          <li class="nav-item">
            <a href="{{route('client.index')}} " class="nav-link {{Request::is('*client*') ? 'active': ''}}">
              <i class="fas fa-sliders-h" style="color:green"></i>              <p>
                Clients
                
              </p>
            </a>
           
          </li>

          
          <li class="nav-item">
            <a href="{{route('testimonial.index')}} " class="nav-link {{Request::is('*testimonial*') ? 'active': ''}}">
              <i class="fas fa-comment" style="color:rgb(236, 23, 76)"></i>              <p>
                
                Testimonial
              </p>
            </a>
           
          </li>
            
          <li class="nav-item">
            <a href="{{route('team.index')}} " class="nav-link {{Request::is('*team*') ? 'active': ''}}">
              <i class="fas fa-user-friends" style="color:rgb(70, 0, 128)"></i>
              <p>
                
                Team
              </p>
            </a>
           
          </li>
       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>