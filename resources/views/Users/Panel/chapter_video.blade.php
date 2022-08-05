@extends('Users.Layout.chapter_layout')
@section('title')
   Chapters
@endsection
<style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: 0.3s;
      width: 80%;
    }
    
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }
    
    .container {
      padding: 2px 16px;
    }
    </style>
    
    <div class="sidebar active" id="sidenav">
      <div class="logo_content">
        <div class="logo">
          <div class="logo_name">Menu</div>
        </div><i class="fas fa-bars" id="btn"></i>
      </div>
      <ul class="nav_list">
        <li><a class="active" href="/dashboard"><i class="fas fa-gauge"></i><span class="links_name">Dashboard</span></a><span class="tooltip">Dashboard</span></li>

            @foreach ($all_chapters as $all_chapter)
            <li><a href="/Chapter-Video/{{$course_id}}/{{$all_chapter->id}}"><i class="fas fa-gauge"></i><span class="links_name">{{$all_chapter->title}}</span></a><span class="tooltip">{{$all_chapter->title}}</span></li>
    
          @endforeach
      
          
      </ul>
    </div>
@section('content')
@if($chapter_detail != '')
<section class="no-padding mt-8" id="latest_news_title">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container container-header">
          <div class="title"><span>{{$chapter_detail->title}}</span></div>
          {{-- <div class="subtitle mb-5"><span>Latest News for New York Adult Drug Court</span></div> --}}
          <div id="breadcumb">
            <video controls autoplay style="width:80%;">
              <source  src="/video/{{$chapter_detail->video_path ?? null}}" type="video/mp4">
             
             
            </video>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif



  <section  id="empty">

      
  <div class="contanier" style="background-color: white;">
  
<br>
  </div>
  </section>
  @endsection