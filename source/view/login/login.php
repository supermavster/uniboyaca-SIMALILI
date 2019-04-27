<?php
$section->appendInnerHTML('<div class="container pt-lg-md">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card bg-secondary shadow border-0">

                        <h2 class="text-center my-4">Bienvenido a SIMALILI</h2>
                        <div class="card-body px-lg-5 py-lg-5">
                            <div class="row">
                                <div class="col">
                                    <div class="text-center text-muted mb-4">
                                        <img src="' . AS_ASSETS . 'img/logo/logo.png" width="260">
                                    </div>
                                    <div class="text-center">
                                        <a class="btn btn-darker my-2" href="signin-executive.html">Directivo</a>
                                        <a class="btn btn-darker my-2" href="signin-secretary.html">Secretaria</a>
                                    </div>
                                </div>
                                <div class="col">
                                    <form role="form">
                                        <div class="form-group mb-3">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-circle-08"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Usuario" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group input-group-alternative">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="ni ni-lock-circle-open"></i></span>
                                                </div>
                                                <input class="form-control" placeholder="Contraseña" type="password">
                                            </div>
                                        </div>
                                        <div class="custom-control custom-control-alternative custom-checkbox">
                                            <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                            <label class="custom-control-label" for=" customCheckLogin">
                                                <span>Recordarme</span>
                                            </label>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-success my-4" type="button">Inciar Sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <a href="#" class="text-light">
                                <small>Olvido la Contraseña?</small>
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <a href="#" class="text-light">
                                <small>Crear una nueva Cuenta</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>');