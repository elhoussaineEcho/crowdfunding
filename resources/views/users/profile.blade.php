@extends('layouts.nav')
<style>

  #settings-profile .tab-contents form .input-group input{
 
    height: 55px;
}
</style>
@section('content')
<section id="settings-profile">
@if(Session::has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif
                   @if(Session::has('error'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{Session::get('error')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif
      <header>
        <div class="box">
          <img
            src="{{asset('assets-app/images/avatardefault_92824.svg')}}"
            alt=""
            style="color: white"
          />
          <p class="row_2 nom_prenom">@if(Auth::user()->nom!=null && Auth::user()->prenom!=null )
            {{Auth::user()->nom.' '.Auth::user()->prenom}}
            @else
            {{Auth::user()->username}}
            @endif
             </p>
          <p class="row_3 username">
            {{Auth::user()->username}} 
            <span><i class="ri-lock-fill"></i> espace privé</span>
          </p>
        </div>
      </header>
      <div class="line"></div>

      <div id="">
        <div class="tab-titles">
          <p class="tab-links active-link" onclick="opentab('account')">
            <i class="ri-user-fill"></i> Mon compte
          </p>
          <p class="tab-links" onclick="opentab('password')">
            <i class="ri-lock-fill"></i> Mot de passe
          </p>
          <!-- <p class="tab-links" onclick="opentab('notifications')">
            <i class="ri-notification-fill"></i> Notifications par e-mail
          </p> -->
        </div>

        <div class="tab-contents active-tab" id="account">
          <div class="contents">
            <form action="{{route('userUpdateInfo')}}" class="col-12 col-sm-8 col-md-6 col-lg-5" method="POST">
            @csrf
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-user-fill"></i
                ></span>
                <input
                  type="text"
                  class="form-control @error('nom') is-invalid @enderror"
                  placeholder="Username"
                  name="prenom"
                  value="{{Auth::user()->prenom}}"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
              </div>
              @error('prenom')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="input-group flex-nowrap" style="margin: 10px 0 2px;
    height: 55px;">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-user-fill"></i
                ></span>
                <input
                style="
    height: 55px;"
                  type="text"
                  class="form-control @error('nom') is-invalid @enderror"
                  placeholder="Username"
                  value="{{Auth::user()->nom}}"
                  name="nom"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
                @error('prenom')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              </div>
              <div class="p">Votre nom et prénom apparaîtront sur le site</div>

              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-user-fill"></i
                ></span>
                <input
                style="
    height: 55px;"
                  type="text"
                  class="form-control @error('userN') is-invalid @enderror"
                  placeholder="Username"
                  value="{{Auth::user()->username}}"
                  name="userN"
                  aria-label="username"
                  aria-describedby="addon-wrapping"
                />
              </div>
            
              <div class="p">Le nom d’utilisateur apparaît sur le site.</div>
              @error('userN')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-mail-fill"></i
                ></span>
                <input
                  type="text"
                  
                  class="form-control @error('email') is-invalid @enderror"
                  placeholder="Username"
                  value="{{Auth::user()->email}}"
                  name="email"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
              </div>
              @error('email')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="p">Votre e-mail ne sera pas rendu public</div>

              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-home-fill"></i
                ></span>
                <input
                  type="text"
                  class="form-control  @error('ville') is-invalid @enderror"
                  placeholder="Username"
                  value="{{Auth::user()->ville}}"
                  name="ville"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
              </div>
              @error('ville')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="p">
                Votre ville (affichée sur votre profil public, n'indiquez pas
                une adresse personnelle)
              </div>

              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-cake-fill"></i
                ></span>
                <input
                  type="text"
                  class="form-control @error('tel') is-invalid @enderror"
                  name="tel"
                  placeholder="Téléphone"
                  value="{{Auth::user()->Tel}}"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
              </div>
              @error('tel')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="p">Votre Tel</div>
              <button class="save" >
                <div class="btn col-8 col-sm-6 col-md-5 col-lg-4">
                  <i class="ri-save-line"></i> Enregitrer
                </div>
              </button>
            </form>
          </div>
          <div class="account-delete">
            <div
              class="account-delete-contents col-12 col-sm-8 col-md-6 col-lg-5"
            >
              <div class="sub-title">Suppression de compte</div>
              <div class="content">
                <div class="p">
                  La suppression de compte est une action irréversible : vous ne
                  pourrez plus vous connecter à Toogether ni recevoir les
                  informations envoyées par les projets que vous suivez ou
                  auxquels vous avez participé. Si vous rencontrez un problème
                  d’utilisation, nous vous invitons à régler
                  <a href="">vos notifications par e-mail</a> , ou à
                  <a href="">nous contacter</a>.
                </div>
                <div class="btn btn-danger px-5">Supprimer mon compte</div>
              </div>
            </div>
          </div>
        </div>

        <div class="tab-contents" id="password">
          <div class="contents">
            <form action="{{route('changePassword')}}" class="col-12 col-sm-8 col-md-6 col-lg-5" method="POST">
            @csrf
              <div class="sub-title">Ancien mot de passe</div>
              
              <div class="input-group flex-nowrap">
              @error('oldpassword')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-key-fill"></i></span>

                <input
                  type="password"
                  class="form-control @error('oldpassword') is-invalid @enderror"
                 name='oldpassword'
                  placeholder="Ancien mot de passe"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
                
              </div>

              <div class="sub-title">Nouveau mot de passe</div>
              @error('newpassword')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-lock-fill"></i></span>
                <input
                  type="password"
                  class="form-control @error('newpassword') is-invalid @enderror"
                  placeholder="Nouveau mot de passe"
                  name="newpassword"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
          
              </div>
              <div class="sub-title">Confirmation du nouveau mot de passe</div>
              @error('cnewpassword')
                   <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                          </span>
                               @enderror
              <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping"
                  ><i class="ri-lock-fill"></i></span>
                <input
                  type="password"
                  class="form-control @error('cnewpassword') is-invalid @enderror"
                  placeholder="Confirmation"
                  name="cnewpassword"
                  aria-label="Username"
                  aria-describedby="addon-wrapping"
                />
              
                <button class="save" >
                <div class="btn col-8 col-sm-6 col-md-5 col-lg-4">
                  <i class="ri-save-line"></i> Enregitrer
                </div>
              </button>
            </form>
          </div>
        </div>
        <div class="tab-contents" id="notifications">
          <div class="contents notifications-contents">
            <form action="">
              <div class="p">
                <i class="ri-team-fill"></i> Notifications sociales
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Une nouvelle personne vous a suivi
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  Quelqu'un m'envoie un message privé
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  J'ai reçu une réponse à un commentaire
                </label>
              </div>
              <div class="p"><i class="ri-star-fill"></i> Mes projets</div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  J'ai reçu un nouveau soutien sur mon projet
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  J'ai reçu un nouveau commentaire sur mon projet
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value=""
                  id="flexCheckDefault"
                />
                <label class="form-check-label" for="flexCheckDefault">
                  J'ai reçu une réponse à un commentaire
                </label>
              </div>
            
            </form>
          </div>
        </div>
        </div>
    </section>




@endsection
<script>

  $.ajaxSetup({
     headers:{
       'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
     }
  });
  
  $(function(){

    /* UPDATE ADMIN PERSONAL INFO */

    $('#UserInfoForm').on('submit', function(e){
        e.preventDefault();

        $.ajax({
           url:$(this).attr('action'),
           method:$(this).attr('method'),
           data:new FormData(this),
           processData:false,
           dataType:'json',
           contentType:false,
           beforeSend:function(){
               $(document).find('span.error-text').text('');
           },
           success:function(data){
                if(data.status == 0){
                  $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                  });
                }else{
                  $('.nom').each(function(){
                     $(this).html( $('#UserInfoForm').find( $('input[name="nom"]') ).val() );
                  });
                  alert(data.msg);
                }
           }
        });
    });




    $('#changePasswordAdminForm').on('submit', function(e){
         e.preventDefault();

         $.ajax({
            url:$(this).attr('action'),
            method:$(this).attr('method'),
            data:new FormData(this),
            processData:false,
            dataType:'json',
            contentType:false,
            beforeSend:function(){
              $(document).find('span.error-text').text('');
            },
            success:function(data){
              if(data.status == 0){
                $.each(data.error, function(prefix, val){
                  $('span.'+prefix+'_error').text(val[0]);
                });
              }else{
                $('#changePasswordAdminForm')[0].reset();
                alert(data.msg);
              }
            }
         });
    });

    
  });

</script>