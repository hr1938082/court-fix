<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png">
    <link rel="stylesheet" href="./src/css/style.min.css">
    <title>Center for Court Innovation : @yield('title')</title>
  </head>
</html>
<body class="aos-all" id="transcroller-body">
  <section class="lg-padding" id="form_assessment">
    <div class="d-flex-centered mb-4" id="logo"><span class="logo menu-logo mobile-logo dark-logo"><a href="index.html"><img src="./src/img/logo.png" alt="#{logoMenu}"></a></span></div>
    @yield('content')
  </section>
  <!-- <footer class="text-dark">
    <div class="container pt-5 pb-5">
      <div class="aos-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">

          <div class="content">
            <div class="footer-content">
              <div class="logo footer-logo dark-logo"><a href="index.html"><img src="./src/img/logo.png"></a></div>
              <div class="footer-links">
                <ul>
                  <li><a href="{{ route('splash') }}">Home</a></li>
                  <li><a href="terms.html">Terms and Conditions</a></li>
                  <li><a href="privacy.html">Privacy Policy</a></li>
                  <li>
                    <label for="target-modal">Contact Us</label>
                  </li>
                </ul>
              </div>
            </div>
            <div class="footer-content pt-3">
              <div class="description left margin">
                <div class="header"><span>Number of Total Grants</span></div>
                <div class="line_hr"></div>
                <div class="details">
                  <h2>48.177.918</h2>
                </div>
              </div>
              <div class="text text-gray right">
                <p>This project was supported by the Bureau of Justice Assistance through the Statewide Adult Discretionary Drug Court Program grant #2020-MU-BX-0130.  The opinions, findings, and recommendations expressed in this project are those of the authors and the members of the strategic planning committee and do not necessarily represent the positions or policies of the Bureau of Justice Assistance, the New York State Unified Court System or the Center for Court Innovation State-Based Adult Drug Court Training and Technical Assistance Program.</p>
              </div>
            </div>
            <div class="footer-content">
              <div class="copyright">
                <p>Center for Court Innovation © All Rights Reserved</p>
              </div>
              <div class="social"><a class="btn btn-lg btn-circle btn-social d-flex-centered"><i class="fab fa-facebook-f"></i></a><a class="btn btn-lg btn-circle btn-social d-flex-centered"><i class="fab fa-twitter"></i></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer> -->
  <div class="shaded" id="backToTop" onclick="goTop()"><i class="fas fa-angle-up"> </i></div>
</body>
<script src="./src/js/jquery.min.js"> </script>
<script src="./src/js/index.js"> </script>
<script src="./src/js/aos.js"> </script>
<script>
  AOS.init({
      easing: 'ease-in-out-sine'
  });
</script>
