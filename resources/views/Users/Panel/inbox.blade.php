<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./src/img/logo.png">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="./src/css/style.min.css">
    <title>Center for Court Innovation : Chat</title>

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
    margin-top:10px;
  
    overflow: scroll;
    
}

::-webkit-scrollbar {
    display: none;
}

#profile_model
{
  cursor: pointer;
}


#profileee {
  border-radius: 100%;
  width: 200px;
  height: 200px;
  margin: 0 auto;
  position: relative;
  top: -80px;
  margin-bottom: -80px;
  cursor: pointer;
  background: #f4f4f4;
  display: table;
  background-size: cover;
  background-position: center center;
  box-shadow: 0 5px 8px rgba(black, 0.35);
  .dashes {
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 100%;
    width: 100%;
    height: 100%;
    border: 4px dashed #ddd;
    opacity: 1;
  }
  label {
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    padding: 0 30px;
    color: grey;
    opacity: 1;
  }
  &.dragging {
    background-image: none!important;
    .dashes {
      animation-duration: 10s;
      animation-name: spin;
      animation-iteration-count:infinite;
      animation-timing-function: linear;
      opacity: 1!important;
    }
    label {
      opacity: 0.5!important;
    }
  }
  &.hasImage {
    .dashes, label {
      opacity: 0;
      pointer-events: none;
      user-select: none;
    }
  }
}



#profileee .dashes {
    position: absolute;
    top: 0;
    left: 0;
    border-radius: 100%;
    width: 100%;
    height: 100%;
    border: 4px dashed #ddd;
    opacity: 1;
}

#mediaFile {
  position: absolute;
  top: -1000px;
}




</style>
  </head>
</html>

<body class="aos-all " id="transcroller-body">
  <menu class=" container menu" id="home">
    <nav class="undefined main-menu animate__animated animate__bounceInDown " id="menu">
      <label class="show-menu" for="show-menu">
        <div class="topbar"><span class="logo menu-logo mobile-logo dark-logo"><a href="index.html"><img src="./src/img/logo.png" alt="#{logoMenu}"/></a></span>
          <div class="lines"></div>
        </div>
      </label>
      <input id="show-menu" type="checkbox"/>
      <ul id="menu"  > 
      &nbsp&nbsp&nbsp&nbsp&nbsp <li class="undefined logo menu-logo "><img src="./src/img/logo.png" alt="#{logoMenu}" id="centerLogo" style="cursor: pointer"/><img class="logo-small court" src="./src/img/new-york-state-unified-court-system.svg" alt="#{logoMenu}" id="courtLogo" style="cursor: pointer"/></li>
        <div class="undefined menu-links " id="menu_links">
          <!-- <li class="button no-margin"><a class="btn btn-sm btn-" href="#"><i class="fas fa-search"></i></a>
          </li> -->
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/chat"><i class="fab fa-rocketchat"></i></a>
          </li>
          <li class="button no-margin"><a class="btn btn-sm btn-" href="/Calender"><i class="fas fa-calendar-alt"></i></a>
          </li>
          <li><a href="/dashboard">Dashboard</a></li>
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
  <div class="main_content top-fixed full-width">
    <div id="frame" >
     
      <div id="sidepanel" >
        <div id="profile">
          <div class="wrap">
          @if(auth()->user()->Images != null)
          @if(auth()->user()->Images->path != null)
           
        <img class="online" id="profile-img" src="/image/{{auth()->user()->Images->path}}" alt="">
        @else
        <img class="online" id="profile-img" src="{{asset('src/img/users/user-1.png')}}" alt="">
        @endif
        @else
        <img class="online" id="profile-img" src="{{asset('src/img/users/user-1.png')}}" alt="">
        @endif
            <p>{{auth()->user()->name}}</p><i class="fa fa-chevron-down expand-button"></i>
            <div id="status-options">
              <li class="active" id="status-online"><span class="status-circle"></span>
                <p>Online</p>
              </li>
              <li id="status-away"><span class="status-circle">Away</span></li>
              <li id="status-busy"><span class="status-circle">Busy</span></li>
              <li id="status-offline"><span class="status-circle">Offline</span></li>
            </div>
            <div id="expanded">
              <!-- <li><a href=""> <i class="fas fa-gear" aria-hidden="true"></i>
                  <p>Settings </p></a></li> -->
                  <li>
              <a href="#"><i class="fas fa-user" aria-hidden="true"></i>
                  <p><label id="profile_model" for="target-modal">Profile </label></p></a> </li>
              <!-- <li><a href="#" id="invoke"> <i class="fas fa-arrow-right-from-bracket" aria-hidden="true"></i>
                  <p id="invoke">Logout </p></a></li> -->
            </div>
          </div>
        </div>

        <input type="checkbox" id="target-modal">
        <div class="modal">
    <div class="modal-inner">
      <label class="close-modal" for="target-modal"></label>
      <div class="contact" id="contact">
        <form method="post" class="contact-form" action="/Update-Profile" enctype="multipart/form-data" id="contact">
          @csrf
          <h5 class="title" style="color:black;" >Profile Update</h5>
          <p class="description mb-5">Update Your Profile Details</p>
          <p class="description mb-5">Click to browse or drag an image here</p>
          <br>
          <br>
          <br>
         
          @if(auth()->user()->Images != null)
          @if(auth()->user()->Images->path != null)
          <div id="profileee" class="hasImage" style="background-image: url(/image/{{auth()->user()->Images->path}})">
          @else
          <div id="profileee" class="hasImage" >
           @endif
           @else
           <div id="profileee" class="hasImage" >

           @endif
           <div class="dashes"></div>
        
          </div>
       
          <input type="file" name="profile_image" id="mediaFile" />
          <div id="mediaFileError"></div>
          <br>
         
          <Fieldset>
            <input type="text" name="name" value="{{auth()->user()->name}}" id="name" placeholder="Your name" required  autofocus tabindex="1">
          </Fieldset>
          <Fieldset>
            <input type="text" name="jurdiction" value="{{auth()->user()->jurisdiction}}" id="email" required placeholder="Enter Your Jurdiction"  tabindex="2">
          </Fieldset>
          <Fieldset>
            <input type="number" name="phone" id="phone" value="{{auth()->user()->phone_number}}" required placeholder="Enter Your Phone Number"  tabindex="2">
          </Fieldset>
          <!-- <Fieldset>
            <textarea placeholder="Your message" name="message" required tabindex="3"> </textarea>
          </Fieldset> -->
          <div class="button-group d-flex-centered"><button type="submit" class="btn btn-lg btn-primary send_mail" style="padding: 15px 52px;
