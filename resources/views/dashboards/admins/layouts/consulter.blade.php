@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Dashboard')
<style>
    #caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)}
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
@section('content')
<div class="tab-content">
@if(Session::has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif
                   @if(Session::has('error'))
                   <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif
    <!-- of all projets -->
         <!-- table  -->
         <div class="table-responsive">
                                <table class="table text-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Titre</th>
                                            <th>Information du porteur</th>
                                            <th>Cart National</th>
                                            <th>Attestation</th>
                                            <th>action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                <!-- start of tr  -->
                                @foreach($projets as $projet)
                                          <tr>
                                            <?php 
                                            $idProjet=$projet->id;
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
                                                        <h5 class=" mb-1"> <a href="#" id="info_projet" class="text-inherit">{{$projet->titre}}</a></h5>

                                                    </div>
                                                </div>
                                            </td>
                                            <a href="">
                                            <td class="align-middle" id="info_person"><span>{{$projet->porteur->user->nom}}<i class="bi bi-person"></i> </span></td>
                                            </a> 
                                               <td class="align-middle bg-secondary.bg-gradient">
                                               <div class="avatar-group">
                                                <div class="icon-shape icon-md border p-4
                                rounded-1">
                                <button class=" btn btn-primary" id="cart">Cart National</button>
                                <img id="myImg" src="{{asset('porteur/projet/images/'.$projet->image)}}" alt="Snow" style="width:100%;max-width:300px">
                                                        </div>
                                               
                                                </div>
                                                </td>
                                               
                                         
                                            <td class="align-middle">
                                                <div class="avatar-group">
                                                <div class="icon-shape icon-md border p-4
                                rounded-1">
                                <button class=" btn btn-primary " id="attestation">Attestation</button>
                                                        </div>
                                               
                                                </div>
                                            </td>
                                            <td class="align-middle text-dark">
                                            
                                                <div class="float-start me-3"> </div>
                                                <div class="mt-2">
                                                <form action="{{ route('accepter',$projet->id)}}" method="POST">
                                              @csrf
                                 
                                                <button type="submit" id="accepter" type="button" class="btn btn-success " style=" padding: 5px ;display:flex;
                                  font-size: 11px;">Accepter</button>
                                                </div>
                                                </form>
                                                <div class="mt-2">
                                                <button type="button" id="refuse" class="btn btn-danger " style=" padding: 5px ;display:flex;
                                  font-size: 11px;">Refusé</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php   
                                            $attestaion=App\Models\Document::where('idProjet','=',$projet->id)->first();
                                            $attestaionPath=$attestaion->path;
                                              ?>
                                            <td  id="cart_national_recto" ></td>
                                            <td  id="cart_national_verso" ></td>
                                            <td  id="attes" ></td>
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
        <form action="{{ route('refuser',$projet->id)}}" method="POST">
        @csrf  
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Raison</h4>
            <button type="button" id="closeBtn" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <select  style="margin:7px;" class="form-select" name="selectRaison" id="" >
                <option value="">sélectionner un raison</option>
                <option value="cart national invalide">cart national invalide</option>
            </select>
            <textarea name="raison" class="form-control"  rows="3" ></textarea>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" >Envoyer</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
<script  >
    
    $(document).on('click','#cart',function(){
        $("#cart_national_recto").append('<img id="myImg" src="{{asset('porteur/personal_file/cni/cni-recto/'.$projet->porteur->cni_file_recto)}}" alt="Snow" style="width:100%;max-width:300px">');
        $("#cart_national_verso").append('<img id="myImg" src="{{asset('porteur/personal_file/cni/cni-verso/'.$projet->porteur->cni_file_verso)}}" alt="Snow" style="width:100%;max-width:300px">');
    });

    $(document).on('click','#attestation',function(){
        $("#attes").append('<img id="myImg" src="{{asset('porteur/personal_file/attestation/'.$attestaionPath)}}" alt="Snow" style="width:100%;max-width:600px">');
    });
    $(document).on('click','#refuse',function(){
        $("#myModal").modal("show");
    });
    $(document).on('click','#closeBtn',function(){
        $("#myModal").modal("hide");
    });
   
    

</script>
@endsection