<?php
$section->appendInnerHTML('
        <div class="container">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="' . (!isset($_POST) ? getActualURL() : (URLWEB_FULL)) . '">
                                    <img class="rounded-circle" src="'.AS_ASSETS.'img/icons/Docente.png">
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
                    <form action="' . getActualURL() . '" method="POST">
                        <div class="mt-3 py-5 border-top text-center">
                            <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <table class="col-lg-12">
                                            <tbody>
                                            <tr>
                                                <td>NOMBRES:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name" placeholder="Ingrese los Nombres"
                                                               type="text">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>APELLIDOS:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                                               placeholder="Ingrese los Apellidos">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>TIPO DE IDENTIFICACIÓN:</td>
                                                <td>
                                                    <div class="dropdown">
                                                      <select id="typeID" name="typeID" class="btn btn-secondary dropdown-toggle">
                                                            <option class="dropdown-item" selected>Seleccione...</option>
                                                            <option class="dropdown-item" >Cedula de Ciudadania</option>
                                                            <option class="dropdown-item" >Pasaporte</option>
                                                            <option class="dropdown-item" >Cedula Extranjera</option>
                                                            
                                                      </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NÚMERO DE IDENTIFICACIÓN:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="numberID" name="numberID"
                                                               placeholder="Ingrese el Número de Identificación">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>FECHA DE NACIMIENTO:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input id="birthday" name="birthday" class="form-control datepicker" placeholder="Select date"
                                                                   type="text" value="' . date('m/d/Y') . '">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>RH:</td>
                                                <td>
                                                    <div class="dropdown">
                                                      <select id="rh" name="rh" class="btn btn-secondary dropdown-toggle">
                                                            <option class="dropdown-item" selected>Seleccione...</option>
                                                            <option class="dropdown-item" >O+</option>
                                                            <option class="dropdown-item" >O-</option>
                                                            <option class="dropdown-item" >AB+</option>
                                                            <option class="dropdown-item" >AB-</option>
                                                            <option class="dropdown-item" >A+</option>
                                                            <option class="dropdown-item" >A-</option>
                                                            <option class="dropdown-item" >B+</option>
                                                            <option class="dropdown-item" >B-</option>
                                                      </select>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>EPS:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="eps" name="eps"
                                                               placeholder="Ingrese su EPS">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Religión:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="religion" name="religion"
                                                               placeholder="Ingrese su Religión">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>NÚMERO DE CELULAR:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="numberPhone" name="numberPhone"
                                                               placeholder="Ingrese el Número de Celular">
                                                    </div>
                                                </td>
                                            </tr>
                                    <tr>
                                        <td>TITULO PROFESIÓN:</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" id="jobTitle" name="jobTitle"
                                                       placeholder="Ingrese la profesión"
                                                       type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FECHA DE INICIO:</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input id="initDate" name="initDate" class="form-control datepicker" placeholder="Select date"
                                                           type="text" value="' . date('m/d/Y') . '">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FECHA DE FIN:</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input id="endDate" name="endDate" class="form-control datepicker" placeholder="Select date"
                                                           type="text" value="' . date('m/d/Y') . '">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>¿Habilitado?:</td>
                                        <td>
                                            <div class="custom-control custom-checkbox mb-3">
                                              <input class="custom-control-input" id="checkEnable" name="checkEnable" type="checkbox">
                                              <label class="custom-control-label" for="checkEnable">
                                                <span>¿Habilitado?</span>
                                              </label>
                                            </div> 
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <input type="submit" onclick="this.disabled=true;this.value=\'Sending, please wait...\';this.form.submit();" class="btn btn-success btn-lg" value="Guardar">
                                <a href="' . (!isset($_POST) ? getActualURL() : (URLWEB_FULL . $pathMain)) . '" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>');