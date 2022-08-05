<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png">

    <link rel="stylesheet" href="./src/css/style.min.css">
    <title>Center for Court Innovation : @yield('title')</title>
    <style>
.dropdown .dropdown-content {
    display: none;
    position: absolute;
    background-color: #fff;
    min-width: 334px;
    height: 400px;
    box-shadow: 0 8px 16px 0 rgb(0 0 0 / 20%);
    border-radius: 0.75em;
    z-index: 1;
    right: 0;
    margin-top:-4px;

    overflow: scroll;

}

#dropdownMenu-calendarType {
    padding: 10px 0 10px 46px;
    width: 90%;
    border: 1px solid black;
     margin-left:10px;

}


::-webkit-scrollbar {
    display: none;
}

.btn.btn-sm {
    font-size: .9rem;
    padding: 1.65em 2em;
}

    </style>
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
     &nbsp&nbsp&nbsp&nbsp&nbsp <li class="undefined logo menu-logo "><img src="./src/img/logo.png" alt="#{logoMenu}" id="centerLogo" style="cursor: pointer"/><img class="logo-small court" src="./src/img/new-york-state-unified-court-system.svg" alt="#{logoMenu}" id="courtLogo" style="cursor: pointer"/></li>
      <div class="undefined menu-links " id="menu_links">
        <div class="dropdown">
          @php
          $courses = App\Models\Course::with('images')->get();
          @endphp
          <li class="button no-margin" ><a class="btn btn-sm btn-" href="#"><i class="fas fa-search"></i></a>
          </li>

            <div id="myDropdown" class="dropdown-content">
              <br>
            <input type="text" onkeyup="search_page_keyword(event)" id="dropdownMenu-calendarType" placeholder="Search.."  >
            <div id="for_append">
                 @foreach($courses as $course)
                  <a href="{{$course->link}}">{{$course->title}}</a>
                @endforeach
</div>
             </div>
        </div>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/chat"><i class="fab fa-rocketchat"></i></a>
          </li>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/Calender"><i class="fas fa-calendar-alt"></i></a>
          </li>
          <li><a href="#" id="invoke">Logout</a></li>

      </div>
      </ul>
    </nav>
  </menu>
  <div class="logobox" id="courtModal"><span class="closeLogobox" id="closeCourt">&times;</span><img class="logobox-content" id="img01"/></div>
  <div class="logobox" id="centerModal"><span class="closeLogobox" id="closeCenter">&times;</span><img class="logobox-content" id="img02"/></div>
  <div class="dialog">
    <dialog>
      <form method="dialog"><i class="cancel fa-solid fa-xmark"></i><strong>Confirm Action</strong>
        <p>Are you sure you want to Logout Account?</p>
        <menu class="mt-4"><small><i class="fa-solid fa-keyboard"></i><span>esc</span></small><a class="btn btn-default close" href="#">Close</a><a class="btn btn-primary" href="{{ route('logout') }}">Yes</a></menu>
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
        <li><a class="@if ($page === 'dashboard') active @endif" href="/dashboard"><i class="fas fa-gauge"></i><span class="links_name">Dashboard</span></a><span class="tooltip">Dashboard</span></li>
        <li><a class="@if ($page === 'mycourses') active @endif" href="/My-Courses"><i class="fas fa-laptop-file"></i><span class="links_name">My Courses</span></a><span class="tooltip">My Courses</span></li>
        <li><a class="@if ($page === 'roles') active @endif" href="/Roles"><i class="fas fa-user"></i><span class="links_name">Team Member Roles</span></a><span class="tooltip">Team Member Roles</span></li>
        <li><a class="@if ($page === 'keypractices') active @endif" href="/Key-Practices"><i class="fas fa-user"></i><span class="links_name">Key Practices</span></a><span class="tooltip">Key Practices</span></li>
        <li><a class="@if ($page === 'latestnews') active @endif" href="/Latest-News"><i class="fas fa-user"></i><span class="links_name">Latest News</span></a><span class="tooltip">Latest News</span></li>
        <li><a class="@if ($page === 'glossary') active @endif" href="/Glossary"><i class="fas fa-laptop-file"></i><span class="links_name">Glossary</span></a><span class="tooltip">Glossary</span></li>
        <li><a class="@if ($page === 'calander') active @endif" href="/Calender"><i class="fas fa-calendar"></i><span class="links_name">Calendar</span></a><span class="tooltip">Calendar</span></li>


    </ul>
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
<script src="./src/js/jquery.min.js"> </script>
<script src="./src/js/index.js"> </script>
<script src="./src/js/aos.js"> </script>
<script type="module" src="./src/js/core.js"> </script>
<link rel="modulepreload" href="./src/js/swiper.bundle.min.js">

