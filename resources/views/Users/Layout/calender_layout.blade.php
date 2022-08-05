<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png">
    <link rel="stylesheet" href="./src/css/style.min.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css">
    <link rel="stylesheet" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Center for Court Innovation : Calendar</title>
  </head>
</html>
<body class="aos-all" id="transcroller-body">
  <menu class="fixed container menu" id="home">
    <nav class="sidenav-active main-menu animate__animated animate__bounceInDown " id="menu">
      <label class="show-menu" for="show-menu">
        <div class="topbar"><span class="logo menu-logo mobile-logo dark-logo"><a href="/dashboard"><img src="./src/img/logo.png" alt="#{logoMenu}"/></a></span>
          <div class="lines"></div>
        </div>
      </label>
      <input id="show-menu" type="checkbox"/>
      <ul id="menu">
        <li class="undefined logo menu-logo "><a href="/dashboard"><img src="./src/img/logo.png" alt="#{logoMenu}"/><img class="logo-small court" src="./src/img/new-york-state-unified-court-system.svg" alt="#{logoMenu}"/></a></li>
        <div class="undefined menu-links " id="menu_links">
          <li class="button no-margin">
            <!-- <div class="Hotbg">
              <input class="Hotbg-txt" placeholder="Search..."/><a class="Hotbg-btn" href="#"> <i class="fas fa-search"></i></a>
            </div> -->
          </li>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/chat"><i class="fab fa-rocketchat"></i></a>
          </li>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/Calender"><i class="fas fa-calendar-alt"></i></a>
          </li>
          <li><a href="#" id="invoke">Logout</a></li>
        </div>
      </ul>
    </nav>
  </menu>
  <div class="dialog">
    <dialog>
      <form method="dialog"><i class="cancel fa-solid fa-xmark"></i><strong>Confirm Action</strong>
        <p>Are you sure you want to Logout Account?</p>
        <menu class="mt-4"><small><i class="fa-solid fa-keyboard"></i><span>esc</span></small><a class="btn btn-default close" href="#">Close</a><a class="btn btn-primary" href="index.html">Yes</a></menu>
      </form>
    </dialog>
  </div>
  <div class="sidebar active" id="sidenav">
    <div class="logo_content">
      <div class="logo">
        <div class="logo_name">Menu</div>
      </div><i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav_list">
        <li><a  href="/dashboard"><i class="fas fa-gauge"></i><span class="links_name">Dashboard</span></a><span class="tooltip">Dashboard</span></li>
        <li><a href="/My-Courses"><i class="fas fa-laptop-file"></i><span class="links_name">My Courses</span></a><span class="tooltip">My Courses</span></li>
        <li><a href="/Roles"><i class="fas fa-user"></i><span class="links_name">Team Member Roles</span></a><span class="tooltip">Team Member Roles</span></li>
        <li><a href="/Key-Practices"><i class="fas fa-user"></i><span class="links_name">Key Practices</span></a><span class="tooltip">Key Practices</span></li>
        <li><a href="/Latest-News"><i class="fas fa-user"></i><span class="links_name">Latest News</span></a><span class="tooltip">Latest News</span></li>
        <li><a href="/Glossary"><i class="fas fa-laptop-file"></i><span class="links_name">Glossary</span></a><span class="tooltip">Glossary</span></li>
        <li><a  class="active" href="/Calender"><i class="fas fa-calendar"></i><span class="links_name">Calendar</span></a><span class="tooltip">Calendar</span></li>
    </ul>
  </div>
  @yield('content');

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"> </script>
<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"> </script>
<script src="https://uicdn.toast.com/tui.time-picker/v2.0.3/tui-time-picker.min.js"> </script>
<script src="https://uicdn.toast.com/tui.date-picker/v4.0.3/tui-date-picker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/chance/1.0.13/chance.min.js"> </script>
<script src="./src/js/tui-calendar.js"></script>
<script src="./src/js/data/calendars.js"></script>
<script src="./src/js/data/schedules.js"></script>
<script src="./src/js/app.js"></script>
<script src="./src/js/jquery.min.js"> </script>
<script src="./src/js/index.js"> </script>
<script src="./src/js/aos.js"> </script>
<script>
  jQuery(document).ready(function(){
      toastMessage()
  });
</script>
</body>
</html>
