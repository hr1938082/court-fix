


jQuery(document).ready(function(){
  // if ($("#button").length > 0){
  //   // When the button is clicked make the lightbox fade in in the span of 1 second, hide itself and start the video
  //   $("#button").on("click", function() {
  //     $("#lightbox").fadeIn(1000);
  //     $(this).hide();
  //     var videoURL = $('#video').prop('src');
  //     videoURL += "?autoplay=1";
  //     $('#video').prop('src',videoURL);
  //   });
    
  //   // When the close button is clicked make the lightbox fade out in the span of 0.5 seconds and show the play button
  //   $("#close-btn").on("click", function() {
  //     $("#lightbox").fadeOut(500);
  //     $("#button").show(250);
  //   });
  // }
  // end ready script
});

///////
// video lightbox script
if ($("#button").length > 0){
  const videoButton  = document.querySelectorAll(".button-video-lightbox")
  const videoLightbox  = document.querySelectorAll(".video-lightbox-section")
  const sidenav  = document.querySelector("#sidenav")
  window.onload = ()=>{
    for (let i = 0; i < videoButton.length; i++) {
        // totalImg.textContent = gallery.length; //passing total img length to totalImg variable
        let newIndex = i; //passing i value to newIndex variable
        let clickedImgIndex; //creating new variable
        let lightbox = videoLightbox[i].nextElementSibling;
        let closeButton = lightbox.querySelector("#close-btn")
        console.log()
        // play button clicked
        videoButton[i].onclick = () => {
          clickedImgIndex = i;
          lightbox.style.display = "block";
          sidenav.style.display = "none";
          video[i].play()
        }
        // close button clicked
        closeButton.onclick = () => {
          lightbox.style.display = "none";
          video[i].pause()
          video[i].currentTime = 0
          sidenav.style.display = "block";
        };
    }
  }
}
///////


let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
let menu = document.querySelector(".main-menu");
let searchBtn = document.querySelector(".bx-search");

sidebarToggle = () => {
  sidebar.classList.toggle("active");
  menu.classList.toggle("sidenav-active");
}
if ($("#btn").length > 0){
  btn.addEventListener('click',sidebarToggle,false);
}


var backButton = document.getElementById("backToTop");

function getDocHeight() {
    var D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    );
}

// jQuery(window).scroll(function() {
//   media = window.innerWidth
//   if (media > 1024){
//     if(jQuery(window).scrollTop() + jQuery(window).height() == getDocHeight()) {
//         backButton.style.bottom = '13rem';
//       } else {
//         backButton.style.bottom = '2.5rem';
//     }
//   }
// });
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function() {scrollFunction()};
  
  function scrollFunction() {
    if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450) {
      backButton.style.display = "block";
      setTimeout(function() {
          backButton.style.opacity = 1;
      },300)
    } else {
      backButton.style.opacity = 0;
      backButton.style.display = "none";
    }
  }
  
  function goTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  

