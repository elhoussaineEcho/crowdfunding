<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Porteur;
use App\Models\User;
use App\Models\Projet;
use App\Models\Dons;
use App\Models\Document;
use App\Models\Categorie;
use Illuminate\Support\Carbon;
class LoadMoreController extends Controller
{
  
    function index(Request $request)
     {
    //   $perfect_projet=DB::table('projets')
    //      ->where('is_active',"=", 0)
    //     ->orderBy('total','DESC')->first();
    //     $duree_rest=0;
    //       if(Carbon::now()<$perfect_projet->datefinal){
    //        $duree_rest=Carbon::now()->diffInDays(Carbon::parse($perfect_projet->datefinal));
    //       }
    //       else {
    //        $duree_rest="fini";
    //       }

    //    $projets=DB::table('projets')
    //      ->limit(16)
    //      ->get();
   
         if($request->ajax())
    { 
      $output=array();
      $projets=DB::table('projets')
      ->where('is_active',"=", 1)
      ->orderBy(DB::raw($request->tre),'DESC')
      ->limit(16)
      ->get();
       $perfect_projet=DB::table('projets')
      ->where('is_active',"=", 1)
      ->orderBy('total','DESC')->first();

             $duree_rest=0;
          if(Carbon::now()<$perfect_projet->datefinal){
           $duree_rest=Carbon::now()->diffInDays(Carbon::parse($perfect_projet->datefinal));
          }
          else {
           $duree_rest="fini";
          }

      $output[]='
      <div class="titre mb-3">EN CE MOMENT</div>

      <div class="container">
        <div class="p-2 row">
          <div class="left-col col-5 col px-0 pb-2">
            <div class="position-relative content-img">
              <img src="'.asset('porteur/projet/images/'.$perfect_projet->image).'" alt="" />
              <div class="icon">
                <i class="fa-regular fa-heart"></i>
              </div>
            </div>

            <div class="px-3 content-info">
              <h6>PROJET A LA UNE</h6>
              <h3>'.$perfect_projet->titre.'</h3>
              <div class="price">
                <div>'.$perfect_projet->total.'</div>
                <div>J-'.$duree_rest.'</div>
              </div>
            </div>
          </div>

          <div class="right-col col">
            <div class="box-img"></div>
            <div class="box-text position-relative ps-4">
              <p>
                Vous lancez un projet à impact social ou environnemental? Vous
                avez besoin dun coup de pouce? BNP Paribas s"engage en faveur
                de l"entrepreneuriat à impact!
              </p>
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
      ';
        foreach( $projets as $projet){
         
          $categorie=Categorie::where('id',"=",$projet->idCategorie)->first();
          $duree_rest=0;
          if(Carbon::now()<$projet->datefinal){
           $duree_rest=Carbon::now()->diffInDays(Carbon::parse($projet->datefinal));
          }
          else {
           $duree_rest="fini";
          }
          $route='user.description';
          
          $output[]='
          
          <a href='.route( $route,$projet->id).' class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body p-0">
                  <div class="box box1">
                    <div class="box-img position-relative mb-3">
                      <i class="position-absolute ri-heart-line"></i>
                      <img
                        src='.asset('porteur/projet/images/'.$projet->image).' 
                        alt=""
                      />
                    </div>
                    <div class="box-text px-2">
                      <h4 class="text-title1">'.$projet->titre.'</h4>
                      <div class="text-title2">'.$categorie->nom.'</div>
                      <div class="text-title3">
                        <div
                          class="d-flex align-items-center justify-content-center"
                        >
                          <div>
                            <i class="fa-solid fa-sack-dollar"></i>
                          </div>
                          <div
                            class="d-flex align-items-center justify-content-center"
                          >
                            <p class="d-flex align-items-center mt-3 ms-1">
                              '.$projet->total.'/'.$projet->budget.' MAD
                            </p>
                          </div>
                        </div>
                        <p class="mt-3">'.$duree_rest.'j</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </a> 
          
          ';;

      
        }
        return response()->json($output);

}
         return view('index');
        }
   //function to loadmore project use ajax
    //methode to generate the operation searche



