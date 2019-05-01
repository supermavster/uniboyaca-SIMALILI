<?php
$section->appendInnerHTML('
        <div class="container">
            <div class="card card-profile shadow ">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img class="rounded-circle" src="' . AS_ASSETS . 'img/icons/Asignatura.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                        </div>
                        <div class="col-lg-4 order-lg-1">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div style="background:white">
                    <span class="heading">Gestion de:</span>
                                    <span class="description">Asignatura</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <h1>Asignatura</h1>
                        <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i></div>
                    </div>
                    <div class="mt-3 py-5 border-top text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <table class="col-lg-12">
                                        <thead><tr class="tableizer-firstrow"><th>CODIGO ASIGNATURA:</th><th><div class="form-group">
        <input type="text" class="form-control" id="exampleFormControlInput11" placeholder="Ingresar codigo">
      </div></th></tr></thead><tbody>
                                    <tr><td>NOMBRE:</td><td><div class="form-group">
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar nombre">
      </div></td></tr>
                                    <tr><td>CURSO ASIGNADO:</td><td><div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione
                                        </button>
                                        <div aria-labelledby="dropdownMenuButton" class="dropdown-menu pre-scrollable">
                                        </div>
                                    </div></td></tr>
                                    <tr><td>DOCENTE ASIGNADO:</td><td><div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Seleccione
                                        </button>
                                        <div aria-labelledby="dropdownMenuButton1" class="dropdown-menu pre-scrollable">
                                        </div>
                                    </div></td></tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <button type="button" class="btn btn-success btn-lg">Guardar</button>
                                <button type="button" class="btn btn-danger btn-lg">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>');