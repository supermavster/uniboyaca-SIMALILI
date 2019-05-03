<?php
/** Docent Actions **/
// Show grades registers
$docentNames = $connection->db_exec("fetch_array", DocentDAO::getNameDocents());
$names = "<option class=\"dropdown-item\" selected>Seleccione...</option>";
foreach ($docentNames as $keys => $values) {
    $names .= '<option class="dropdown-item" >' . $values[0] . '</option>';
}

$subjectNames = $connection->db_exec("fetch_array", SubjectDAO::getName());
$nameSubject = "<option class=\"dropdown-item\" selected>Seleccione...</option>";
foreach ($subjectNames as $keys => $values) {
    $names .= '<option class="dropdown-item" >' . $values[0] . '</option>';
}


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
                                                                                                            <select id="subject" name="subject" class="btn btn-secondary dropdown-toggle">
                                                            ' . $nameSubject . '
                                                            </select>
</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DOCENTE ASIGNADO:</td>
                                        <td>
                                            <div class="dropdown">
                                                                                                            <select id="fullName" name="fullName" class="btn btn-secondary dropdown-toggle">
                                                            ' . $names . '
                                                            </select>
</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <button class="btn btn-success btn-lg" type="submit">Guardar</button>
                                <a href="javascript:location.reload();" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>');