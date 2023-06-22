@extends('layouts.app')


@section('title','créer projet')

@section('content')
    <section id="launch_project" class="h-100 h-custom gradient-custom-2">
    @if(Session::has('success'))
     <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif
                   @if(Session::has('error'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{Session::get('success')}}</strong>.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
                   @endif  
      <div class="container py-5">
      <form action="{{route('save_project')}}" method="POST" enctype='multipart/form-data'>
           @csrf
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12">
            <div
              class="card card-registration card-registration-2"
              style="border-radius: 15px"
            >
              <div class="card-body p-0">
                <div class="row g-0">
                
                  <!-- Les informations personnelles -->
                 <div class="col-lg-6">
                    <div class="p-5">
                      <h3 class="fw-normal mb-5">Informations personnelles</h3>
                      <div class="row">
                        <div class="col-md-6 mb-4 pb-2">
                          <div class="form-floating">
                            <input
                              type="text"
                              id="prenom"
                              name="prenom"
                              value=" @if(Auth::user()->prenom!=null){{Auth::user()->prenom}}  @else  {{ old('prenom')}}@endif"
                              class="form-control form-control-lg @error('prenom') is-invalid @enderror"
                              placeholder="Prénom"
                            >
                            <label for="prenom" for="">Prénom</label>
                            @error('prenom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                          </div>
                        </div>

                        <div class="col-md-6 mb-4 pb-2">
                          <div class="form-floating">
                            <input
                              type="text"
                              name="nom"
                              id="nom"
                              value="@if(Auth::user()->nom!=null){{Auth::user()->nom}}  @else  {{ old('nom')}}@endif"
                              class="form-control form-control-lg @error('nom') is-invalid @enderror"
                              placeholder="Nom"
                            >
                            <label for="nom">Nom</label>
                            @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          </div>
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            name="cni"
                            id="cni-recto"
                            value="{{ old('cni') }}"
                            class="form-control form-control-lg @error('cni') is-invalid @enderror"
                            placeholder="CNI"
                          >
                          <label for="cni-recto">CNI</label>
                          @error('cni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <select
                           name="ville"
                            class="form-select"
                            id="forcity"
                            aria-label="Floating label select example"
                          > 
                          <option selected >sélectionner votre ville</option>
                           @foreach($villes as $ville)
                             @if( Auth::user()->ville!=null && $ville==Auth::user()->ville)
                            <option  selected value="{{$ville->ville}}" >{{$ville->ville}}</option>
                            @else
                            <option value="{{$ville->ville}}" >{{$ville->ville}}</option>
                            @endif
                            @endforeach
                          </select>
                          <label for="forcity">Ville</label>
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            id="localisation"
                            name="localisation"
                            value="{{ old('localisation') }}"
                            class="form-control form-control-lg @error('localisation') is-invalid @enderror"
                            placeholder="Localisation"
                          >
                          <label for="localisation">Localisation</label>
                            @error('localisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <input
                            type="phone"
                            name="tel"
                            id="tel"
                            value="{{ old('tel') }}"
                            class="form-control form-control-lg @error('tel') is-invalid @enderror"
                            placeholder="Numéro de téléphone"
                          >
                          <label for="tel">Numéro de téléphone</label>
                          @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="mb-2">Carte Nationale d'Identité (CNI)</div>
                        <div class="mb-3">
                          <label for="fileInputImage_1" class="form-label">Recto</label>
                          <input
                            class="form-control @error('file-cni-recto') is-invalid @enderror"
                            id="fileInputImage_1"
                            name="file-cni-recto"
                            value="{{ old('file-cni-recto') }}"
                            type="file"
                            accept="image/*"
                          >
                          @error('file-cni-recto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                          <div
                            id="messageError_1"
                            class="text-danger mt-1"
                          ></div>
                        </div>
                        <div class="mb-3">
                          <label for="fileInputImage_2" class="form-label">Verso</label>
                          <input
                            class="form-control @error('file-cni-verso') is-invalid @enderror"
                            id="fileInputImage_2"
                            type="file"
                            value="{{ old('file-cni-verso') }}"
                            name="file-cni-verso"
                            accept="image/*"
                          >
                          @error('file-cni-verso')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                          <div
                            id="messageError_2"
                            class="text-danger mt-1"
                          ></div>
                        </div>
                      </div>
                      <div class="mb-4 pb-2">
                        <div class="mb-3">
                          <label for="fileInputImage_3" class="form-label"
                            >Attestation de besoin</label
                          >
                          <input
                            class="form-control  @error('attestation') is-invalid @enderror"
                            id="fileInputImage_3"
                            type="file"
                            name="attestation"
                            value="{{ old('attestation') }}"
                            accept="image/*"
                          >
                          @error('attestation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               @enderror
                          <div
                            id="messageError_3"
                            class="text-danger mt-1"
                          ></div>
                        </div>
                      </div>
                    </div>
                  </div>

            
                  <div class="col-lg-6 bg-indigo">
                    <div class="p-5">
                      <h3 class="fw-normal mb-5">Informations du projet</h3>

                      <div class="mb-4 pb-2">
                        <div class="mb-2">Montant de l'objectif</div>
                        <div class="input-group">
                          <input
                           name="budget"
                            type="text"
                            class="form-control @error('budget') is-invalid @enderror"
                            value="{{ old('budget') }}" 
                            aria-label=""
                          >
                          <span class="input-group-text">Dh</span>
                          @error('budget')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <input
                            type="text"
                            id="fortitre"
                            name="titre"
                            class="form-control form-control-lg  @error('titre') is-invalid @enderror"
                            value="{{ old('titre') }}"
                            placeholder="Titre du projet"
                          >
                          <label for="fortitre">Titre du projet</label>
                          @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
          
                      <div class="mb-4 pb-2">
                        <div class="mb-3">
                          <label for="fileInputImage_4" class="form-label"
                            >Image caractéristiques
                          </label>
                          <input
                            class="form-control @error('image-principale') is-invalid @enderror"
                            type="file"
                            name="image-principale"
                            id="fileInputImage_4"
                            value="{{ old('image-principale') }}"
                            accept="image/*"
                          >
                          @error('image-principale')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                              </span>
                          @enderror
  
                          <div
                            id="messageError_4"
                            class="text-danger mt-1"
                          ></div>
                        </div>
                        <div id="preview"></div>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <select
                            class="form-select"
                            id="floatingSelect"
                            name="categorie"
                            aria-label="Floating label select example"
                          >
                          @foreach($catigories as $categorie)
                        <option value="{{$categorie->id}}">{{$categorie->nom}}

                       </option>
                        @endforeach
                          </select>
                          <label for="floatingSelect">Catégorie</label>
                        </div>
                      </div>

                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <textarea
                            id="TTTT"
                            class="form-control @error('des') is-invalid @enderror"
                            name="des"
                            style="height: 200px"
                           >{{ old('des') }}</textarea>
                          <label for="TTTT"
                            >Description du projet</label
                          >
                                @error('des')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                      </div>
                        <textarea name="description" id="summernote" cols="30" rows="10">{{ old('description') }}</textarea>
                     
                      <div class="mb-4 pb-2">
                        <div class="form-group">
                          <div class="mb-2">Date de fin</div>
                          <div class="">
                            <div class="input-group date " id="datepicker">
                              <input name="datefinal" type="text" class="form-control  @error('datefinal') is-invalid @enderror)" value="{{ old('datefinal') }}">
                              <span class="input-group-append">
                                <span class="input-group-text bg-white h-100">
                                  <i class="fa fa-calendar"></i>
                                </span>
                               
                              </span>
                              @error('datefinal')
                           <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <button
            id="btn-lance-project"
            type="submit"
            class="btn btn-success p-3 my-3 col-6"
          >
            LANCER MON PROJET
          </button>
        </div>
        </form>
      </div>
     
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
       <script>
$(document).ready(function() {
  $('#summernote').summernote({
        placeholder: 'description détaillée',
        tabsize: 2,
        height: 300,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      })
});
    
    </script>
@endsection


    