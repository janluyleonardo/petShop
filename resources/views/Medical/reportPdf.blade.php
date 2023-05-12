<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Historia clinica: {{ Str::title($patient->PatientName) }}</title>
    <link href="{{ env('APP_URL') }}css/pdf-imprimir.css" rel="stylesheet">
    <link href="{{ env('APP_URL') }}css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ env('APP_URL') }}image/logo-pet.png");
            background-repeat: no-repeat;
            background-size: 100%;
            background-position: 50% 50%;
            /* background-color:red; */
            margin: 3rem 2rem 2rem;
        }
    </style>
</head>

<body>
    <header>
        <div class="h-pdf-left">
            <img src="{{ env('APP_URL') }}image/logo-pet.png" alt="LOGO-jackeline" width="100">
        </div>
        <div class="h-pdf-center">
            <h1 style="text-shadow: 2px 2px #aa9e9e !important;">{{ __('UNIVERSAL PET SHOP') }}</h1>
            <br>
            <h5 class="resolucion" style="background-color: rgba(169, 45, 169,0);margin-top:-5%;">
                HISTORIA CLINICA VETERINARIA - PROFESIONAL
            </h5>
        </div>
        <div class="h-pdf-right">
            <div class="div-img">
                <img class="photo" src="{{ $img }}" alt="foto-paciente">
            </div>
        </div>
    </header>
    <main>
        <table width="100%" class="tabla-datos">
            {{ env('APP_URL') . $patient->Photo }}
            <tbody>
                {{-- primera fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Historia clinica</b>
                    </td>
                    <td class="titulo">
                        <b>Fecha de admision</b>
                    </td>
                    <td class="titulo">
                        <b>Profesional veterinario</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->MedicalNumber }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->AdmissionDate }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Professional }}</b>
                    </td>
                </tr>
                {{-- segunda fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Tarjeta profesional</b>
                    </td>
                    <td class="titulo">
                        <b>Propietario</b>
                    </td>
                    <td class="titulo">
                        <b>Direccion</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->ProfessionalDocument }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Proprietary }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->ProprietaryAddress }}</b>
                    </td>
                </tr>
                {{-- tercera fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Documento propietario</b>
                    </td>
                    <td class="titulo">
                        <b>Telefono propietario</b>
                    </td>
                    <td class="titulo">
                        <b>Nombre paciente</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->ProprietaryDocument }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->ProprietaryPhoneNumber }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->PatientName }}</b>
                    </td>
                </tr>
                {{-- cuarta fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Localidad</b>
                    </td>
                    <td class="titulo">
                        <b>Departamento</b>
                    </td>
                    <td class="titulo">
                        <b>Ciudad</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->Location }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Department }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->City }}</b>
                    </td>
                </tr>
                {{-- quinta fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Especie</b>
                    </td>
                    <td class="titulo">
                        <b>Raza</b>
                    </td>
                    <td class="titulo">
                        <b>Sexo</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->Species }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Race }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Sex }}</b>
                    </td>
                </tr>
                {{-- sexta fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Edad</b>
                    </td>
                    <td class="titulo">
                        <b>Color</b>
                    </td>
                    <td class="titulo">
                        <b>Peso</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->Age }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Color }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Weight }}</b>
                    </td>
                </tr>
                {{-- septima fila de la tabla --}}
                <tr>
                    <td class="titulo">
                        <b>Estado reproductivo</b>
                    </td>
                    <td class="titulo">
                        <b>Vacuna, vermifugos, baños</b>
                    </td>
                    <td class="titulo">
                        <b>Dieta</b>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <b>{{ $patient->ReproductiveStatus }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->VaccinesVermifugesBaths }}</b>
                    </td>
                    <td align="center">
                        <b>{{ $patient->Diet }}</b>
                    </td>
                </tr>
                {{-- octava fila de la tabla --}}
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td colspan="3" class="titulo">
                                    <b>Anamnesis del paciente</b>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="3" rowspan="20">
                                    <b>{{ $patient->Ananmnesis }}</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                {{-- novena fila de la tabla --}}
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td colspan="3" class="titulo">
                                    <b>Motivo de la consulta</b>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="3" rowspan="20">
                                    <b>{{ $patient->ReasonConsultation }}</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                {{-- decima fila de la tabla --}}
                <tr>
                    <td colspan="3">
                        <table width="100%">
                            <tr>
                                <td colspan="3" class="titulo">
                                    <b>Anormalidades que presenta el paciente</b>
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="3" rowspan="20">
                                    <b>{{ $patient->Anormalities }}</b>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="mt-5" width="100%" border="0">
            <tbody>
                <tr>
                    <td style="width:33.333333%" rowspan="8" align="center">
                        <div class="firmas"></div>
                        Firma Veterinario
                    </td>
                    <td style="width:33.333333%" rowspan="8" align="center">
                        {{-- <div class="firmas"></div>
                        Firma Propietario --}}
                    </td>
                    <td style="width:33.333333%" rowspan="8" align="center">
                        <div class="firmas"></div>
                        Firma propietario
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <br>
    <footer>
        <h1>{{ env('APP_NAME') }}</h1>
    </footer>
</body>

</html>
