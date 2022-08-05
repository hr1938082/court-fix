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
  <div class="shaded" id="backToTop" onclick="goTop()"><i class="fas fa-angle-up"> </i></div>
  @yield('script')
</body>
<script src="./src/js/jquery.min.js"> </script>
<script src="./src/js/index.js"> </script>
<script src="./src/js/aos.js"> </script>
<script>
  AOS.init({
      easing: 'ease-in-out-sine'
  });
</script>