// gallery preview image
// 
if ($('.preview-box').length > 0) {
  //getting all required elements
  const gallery  = document.querySelectorAll(".image"),
  previewBox = document.querySelector(".preview-box"),
  previewContent = previewBox.querySelector(".slide-content"),
  previewImg = previewBox.querySelector("img"),
  closeIcon = previewBox.querySelector(".icon"),
  currentImg = previewBox.querySelector(".current-img"),
  totalImg = previewBox.querySelector(".total-img"),
  textSlide = previewBox.querySelector(".text-slide"),
  captionSlide = previewBox.querySelector(".caption-slide"),
  shadow = document.querySelector(".shadow");
  
  window.onload = ()=>{
      for (let i = 0; i < gallery.length; i++) {
          // totalImg.textContent = gallery.length; //passing total img length to totalImg variable
          let newIndex = i; //passing i value to newIndex variable
          let clickedImgIndex; //creating new variable
          
          gallery[i].onclick = () =>{
              clickedImgIndex = i; //passing cliked image index to created variable (clickedImgIndex)
              function preview(){
                // currentImg.textContent = newIndex + 1; //passing current img index to currentImg varible with adding +1
                let imageURL = gallery[newIndex].querySelector("img").src; //getting user clicked img url
                let slideContent = gallery[newIndex].querySelector(".slide-content"); //getting user clicked img url
                let caption = slideContent.querySelector("h5").textContent
                let textDetail = slideContent.querySelector("p").textContent
                currentImg.textContent = caption
                // captionSlide.textContent = caption
                textSlide.textContent = textDetail
                previewImg.src = imageURL //passing user clicked img url in previewImg src
              }
              preview(); //calling above function
      
              const prevBtn = document.querySelector(".prev");
              const nextBtn = document.querySelector(".next");
              if(newIndex == 0){ //if index value is equal to 0 then hide prevBtn
                  prevBtn.style.display = "none"; 
              }
              if(newIndex >= gallery.length - 1){ //if index value is greater and equal to gallery length by -1 then hide nextBtn
                  nextBtn.style.display = "none"; 
              }
              prevBtn.onclick = ()=>{ 
                  newIndex--; //decrement index
                  if(newIndex == 0){
                      preview(); 
                      prevBtn.style.display = "none"; 
                  }else{
                      preview();
                      nextBtn.style.display = "block";
                  } 
              }
              nextBtn.onclick = ()=>{ 
                  newIndex++; //increment index
                  if(newIndex >= gallery.length - 1){
                      preview(); 
                      nextBtn.style.display = "none";
                  }else{
                      preview(); 
                      prevBtn.style.display = "block";
                  }
              }
              document.querySelector("body").style.overflow = "hidden";
              previewBox.classList.add("show"); 
              shadow.style.display = "block"; 
              closeIcon.onclick = ()=>{
                  newIndex = clickedImgIndex; //assigning user first clicked img index to newIndex
                  prevBtn.style.display = "block"; 
                  nextBtn.style.display = "block";
                  previewBox.classList.remove("show");
                  shadow.style.display = "none";
                  document.querySelector("body").style.overflow = "scroll";
              }
          }
          
      }
      
  }

}

          
toastMessage = () => {
  var x = document.getElementById("toast");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

if ($('.dialog').length > 0){
  const dialog = document.querySelector('dialog'),
    invoke = document.getElementById('invoke'),
    output = document.querySelector('output'),
    cancel = dialog.querySelector('.cancel');
    close = dialog.querySelector('.close');
  
  if (typeof dialog.showModal !== 'function') {
    output.value = `Modal dialog not supported`;
  }
  
  invoke.addEventListener('click', () => {
    dialog.returnValue = false;
    dialog.showModal();
  });
  
  dialog.addEventListener('close', () => {
    dialog.returnValue = dialog.returnValue.toLowerCase() === 'true';
    output.value = dialog.returnValue;
  });
  
  close.addEventListener('click', () => {
    dialog.close(false);
  });
  
  
  cancel.addEventListener('click', () => {
    dialog.close(false);
  });
  
  dialog.addEventListener('click', (e) => {
    const rect = dialog.getBoundingClientRect();
  
    const inDialog =
      rect.top <= e.clientY &&
      e.clientY <= rect.top + rect.height &&
      rect.left <= e.clientX &&
      e.clientX <= rect.left + rect.width;
  
    !inDialog && dialog.close();
  });
}



// play video functions
if ($('.button-play').length > 0){

  window.onload = ()=>{
    const videoButton  = document.querySelectorAll(".button-play")
    
    for (let i = 0; i < videoButton.length; i++) {
      // totalImg.textContent = gallery.length; //passing total img length to totalImg variable
      let newIndex = i; //passing i value to newIndex variable
      let clickedImgIndex; //creating new variable
      
        videoButton[i].onclick = () =>{
          // console.log(videoButton[i].nextElementSibling)
          let video = videoButton[i].nextElementSibling;
          video.play()
          videoButton[i].style.display = 'none';
        }
    }
  }
  
  // var playVideo = (e)=>{
  //   const videoButton  = document.querySelectorAll(".button-video-lightbox")
  //   // let id = e.target.parentNode.id
  //   // let button = document.getElementById(id);
  //   // let video = e.target.parentNode.nextElementSibling.id;
  //   // let audioBtn = document.getElementById('bt_mute');
  //   button.style.display = 'none';
  
  //   // audioBtn.style.opacity = 1;
  //   document.getElementById(video).play();
  // }
  
  const spokeVideo = document.getElementById('spokeVideo');
  var muteVideo = () => {
  spokeVideo.muted == true ? mute() : unmute();
  }
  
  let mute = () => {
  audioBtn = document.getElementById('audioBtn');
  audioBtn.classList.remove('fa-volume-mute')
  audioBtn.classList.add('fa-volume-up')
  spokeVideo.muted = false
  }
  let unmute = () => {
  audioBtn = document.getElementById('audioBtn');
  audioBtn.classList.add('fa-volume-mute')
  audioBtn.classList.remove('fa-volume-up')
  spokeVideo.muted = true
  }

}  




TitleCase = (str) => {
    return str.replace(
      /\w\S*/g,
      function(txt) {
        return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
      }
    );
  }



