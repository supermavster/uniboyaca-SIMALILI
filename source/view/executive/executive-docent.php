<?php
$section->appendInnerHTML('
      <div class="container">
        <div class="card card-profile shadow ">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img class="rounded-circle" src="' . AS_ASSETS . 'img/icons/Docente.png">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div style="background:white">
                    <span class="heading">Bienvenido Director</span>
                    <span class="description">A SIMALILI</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h1>Docente</h1>
              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i></div>
            </div>
            <div class="mt-3 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-12">
                  <a class="btn btn-outline-default" href="../docent-new">Nuevo Docente</a>
                  <a class="btn btn-outline-default" href="../docent-modify">Modificar Docente</a>
                  <a class="btn btn-outline-default" href="../docent-delete">Borrar Docente</a>
                  <a class="btn btn-outline-default" href="../docent-search">Buscar Docente</a>
                </div>
              </div>
              <br/>
              <div class="row justify-content-center">
                <div class="col-lg-12">
                  <a class="btn btn-outline-default" href="../docent-assign">Asignar Docente</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>');