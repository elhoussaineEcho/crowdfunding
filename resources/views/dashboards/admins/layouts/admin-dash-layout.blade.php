<!DOCTYPE html>
<html lang="en">

  <head>
    <!-- Required meta tags -->
<meta charset="utf-8" />
<meta
  name="viewport"
  content="width=device-width, initial-scale=1, shrink-to-fit=no"
/>

<!-- Favicon icon-->
<link
  rel="shortcut icon"
  type="image/x-icon"
  href="{{asset('assets-admin/images/favicon/favicon.ico')}}"
/>

<!-- Libs CSS -->

<link
  href="{{asset('assets-admin/libs/bootstrap-icons/font/bootstrap-icons.css')}}"
  rel="stylesheet"
/>
<link
  href="{{asset('assets-admin/libs/dropzone/dist/dropzone.css')}}"
  rel="stylesheet"
/>
<link
  href="{{asset('assets-admin/libs/@mdi/font/css/materialdesignicons.min.css')}}"
  rel="stylesheet"
/>
<link
  href="{{asset('assets-admin/libs/prismjs/themes/prism-okaidia.css')}}"
  rel="stylesheet"
/>

<!-- Theme CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<link rel="stylesheet" href="{{asset('assets-admin/css/theme.min.css')}}">
  
    <title>Dashboard</title>
  </head>

  <body class="bg-light"> 
    <div id="db-wrapper">
         <!-- navbar vertical -->
       <!-- Sidebar -->
 <nav class="navbar-vertical navbar">
    <div class="nav-scroller">
        <!-- Brand logo -->
        <a class="navbar-brand" href="../index.html">
            <h4 style="color:#FFFFFF;">Admin</h4>
        </a>
        <!-- Navbar nav -->
        <ul class="navbar-nav flex-column" id="sideNavbar">
            <li class="nav-item">
              <!-- link to page of index -->
                <a class="nav-link has-arrow " href="{{route('admin.dashboard')}}">
                    <i data-feather="home" class="nav-icon icon-xs me-2"></i>  Dashboard
                </a>

            </li>


         <!-- Nav item -->
         <li class="nav-item">
            <div class="navbar-heading">Layouts & Pages</div>
        </li>


             <!-- Nav item -->
             <li class="nav-item">
                <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navPages" aria-expanded="false" aria-controls="navPages">
                    <i
                    data-feather="layers"

                    class="nav-icon icon-xs me-2">
                </i> Pages
                </a>

                <div id="navPages" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="../pages/profile.html">
                                profil
                </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow   "  href="../pages/settings.html" >
                                paramètre
                                </a>

                        </li>

                    </ul>
                </div>

                </li>


                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                                <i data-feather="lock" class="nav-icon icon-xs me-2">
                                </i> Authentication
                            </a>
                            <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="../pages/sign-in.html"> Sign In</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link  " href="../pages/sign-up.html"> Sign Up</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="../pages/forget-password.html">
                                             Forget Password
                                </a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link  active " href="../pages/layout.html">
                                <i
                                    data-feather="sidebar"

                                    class="nav-icon icon-xs me-2"
                                >
                                </i
                                      >
                                Layouts
                            </a>
                        </li> -->

                        <!-- Nav item -->
                        <!-- <li class="nav-item">
                            <div class="navbar-heading">UI Components</div>
                        </li>

                        <!-- Nav item -->
                         <!--<li class="nav-item">
                            <a class="nav-link has-arrow " href="../docs/accordions.html" >
                                <i data-feather="package" class="nav-icon icon-xs me-2" >
                            </i>  Components
                            </a>
                         </li>
                  

                        <li class="nav-item">
                            <a class="nav-link has-arrow  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevel" aria-expanded="false" aria-controls="navMenuLevel">
                                <i
                                data-feather="corner-left-down"

                                class="nav-icon icon-xs me-2"
                            >
                            </i
                                      > Menu Level
                            </a>
                            <div id="navMenuLevel" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link has-arrow " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevelSecond" aria-expanded="false" aria-controls="navMenuLevelSecond">
                                    Two Level
                                </a>
                                        <div id="navMenuLevelSecond" class="collapse" data-bs-parent="#navMenuLevel">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#!">  NavItem 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#!">  NavItem 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link has-arrow  collapsed  " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThree" aria-expanded="false" aria-controls="navMenuLevelThree">
                                    Three Level
                                </a>
                                        <div id="navMenuLevelThree" class="collapse " data-bs-parent="#navMenuLevel">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link  collapsed " href="#!" data-bs-toggle="collapse" data-bs-target="#navMenuLevelThreeOne" aria-expanded="false" aria-controls="navMenuLevelThreeOne">
                                                         NavItem 1
                                            </a>
                                                    <div id="navMenuLevelThreeOne" class="collapse collapse " data-bs-parent="#navMenuLevelThree">
                                                        <ul class="nav flex-column">
                                                            <li class="nav-item">
                                                                <a class="nav-link " href="#!">
                                                                     NavChild Item 1
                                                        </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="#!">  Nav Item 2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li> -->

                                         <!-- Nav item -->
                        <li class="nav-item">
                            <div class="navbar-heading">documents</div>
                        </li>

                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow " href="../docs/index.html" >
                                <i data-feather="clipboard" class="nav-icon icon-xs me-2" >
                            </i>  Docs
                            </a>
                         </li>

                    </ul>

                </div>
