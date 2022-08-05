@extends('Users.Layout.main')
@section('title')
    Latest News
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
@section('content')

<section class="no-padding mt-8" id="latest_news_title">
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container container-header">
          <div class="title"><span>Latest News</span></div>
          <div class="subtitle mb-5"><span>Latest News for New York Adult Drug Court</span></div>
          <div id="breadcumb">
            <div class="breadcumb"> 
              <div class="path">
                <p><a href="#">Latest News</a></p>
                <p>/</p>
                <p>Breadcumb Article News Example</p>
                <a class="btn btn-sm btn-primary" href="https://www.nadcp.org/news/" style="color:white;">Vist For More News</a>
              </div>
              <div class="buttons"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>



  <section  id="empty">

      
  <div class="contanier" style="background-color: white;">
    @foreach ($newss as $news)
   
     @php
       
       $news_file_data = storage_path('/app'.'/'.$news->doc_path);
       $isExists = Storage::exists($news->doc_path);
      // dd($isExists);
      $file_data = '';
        //dd($file_data);
     @endphp
       @if($isExists == true)
       @php
           
       
       $file_data = file_get_contents($news_file_data);
       @endphp
     
      
       
       @endif
       <div class="container">
         <center> <h4><b>{{$news->title}}</b></h4> </center>
          <br>
          <h6>{!! $file_data !!}</h6>
          {{-- <h6>{!! $file_data !!}</h6> --}}
        </div>
    
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <hr>
    @endforeach
<br>
  </div>
  </section>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  @endsection