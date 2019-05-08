<?php
$section->appendInnerHTML('
        <div class="container">
            <div class="card card-profile shadow mt--300">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img class="rounded-circle" src="'.AS_ASSETS.'img/icons/Matricula.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                        </div>
                        <div class="col-lg-4 order-lg-1">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div style="background:white">
                    <span class="heading">Gestion de:</span>
                                    <span class="description">Matrícula</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <h1>Matrícula</h1>
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
                                                            <option class="dropdown-item" >Cedula</option>
                                                            <option class="dropdown-item" >Pasaporte</option>
                                                            <option class="dropdown-item" >Cedula extranjería</option>
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
                                                                   type="text" value="06/20/2018">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>LUGAR DE NACIMIENTO:</td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="birthplace" name="birthplace"
                                                               placeholder="Ingrese el Lugar de Nacimiento">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>EDAD:</td>
                                                <td>
                                                    <div class="dropdown">
                                                    <select id="years" name="years" class="btn btn-secondary dropdown-toggle">
                                                        <option class="dropdown-item" selected>Seleccione...</option>      
                                                        <option class="dropdown-item">18</option>
                                                        <option class="dropdown-item" >19</option>
                                                        <option class="dropdown-item" >20</option>
                                                        <option class="dropdown-item" >21</option>
                                                        <option class="dropdown-item" >22</option>
                                                        <option class="dropdown-item" >23</option>
                                                        <option class="dropdown-item" >24</option>
                                                        <option class="dropdown-item" >25</option>
                                                        <option class="dropdown-item" >26</option>
                                                        <option class="dropdown-item" >27</option>
                                                        <option class="dropdown-item" >28</option>
                                                        <option class="dropdown-item" >29</option>
                                                        <option class="dropdown-item" >30</option>
                                                        <option class="dropdown-item" >31</option>
                                                        <option class="dropdown-item" >32</option>
                                                        <option class="dropdown-item" >33</option>
                                                        <option class="dropdown-item" >34</option>
                                                        <option class="dropdown-item" >35</option>
                                                        <option class="dropdown-item" >36</option>
                                                        <option class="dropdown-item" >37</option>
                                                        <option class="dropdown-item" >38</option>
                                                        <option class="dropdown-item" >39</option>
                                                        <option class="dropdown-item" >40</option>
                                                        <option class="dropdown-item" >41</option>
                                                        <option class="dropdown-item" >42</option>
                                                        <option class="dropdown-item" >43</option>
                                                        <option class="dropdown-item" >44</option>
                                                        <option class="dropdown-item" >45</option>
                                                        <option class="dropdown-item" >46</option>
                                                        <option class="dropdown-item" >47</option>
                                                        <option class="dropdown-item" >48</option>
                                                        <option class="dropdown-item" >49</option>
                                                        <option class="dropdown-item" >50</option>
                                                        <option class="dropdown-item" >51</option>
                                                        <option class="dropdown-item" >52</option>
                                                        <option class="dropdown-item" >53</option>
                                                        <option class="dropdown-item" >54</option>
                                                        <option class="dropdown-item" >55</option>
                                                        <option class="dropdown-item" >56</option>
                                                        <option class="dropdown-item" >57</option>
                                                        <option class="dropdown-item" >58</option>
                                                        <option class="dropdown-item" >59</option>
                                                        <option class="dropdown-item" >60</option>
                                                        <option class="dropdown-item" >61</option>
                                                        <option class="dropdown-item" >62</option>
                                                        <option class="dropdown-item" >63</option>
                                                        <option class="dropdown-item" >64</option>
                                                        <option class="dropdown-item" >65</option>
                                                        <option class="dropdown-item" >66</option>
                                                        <option class="dropdown-item" >67</option>
                                                        <option class="dropdown-item" >68</option>
                                                        <option class="dropdown-item" >69</option>
                                                        <option class="dropdown-item" >70</option>
                                                        <option class="dropdown-item" >71</option>
                                                        <option class="dropdown-item" >72</option>
                                                        <option class="dropdown-item" >73</option>
                                                        <option class="dropdown-item" >74</option>
                                                        <option class="dropdown-item" >75</option>
                                                        <option class="dropdown-item" >76</option>
                                                        <option class="dropdown-item" >77</option>
                                                        <option class="dropdown-item" >78</option>
                                                        <option class="dropdown-item" >79</option>
                                                        <option class="dropdown-item" >80</option>
                                                        <option class="dropdown-item" >81</option>
                                                        <option class="dropdown-item" >82</option>
                                                        <option class="dropdown-item" >83</option>
                                                        <option class="dropdown-item" >84</option>
                                                        <option class="dropdown-item" >85</option>
                                                        <option class="dropdown-item" >86</option>
                                                        <option class="dropdown-item" >87</option>
                                                        <option class="dropdown-item" >88</option>
                                                        <option class="dropdown-item" >89</option>
                                                        <option class="dropdown-item" >90</option>
                                                        <option class="dropdown-item" >91</option>
                                                        <option class="dropdown-item" >92</option>
                                                        <option class="dropdown-item" >93</option>
                                                        <option class="dropdown-item" >94</option>
                                                        <option class="dropdown-item" >95</option>
                                                        <option class="dropdown-item" >96</option>
                                                        <option class="dropdown-item" >97</option>
                                                        <option class="dropdown-item" >98</option>
                                                        <option class="dropdown-item" >99</option>
                                                        <option class="dropdown-item" >100</option>
                                                        </select>
                                                    </div>
                                                </td>
                                            </tr>
                                    <tr>
                                    <tr>
                                        <td>RH:</td>
                                        <td>
                                            <div class="dropdown">
                                                    <select id="rh" name="rh" class="btn btn-secondary dropdown-toggle">
                                                        <option class="dropdown-item" selected>Seleccione...</option>
                                                        <option class="dropdown-item">A+</option>
                                                        <option class="dropdown-item"> A-</option>
                                                        <option class="dropdown-item">B+</option>
                                                        <option class="dropdown-item">B-</option>
                                                        <option class="dropdown-item">AB+</option>
                                                        <option class="dropdown-item">AB-</option>
                                                        <option class="dropdown-item">O+</option>
                                                        <option class="dropdown-item">O-</option>
                                                      </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EPS:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="eps" name="eps"
                                                       placeholder="Ingresar EPS">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NOMBRE DEL PADRE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nameFather" name="nameFather"
                                                       placeholder="Ingresar nombre Padre">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CEDULA DEL PADRE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="ccFather" name="ccFather"
                                                       placeholder="Ingresar CC Padre">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TELEFONO DEL PADRE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="phoneFather" name="phoneFather"
                                                       placeholder="Ingresar tel. Padre">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NOMBRE DE LA MADRE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nameMother" name="nameMother"
                                                       placeholder="Ingresar nom. Madre">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>CEDULA DE LA MADRE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="ccMother" name="ccMother"
                                                       placeholder="Ingresar CC Madre">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TELEFONO DE LA MADRE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="phoneMother" name="phoneMother"
                                                       placeholder="Ingresar tel. Madre ">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NOMBRE DEL ACUDIENTE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="nameAttendant" name="nameAttendant"
                                                       placeholder="Ingresar nombre Ac.">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TELEFONO DEL ACUDIENTE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="phoneAttendant" name="phoneAttendant"
                                                       placeholder="Ingresar tel">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>PARENTESCO:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="relationship" name="relationship"
                                                       placeholder="Ingresar parentesco">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>DIRECCIÓN:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="address" name="address"
                                                       placeholder="Ingresar direccion">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>GRADO:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="grade" name="grade"
                                                       placeholder="Ingresar grado">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RELIGIÓN:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="religion" name="religion"
                                                       placeholder="Ingresar religión">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>INSTITUCION DE DONDE PROVIENE:</td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="institute" name="institute"
                                                       placeholder="Ingresar institucion">
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <input type="submit" onclick="this.disabled=true;this.value=\'Sending, please wait...\';this.form.submit();" class="btn btn-success btn-lg" value="Guardar">
                                <a href="' . URLWEB_FULL . '" class="btn btn-danger btn-lg">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>');