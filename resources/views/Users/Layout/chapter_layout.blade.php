<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('/src/img/logo.png')}}">
    <link rel="stylesheet" href="{{asset('/src/css/style.min.css')}}">
    <title>Center for Court Innovation : @yield('title')</title>
  </head>
</html>
<body class="aos-all" id="transcroller-body">
    @yield('page')
  <menu class="fixed container menu" id="home">
    <nav class="sidenav-active main-menu animate__animated animate__bounceInDown " id="menu">
      <label class="show-menu" for="show-menu">
        <div class="topbar"><span class="logo menu-logo mobile-logo dark-logo"><a href="/dashboard"><img src="./src/img/logo.png" alt="#{logoMenu}"/></a></span>
          <div class="lines"></div>
        </div>
      </label>
      <input id="show-menu" type="checkbox"/>
      <ul id="menu">
        <li class="undefined logo menu-logo "><a href="/dashboard"><img src="{{asset('/src/img/logo.png')}}" alt="#{logoMenu}"/><img class="logo-small court" src="{{asset('/src/img/new-york-state-unified-court-system.svg')}}" alt="#{logoMenu}"/></a></li>
        <div class="undefined menu-links " id="menu_links">
          <li class="button no-margin"><a class="btn btn-sm btn-" href="#"><i class="fas fa-search"></i></a>
          </li>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/chat"><i class="fab fa-rocketchat"></i></a>
          </li>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/Calender"><i class="fas fa-calendar-alt"></i></a>
          </li>
          <li><a href="{{ route('logout') }}" id="invoke">Logout</a></li>
        </div>
      </ul>
    </nav>
  </menu>
  <div class="dialog">
    <dialog>
      <form method="dialog"><i class="cancel fa-solid fa-xmark"></i><strong>Confirm Action</strong>
        <p>Are you sure you want to Logout Account?</p>
        <menu class="mt-4"><small><i class="fa-solid fa-keyboard"></i><span>esc</span></small><a class="btn btn-default close" href="#">Close</a><a class="btn btn-primary" href="{{ route('logout') }}">Yes</a></menu>
      </form>
    </dialog>
  </div>
  <div class="main_content top-fixed">
      @yield('content')
    <div class="line_hr"></div>
    <input type="checkbox" id="target-modal">
    <div class="modal">
      <div class="modal-inner">
        <label class="close-modal" for="target-modal"></label>
        <div class="contact" id="contact">
          <form class="contact-form" action="#" id="contact">
            <h5 class="title">Contact Us</h5>
            <p class="description mb-5">Feel free to contact us if you need any assistance, any help or another question.</p>
            <Fieldset>
              <input type="text" id="name" placeholder="Your name" required autofocus tabindex="1">
            </Fieldset>
            <Fieldset>
              <input type="text" id="email" placeholder="Your email" required tabindex="2">
            </Fieldset>
            <Fieldset>
              <textarea placeholder="Your message" required tabindex="3"> </textarea>
            </Fieldset>
            <div class="button-group d-flex-centered"><a class="btn btn-lg btn-primary send_mail">Send Message</a></div>
          </form>
        </div>
      </div>
      <label class="overlay-modal" for="target-modal"></label>
    </div>
    <!-- <footer class="text-dark">
      <div class="container pt-2">
        <div class="content">
          <div class="footer-content">
            <div class="copyright">
              <p>Center for Court Innovation © All Rights Reserved</p>
            </div>
            <div class="social"><a class="btn btn-lg btn-circle btn-social d-flex-centered"><i class="fab fa-facebook-f"></i></a><a class="btn btn-lg btn-circle btn-social d-flex-centered"><i class="fab fa-twitter"></i></a></div>
          </div>
        </div>
      </div>
    </footer> -->
  </div>
  <div class="shaded" id="backToTop" onclick="goTop()"><i class="fas fa-angle-up"> </i></div>
</body>
<script src="{{asset('/src/js/jquery.min.js')}}"> </script>
<script src="{{asset('/src/js/index.js')}}"> </script>
<script src="{{asset('/src/js/aos.js')}}"> </script>
<script>
  AOS.init({
      easing: 'ease-in-out-sine'
  });
</script>