    //--------------------------------------------------------------
     public function discover(Request $request){
      $output=array();
      if($request->ajax())
      { 
     
        //----------------------------------------------
         $projets=DB::table('projets')
         ->orderBy(DB::raw($request->tre),'DESC')->get();
         //----------------------------------------
          $projets_termine=Projet::where('datefinal','<',Carbon::now())
          ->orderBy(DB::raw($request->tre),'DESC')->get();
          //------------------------------------------
          $projet_finance= Projet::whereColumn('total',">",'budget')
          ->orderBy(DB::raw($request->tre),'DESC')->get();
          //------------------------------------------
          $encour=Projet::whereColumn('total',"<",'budget')
           ->orderBy(DB::raw($request->tre),'DESC')->get();
           //-------------------------------------------
         //valide 
    
         if($request->search && $request->categorie==0 && $request->finance==0){
           $projets=Projet::search($request->search)
           ->orderBy(DB::raw($request->tre),'DESC')
           ->get();
         }
         //valid 
         if($request->search && $request->categorie!=0 && $request->finance==0){
           $projets=Projet::search($request->search)
           ->where('idCategorie','=',$request->categorie)
           ->orderBy(DB::raw($request->tre),'DESC')
           ->get();
         } 
         //valid
         if($request->categorie && empty($request->search) && $request->finance==0){
           $projets=Projet::where('idCategorie',"=",$request->categorie)
           ->orderBy(DB::raw($request->tre),'DESC')->get();
         }
         if($request->categorie && $request->search!='' && $request->finance==0){
           $projets=Projet::search($request->search)
           ->where('idCategorie','=',$request->categorie)
           ->orderBy(DB::raw($request->tre),'DESC')
           ->get();
         }
         //valid
 
         if(empty($request->search) && $request->categorie==0 && $request->finance!=0){
           if($request->finance==1){
             $projets=$projet_finance;
           }
           else if($request->finance==2){
           $projets= $encour;
           }
           else{
             $projets=$projets_termine;
           }
          
         } 
         //valid
         if($request->finance !=0 && $request->search==null && $request->categorie!=0)
         {
           if($request->finance==1){
             $projets=Projet::whereColumn('total',">=",'budget')
             ->where('idCategorie', '=',$request->categorie)
             ->orderBy(DB::raw($request->tre),'DESC')->get();
           }
           else if($request->finance==2){
             $projets=Projet::whereColumn('total',"<",'budget')
             ->where('idCategorie', '=',$request->categorie)
             ->orderBy(DB::raw($request->tre),'DESC')->get();
           }
           else{
           $projets=Projet::where([
             ['idCategorie', '=',$request->categorie ],
             ['datefinal', '<', Carbon::now()]
         ])
         ->orderBy(DB::raw($request->tre),'DESC')->get();
           }
         }
         //no valid
         if($request->finance !=0 && $request->search!=null && $request->categorie==0)
         {
          if($request->finance==1){
            $projets=Projet::search($request->search)
             ->whereColumn('total',">=",'budget')
             ->orderBy(DB::raw($request->tre),'DESC')->get();
          }
          else if($request->finance==2){
            $projets=Projet::search($request->search)
            ->whereColumn('total',"<",'budget')
            ->orderBy(DB::raw($request->tre),'DESC')->get();
          }
          else{
            $projets=Projet::search($request->search)
            ->where([
              ['datefinal', '<', Carbon::now()]
          ])
          ->orderBy(DB::raw($request->tre),'DESC')->get();
          }
         }
         // valid
          if($request->finance !=0 && $request->search!=null && $request->categorie!=0)
          {
           if($request->finance==1){
             $projets=Projet::search($request->search)
              ->whereColumn('total',">=",'budget')
              ->where('idCategorie', '=',$request->categorie)
              ->orderBy(DB::raw($request->tre),'DESC')->get();
           }
           else if($request->finance==2){
             $projets=Projet::search($request->search)
             ->whereColumn('total',"<",'budget')
             ->where('idCategorie', '=',$request->categorie)
           
             ->orderBy(DB::raw($request->tre),'DESC')->get();
           }
           else{
             $projets=Projet::search($request->search)
             ->where([
               ['idCategorie', '=',$request->categorie ],
               ['datefinal', '<', Carbon::now()]
           ])
           ->orderBy(DB::raw($request->tre),'DESC')->get();
           }
          }
        //here for search and sorte--------------------
           //here the code for search and load more data
       if(!$projets->isEmpty())
       {
        foreach($projets as $row)
        {
          if( $row->is_active==1)
          {

         
          $duree_rest=0;
          if(Carbon::now()<$row->datefinal){
           $duree_rest='Reste '.Carbon::now()->diffInDays(Carbon::parse($row->datefinal)).' j';
          }
          else {
           $duree_rest="fini";
          }
          
        $porteur=Porteur::where('id',"=",$row->idPorteur)->first();
        //information of porteur
        $nom=$porteur->user->nom;
        $prenom=$porteur->user->prenom;
        //categorie of projet
        $categorie=Categorie::where('id',"=",$row->idCategorie)->first();
        $categoriename=$categorie->nom;
        // $categorie=Categorie::where('idCategorie',"=",$row->idCategorie)->get('nom');
          $path='porteur/projet/images/'.$row->image;
          $route='user.description';
         $output[]= '
         
         <a href='.route($route,$row->id).' class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
         <div class="card">
           <div class="card-body p-0">
             <div class="box box1">
               <div class="box-img position-relative mb-3">
                 <i class="position-absolute ri-heart-line"></i>
                 <img
                   src='.asset('porteur/projet/images/'.$row->image).' 
                   alt=""
                 />
               </div>
               <div class="box-text px-2">
                 <h4 class="text-title1">'.$row->titre.'</h4>
                 <div class="text-title2">'.$categorie->nom.'</div>
                 <div class="text-title3">
                   <div
                     class="d-flex align-items-center justify-content-center"
                   >
                     <div>
                       <i class="fa-solid fa-sack-dollar"></i>
                     </div>
                     <div
                       class="d-flex align-items-center justify-content-center"
                     >
                       <p class="d-flex align-items-center mt-3 ms-1">
                         '.$row->total.'/'.$row->budget.' MAD
                       </p>
                     </div>
                   </div>
                   <p class="mt-3">'.$duree_rest.'</p>
                 </div>
               </div>
             </div>
           </div>
         </div>
         </a> 
      ';  
        }
      }
     return response()->json($output);
     }
     $notFount=array();
     $notFount[]='<div class="text-title2"> Not fount result </div>';
                                       
     return response()->json($notFount);
    }
    $categories=Categorie::all();
    return view('discover',compact('categories'));
      
        
  
  }
  }
 

      


