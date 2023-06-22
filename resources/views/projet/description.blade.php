@extends('layouts.app')


@section('title','description')

@section('content')

    <section id="page-project" class="">
      <!-- Partie 1 -->
      <div class="section-1 pt-5">
        <div class="container-fluid container-lg bg-white px-5">
          <div class="row d-none d-lg-block py-4">
            <div class="title-project text-center">
              {{$projets->titre}}
            </div>

            <div class="description-project text-center">
            {{$projets->description}}
            </div>
          </div>
          <div class="row">
            <div class="col-lg-7 p-0">
              <img
                src="{{asset('porteur/projet/images/'.$projets->image)}}"
                class="img-fluid w-100 h-auto"
                alt=""
              />

              <div class="row d-lg-none">
                <div class="title-project-1">
                {{$projets->titre}}
                </div>
                <div class="description-project">
                {{$projets->description}}
                </div>
              </div>
            </div>

            <div class="col-lg-5 p-5 d-flex flex-column justify-content-center">
              <div class="row mb-4">
                <div class="col-2 d-flex align-items-center">
                  <img
                    src="{{asset('Project_description/images/des_icon.png')}}"
                    class="img-fluid w-100 h-auto"
                    alt=""
                  />
                </div>
                <div class="col d-flex flex-column justify-content-center">
                  <div class="row">
                    <div class="col need-price">{{$projets->total}} MAD</div>
                  </div>
                  <div class="row">
                    <div
                      class="col-2 d-flex align-items-center justify-content-center"
                      style="
                        font-size: 15px;
                        font-weight: 600;
                        background: #004e69;
                        color: white;
                      "
                    >
                      {{$projets->total*100/$projets->budget}}%
                    </div>
                    <div class="col text d-flex align-items-center">
                      sur un objectif de {{ $projets->budget}} MAD
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-4">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="right-col">
                    <div
                      class="d-flex align-items-center justify-content-start"
                    >
                      <div>
                        <i
                          class="ri-file-user-line d-flex align-items-center justify-content-center"
                          style="font-size: 32px"
                        ></i>
                      </div>
                      <div class="ps-2 d-flex align-items-center">
                        <span class="number">{{$donnateurs->count()}}</span>
                        <span class="text">contributions</span>
                      </div>
                    </div>
                  </div>
                  <div class="left-col">
                    <div
                      class="image d-flex align-items-center justify-content-start"
                    >
                      <div>
                        <i
                          class="ri-history-fill d-flex align-items-center justify-content-center"
                          style="font-size: 32px"
                        ></i>
                      </div>
                      <div class="ps-2 d-flex align-items-center">
    
                        <span class="number">{{$duree_rest}}</span>
                        <span class="text">jours restants</span>
                      
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="btn-contribuer p-3">
                  CONTRIBUER AU PROJET <br />
                  Â partir de 10 MAD
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-3 mb-4 pb-4">
            <div class="col-lg-7">
              <div class="row">
                <div class="col-1 p-0 d-flex align-items-center">
                  <img
                    src="images/Zakaria_ASENSOUYIS.jpg"
                    class="w-100 h-auto rounded-circle"
                    alt=""
                  />
                </div>
                <div class="col-11 d-flex flex-column justify-content-center">
                  <div
                    class=""
                    style="
                      font-size: 16px;
                      font-weight: 600;
                      text-transform: capitalize;
                    "
                  >
                    Titre de test 1
                  </div>
                  <div class="d-flex">
                    <div class="me-4" style="font-size: 13px">
                      <!-- remix icon -->
                      <i class="ri-map-pin-line" style="color: #a19595"></i>
                     {{$projets->porteur->user->ville}}
                    </div>
                    <div class="" style="font-size: 13px">
                      <!-- remix icon -->
                      <i
                        class="ri-price-tag-3-line"
                        style="color: #a19595; font-size: 13px"
                      ></i>
                      {{$projets->categorie->nom}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="col-lg-5 p-0 d-flex align-items-end justify-content-center justify-content-lg-end"
            >
              <div
                class="d-flex justify-content-center justify-content-lg-end w-100 mb-1 p-0"
              >
                <div class="btn-icon btn btn-light" style="font-size: 13px">
                  PARTAGER
                  <i class="ri-share-line ps-2"></i>
                </div>
                <div class="btn-icon btn btn-light" style="font-size: 13px">
                  SUIVRE
                  <i class="ri-heart-line ps-2"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Partie 2 -->
      <div class="container-fluid container-lg bg-white">
        <!-- tab-titles -->
        <div class="tab-titles">
          <p class="tab-links active-link" onclick="opentab('account')">
            Projet
          </p>
          <p class="tab-links" onclick="opentab('password')">Contributions</p>
          <!-- <p class="tab-links" onclick="opentab('notifications')">
            Commentaires
          </p> -->
        </div>

        <!-- tab-contents -->
        <div class="tab-contents active-tab" id="account">
          <div class="contents">
           {!! $projets->description_det !!}
          </div>
        </div>
        <div class="tab-contents" id="password">
          <div class="contents">
          <div class="title row py-4 fw">{{$donnateurs->count()}} contributions à ce projet</div>
          @foreach($donnateurs as $donnateur)
          <div
        class="row d-flex align-items-center border border-light border-3 py-3 px-2"
      >
        <div class="col-2 col-md-1 col-lg-1">
          <img
            src="{{asset('dist/img/'.$donnateur->picture)}}"
            class="w-100 h-auto rounded-circle"
            alt=""
          />
        </div>
        <div class="col-8">
          <span class="fw-bold">{{$donnateur->username}}</span> a contribué au projet par
          un don
        </div>
        <div
          class="day-cont col-2 col-md-3 col-lg-3 d-flex justify-content-end text-secondary"
        >
          {{ Carbon\Carbon::now()->diffInDays(Carbon\Carbon::parse($donnateur->created_at))}} jours
        </div>
      </div>
          @endforeach
            <div class="d-flex justify-content-center my-3">
              <div id="btn-more" class="btn-contribution btn btn-outline-primary px-5 py-2">
                VOIR PLUS
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="tab-contents" id="notifications">
          <div class="contents">commentaires</div>
        </div> -->
      </div>
    </section>
  

  



@endsection