<script src="https://unpkg.com/lunr/lunr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.4.0/jquery.quicksearch.js"></script>
<script>
  jQuery(document).ready(function(){
      toastMessage()
  });
</script>
<script>
  AOS.init({
      easing: 'ease-in-out-sine'
  });



  $(document).ready(function() {



    $('#dropdownMenu-calendarType').keyup(function (event) {


      const box = document.getElementById('for_append');
      console.log(box.childNodes.length);
          if(box.childNodes.length == 0)
         {
          const box2 = document.getElementById('myDropdown');
          box2.style.height="100px";
         }
         else{
          const box2 = document.getElementById('myDropdown');
          box2.style.height="400px";
         }

      var course = document.getElementById('dropdownMenu-calendarType').value;


       var auth_id = {{auth()->id()}};
     $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
         });

         $.ajax({
           url: "/Cousrse_Search",
           type:"POST",
           data:{
             name:course,

           },

                   success: function(response) {
                   //   console.log(response,'ye raha response');
                      var data = response.courses;
                     // console.log(data, 'ye raha data');
                      $("#for_append").empty();
                      Object.keys(data).forEach(function(key){
                       // console.log(data[key].id != auth_id ,'olalalala');

                 var block = '  <a href="'+data[key].link+'">'+data[key].title+'</a>';

                 $("#for_append").append(block);



            });


                   }




               });


    });




        });



  function search_page_keyword(e)
  {
    if(e.keyCode == 13){
   console.log('ss');
    var idx = lunr(function () {
  this.field('title')
  this.field('body')

  this.add({
    "title": "Dashboard",
    "body": "Basics of Pharmacology in Drug Treatment",
    // "author": "William Shakespeare",
    // "id": "1"
  })
});
console.log(idx.fields[0]);
//idx.search("love")
console.log(idx.search("Pharmacology"));




}





// $('#dropdownMenu-calendarType').quicksearch(document, {
// 	'delay': 100,
// 	'bind': 'keyup keydown',

//   'show': function () {
// 		$(this).addClass('show');
// 	},
// 	'onAfter': function () {
//     if(e.keyCode == 13){
// 		console.log('on after',e.keyCode);
//    var search_val = document.getElementById('dropdownMenu-calendarType').value;

//     window.find(search_val);

//    }

// 	},

// 	'hide': function () {
// 		$(this).removeClass('show');
// 	},
// 	'prepareQuery': function (val) {
// 		return new RegExp(val, "i");
// 	},
// 	'testQuery': function (query, txt, _row) {
// 		return query.test(txt);
// 	}
// });


  }


  $('#dropdownMenu-calendarType').quicksearch('table tbody tr', {

 'delay': 400,
 //'bind': 'keyup keydown',
 'show': function() {
     if ($('#dropdownMenu-calendarType').val() === '') {
         return;
     }
     $(this).addClass('show');
 },
 'onAfter': function() {

  $(document).keypress(function(e){
    if (e.which == 13){
      if ($('#dropdownMenu-calendarType').val() === '') {
         return;
     }
     if ($('#dropdownMenu-calendarType').length > 0){

       var search_val = document.getElementById('dropdownMenu-calendarType').value;

  window.find(search_val);


     }
    }
});

 },
 'hide': function() {
     $(this).removeClass('show');
 },
 'prepareQuery': function(val) {
     return new RegExp(val, "i");
 },
 'testQuery': function(query, txt, _row) {
     return query.test(txt);
 }

});

$('#dropdownMenu-calendarType').focus();

</script>
