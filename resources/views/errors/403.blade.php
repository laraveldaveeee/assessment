<!DOCTYPE html>
<html class="no-js" lang="">
<head>
  <meta charset="utf-8">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Unauthorized</title>
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

  <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="{{ asset('css/mains.css') }}">
  <script src="{{ asset('styles/js/modernizr.js') }}"></script>
</head>
<body>
      <div class="page_overlay unauthorized">
        <div class="loader-inner ball-pulse">
          <div></div>
          <div></div>
          <div></div>
        </div>
      </div>
      <div class="cloudWrapper">        
        <div class="cloud cloud-1"><img src="{{ asset('img/cloud-1.png') }}" alt=""></div>
        <div class="cloud cloud-2"><img src="{{ asset('img/cloud-2.png') }}" alt=""></div>
        <div class="cloud cloud-3"><img src="{{ asset('img/cloud-3.png') }}" alt=""></div>
        <div class="cloud cloud-4"><img src="{{ asset('img/cloud-4.png') }}" alt=""></div>
      </div>
      <div class="unauthorized-wrap">
        <div class="scene-unauth">
        </div>
        <div class="row-flex">
          <div class="messge-unathorized">
            <h1 style="font-family:Comic Sans Ms;">Unauthorized!  <br>404 Not Found <br> NTC R3</h1>
            </div>
          </div>
          
       </div>

      <div class="charecter-6">
           <img src="{{ asset('img/charecter-6.png') }}" alt="">
           <span class="eye-6"><img src="{{ asset('img/eye-6.gif') }}" alt=""></span>
           <span class="hand-6">
             <img src="{{ asset('img/hand-6.png') }}" alt="">
           </span>
         </div>


       <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
          function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
      </script>

      <script src="{{ asset('js/vendor.js') }}"></script>
      <script src="{{ asset('js/plugins.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>
    </body>
    </html>
