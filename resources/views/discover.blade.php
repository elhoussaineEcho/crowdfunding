@extends('layouts.app')

@section('content')

<section id="all-projects" class="mt-3">
      <div class="section-1 mb-4">
        <div class="container-fluid bg-info mb-4">
          <div class="content">

              <div class="me-3"><i class="ri-search-line" ></i></div>
              <input type="text" id="search" name="search" class="bg-info" placeholder="Rechercher" />
          </div>
        </div>

        <div
          class="container d-flex align-items-center justify-content-start mt-4"
        >
          <div class="selectt form-floating">
            <select
              class="form-select"
              name="categorie" 
              id="select"
              aria-label="Floating label select example"
            >
                <option value="0" selected>Toutes</option>
                <option value="1">Education</option>
                <option value="2">santé</option>
                <option value="3"> Nourriture/Vêtements</option>
                <option value="4">Mosquée/Immobilier</option>
                <option value="5">Zaqat</option>
                <option value="6">Autisme</option>
                <option value="7">Orphelins</option>
                
              
                
              
            </select>
            <label for="select">Catégorie</label>
          </div>
          <div class="selectt form-floating">
            <select
              class="form-select"
              id="select_finnancement" 
              name="finance"
              aria-label="Floating label select example"
            >
            <option value="0" selected>Tous</option>
            <option value="1">Financés</option>
            <option value="2">en cours de financement</option>
            <option value="3">Terminé</option>
            </select>
            <label for="select_finnancement">Projects</label>
          </div>
        </div>
      </div>
      <hr />
      <div class="container row_1">
        <div class="titre me-3">PROJETS EN COURS</div>
        <div class="text me-3">
          <span>triés par </span>
        </div>
        <select  id="tre" name="tre" class="" aria-label="">
        <option value="created_at" selected>Nouveautés</option>
        <option value='total'>Montants collectés</option>
        <option value='DATEDIFF(now(),datefinal)'>Bientôt terminés</option>
        </select>
      </div>
      <div class="container mt-4">
     
        <div id="con">

       </div>
         
          <button id='loadMore' class="btn btn-light hidden">Plus de projects</button>

      </div>
    </section>

@endsection

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

 <script>
 var count=0;
 search = sessionStorage.getItem('search');
 var len=0;
 $(document).ready(function(){
    //(selector).css("propriety", "value")
    
    
    document.getElementById('search').value = search;
     load_data();
     if(len>8){
        $("#loadMore").removeClass("hidden");
     }
     
     });
    
 
   function load_data()
   {
    
     var selectorF= $("#select_finnancement").val();
     var valueTre=$("#tre").val();
     var value = $('#search').val();
     var selector= $("#select").val();
   $.ajax({
   url:"{{route('discover')}}",
    method:"GET",
async: false,
data:{'search':value,'finance':selectorF,'categorie':selector,'tre':valueTre},
success:function(data)
   {
    len=data.length;
   if(len<8){
    $("#loadMore").addClass('hidden');
    var star=count>0?len*count:count;
    var end=star+len;
   }
   else if(len>=8){
    var star=count>0?8*count:count;
    var end=star+8;
   }
  
   var str='<div id="rows-frist" class="row g-3"> </div>';
   var str1='<div id="rows-sc" class="row g-3 mt-1"> </div>';
   $('#con').append(str);
   $('#con').append(str1);
   var check=0; 
    for(var i=star;i<end;i++){
     if(i<=3){
      $('#rows-frist').append(data[i]);
    }
    else{
     $('#rows-sc').append(data[i]);
     check++;
     if(check==4){
     $('#con').append(str1);
     check=0;
     }
    }
    
     
    }
    $("#loadMore").html("Plus de projects");
    if(end>=len){
     count=0;
     $("#loadMore").addClass('hidden');
     return;
    }
    count++;
    
  
}
})
}
//
//if we search about somthimes use the key word
$(document).on('keydown','#search',function (e) {
    var value = $('#search').val();
    if(e.which==13 && value!=null ){
   $("#loadMore").removeClass("hidden");
     count=0;
    $('#con').empty(); 
    load_data();}
})
// if the user selected the categories
$(document).on('change','#select',function() {
    $("#loadMore").removeClass("hidden");
       count=0;
        $('#con').empty();
        load_data();
          })
// if user choose the finacement
$(document).on('change','#select_finnancement',function() {
    $("#loadMore").removeClass("hidden");
        count=0;
        $('#con').empty(); 
        load_data();
           })
 //if user want tre the projects
 $(document).on('change','#tre',function() {
    $("#loadMore").removeClass("hidden");
        count=0;
        $('#con').empty(); 
         load_data(); 
         }); 

// if click on button load more
$(document).on('click','#loadMore',function() {
 $("#loadMore").html("Attendu...");
 setTimeout(function() {
    load_data();}, 2000);
    

  });

 </script>
