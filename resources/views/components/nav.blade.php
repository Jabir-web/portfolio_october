 <div class="site-mobile-menu site-navbar-target">
     <div class="site-mobile-menu-header">
         <div class="site-mobile-menu-close mt-3">
             <span class="icon-close2 js-menu-toggle"></span>
         </div>
     </div>
     <div class="site-mobile-menu-body">
          <ul class="js-clone-nav">
             <li><a href="{{ route('homepage') }}#section-home" class="nav-link">Home</a></li>
             <li><a href="{{ route('aboutpage') }}" class="nav-link">About Me</a></li>
             <li><a href="{{ route('homepage') }}#section-photos" class="nav-link">Code Projects</a></li>
             {{-- <li><a href="{{ route('homepage') }}#section-about" class="nav-link">Code Lab</a></li> --}}
             {{-- <li><a href="#section-testimonial" class="nav-link">Videos</a></li> --}}
             {{-- <li><a href="#section-blog" class="nav-link">Blog</a></li> --}}
             <li><a href="{{ route('homepage') }}#section-contact" class="nav-link">Contact</a></li>
             @auth
             {{-- <li><a href="{{ route('signuppage') }}" class="nav-link">Become Member</a></li> --}}
             @if (auth()->user()->role === 'admin')
                     <div class="bg-light d-flex flex-column rounded p-2 m-2">
                         <span class="font-weight-bold">Admin</span>
                         <a href="{{ route('all.users') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Users</a>
                         <a href="{{ route('all.banners') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Banners</a>
                         <a href="{{ route('all.projects') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Projects</a>
                         {{-- <a href="" class="text-dark text-uppercase nav-link" style="font-size: 13px">Code Labs</a>
                         <a href="" class="text-dark text-uppercase nav-link" style="font-size: 13px">Premium</a> --}}
                         <a href="{{ route('all.messages') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Contacts</a>
                     </div>
                     <li><a href="{{ route('logout') }}" class="nav-link ">Logout</a></li>
                 @else
                     <li><a href="{{ route('logout') }}" class="nav-link ">Logout</a></li>
                 @endif
             @else
                 <li><a href="{{ route('loginpage') }}" class="nav-link">Login</a></li>
                 <li><a href="{{ route('signuppage') }}" class="nav-link">Signup</a></li>
                 
             @endauth


         </ul>
     </div>
 </div>

 <header class="header-bar d-flex d-lg-block align-items-center site-navbar-target" data-aos="fade-right">
     <div class="site-logo">
         <a href="{{ route('homepage') }}">Jabir Faisal</a>
     </div>

     <div class="d-inline-block d-lg-none ml-md-0 ml-auto py-3" style="position: relative; top: 3px;"><a href="#"
             class="site-menu-toggle js-menu-toggle "><span class="icon-menu h3"></span></a>
     </div>

     <div class="main-menu">
         <ul class="js-clone-nav">
             <li><a href="{{ route('homepage') }}#section-home" class="nav-link">Home</a></li>
                <li><a href="{{ route('aboutpage') }}" class="nav-link">About Me</a></li>
             <li><a href="{{ route('homepage') }}#section-photos" class="nav-link">Code Projects</a></li>
             {{-- <li><a href="{{ route('homepage') }}#section-about" class="nav-link">Code Lab</a></li> --}}
             {{-- <li><a href="#section-testimonial" class="nav-link">Videos</a></li> --}}
             {{-- <li><a href="#section-blog" class="nav-link">Blog</a></li> --}}
             <li><a href="{{ route('homepage') }}#section-contact" class="nav-link">Contact</a></li>
             @auth
             {{-- <li><a href="{{ route('signuppage') }}" class="nav-link">Become Member</a></li> --}}
             @if (auth()->user()->role === 'admin')
                     <div class="bg-light d-flex flex-column rounded p-2 m-2">
                         <span class="font-weight-bold">Admin</span>
                         <a href="{{ route('all.users') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Users</a>
                         <a href="{{ route('all.banners') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Banners</a>
                         <a href="{{ route('all.projects') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Projects</a>
                         {{-- <a href="" class="text-dark text-uppercase nav-link" style="font-size: 13px">Code Labs</a>
                         <a href="" class="text-dark text-uppercase nav-link" style="font-size: 13px">Premium</a> --}}
                         <a href="{{ route('all.messages') }}" class="text-dark text-uppercase nav-link" style="font-size: 13px">Contacts</a>
                     </div>
                     <li><a href="{{ route('logout') }}" class="nav-link ">Logout</a></li>
                 @else
                     <li><a href="{{ route('logout') }}" class="nav-link ">Logout</a></li>
                 @endif
             @else
                 <li><a href="{{ route('loginpage') }}" class="nav-link">Login</a></li>
                 <li><a href="{{ route('signuppage') }}" class="nav-link">Signup</a></li>
                 
             @endauth


         </ul>
         <ul class="social js-clone-nav">
             <li><a target="_blank" href="https://www.instagram.com/jabir.dev"><span class="icon-instagram"></span></a></li>
             <li><a target="_blank" href="https://www.facebook.com/profile.php?id=100085253318736"><span
                         class="icon-facebook"></span></a></li>
             <li><a target="_blank" href="https://wa.me/+923202049281"><span class="icon-whatsapp"></span></a></li>
             <li><a target="_blank" href="https://www.linkedin.com/in/jabir-faisal/"><span class="icon-linkedin"></span></a></li>
         </ul>
     </div>
 </header>
