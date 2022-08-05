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
@section('page')
    @php
        $page = 'latestnews'
    @endphp
@endsection
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
                <p>Stay up to date on the latest news, events, and continuing education opportunities for Adult Drug Treatment Courts</p>
                {{-- <a class="btn btn-sm btn-primary" href="https://www.nadcp.org/news/" style="color:white;">Vist For More News</a> --}}
              </div>
              <div class="buttons"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="d-flex f-grow lg-padding bg-gray" id="latest_news">
    <div class="split">
      <div class="content d-flex-centered"> <a href="https://www.nadcp.org/news/" target="_blank"> <img src="src/img/NADCP_300.png" alt="NADCP - National Association of Drug Court Professionals"></a></div>
      <div class="content d-flex-centered"> <a href="https://nyatcp.org/" target="_blank"> <img src="src/img/NYADTCP-logo.png" alt="NYATCP - New York Association of Treatment Court Professionals"></a></div>
    </div>
  </section>
  <br>

  <br>
  @endsection
