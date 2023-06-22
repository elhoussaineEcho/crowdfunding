@extends('layouts.app')

@section('content')

  <!-- ------------------------------------------ Home_1 Starts --------------------------------------------- -->
 <!-- -----------------------------------------------Home Starts-------------------------------------------------- -->

    <!-- ------------------------------------------ Home_1 Starts --------------------------------------------- -->
    <section id="home_1">
      <div class="content">
        <div class="row-1">
          <div class="left-col">
            <h1>
              <span>Donner vie</span><br />
              aux bonnes idées
            </h1>
            <p>
              Pionnier du financement participatif, Toogether accompagne celles
              et ceux qui agissent pour un monde plus divers, plus durable, plus
              ouvert.
            </p>
          </div>
          <div class="right-col">
            <img src="{{asset('assets-app/images/home_1.png')}}" alt="" srcset="" />
          </div>
        </div>
        <div class="row-2">
          <button class="btn-1">DÉCOUVRIR LES PROJETS</button>
         <a href="{{route('user.create')}}"> <button class="btn-2">LANCER UN PROJET</button></a>
        </div>
      </div>
    </section>
    <!-- ------------------------------------------ Home_1 Ends --------------------------------------------- -->

    <!-- ------------------------------------------ Home_2 Starts --------------------------------------------- -->

    <section id="home_2" class="my-5">
      
    </section>
    <!-- ------------------------------------------ Home_2 Ends --------------------------------------------- -->

    <!-- ------------------------------------------ Home_3 Starts --------------------------------------------- -->
    <section id="home_3" class="py-3 my-3">
      <div class="container row_1">
        <div class="titre me-3">PROJETS EN COURS</div>
        <div class="text me-3">
          <span>triés par </span>
        </div>
        <select id="tre" class="" aria-label="">
        <option value="created_at" selected>Nouveautés</option>
        <option value='total'>Montants collectés</option>
        <option value='DATEDIFF(now(),datefinal)'>Bientôt terminés</option>
        </select>
      </div>
      <div class="container mt-4">
          <!-- <div class="row g-3"> -->
            <div id="warraper">

            </div>
           
          <!-- </div> -->
          
         <a href="{{route('discover')}}"> <button class="btn btn-primary">AFFICHER TOUS LES PROJECTS</button></a>
      </div>
    </section>
    <!-- ------------------------------------------ Home_3 Ends --------------------------------------------- -->

    <!-- ------------------------------------------ Home_4 Starts --------------------------------------------- -->
    <section id="home_4">
      <div class="container_p">
        <div class="container">
          <div class="box box1 me-5">
            <img src="{{asset('assets-app/images/about-2.d7cd53396524.png')}}" alt="" />
          </div>
          <div class="box box2 ms-5">
            <p class="h1">On vous aide à passer de l'idée à l'action</p>
            <p class="p">
              Créé en 2023, alors pionnier du crowdfunding, Toogether est
              aujourd’hui le 1er incubateur participatif de projets à impact
              positif en Europe. Sa mission est de donner à chaque personne -
              créateurs, créatrices, citoyens, citoyennes, entreprises - le
              pouvoir d’agir pour un monde plus divers, plus durable, plus
              ouvert. Au-delà du financement, il s’agit d’aider les créateurs et
              créatrices à passer de l’idée à l’action, à réussir et faire
              grandir leurs projets pour en démultiplier l’impact.
            </p>
            <div class="btn_home_4 mt-5">
              <a href="{{route('user.create')}}"></a><button class="btn-1">LANCER MON PROJET</button></a>
            <a href="{{route('discover')}}"> <button class="btn-2">DÉCOUVRIR LES PROJETS</button></a> 
            </div>
          </div>
        </div>
      </div>

      <div class="container_p_1">
        <div class="container-1">
          <div class="box1">
            <p class="h2">Inscrivez-vous à notre newsletter</p>
            <span
              >Recevez de chouettes projets dans votre boite chaque semaine
              !</span
            >
            <form action="" class="my-3">
              <input
                type="text"
                class="form-control form-control-lg"
                placeholder="Saisissez votre e-mail"
              />
              <button class="btn btn-secondary">S'ABONNER</button>
            </form>
            <p class="p">
              Nous utiliserons votre email uniquement pour vous envoyer notre
              newsletter.
            </p>
          </div>
          <div class="box2">
            <img src="{{asset('assets-app/images/newsletter-1.97f89a4ec0e2.jpg')}}" alt="" />
          </div>
        </div>
      </div>
    </section>
    <!-- ------------------------------------------ Home_4 Ends --------------------------------------------- -->
    <!-- -----------------------------------------------Home Ends-------------------------------------------------- -->


    @endsection

    <!-- -----------------------------------------------NavBar Ends-------------------------------------------------- -->


    <!-- ------------------------------------------ Home_1 Starts --------------------------------------------- -->
 
    <!-- ------------------------------------------ Home_4 Ends --------------------------------------------- -->

    <!-- ------------------------------------------ Footer Starts --------------------------------------------- -->
    <script src="jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
 $(document).ready(function(){

    //(selector).css("propriety", "value")
     load_data();});

   function load_data()
   {
    $('#warraper').empty();
    $('#home_2').empty();
     var valueTre=$("#tre").val();
     $.ajax({
      url:"{{route('index')}}",
       method:"GET",
       async: false,
       data:{'tre':valueTre},
success:function(data)
   {
    end=data.length;
    var str='<div id="rows-frist" class="row g-3"> </div>';
    var str1='<div id="rows-sc" class="row g-3 mt-1"> </div>';
    $('#warraper').append(str);
    $('#warraper').append(str1);
    var count=0;
    for(var i=0;i<end;i++){
    if(i==0){
    $('#home_2').append(data[0]);
    }
    else if(i<=4){
      $('#rows-frist').append(data[i]);
    }
    else{
      
        $('#rows-sc').append(data[i]);
     count++;
     if(count==4){
        $('#warraper').append(str1);
      
        count=0;
     }
    }
    
    }
  
}
});
}
//
//if we search about somthimes use the key word
// if the user selected the categories

// if user choose the finacement
 //if user want tre the projects
 $(document).on('change','#tre',function() {
         load_data(); 
         }); 

// if click on button load more


  
    </script> 
<script>
// here script to relaod all project related with key words entred by user
</script>

</body>
</html>

