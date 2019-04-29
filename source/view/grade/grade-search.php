<?php
$section->appendInnerHTML('
        <div class="container">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img class="rounded-circle" src="' . AS_ASSETS . 'img/icons/Grado.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                        </div>
                        <div class="col-lg-4 order-lg-1">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">Busqueda de:</span>
                                    <span class="description">Grado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <h1>Grado</h1>
                        <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i></div>
                    </div>
                    <div class="mt-3 py-5 border-top text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <table class="col-lg-12">
                                        <tbody>
                                        <tr class="tableizer-firstrow"><td>NOMBRE DEL GRADO:</td><td><div class="form-group">
                                            <input type="text" class="form-control" id="idGrade" placeholder="Digite el nombre">
                                        </div></td></tr>
                                        <tr class="tableizer-firstrow"><td>Información del Grado:</td><td><div class="form-group">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Write a large text here ..."></textarea>
                                        </div></td></tr>
                                        </tbody>
                                </table>
                                <hr/>
                                <button type="button" class="btn btn-secondary btn-lg">Buscar</button>
                                <button type="button" class="btn btn-danger btn-lg">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>');