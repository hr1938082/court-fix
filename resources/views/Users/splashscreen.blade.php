<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png">
    <link rel="stylesheet" href="./src/css/style.min.css">
    <script type="module" src="./src/js/core.js"> </script>
    <link rel="modulepreload" href="./src/js/swiper.bundle.min.js">
    <title>Center for Court Innovation : Splashscreen</title>
  </head>

  
</html>
<body class="aos-all" id="transcroller-body">
  <menu class=" container menu" id="home">
    <nav class="undefined main-menu animate__animated animate__bounceInDown " id="menu">
      <label class="show-menu" for="show-menu">
        <div class="topbar"><span class="logo menu-logo mobile-logo dark-logo"><a href="index.html"><img src="./src/img/logo.png" alt="#{logoMenu}"/></a></span>
          <div class="lines"></div>
        </div>
      </label>
      <input id="show-menu" type="checkbox"/>
      <ul id="menu">
        <li class="undefined logo menu-logo "><a href="index.html"><img src="./src/img/logo.png" alt="#{logoMenu}"/><img class="logo-small court" src="./src/img/court justice.jpg" alt="#{logoMenu}"/></a></li>
        <div class="undefined menu-links " id="menu_links">
          <li class="button"><a class="btn btn-sm btn-primary" href="{{ route('register') }}">Register</a>
          </li>
          <li class="button"><a class="btn btn-sm btn-default primary" href="{{ route('login') }}">Login</a>
          </li>
        </div>
      </ul>
    </nav>
  </menu>
  <section class="no-padding parallax main-section big flow slideshow bg-image" id="splash">
    <div class="mb_parallax_overlay">
      <li> <span></span></li>
      <li> <span></span></li>
      <li> <span></span></li>
      <li> <span></span></li>
      <li> <span></span></li>
      <div class="aos-item" data-aos="fade-up" data-aos-duration="400" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
          <div class="container container-header text-center pt-5">
            <div class="split break-reverse">
              <div class="subtitle text-white text-left">
                <h2>Welcome to the New York State Adult Drug Court Team Online Toolkit.</h2>
               <a href="{{ route('register') }}" class="btn btn-lg btn-white outlined mt-5" for="get-started-modal">Let's Get Started</a>

                <!-- <label class="btn btn-lg btn-white outlined mt-5" for="get-started-modal">Let's Get Started</label> -->
              </div>
              <div class="empty"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <input type="checkbox" id="get-started-modal">
  <div class="modal get-started">
    <div class="modal-inner">
      <label class="close-modal" for="get-started-modal"></label>
      <div class="contact" id="contact">
        <form class="contact-form" action="#" id="getStarted">
          <h5 class="title mb-5">Let's Get Started</h5>
          <Fieldset>
            <input type="text" id="name" placeholder="Your name" required autofocus tabindex="1">
          </Fieldset>
          <Fieldset>
            <input type="text" id="role" placeholder="Enter your Role" required tabindex="2">
          </Fieldset>
          <Fieldset>
            <input type="text" id="jurisdiction" placeholder="Enter your Jurisdiction" required tabindex="3">
          </Fieldset>
          <Fieldset>
            <input type="text" id="email" placeholder="Enter your E-mail" required tabindex="4">
          </Fieldset>
          <Fieldset>
            <input type="text" id="phone" placeholder="Enter your Phone Number" required tabindex="5">
          </Fieldset>
          <Fieldset>
            <textarea placeholder="Your message" required tabindex="6"></textarea>
          </Fieldset>
          <div class="button-group d-flex-centered"><a class="btn btn-lg btn-primary send_mail">Submit</a></div>
        </form>
      </div>
    </div>
    <label class="overlay-modal" for="get-started-modal"></label>
  </div>
  <section class="lg-padding" id="slider">
    <div class="container">
      <div class="container container-header">
        <div class="title"><span>What should you expect</span></div>
        <div class="subtitle text-dark pb-4">
          <h5>As our State leads the nation in setting the standard for expansion and implementation of the drug court model, this innovative platform provides the tools and resources needed to be an effective and impactful member of the drug court team.</h5>
        </div>
        <div class="text text-dark no-margin">
          <p>Here you will find educational resources specific to your role, engaging video content portraying actual members of the NYS drug court teams, a place to communicate and network with other practitioners, and stay up to date with events regarding NYS Drug Courts.</p>
        </div>
      </div>
    </div>
  </section>
  <section class="lg-padding bg-gray2" id="carousel">
    <div class="container">
      <div class="aos-item" data-aos="fade-up" data-aos-duration="400" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
          <div class="carousel-slider">
            <div class="swiper">
              <div class="swiper-wrapper">
                <div class="swiper-slide bg-gray">
                  <div class="carousel-slider-animate-opacity image"><img src="src/img/uploads/mar_14_1_06_51_PM.jpg"/>
                    <div class="slide-content">
                      <h5>Hon. Marcia Hirsch</h5>
                      <p>Research has proven that drug court judges have a higher level of satisfaction in their career and feel more positive about the court system and its effectiveness.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-gray">
                  <div class="carousel-slider-animate-opacity image"><img src="src/img/uploads/IMG_1939.jpg"/>
                    <div class="slide-content">
                      <h5>Stephanie Pamrow, past Graduate and Peer Navigator</h5>
                      <p>A dedicated multidisciplinary team of professionals manages the day-to-day operations of the Drug Court.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-gray">
                  <div class="carousel-slider-animate-opacity image"><img src="src/img/uploads/IMG_1948.jpg"/>
                    <div class="slide-content">
                      <h5>Athena McCrory, Legal Aid, BDTC Defense</h5>
                      <p>Team members must understand and respect the boundaries and responsibilities of each other and strive to collaborate toward the goals of the program.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-gray">
                  <div class="carousel-slider-animate-opacity image"><img src="src/img/uploads/IMG_4912.jpg"/>
                    <div class="slide-content">
                      <h5>Brooklyn Drug Court Team</h5>
                      <p>Drug Courts are more effective and cost-effective when they offer complementary treatment and social services to address these co-occurring needs.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-gray">
                  <div class="carousel-slider-animate-opacity image"><img src="src/img/uploads/IMG_1982.jpg"/>
                    <div class="slide-content">
                      <h5>Hon. Judge Betty Calvo-Torres</h5>
                      <p>Drug Courts combine treatment and accountability to support and compel substance use disorder persons charged with serious crimes to change their lives.</p>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide bg-gray">
                  <div class="carousel-slider-animate-opacity image"><img src="src/img/uploads/IMG_2034.jpg"/>
                    <div class="slide-content">
                      <h5>Chief Justice Hon. Judge Craig Hannah</h5>
                      <p>As an important member of the adult drug treatment court team, it is imperative to have a general understanding of the process and how team members work cohesively to effectively support the rehabilitation and compel substance use disorder persons charged with serious crimes to change their lives.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="preview-box">
      <div class="details"><span class="title">
          <p class="current-img"> </p>
          <p class="total-img"></p></span><span class="icon fas fa-times"></span></div>
      <div class="image-box">
        <div class="slide prev"><i class="fas fa-angle-left"></i></div>
        <div class="slide next"><i class="fas fa-angle-right"></i></div>
        <div class="text text-white text-slide-content">
          <h5 class="caption-slide"></h5>
          <p class="text-slide"></p>
        </div><img src="" alt="">
      </div>
    </div>
    <div class="shadow"></div>
  </section>
  <section class="lg-padding" id="button_action">
    <div class="container">
      <div class="container text text-gray text-center">
        <p>This toolkit is used exclusively for internal training viewing purposes only. It will not be viewed, nor will it be accessed by non-UCS personnel.</p>
      </div>
    </div>
    <div class="mt-3" id="buttons">
      <div class="button-group d-flex-centered">
        <label class="btn btn-lg outlined btn-primary" for="target-modal">Contact Us</label>
      </div>
    </div>
  </section>
  <input type="checkbox" id="target-modal">
  <div class="modal">
    <div class="modal-inner">
      <label class="close-modal" for="target-modal"></label>
      <div class="contact" id="contact">
        <form method="post" class="contact-form" action="/Contact-Us" id="contact">
          @csrf
          <h5 class="title">Contact Us</h5>
          <p class="description mb-5">Feel free to contact us if you need any assistance, any help or another question.</p>
          <Fieldset>
            <input type="text" name="name" id="name" placeholder="Your name" required autofocus tabindex="1">
          </Fieldset>
          <Fieldset>
            <input type="text" name="email" id="email" placeholder="Your email" required tabindex="2">
          </Fieldset>
          <Fieldset>
            <textarea placeholder="Your message" name="message" required tabindex="3"></textarea>
          </Fieldset>
          <div class="button-group d-flex-centered"><button type="submit" class="btn btn-lg btn-primary send_mail">Send Message</button></div>
        </form>
      </div>
    </div>
    <label class="overlay-modal" for="target-modal"></label>
  </div>
  <section class="lg-padding bg-gray2" id="button_action">
    <div class="container">
      <div class="container container-header subtitle mb-4 mt-2">
        <h4>12. Publicity / Copyright</h4>
      </div>
      <div class="container text text-dark">
        <p>12.1 The Center and UCS agree that each shall inform the other of any inquiries, including, but not limited to those from the press, regarding the activities related to publications, press releases, projects developed under this Agreement. UCS may, upon notice to the Center, require the Center to obtain prior written approval of UCS in connection with any such materials or communications. Upon the receipt of such notice from UCS, the Center shall not thereafter use the name of UCS in any publication or other written material without the prior written approval of UCS. Any publication shall include an acknowledgment of UCS financial support and a statement that the publication does not necessarily reflect UCS’s views.</p>
        <p>12.2 If the activities of the Center hereunder result in publication of original books, manuals films or other materials for which a copyright may be granted, the Center grants UCS a royalty-free, nonexclusive and irrevocable license to reproduce, publish, transmit or otherwise use such materials.</p>
        <p>12.3 The Center is free to copyright original work developed in the course of or under the Agreement. UCS reserves a royalty-free, nonexclusive and irrevocable right to reproduce, publish, or otherwise use, and to authorize others to use, the work for government purposes. Any publication resulting from work performed under this Agreement shall include an acknowledgment of UCS financial support and a statement that the publication does not necessarily reflect UCS’s views.</p>
      </div>
    </div>
  </section>
  <footer class="text-dark">
    <div class="container pt-5 pb-5">
      <div class="aos-item" data-aos="fade-up" data-aos-duration="600" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
          <!--  -->
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
  </footer>
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
