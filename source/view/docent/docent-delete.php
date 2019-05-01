<?php
$section->appendInnerHTML('
        <div class="container">
            <div class="card card-profile shadow ">
                <div class="px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img class="rounded-circle" src="'.AS_ASSETS.'img/icons/Docente.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                        </div>
                        <div class="col-lg-4 order-lg-1">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div>
                                    <span class="heading">Eliminación de:</span>
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
                                        <td>NOMBRE COMPLETO:</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                        id="fullName" type="button">
                                                    Seleccione
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                    <a class="dropdown-item" href="#"></a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TIPO DE IDENTIFICACIÓN:</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                        id="typeID" type="button">
                                                    Seleccione
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Registro Civil</a>
                                                    <a class="dropdown-item" href="#">Tarjeta de Identidad</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>NÚMERO DE IDENTIFICACIÓN:</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" id="numbreID"
                                                       placeholder="Ingrese el Número de Identificación"
                                                       type="text">
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
                                                    <input class="form-control datepicker" placeholder="Select date"
                                                           type="text" value="06/20/2018">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>LUGAR DE NACIMIENTO:</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" id="lugarNacimiento"
                                                       placeholder="Ingrese el lugar de nacimiento"
                                                       type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EDAD:</td>
                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                        class="btn btn-secondary dropdown-toggle"
                                                        data-toggle="dropdown" id="dropdownMenuButton"
                                                        type="button">
                                                    Seleccione
                                                </button>
                                                <div aria-labelledby="dropdownMenuButton"
                                                     class="dropdown-menu pre-scrollable">
                                                    <a class="dropdown-item" href="#">18</a><a class="dropdown-item"
                                                                                               href="#">19</a><a
                                                        class="dropdown-item" href="#">20</a><a class="dropdown-item"
                                                                                                href="#">21</a><a
                                                        class="dropdown-item" href="#">22</a><a class="dropdown-item"
                                                                                                href="#">23</a><a
                                                        class="dropdown-item" href="#">24</a><a class="dropdown-item"
                                                                                                href="#">25</a><a
                                                        class="dropdown-item" href="#">26</a><a class="dropdown-item"
                                                                                                href="#">27</a><a
                                                        class="dropdown-item" href="#">28</a><a class="dropdown-item"
                                                                                                href="#">29</a><a
                                                        class="dropdown-item" href="#">30</a><a class="dropdown-item"
                                                                                                href="#">31</a><a
                                                        class="dropdown-item" href="#">32</a><a class="dropdown-item"
                                                                                                href="#">33</a><a
                                                        class="dropdown-item" href="#">34</a><a class="dropdown-item"
                                                                                                href="#">35</a><a
                                                        class="dropdown-item" href="#">36</a><a class="dropdown-item"
                                                                                                href="#">37</a><a
                                                        class="dropdown-item" href="#">38</a><a class="dropdown-item"
                                                                                                href="#">39</a><a
                                                        class="dropdown-item" href="#">40</a><a class="dropdown-item"
                                                                                                href="#">41</a><a
                                                        class="dropdown-item" href="#">42</a><a class="dropdown-item"
                                                                                                href="#">43</a><a
                                                        class="dropdown-item" href="#">44</a><a class="dropdown-item"
                                                                                                href="#">45</a><a
                                                        class="dropdown-item" href="#">46</a><a class="dropdown-item"
                                                                                                href="#">47</a><a
                                                        class="dropdown-item" href="#">48</a><a class="dropdown-item"
                                                                                                href="#">49</a><a
                                                        class="dropdown-item" href="#">50</a><a class="dropdown-item"
                                                                                                href="#">51</a><a
                                                        class="dropdown-item" href="#">52</a><a class="dropdown-item"
                                                                                                href="#">53</a><a
                                                        class="dropdown-item" href="#">54</a><a class="dropdown-item"
                                                                                                href="#">55</a><a
                                                        class="dropdown-item" href="#">56</a><a class="dropdown-item"
                                                                                                href="#">57</a><a
                                                        class="dropdown-item" href="#">58</a><a class="dropdown-item"
                                                                                                href="#">59</a><a
                                                        class="dropdown-item" href="#">60</a><a class="dropdown-item"
                                                                                                href="#">61</a><a
                                                        class="dropdown-item" href="#">62</a><a class="dropdown-item"
                                                                                                href="#">63</a><a
                                                        class="dropdown-item" href="#">64</a><a class="dropdown-item"
                                                                                                href="#">65</a><a
                                                        class="dropdown-item" href="#">66</a><a class="dropdown-item"
                                                                                                href="#">67</a><a
                                                        class="dropdown-item" href="#">68</a><a class="dropdown-item"
                                                                                                href="#">69</a><a
                                                        class="dropdown-item" href="#">70</a><a class="dropdown-item"
                                                                                                href="#">71</a><a
                                                        class="dropdown-item" href="#">72</a><a class="dropdown-item"
                                                                                                href="#">73</a><a
                                                        class="dropdown-item" href="#">74</a><a class="dropdown-item"
                                                                                                href="#">75</a><a
                                                        class="dropdown-item" href="#">76</a><a class="dropdown-item"
                                                                                                href="#">77</a><a
                                                        class="dropdown-item" href="#">78</a><a class="dropdown-item"
                                                                                                href="#">79</a><a
                                                        class="dropdown-item" href="#">80</a><a class="dropdown-item"
                                                                                                href="#">81</a><a
                                                        class="dropdown-item" href="#">82</a><a class="dropdown-item"
                                                                                                href="#">83</a><a
                                                        class="dropdown-item" href="#">84</a><a class="dropdown-item"
                                                                                                href="#">85</a><a
                                                        class="dropdown-item" href="#">86</a><a class="dropdown-item"
                                                                                                href="#">87</a><a
                                                        class="dropdown-item" href="#">88</a><a class="dropdown-item"
                                                                                                href="#">89</a><a
                                                        class="dropdown-item" href="#">90</a><a class="dropdown-item"
                                                                                                href="#">91</a><a
                                                        class="dropdown-item" href="#">92</a><a class="dropdown-item"
                                                                                                href="#">93</a><a
                                                        class="dropdown-item" href="#">94</a><a class="dropdown-item"
                                                                                                href="#">95</a><a
                                                        class="dropdown-item" href="#">96</a><a class="dropdown-item"
                                                                                                href="#">97</a><a
                                                        class="dropdown-item" href="#">98</a><a class="dropdown-item"
                                                                                                href="#">99</a><a
                                                        class="dropdown-item" href="#">100</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>EPS:</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" id="eps" placeholder="Ingrese la EPS"
                                                       type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>RELIGIÓN:</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" id="religion"
                                                       placeholder="Ingrese la religion"
                                                       type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>TITULO PROFESIÓN:</td>
                                        <td>
                                            <div class="form-group">
                                                <input class="form-control" id="profetion"
                                                       placeholder="Ingrese la profesión"
                                                       type="text">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FECHA REGISTRO:</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input class="form-control datepicker" placeholder="Select date"
                                                           type="text" value="06/20/2018">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>FECHA FIN:</td>
                                        <td>
                                            <div class="form-group">
                                                <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input class="form-control datepicker" placeholder="Select date"
                                                           type="text" value="06/20/2018">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <hr/>
                                <button class="btn btn-warning btn-lg" type="button">Eliminar</button>
                                <button class="btn btn-danger btn-lg" type="button">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>');