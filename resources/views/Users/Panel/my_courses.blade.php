@extends('Users.Layout.main')
@section('title')
   My Courses
@endsection
@section('page')
    @php
        $page = 'mycourses'
    @endphp
@endsection
@section('content')
<section class="lg-padding" id="gallery">
    <div class="container">
      <div class="container-header mb-5">
        <div class="title"><span> My Courses</span></div>
        <div class="subtitle"> <span style="font-size:20px;">This section is automatically created for all courses currently offered to New
York State Adult Drug Treatment Court practitioners. Users have access to all
the courses on this page.
</span><br><br>
<span style="font-size:20px;"><b>NOTE:</b> It is recommended that all learners start with the Welcome to Fountain
Course.</span>
</div>
      </div>
    </div>
    <div class="container">
      <div class="gallery-image">
        @foreach ($courses as $course)
   
    
        
        
       
                    <div class="card card_course" style="width:500px;"><img src="/image/{{$course->images->path}}">
                    <a href="{{$course->link}}" target="blank">
                      <div class="card_content">
                        <p style=" text-align: center ; padding: 40px 0; padding-left:15px;">{{$course->title}}</p>
                        <!-- <p class="opacity-low">{{$course->sub_title}}</p><a class="btn btn-xs btn-primary" href="#">{{$course->code}}</a> -->
                      </div>
                      </a>
                    </div>

                   
          
    
        @endforeach
        {{-- <div class="img-box"><img src="https://picsum.photos/350/250?image=232"/>
          <div class="caption-visible">
            <p>CPS21192S7</p>
            <p class="opacity-low">Process Protocol</p><a class="btn btn-xs btn-primary" href="#">In Progress </a>
          </div>
          <div class="transparent-box">
            <div class="caption">
              <p>Sample 2</p>
              <p class="opacity-low">Subtitle Protocol</p>
            </div>
          </div>
        </div>
        <div class="img-box"><img src="https://picsum.photos/350/250?image=431"/>
          <div class="caption-visible">
            <p>NPS21192S6</p>
            <p class="opacity-low">Process Protocol</p><a class="btn btn-xs btn-primary" href="#">In Progress </a>
          </div>
          <div class="transparent-box">
            <div class="caption">
              <p>Title 3</p>
              <p class="opacity-low">Subtitle Name</p>
            </div>
          </div>
        </div>
        <div class="img-box"><img src="https://picsum.photos/350/250?image=532"/>
          <div class="caption-visible">
            <p>MPS21192S4</p>
            <p class="opacity-low">Process Protocol</p><a class="btn btn-xs btn-primary" href="#">In Progress </a>
          </div>
          <div class="transparent-box">
            <div class="caption">
              <p>Title Sample</p>
              <p class="opacity-low">Subtitle Sample Content</p>
            </div>
          </div>
        </div>
        <div class="img-box"><img src="https://picsum.photos/350/250?image=436"/>
          <div class="caption-visible">
            <p>CPS21192S7</p>
            <p class="opacity-low">Process Protocol</p><a class="btn btn-xs btn-primary" href="#">In Progress </a>
          </div>
          <div class="transparent-box">
            <div class="caption">
              <p>Sample 2</p>
              <p class="opacity-low">Subtitle Protocol</p>
            </div>
          </div>
        </div>
        <div class="img-box"><img src="https://picsum.photos/350/250?image=237"/>
          <div class="caption-visible">
            <p>NPS21192S6</p>
            <p class="opacity-low">Process Protocol</p><a class="btn btn-xs btn-primary" href="#">In Progress </a>
          </div>
          <div class="transparent-box">
            <div class="caption">
              <p>Title 3</p>
              <p class="opacity-low">Subtitle Name</p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
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

  @endsection
