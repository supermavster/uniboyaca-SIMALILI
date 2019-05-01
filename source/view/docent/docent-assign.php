<?php
$section->appendInnerHTML('
        <div class="container">
            <div class="card card-profile shadow mt--300">
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
                    <span class="heading">Gestion de:</span>
                                    <span class="description">Docente</span>
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
                                <table class="col-lg-12">
                                    <tbody>
                                    <tr class="tableizer-firstrow">
                                        <td>CODIGO ASIGNATURA:</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                        id="typeID" type="button">
                                                    Seleccione
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DOCENTE ASIGNADO:</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                        id="nameDocent" type="button">
                                                    Seleccione
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Registro Civil</a>
                                                    <a class="dropdown-item" href="#">Tarjeta de Identidad</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <button class="btn btn-success btn-lg" type="button">Guardar</button>
                                <button class="btn btn-danger btn-lg" type="button">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>');