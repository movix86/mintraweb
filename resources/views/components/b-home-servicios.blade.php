
<div>
{{--
    <div class="row padding-20">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="row">
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="https://sicu.uniagustiniana.edu.co/kawak/" target="_blank" class="btn btn-success b1">SICU</a>
                </div>
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="http://sisot.uniagustiniana.edu.co/glpi/" target="_blank" class="btn btn-danger b1">SISOT</a>
                </div>
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="http://sipaerp.uniagustiniana.edu.co:8000/psp/UAEP92PR/?cmd=login&languageCd=ESP&" target="_blank" class="btn btn-secondary b1"><span class="font-buttons-services">SIPA-ERP</span></a>
                </div>
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="http://sipahcm.uniagustiniana.edu.co:8000/psp/UAHC92PR/?cmd=login&languageCd=ESP&" target="_blank" class="btn btn-primary b1"><span class="font-buttons-services">SIPA-HCM</span></a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="row">
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="http://sipacrm.uniagustiniana.edu.co:8000/psp/UACR92PR/?cmd=login&languageCd=ESP&" target="_blank" class="btn btn-warning b1"><span class="font-buttons-services">SIPA-CRM</span></a>
                </div>
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="https://myaccount.google.com/" target="_blank" class="btn btn-danger b1">CORREO</a>
                </div>
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="http://permanencia.uniagustiniana.edu.co/adviser/login.php" target="_blank" class="btn btn-info b1">ADVISER</a>
                </div>
                <div class="col-6 sm-6 col-md-6 col-lg-3" align="center">
                    <a href="https://app.powerbi.com/" target="_blank" class="btn btn-warning b1">POWER BI</a>
                </div>
            </div>
        </div>
    </div>
--}}
    <div class="row padding-20">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="row">
                <div class="col-12" align="center">
                    <div class="b2">
                        <a href="https://www.segurossura.com.co/covid-19/encuestas/paginas/sintomas.aspx?nitEmpresa=830027493&sector=RURVQ0FDSdNO&idEmpresa=ODMwMDI3NDkz&mail=sst@uniagustiniana.edu.co" target="_blank"><img src="{{ asset('img/b-salud.jpg') }}" alt="encuesta-salud" width="100%"></a>
                    </div>
                </div>
                <div class="col-12" align="center">
                    <div class="b2">
                        <a href="https://siga.uniagustiniana.edu.co/" target="_blank"><img src="{{ asset('img/b-siga.jpg') }}" alt="" width="100%"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
            <div class="row">
                <div class="col-12" align="center">
                    <h5>@php
                        echo 'Cumpleaños'. ' - ' . date("d/m/Y");
                    @endphp</h5>
                    <div class="list-age">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @if (isset($date))
                                    @foreach($date['cumpleaneros'] as $cumpleanio)
                                        <tr class="reveal">
                                            <td>
                                                <img class="img-cumpleanios-default" src="{{asset($cumpleanio->img)}}" alt="IMAGEN-SLIDER">
                                            </td>
                                            <td>
                                                <p class="font-cumpleanios-front">{{$cumpleanio->nombre}}</p>
                                            </td>
                                            <td>
                                                <p class="font-cumpleanios-front">{{$cumpleanio->dia}}</p>
                                            </td>
                                            <td>
                                                <p class="font-cumpleanios-front">{{$cumpleanio->mes}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        {{--
                        <div class="col-md-12 ">
                            @if (isset($date))
                                {{ $date['cumpleaneros']->links('components.pagination-links') }}
                            @endif
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