">Save</button></div>
        </form>
      </div>
    </div>
    <label class="overlay-modal" for="target-modal"></label>
  </div>

       
        <div id="search" >
        
         
          <span class="dropdown"  >
           <label for=""><i class="fas fa-search fa-fw" aria-hidden="true"></i></label>
           <input type="text"  id="dropdownMenu-calendarType" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width:340px;"  placeholder="Search Contacts">
         
         
         
           {{-- <button class="btn btn-default btn-sm dropdown-toggle" id="dropdownMenu-calendarType" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="calendar-icon ic_view_month" id="calendarTypeIcon" style="margin-right: 4px;"></i><span id="calendarTypeName">Dropdown</span><i class="calendar-icon tui-full-calendar-dropdown-arrow"></i></button> --}}
           <ul class="dropdown-menu dropdown-content" id="dropdown" role="menu" aria-labelledby="dropdownMenu-calendarType">
           
            {{-- <div class="blocker" style="border: 3px solid red;" onclick="hidePopup()"></div> --}}
             @php
             $users = App\Models\User::get();
         @endphp
         @foreach ($users as $user)
         @if ($user->id != auth()->id())
         <li role="presentation"><a href="/Conversation/{{$user->id}}/{{$user->name}}" class="dropdown-menu-title" role="menuitem" data-action="toggle-daily"><img src="{{asset('src/img/users/user-6.png')}}" style="width:20px;" > &nbsp; &nbsp; &nbsp;{{$user->name}}</a></li>

         @endif

         @endforeach
         
           
           </ul>
         
          </span>
         
    

    {{-- <div class="contanier" style="border: 3px solid red; background-color:#ccc;" id="data_div" style="display: none;">
    <p>dsadsa</p>
     

    
    </div> --}}

   </div>

   
   <div id="contacts" >

     
   @foreach ($conversations as $conversation)
   @php
      $user_delete_check = App\Models\User::where('id',$conversation->user_id_2)->count();
      
       $user_details = App\Models\User::where('id',$conversation->user_id_2)->first();
       
      
   @endphp
    <ul >
      <a class="contacts-link" href="/Conversation/{{$user_details->id}}/{{$user_details->name}}">
        <li class="contact">
          <div class="wrap">
            <span class="contact-status online">
              </span>
              @if($user_details->Image != null)
             @if($user_details->Image->path != null)
              <img src="{{asset('/image/')}}/{{$user_details->Image->path}}"/>
              @else
              <img src="{{asset('src/img/users/user-6.png')}}"/>
              @endif
              @else
              <img src="{{asset('src/img/users/user-6.png')}}"/>

              @endif
              <div class="meta">
                <p class="name" style="color:white;">{{$user_details->name}}</p>
                <p class="preview" style="color:white;"></p> 
               </div>
             </div>
           </li>
         </a>
       </ul>
    @endforeach
   </div>
  
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
    <script src="./src/js/chat.js"> </script>