</nav>
       <!-- page content -->
      <div id="page-content">
        <div class="header @@classList">
  <!-- navbar -->
  <nav class="navbar-classic navbar navbar-expand-lg">
    <a id="nav-toggle" href="#"><i
        data-feather="menu"

        class="nav-icon me-2 icon-xs"></i></a>
    <div class="ms-lg-3 d-none d-md-none d-lg-block">
      <!-- Form -->
      <form class="d-flex align-items-center">
        <input type="search" class="form-control" placeholder="Search" />
      </form>
    </div>
    <!--Navbar nav -->
    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
      <li class="dropdown stopevent">
        <a class="btn btn-light btn-icon rounded-circle indicator
          indicator-primary text-muted" href="#" role="button"
          id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <i class="icon-xs" data-feather="bell"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end"
          aria-labelledby="dropdownNotification">
          <div>
            <!-- code php for notification -->
            <?php   
       $notifications=DB::table('notifications')->where('notifiable_id',"=",Auth::id())->get();
       
       $sumNotification=0;
        foreach($notifications as $notification){
         if($notification->read_at==null){
            $sumNotification++; 
           }
         }
    ?>
            <!-- end code php for notification -->
            <div class="border-bottom px-3 pt-2 pb-3 d-flex
              justify-content-between align-items-center">
              <p class="mb-0 text-dark fw-medium fs-4">Notifications</p>
              <a href="#" class="text-muted">
                <span>
                  <i class="me-1 icon-xxs" data-feather="settings"></i>
                </span>
              </a>
            </div>
            <!-- List group -->
            <ul class="list-group list-group-flush notification-list-scroll">
              <!-- List group item -->
              @foreach($notifications as $notification)
              <?php
             $respons= json_decode($notification->data,true);
             $projet=App\Models\Projet::find($respons['idProjet']);
             $is_active=1;
             if($projet!=null){
              $is_active=$projet->is_active;
             }
             
             ?>
             <?php 
              $notification_id=0;
              if(array_key_exists('idNotification', $respons)){
                $notification_id= $respons['idNotification'];
              }
      
              ?>   
              @if($is_active==1 || $is_active==-1)
              <li   class="list-group-item bg-white disabled" >
               
                <a href="{{route('action',$respons['idProjet'])}}" data-id="{{$respons['idProjet']}}"class="text-dark infoProjet disabled">
                    <h5 class=" mb-1 text-dark">{{ $respons["nom"]}}</h5>
                    <p class="mb-0 text-dark">
                      Lancé neveau projet <b>{{ $respons["titre"]}}</b>
                    </p>
                </a>
          </li>
          @else
          <li   class="list-group-item bg-light " >
               
                <a href="{{route('action',$respons['idProjet'])}}" data-internalid="{{$respons['idProjet'].','.$notification_id}}"class="text-muted infoProjet ">
                    <h5 class=" mb-1">{{ $respons["nom"]}}</h5>
                    <p class="mb-0">
                      Lancé neveau projet de titre  <b>{{ $respons["titre"]}}</b>.
                    </p>
                </a>
            
          </li>
          @endif
          @endforeach
             <!-- List group item -->
        
              <!-- List group item -->
              
              <!-- List group item -->
            </ul>
            <div class="border-top px-3 py-2 text-center">
              <a href="#" class="text-inherit fw-semi-bold">
                View all Notifications
              </a>
            </div>
          </div>
        </div>
      </li>
      <!-- List -->
      <li class="dropdown ms-2">
        <a class="rounded-circle" href="#" role="button" id="dropdownUser"
          data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md avatar-indicators avatar-online">
            <img alt="avatar" src="{{asset('dist/img/'.Auth::user()->picture)}}"
              class="rounded-circle" />
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end"
          aria-labelledby="dropdownUser">
          <div class="px-4 pb-0 pt-2">


            <div class="lh-1 ">
              <h5 class="mb-1"> {{Auth::user()->username}}</h5>
              <a href="#" class="text-inherit fs-6">voir mon profil</a>
            </div>
            <div class=" dropdown-divider mt-3 mb-2"></div>
          </div>

          <ul class="list-unstyled">

            <li >
              <a class="dropdown-item" href="#">
                <i class="me-2 icon-xxs dropdown-item-icon" data-feather="user"></i>modifier
                Profile
              </a>
            </li>

            <li>
              <a  class="dropdown-item" href="#">
                <i class="me-2 icon-xxs dropdown-item-icon"
                  data-feather="settings"></i>paramétre
              </a>
            </li>
            <li>
              <a href="{{route('logout')}}" class="dropdown-item" href="../index.html">
                <i class="me-2 icon-xxs dropdown-item-icon"
                  data-feather="power"></i>deconexion
              </a>
            </li>
          </ul>

        </div>
      </li>
    </ul>
  </nav>
