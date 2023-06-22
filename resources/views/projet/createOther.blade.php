
@extends('layouts.app')


@section('title','create projet')

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
        <form action="{{route('save_other')}}" method="POST" enctype='multipart/form-data'>
                @csrf
      <div class="container py-5">
     
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12 d-flex justify-content-center align-items-center">
            <div
              class="col-12 col-sm-12 col-md-10 col-lg-8 card card-registration card-registration-2"
              style="border-radius: 15px; background-color: #f5f5f7"
            >
              <div class="card-body p-0">
                <div
                  class="row d-flex justify-content-center align-items-center g-0"
                >
                  <!-- Les informations du projet -->
                  <div class="col-lg-10 bg-indigo">
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
                            class="form-control @error('image-cara') is-invalid @enderror"
                            type="file"
                            name="image-cara"
                            id="fileInputImage_4"
                            accept="image/*"
                          >
                          @error('image-cara')
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
                      
                      <div class="mb-4 pb-2">
                        <div class="form-floating">
                          <textarea
                            class="form-control @error('des') is-invalid @enderror"
                            name="description"
                            id="summernote"
                            style="height: 200px"
                          >{{ old('description') }}</textarea>
                          @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
            data-mdb-ripple-color="dark"
          >
            LANCER MON PROJET
          </button>
        </div>
  
      </div>
      </form>
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

