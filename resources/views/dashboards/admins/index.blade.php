@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')

@section('content')
    <?php
    $users=App\Models\User::where('role','=',0)->get();
    $users_active=0;
    foreach($users as $user){
        if($user->isOnline()==true){
            $users_active+=1;
        } 
    }
   
  
     ?>
<div class="bg-primary pt-10 pb-21"></div>
            <div class="container-fluid mt-n22 px-6">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <!-- Page header -->
                        <div>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mb-2 mb-lg-0">
                                    <h3 class="mb-0  text-white">Projets</h3>
                                </div>
                                <!-- <div>
                                    <a href="#" class="btn btn-white">Create New Project</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                        <!-- card -->
                        <div class="card ">
                            <!-- card body -->
                            <div class="card-body">
                                <!-- heading -->
                                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                    <div>
                                        <h4 class="mb-0">Projets</h4>
                                    </div>
                                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                        <i class="bi bi-briefcase fs-4"></i>
                                    </div>
                                </div>
                                <!-- project number -->
                                <div>
                                    <h1 class="fw-bold">{{$projets->count()}}</h1>
                                    <p class="mb-0"><span class="text-dark me-2">{{$projets_terminer->count()}}</span> Terminés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                        <!-- card -->
                        <div class="card ">
                            <!-- card body -->
                            <div class="card-body">
                                <!-- heading -->
                                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                    <div>
                                        <h5 class="mb-0">Projets Actives</h5>
                                    </div>
                                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                        <i class="bi bi-list-task fs-4"></i>
                                    </div>
                                </div>
                                <!-- project number -->
                                <div>
                                    <h1 class="fw-bold">{{$projets_active->count()}}</h1>
                                    <p class="mb-0"><span class="text-dark me-2">{{$projet_finance->count()}}</span>Financés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                        <!-- card -->
                        <div class="card ">
                            <!-- card body -->
                            <div class="card-body">
                                <!-- heading -->
                                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                    <div>
                                        <h4 class="mb-0">Utilisateurs</h4>
                                    </div>
                                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                        <i class="bi bi-people fs-4"></i>
                                    </div>
                                </div>
                                <!-- project number -->
                                <div>
                                    <h1 class="fw-bold">{{ $users->count()}}</h1>
                                    <p class="mb-0"><span class="text-dark me-2"> {{$users_active}}</span><span class="badge
                            bg-success">Active</span></p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
                        <!-- card -->
                        <div class="card ">
                            <!-- card body -->
                            <div class="card-body">
                                <!-- heading -->
                                <div class="d-flex justify-content-between align-items-center
                    mb-3">
                                    <div>
                                        <h4 class="mb-0">Financement</h4>
                                    </div>
                                    <div class="icon-shape icon-md bg-light-primary text-primary
                      rounded-2">
                                        <i class="bi bi-bullseye fs-4"></i>
                                    </div>
                                </div>
                                <!-- project number -->
                                <div>
                                    <h1 class="fw-bold">{{$avg}}%</h1>
                                    <p class="mb-0"><span class="text-success me-2">5%</span>Terminés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row  -->
                <div class="row mt-6">
                    <div class="col-md-12 col-12">
                        <!-- card  -->
                        <div class="card">
                            <!-- card header  -->
                            <div class="card-header bg-white  py-4">
                                <h4 class="mb-0">Tous les Projets</h4>
                            </div>
                            <!-- navigation of project -->
  