</div>


        <!-- Container fluid -->
        <div class="container-fluid px-6 py-4">
        @yield('content')

         </div>
    </div>
    <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type='text/javascript'>
 
            $(document).ready(function(){
            
              $(".btn-close ").click(function() {
           $("#empModal").modal("hide");
      });
              // controle button of accept and refuse
       
                $('.infoProjet').click(function(){
                  $('.modal-body').empty();
                  $("#refuse").addClass('disabled');
                  $("#accept").addClass('disabled');
                    var idProjet = $(this).data('internalid');
                    const array_split=idProjet.split(",");
                    var id_projet=array_split[0];
                    var id_notification=array_split[1];
                    alert(array_split[1]);
                    
                    $.ajax({
                        url: "{{route('admin.information')}}",
                        method: 'GET',
                        data: {'idProjet': id_projet,'idNotification':id_notification},
                        success: function(response){ 
                            $('.modal-body').append(response); 
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
            
            
    <!-- model show it whene admin click  -->
<div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Les informations du projet</h4>
                            <button type="button" class="btn-close btn-danger" data-dismiss="modal"  aria-label="Close">
  <span aria-hidden="true">&times;</span>
           </button>
                        </div>
                        <div class="modal-body">
          
                        </div>
                        <div class="modal-footer">
                          <a href="{{route('admin.raison')}}"><button type="button" id="refuse" class="btn btn-danger disabled" data-dismiss="modal">Réfuser</button></a>
                          <button type="button" id="accept"class="btn btn-success disabled" data-dismiss="modal">accepter</button>
                        </div>
                    </div>
                </div>
                <!-- model for give the raison of refuse the project -->
              

                <!-- end of model -->
                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script>
              $(document).ready(function(){
                var check_view=false;
             var check_cart_nationale=false;
              });
          
             $(document).on('click','#btn-description',function(){
               
                var check_view=true;
                if(check_view && check_cart_nationale){
                  $("#refuse").removeClass('disabled');
                  $("#accept").removeClass('disabled');}});

            
              $(document).on('click','#btn-cart-nationale',function(){
                 check_cart_nationale=true;
                if(check_view && check_cart_nationale){
                  $('#refuse').removeClass('disabled');
                  $('#accept').removeClass('disabled');
                }
              });
              $(document).on('click','#refuse',function(){
               
                
               
              });
          
                 
                </script>
           
           
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> 
<script src="{{asset('assets-admin/libs/jquery/dist/jquery.min.js')}}"></script>

<script>
    function info(){
        toastr.warning('My name is Inigo Montoya. You killed my father, prepare to die!');
    }
    function error(){
        toastr.error('I do not think that word means what you think it means.', 'Inconceivable!');
    }
    function warning(){

    }
    function success(){
        toastr.success('Have fun storming the castle!', 'Miracle Max Says');
    }
</script>


<script src="{{asset('assets-admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets-admin/libs/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets-admin/libs/feather-icons/dist/feather.min.js')}}"></script>
<script src="{{asset('assets-admin/libs/prismjs/prism.js')}}"></script>
<script src="{{asset('assets-admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="{{asset('assets-admin/libs/dropzone/dist/min/dropzone.min.js')}}"></script>
<script src="{{asset('assets-admin/libs/prismjs/plugins/toolbar/prism-toolbar.min.js')}}"></script>
<script src="{{asset('assets-admin/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js')}}"></script>




<!-- Theme JS -->
<script src="{{asset('assets-admin/js/theme.min.js')}}"></script>



  </body>

</html>