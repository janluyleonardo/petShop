<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Medical History') }}
    </h2>
  </x-slot>
  <div class="container">
    <div class="row py-0">
      <div class="col-md- mx-auto py-1">
        <div class="card shadow">
          <div class="form-body">
            <div class="row">
              <div class="form-holder">
                <div class="form-content">
                  <div class="form-items">
                    <form action="{{ route('medical.store') }}" method="post" class="requires-validation" enctype="multipart/form-data" novalidate>
                      @csrf
                      <div class="input-group">
                        {{-- primer linea de inputs --}}
                        <div class="col-md-2 mt-3">
                          <input class="form-control" type="date" name="AdmissionDate" required>
                          <div class="valid-feedback mv-up">You selected a fecha de matricula!</div>
                          <div class="invalid-feedback mv-up">Please select a fecha de matricula!</div>
                          Fecha de {{ __('Income') }}
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-2 mt-3">
                          <input class="form-control" type="time" name="AdmissionTime" required>
                          <div class="valid-feedback mv-up">You selected a hora de ingreso!</div>
                          <div class="invalid-feedback mv-up">Please select a hora de ingreso!</div>
                          Hora de {{ __('Income') }}
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-3">
                          <input class="form-control" type="text" name="Professional" required>
                          <div class="valid-feedback mv-up">You selected a fecha de matricula!</div>
                          <div class="invalid-feedback mv-up">Please select a fecha de matricula!</div>
                          Nombre profesional veterinario
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-2">
                          <input class="form-control" type="text" name="ProfessionalDocument" required>
                          <div class="valid-feedback mv-up">You selected a fecha de matricula!</div>
                          <div class="invalid-feedback mv-up">Please select a fecha de matricula!</div>
                          Tarjeta profesional
                        </div>
                        {{-- segunda linea de inputs --}}
                        <div class="col-md-4 mt-3">
                          <input class="form-control" type="file" name="Photo" accept="image/png, image/jpeg" required>
                          <div class="valid-feedback">UserPhoto field is valid!</div>
                          <div class="invalid-feedback">UserPhoto field cannot be blank!</div>
                          Foto o imagen del paciente
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-3">
                          <input class="form-control" type="text" name="Proprietary" placeholder="{{ __('Proprietary') }}" required>
                          <div class="valid-feedback">Username field is valid!</div>
                          <div class="invalid-feedback">Username field cannot be blank!</div>
                          Nombre del {{__('Proprietary')}}
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-3">
                          <input class="form-control" type="text" name="ProprietaryAddress" placeholder="{{ __('Proprietary Address') }}" required>
                          <div class="valid-feedback">Username field is valid!</div>
                          <div class="invalid-feedback">Username field cannot be blank!</div>
                          Direccion del {{__('Proprietary')}}
                        </div>
                        {{-- tercera linea de inputs --}}
                        <div class="col-md-3">
                          <input class="form-control" type="text" name="ProprietaryDocument" placeholder="{{ __('ProprietaryDocument') }}" required>
                          <div class="valid-feedback">Username field is valid!</div>
                          <div class="invalid-feedback">Username field cannot be blank!</div>
                          {{__('ProprietaryDocument')}}
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-2 mx-auto mt-3">
                          <input class="form-control" type="number" name="ProprietaryPhoneNumber"placeholder="Telefono propietario" required>
                          <div class="valid-feedback">Numero de documento field is valid!</div>
                          <div class="invalid-feedback">Numero de documento field cannot be blank!</div>
                          Telefono del {{__('Proprietary')}}
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-2 mx-auto">
                          <input class="form-control" type="text" name="PatientName"placeholder="Nombre del {{ __('Patient')}}" required>
                          <div class="valid-feedback">Numero de documento field is valid!</div>
                          <div class="invalid-feedback">Numero de documento field cannot be blank!</div>
                          Nombre del {{__('Patient')}}
                        </div>
                        <div class="col-md-1 "></div>
                        <div class="col-md-2 mx-auto">
                          <input class="form-control" type="text" name="Location" placeholder="{{__('Location')}}" required>
                          <div class="valid-feedback">Direccion field is valid!</div>
                          <div class="invalid-feedback">Direccion field cannot be blank!</div>
                          {{__('Location')}}
                        </div>
                        {{-- cuarta linea de inputs--}}
                        <div class="col-md-5 mx-auto ">
                          <input class="form-control" type="text" name="Department" id="Department" placeholder="{{__('Department')}}" required>
                          <div class="valid-feedback">Peso field is valid!</div>
                          <div class="invalid-feedback">Peso field cannot be blank!</div>
                          {{__('Department')}}
                        </div>
                        <div class="col-md-5 mx-auto ">
                          <input class="form-control" type="text" name="City" id="City" placeholder="{{__('City')}}" required>
                          <div class="valid-feedback">Estatura field is valid!</div>
                          <div class="invalid-feedback">Estatura field cannot be blank!</div>
                          {{__('City')}}
                        </div>
                        {{-- quinta linea de inputs --}}
                        <div class="col-md-3 mx-auto">
                          <center>
                            <input type="radio" class="btn-check"  name="Species" id="perro" value="perro" required>
                            <label class="btn btn-sm btn-outline-secondary" for="perro"><i><img src="{{asset('image/perro.png')}}" alt="icono-perro" width="45px"></i></label>
                            <input type="radio" class="btn-check" name="Species" id="gato" value="gato" required>
                            <label class="btn btn-sm btn-outline-secondary" for="gato"><i><img src="{{asset('image/gato.png')}}" alt="icono-gato" width="45px"></i></label>
                            <div class="valid-feedback">Gender field is valid!</div>
                            <div class="invalid-feedback">Gender field cannot be blank!</div><br>
                            {{__('Species')}}
                          </center>
                        </div>
                        <div class="col-md-1 mx-auto "></div>
                        <div class="col-md-3 mx-auto">
                          <input class="form-control" type="text" name="Race" id="Race" placeholder="{{__('Race')}}" required>
                          <div class="valid-feedback mv-up">You selected a fecha de nacimiento!</div>
                          <div class="invalid-feedback mv-up">Please select a fecha de nacimiento!</div>
                          {{__('Race')}}
                        </div>
                        <div class="col-md-1 mx-auto "></div>
                        <div class="col-md-3 mx-auto">
                          <select name="Sex" id="Sex">
                            <option disabled selected>Seleccionar {{__('Sex')}}</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Masculino">Masculino</option>
                          </select>
                          <div class="valid-feedback">Ciudad field is valid!</div>
                          <div class="invalid-feedback">Ciudad field cannot be blank!</div>
                          {{__('Sex')}}
                        </div>
                        {{-- sexta linea de inputs --}}
                        <div class="col-md-3 mx-auto">
                          <input class="form-control mt-3" type="number" name="Age" placeholder="{{__(('Age'))}}" required>
                          <div class="valid-feedback">Curso field is valid!</div>
                          <div class="invalid-feedback">Curso field cannot be blank!</div>
                          {{__(('Age'))}}
                        </div>
                        <div class="col-md-1 mx-auto"></div>
                        <div class="col-md-3 mx-auto">
                          <input class="form-control" type="text" name="Color" id="Color" placeholder="{{__('Color')}}" required>
                          <div class="valid-feedback mv-up">You selected a fecha de nacimiento!</div>
                          <div class="invalid-feedback mv-up">Please select a fecha de nacimiento!</div>
                          {{__('Color')}}
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-3 mx-auto mt-3">
                            <input class="form-control" type="number" name="Weight" placeholder="{{__('Weight')}}">
                            <div class="valid-feedback">Telefono field is valid!</div>
                            <div class="invalid-feedback">Telefono field cannot be blank!</div>
                            {{__('Weight')}}
                        </div>
                        {{-- septima linea de inputs --}}
                        <div class="col-md-11 mx-auto mt-2">
                          <textarea class="form-control" name="ReasonConsultation" rows="5" cols="5" placeholder="{{__('Reason for consultation')}}"></textarea>
                          <div class="valid-feedback">Departamento field is valid!</div>
                          <div class="invalid-feedback">Departamento field cannot be blank!</div>
                          {{__('Reason for consultation')}}
                        </div>
                        {{-- octava linea de inputs --}}
                        <div class="col-md-2 mx-auto">
                          <input class="form-control" type="text" name="ReproductiveStatus" placeholder="{{__('ReproductiveStatus')}}" required>
                          <div class="valid-feedback">Eps field is valid!</div>
                          <div class="invalid-feedback">Eps field cannot be blank!</div>
                          {{__('ReproductiveStatus')}}
                        </div>
                        <div class="col-md-1 mx-auto"></div>
                        <div class="col-md-2 mx-auto">
                          <input class="form-control" type="text" name="VaccinesVermifugesBaths" placeholder="{{__('VaccinesVermifugesBaths')}}" required>
                          <div class="valid-feedback">Colegio field is valid!</div>
                          <div class="invalid-feedback">Colegio field cannot be blank!</div>
                          {{__('VaccinesVermifugesBaths')}}
                        </div>
                        <div class="col-md-1 mx-auto"></div>
                        <div class="col-md-2 mx-auto">
                          <input class="form-control" type="text" name="Diet" placeholder="{{__('Diet')}}" required>
                          <div class="valid-feedback">Colegio field is valid!</div>
                          <div class="invalid-feedback">Colegio field cannot be blank!</div>
                          {{__('Diet')}}
                        </div>
                        <div class="col-md-1 mx-auto"></div>
                        <div class="col-md-2 mx-auto">
                          <input class="form-control" type="text" name="GeneralCondition" placeholder="{{__('GeneralCondition')}}" required>
                          <div class="valid-feedback">Colegio field is valid!</div>
                          <div class="invalid-feedback">Colegio field cannot be blank!</div>
                          {{__('GeneralCondition')}}
                        </div>
                        {{-- novena linea de inputs --}}
                        <div class="col-md-12 mx-auto mt-2">
                          <textarea class="form-control" name="Ananmnesis" rows="5" cols="5" placeholder="{{__('Ananmnesis')}}"></textarea>
                          <div class="valid-feedback">Departamento field is valid!</div>
                          <div class="invalid-feedback">Departamento field cannot be blank!</div>
                          {{__('Ananmnesis')}}
                        </div>
                        {{-- decima linea de inputs --}}
                        <div class="col-md-12 mx-auto mt-2">
                          <textarea class="form-control" name="Anormalities" rows="5" cols="5" placeholder="{{__('Anormalities')}}"></textarea>
                          <div class="valid-feedback">Departamento field is valid!</div>
                          <div class="invalid-feedback">Departamento field cannot be blank!</div>
                          {{__('Anormalities')}}
                        </div>
                        <div class="col-md-3 mx-auto">
                            <div class="form-button mt-3 ">
                                <button id="submit" type="submit" class="sombra btn btn-secondary">{{__('Add Patient')}}</button>
                            </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.write('<style type="text/css">div.cp_oculta{display: none;}</style>');
    function MostrarOcultar(capa,enlace)
    {
      if (document.getElementById)
      {
        var aux = document.getElementById(capa).style;
        aux.display = aux.display? "":"block";
      }
    }
  </script>
</x-app-layout>