<div class="tab-content">

    <!-- of all projets -->
         <!-- table  -->
         <div class="table-responsive">
                                <table class="table text-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Titre</th>
                                            <th>Durée</th>
                                            <th>status</th>
                                            <th>contributeurs</th>
                                            <th>Progression</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <!-- start of tr  -->
                                @foreach($projets as $projet)
                                          <tr>
                                          <?php
                                          $donnateurs=App\Models\Dons::where('idProjet',"=",$projet->id)
                                          ->join('donnateurs','dons.idDonnateur',"=",'donnateurs.id')
                                          ->join('users','donnateurs.idUtilisateur',"=",'users.id')
                                          ->get();
                                          ?>
                                            <td class="align-middle">
                                                <div class="d-flex
                            align-items-center">
                                                    <div>
                                                        <div class="icon-shape icon-md border p-4
                                rounded-1">
                                                            <img src="{{asset('porteur/projet/images/'.$projet->image)}}" alt="" class="avatar-md avatar rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1"> <a href="#" class="text-inherit">{{$projet->titre}}</a></h5>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">{{Carbon\Carbon::parse($projet->created_at)->diffInDays(Carbon\Carbon::parse(($projet->datefinal)))}} <span>j</span></td>
                                            @if($projet->is_active==1)
                                            <td class="align-middle">
                                                <span class="badge bg-success">Active</span>
                                                @elseif($projet->is_active==0)
                                               <td class="align-middle bg-secondary.bg-gradient">
                                                <span class="badge bg-warning">non active</span>
                                                </td>
                                                @else
                                                <td class="align-middle">
                                               <span class="badge bg-danger">refusé</span>
                                               </td>
                                               @endif
                                         
                                            <td class="align-middle">
                                                <div class="avatar-group">
                           
                            @foreach($donnateurs as $donnateur)
                                 <span class="avatar avatar-sm">
                                 <img alt="avatar"
                                  src="{{asset('dist/img/'.$donnateur->picture)}}"
                                  class="rounded-circle">
                                 </span>
                            @endforeach
                                                    <span class="avatar avatar-sm avatar-primary">
                              <span class="avatar-initials rounded-circle
                                fs-6">+{{$donnateurs->count()}}</span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="align-middle text-dark">
                                            <?php 
                                            $prog=$projet->total*100/$projet->budget
                                             ?> 
                                                <div class="float-start me-3"> {{$prog}}%</div>
                                                <div class="mt-2">
                                                    <div class="progress" style="height: 5px;">
                                                        <div class="progress-bar" role="progressbar" style="width:{{$prog}}%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach 
                                <!-- end of project -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- card footer  -->
                            @if($projets->count()>8)
                            <div class="card-footer bg-white text-center">
                                <a href="#" class="link-primary">View All Projects</a>

                            </div>
                            @endif
                        </div>

                    </div>
                </div>
        </div>
           <div class="tab-pane fade" id="content2">
            <!-- of all Projet non active -->
            <p> les projet</p>


</div>
                            <!-- end navigation -->
                       
                <!-- row  -->
                <div class="row my-6">
                    <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-6 mb-xl-0">
                        <!-- card  -->
                        <div class="card h-100">
                            <!-- card body  -->
                            <div class="card-body">
                                <div class="d-flex align-items-center
                    justify-content-between">
                                    <div>
                                        <h4 class="mb-0">Status des Projets </h4>
                                    </div>
                                    <!-- dropdown  -->
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTask" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTask">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- chart  -->
                                <div class="mb-8">
                                    <div id="perfomanceChart"></div>
                                </div>
                                <!-- icon with content  -->
                                <div class="d-flex align-items-center justify-content-around">
                                    <div class="text-center">
                                        <i class="icon-sm text-success" data-feather="check-circle"></i>
                                        <h1 class="mt-3  mb-1 fw-bold">76%</h1>
                                        <p>Terminés</p>
                                    </div>
                                    <div class="text-center">
                                        <i class="icon-sm text-warning" data-feather="trending-up"></i>
                                        <h1 class="mt-3  mb-1 fw-bold">10%</h1>
                                        <p>En progression</p>
                                    </div>
                                    <div class="text-center">
                                        <i class="icon-sm text-danger" data-feather="trending-down"></i>
                                        <h1 class="mt-3  mb-1 fw-bold">8%</h1>
                                        <p>Stable</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- card  -->
                    <div class="col-xl-8 col-lg-12 col-md-12 col-12">
                        <div class="card h-100">
                            <!-- card header  -->
                            <div class="card-header bg-white py-4">
                                <h4 class="mb-0">Utilisateurs </h4>
                            </div>
                            <!-- table  -->
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nom</th>
                                            <th>Status</th>
                                            <th>action</th>
    
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($numbre_of_user as $user)
                                        <tr>
                                            <td class="align-middle">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="{{asset('dist/img/'.$user->picture)}}" alt="" class="avatar-md avatar rounded-circle">
                                                    </div>
                                                    <div class="ms-3 lh-1">
                                                        <h5 class=" mb-1">{{$user->username}}</h5>
                                                        <p class="mb-0">{{$user->email}}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            
                                         @if($user->isOnline()==true)
                                         <td class="align-middle">
                                                <span class="badge bg-success">Active</span></td>
                                                @else
                                                <td class="align-middle">
                                                <span class="badge bg-danger">non active</span></td>
                                                @endif
                                              <td class="align-middle">
                                                <div class="dropdown dropstart">
                                                    <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else
                                                      </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
 
@endsection
