<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    {{-- <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" /> --}}
    {{-- <meta name="author" content="potenzaglobalsolutions.com" /> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title></title>
    <!-- Font -->
   @vite([
    'resources/sass/app.scss',
    'resources/js/app.js',
    'resources/css/app.css',
],)
 

</head>

<body>

  <div>
    
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <img style="width:45px;" class="img_back" class="w-30" src="{{asset("attachments/system/policelo.png")}}" />
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class=" me-auto mb-2 mb-lg-0">
   
        </div>
        <ul class="navbar-nav">
        <li class="nav-item">  <a class="me-3" title="" href="{{route('login.show','offense')}}">
            user 
          </a>
        </li>
        <li class="nav-item">
          <a class="me-3" title="" href="{{route('login.show','police')}}">
              police
          </a>
        </li>
        <li class="nav-item">
          <a class="me-3" title="" href="{{route('login.show','admin')}}">
             admin 
          </a>
        </li>
        <li class="nav-item">
          <a class="me-3" title="" href="">
            About 
         </a>
        </li>
        <li class="nav-item">
         <a class="me-3" title="" href="">
          Contact 
       </a>
      </li>
        </ul>
      </div>
    </div>
  </nav>
  <!---img--->
   <div class="back_img">
    <img src="{{asset("attachments/police.jpg")}}" />
  </div>
  <!----img--->
  <!---start about--->
    <div class="mb-5">
      @include('About')
    </div>
  <!---end about--->
  <!---start contact--->
     <div class="p-3" style="background-color:#e9ecef57;">
         @include('Contact')
     </div>
  <!---end contact--->
  <div class="p-3" style="background-color:;">
    @include('Footer')
</div>
  </div>
</body>

</html>
