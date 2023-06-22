<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
<link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
   
<!-- google font poppins -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
  href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;200;300;400;500;600;700&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
  rel="stylesheet"
/>
<script src="jquery-3.6.4.min.js"></script>

<!-- Links Bootstrap 5 -->
<link
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
  rel="stylesheet"
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
  crossorigin="anonymous"
/>


<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"
></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>


<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
/>

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Link Awesome icons -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
/>

<!-- Link remix icon -->
<link
  href="https://cdn.jsdelivr.net/npm/remixicon@3.0.0/fonts/remixicon.css"
  rel="stylesheet"
/>

<!-- Link css -->
<link rel="stylesheet" href="{{asset('assets-app/css/style.css')}}"/>


<link rel="stylesheet" href="{{asset('Project_description/css/style.css')}}">







    <!-- include summernote css/js-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

  <!-- END------------------------------->
<!-- datebiker -->
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
/>

<!-- end date pker -->
  

  <!-- for  create project------------------------------->
    <title>{{ config('app.name', 'Laravel') }}</title>
    
</head>
<body>
   <!-------------------------------------------------Navbar Starts---------------------------------------------------->
  
      <!-- sub_menu_wrap -->
      @if(Auth::check())
      <header id="header_navbar" class="position-relative">
      <div
        class="bx bx-menu"
        id="menu-icon"
        style="color: black; font-size: 28px; margin-right: 40px"
      ></div>

      <div class="left-col d-flex align-items-center me-2">
        <a href="{{route('index')}}" class="logo">
          <img src="{{asset('assets-app/images/logo.png')}}" alt="" />
        </a>

        <div class="navbar">
          <div><a href="{{route('user.create')}}" class="active">LANCER UN PROJET</a></div>
          <div><a href="#">PROJET EN COURS</a></div>
        </div>
      </div>

      <div class="main">
        <div class="container_search">
          <form action="{{route('discover')}}" method="Get">
            <div class="input-field second">
              <div class="input-container">
                <input
                  id="myInput"
                  type="search"
                  placeholder="RECHERCHER UN PROJET"
                />

                <div
                  id="search_project"
                  class="search_project d-flex align-items-center"
                >
                  <i id="icon_search" class="ri-search-line"></i>
                  <div id="text_search" class="text_search d-none d-md-block">
                    RECHERCHER UN PROJET
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div
          style="border-left: 1px solid black; height: 20px; margin-right: 20px"
        ></div>

        <div class="container-user-auth">
          <a href="#" class="user-info" onclick="toggleMenu()">
            <div class="content_all">
              <div class="content">
                <img src="{{asset('assets-app/images/user.png')}}" alt="" />
              </div>
              <div>
                <p>{{Auth::user()->username}}</p>
              </div>
            </div>
          </a>
        </div>
        <!-- <div class="container-user">
          <a href="#" onclick="toggleMenu()">
            <i class="ri-user-line"><span>Prénom</span></i>
          </a>
        </div> -->
      </div>

      <!-- sub_menu_wrap -->
      <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="{{asset('dist/img/'.Auth::user()->picture)}}" alt="" />
            <h3>{{Auth::user()->username}}</h3>
          </div>
          <hr />
          <!-- <a href="" class="sub-menu-link">
            <img src="{{asset('assets-app/images/profile.png')}}" />
            <p>Mon Profile</p>
            <span>></span>
          </a> -->
          <!-- <a href="#" class="sub-menu-link">
            <img src="../images/help.png" />
            <p>Mes messages</p>
            <span>></span>
          </a> -->
          <a href="{{route('user.profile')}}" class="sub-menu-link">
            <img src="{{asset('assets-app/images/setting.png')}}" />
            <p>Paramètre</p>
            <span>></span>
          </a>
          <a href="{{route('logout')}}" class="sub-menu-link">
            <img src="{{asset('assets-app/images/logout.png')}}" />
            <p>Déconnexion</p>
            <span>></span>
          </a>
        </div>
      </div>
      <!-- sub_menu_wrap Ends-->
    </header>
      
      @else
      <header id="header_navbar" class="position-relative">
      <div
        class="bx bx-menu"
        id="menu-icon"
        style="color: black; font-size: 28px; margin-right: 40px"
      ></div>

      <div class="left-col d-flex align-items-center me-2">
        <a href="{{route('index')}}" class="logo">
          <img src="{{asset('assets-app/images/logo.png')}}" alt="" />
        </a>

        <div class="navbar">
          <div><a href="{{route('user.create')}}" class="active">LANCER UN PROJET</a></div>
          <div><a href="{{route('discover')}}">PROJET EN COURS</a></div>
        </div>
      </div>

      <div class="main">
        <div class="container_search">
          <form action="{{route('discover')}}" method="GET">
            <div class="input-field second">
              <div class="input-container">
                <input
                  id="myInput"
                  name="search"
                  type=""
                  placeholder="RECHERCHER UN PROJET"
                />

                <div
                  id="search_project"
                  class="search_project d-flex align-items-center"
                >
                  <i id="icon_search" class="ri-search-line"></i>
                  <div id="text_search" class="text_search d-none d-md-block">
                    RECHERCHER UN PROJET
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div style="border-left: 1px solid black; height: 20px"></div>

        <div class="container-user">
          <a href="{{route('login')}}">
            <i class="ri-user-line"><span>SE CONNECTER</span></i>
          </a>
        </div>
      </div>

      <!-- sub_menu_wrap -->
      <!-- <div class="sub-menu-wrap" id="subMenu">
        <div class="sub-menu">
          <div class="user-info">
            <img src="../images/user.png" alt="" />
            <h3>Zakaria</h3>
          </div>
          <hr />
          <a href="#" class="sub-menu-link">
            <img src="../images/profile.png" />
            <p>Edit Profile</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="../images/setting.png" />
            <p>Settings & Privacy</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="../images/help.png" />
            <p>Help & Support</p>
            <span>></span>
          </a>
          <a href="#" class="sub-menu-link">
            <img src="../images/logout.png" />
            <p>Logout</p>
            <span>></span>
          </a>
        </div>
      </div> -->
      <!-- sub_menu_wrap Ends-->
    </header>
      @endif
      <!-- sub_menu_wrap Ends-->
    </header>
    <main>
            @yield('content')
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script  src="{{asset('Project_description/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets-app/js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('for-forms/js/script.js')}}"></script>
    <script src="{{asset('assets-app/js/parameter.js')}}"></script>
    <script src="{{asset('assets-app/js/result.js')}}"></script>
</body>
</html>