<script>

 
    

 
    $(document).ready(function() {
     
     $('#dropdownMenu-calendarType').keyup(function (event) {            
        
       var user = document.getElementById('dropdownMenu-calendarType').value;
    
    console.log(user,{{auth()->id()}});
        var auth_id = {{auth()->id()}};
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
                
          $.ajax({
            url: "/User-Search",
            type:"POST",
            data:{
              name:user,
            
            },
    
                    success: function(response) {
                       console.log(response);
                       var data = response.name;
                       console.log(data.id == auth_id,'such he' , data.id);
                       $("#dropdown").empty();
                       Object.keys(data).forEach(function(key){
                         console.log(data[key].id != auth_id ,'olalalala');
                 if(data[key].id != auth_id){
                  var block = '<li role="presentation"><a href="/Conversation/'+data[key].id+'/'+data[key].name+'" class="dropdown-menu-title" role="menuitem" data-action="toggle-daily"><img src="{{asset("src/img/users/user-6.png")}}" style="width:20px;" > &nbsp; &nbsp; &nbsp;'+data[key].name+'</a></li>';
                    
                  $("#dropdown").append(block);
                 }
 
               
             }); 
 
             if(user == '')
                 {
                   var all_users = response.all_user;
                   $("#dropdown").empty();
                   Object.keys(all_users).forEach(function(key){
                       
                 if(all_users[key].id != auth_id){
                  var block = '<li role="presentation"><a href="/Conversation/'+all_users[key].id+'/'+all_users[key].name+'" class="dropdown-menu-title" role="menuitem" data-action="toggle-daily"><img src="{{asset("src/img/users/user-6.png")}}" style="width:20px;" > &nbsp; &nbsp; &nbsp;'+all_users[key].name+'</a></li>';
                    
                  $("#dropdown").append(block);
                 }
 
               
             }); 
                 }
 
                      
                    }
 
                 
 
 
                });
 
 
     });
 
 
 
 
         });
 
 



                 // ----- On render -----
        $(function() {

$('#profileee').addClass('dragging').removeClass('dragging');
});

$('#profileee').on('dragover', function() {
$('#profileee').addClass('dragging')
}).on('dragleave', function() {
$('#profileee').removeClass('dragging')
}).on('drop', function(e) {
$('#profileee').removeClass('dragging hasImage');

if (e.originalEvent) {
  var file = e.originalEvent.dataTransfer.files[0];
  console.log(file);

  var reader = new FileReader();

  //attach event handlers here...

  reader.readAsDataURL(file);
  reader.onload = function(e) {
    console.log(reader.result);
    $('#profileee').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');

  }

}
})
$('#profileee').on('click', function(e) {
console.log('clicked')
$('#mediaFile').click();
});
window.addEventListener("dragover", function(e) {
e = e || event;
e.preventDefault();
}, false);
window.addEventListener("drop", function(e) {
e = e || event;
e.preventDefault();
}, false);
$('#mediaFile').change(function(e) {

var input = e.target;
if (input.files && input.files[0]) {
  var file = input.files[0];
  var size_limit = 2000000;
  var error = $('#mediaFileError');
  if (file.size > size_limit) {
    error.css('color','red');
    error.html('Image Size should be less than 2MB');
  }else{
    
    error.css('color','transparent');
    error.html('');
    var reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = function(e) { 
      $('#profileee').css('background-image', 'url(' + reader.result + ')').addClass('hasImage');
    }
  }

}
})



 
 </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.3.0/socket.io.js" integrity="sha512-g6IDmcVyjQOptVso4kf6adJ5TOfiAznQLg47qiscWvor/cMHje2RCh2tU39DB4udBIm5ZhL4CPcvVDHEzo0HgA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript"> 
        console.log('ssssssssssss');
        console.log( {{ auth()->id()}} , 'auth');
        const socket = io("wss://chat.zeelco.com",{transports: ['websocket', 'polling'], upgrade: false, 
            query: {
              "Student_id": 87 , 
              "type":"Student"
            }});
            socket.on('reload',()=>{
            socket.emit("get_chat_list")
        });
        socket.emit("get_chat_list")
       
            socket.on("chat_list",(list)=>{
              
        console.log(list,'dsadhaskdhskadhksj')
        $('#contacts').empty();
                list.forEach(element => {
                    var time = new Date(element.last_m);
                    var orignal_time = time.toLocaleTimeString();
                  //  console.log(orignal_time);
                    var name_slug =element.Name.replace(/\s/g, '-');
                   var block = '<li class="contacts-item archived"><a class="contacts-link" href="/Student/Conversation/'+element.userid+'/'+name_slug+'"><div class="avatar"><img src="{{asset('/public/profile_img')}}//'+element.Image+'" alt=""></div><div class="contacts-content"><div class="contacts-info"><h6 class="chat-name">'+element.Name+'</h6><div class="chat-time"><span>'+orignal_time+' </span></div></div><div class="contacts-texts"><p class="text-truncate">'+element.last_message+'</p></div> </div></a></li>'

                   var block2 = '<ul><a class="contacts-link" href="/Conversation/'+element.userid+'/'+name_slug+'"> <li class="contact"><div class="wrap"><span class="contact-status online"></span><img src="src/img/users/user-6.png"/><div class="meta"><p class="name" style="color:white;">'+element.Name+'</p><p class="preview" style="color:white;">'+element.last_message+'</p> </div></div></li></a></ul>'
                     
                $("#contacts").append(block2);
           
        });
        
        });
         
          
        </script> --}}



