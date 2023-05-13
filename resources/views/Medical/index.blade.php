<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Inventory') }}
      </h2>
  </x-slot>

  <div class="py-6">
    <div class=" mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container-fluid py-2">
                <div class="row">
                  <div class="col-md-2 mx-auto">
                    <a title="Show" href="{{ route('medical.create') }}" class="sombra btn btn-success">{{ __('New medical history') }}</a>
                  </div>
                    <div class="col-md-12">
                      @if ($patients->isEmpty())
                        <div class="col-md-12 mt-2 text-center">
                          <strong>
                            Aun no tenemos registros para mostrar, por favor agrega manualmente los
                            registros o de manera masiva cargando un excel
                          </strong>
                        </div>
                      @else
                        <div class="table-responsive">
                            <table class="table table-striped table-sm table-hover caption-top">
                                <caption>{{ __('List of inventories') }}</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Historia clinica</th>
                                        <th scope="col">Nombre paciente</th>
                                        <th scope="col">Fecha de ingreso</th>
                                        <th scope="col">Nombre propietario</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @forelse ($patients as $patient)
                                  <tr>
                                    <td>{{$patient->id}}</td>
                                    <td>{{$patient->MedicalNumber}}</td>
                                    <td>{{$patient->PatientName}}</td>
                                    <td>{{$patient->AdmissionDate}}</td>
                                    <td>{{$patient->Proprietary}}</td>
                                    <td>
                                      <div class="btn-group" role="group" aria-label="Basic example">
                                        <a title="Show" href="#showModal{{$patient->id}}" class="sombra btn btn-info" data-bs-toggle="modal">{{__('See')}}</a>
                                        <a title="Editar" href="{{ route('medical.edit', $patient) }}" class="sombra btn btn-warning" >{{__('Edit')}}</a>
                                        <a title="Eliminar" href="#deleteModal{{$patient->id}}" class="sombra btn btn-danger" data-bs-toggle="modal">{{__('Delete')}}</a>
                                        <a title="Imprimir" href="{{route('print',$patient->id)}}" class="sombra btn btn-primary">{{__('Print')}}</a>
                                      </div>
                                    </td>
                                  </tr>
                                  <!-- Modal show-->
                                  <div class="modal fade" id="showModal{{$patient->id}}" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                      <div class="modal-content sombra bg-white">
                                        <div class="modal-header sombra bn-100">
                                          <img class="photo" src="{{ $patient->Photo }}" width="100"alt="foto-paciente">
                                          <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">{{ Str::upper($patient->PatientName)}}</h1>
                                          <button type="button" class="btn-close sombra" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body sombra">
                                            <div class="row">
                                                <div class="col-md-5">Historia clinica:</div><div class="col-md-7">{{ $patient->MedicalNumber}}</div>
                                                <div class="col-md-5">Fecha ingreso:</div><div class="col-md-7">{{ $patient->AdmissionDate}}</div>
                                                <div class="col-md-5">Hora ingreso:</div><div class="col-md-7">{{ $patient->AdmissionTime}}</div>
                                                <div class="col-md-5">Profesional veterinario:</div><div class="col-md-7">{{ $patient->Professional}}</div>
                                                <div class="col-md-5">Tarjeta profesional:</div><div class="col-md-7">{{ $patient->ProfessionalDocument}}</div>
                                                <div class="col-md-5">Propietario:</div><div class="col-md-7">{{ $patient->Proprietary}}</div>
                                                <div class="col-md-5">Direccion:</div><div class="col-md-7">{{ $patient->ProprietaryAddress}}</div>
                                                <div class="col-md-5">Documento propietario:</div><div class="col-md-7">{{ $patient->ProprietaryDocument}}</div>
                                                <div class="col-md-5">Telefono propietario:</div><div class="col-md-7">{{ $patient->ProprietaryPhoneNumber}}</div>
                                                <div class="col-md-5">Localidad:</div><div class="col-md-7">{{ $patient->Location}}</div>
                                                <div class="col-md-5">Departamento:</div><div class="col-md-7">{{ $patient->Department}}</div>
                                                <div class="col-md-5">Ciudad:</div><div class="col-md-7">{{ $patient->City}}</div>
                                                <div class="col-md-5">Especie:</div><div class="col-md-7">{{ $patient->Species}}</div>
                                                <div class="col-md-5">Raza:</div><div class="col-md-7">{{ $patient->Race}}</div>
                                                <div class="col-md-5">Sexo:</div><div class="col-md-7">{{ $patient->Sex}}</div>
                                                <div class="col-md-5">Edad:</div><div class="col-md-7">{{ $patient->Age}}</div>
                                                <div class="col-md-5">Color:</div><div class="col-md-7">{{ $patient->Color}}</div>
                                                <div class="col-md-5">Peso:</div><div class="col-md-7">{{ $patient->Weight}}</div>
                                                <div class="col-md-5">Motivo conaulta:</div><div class="col-md-7">{{ $patient->ReasonConsultation}}</div>
                                                <div class="col-md-5">Estado reproductivo:</div><div class="col-md-7">{{ $patient->ReproductiveStatus}}</div>
                                                <div class="col-md-5">Vacuna, vermifugos, baños:</div><div class="col-md-7">{{ $patient->VaccinesVermifugesBaths}}</div>
                                                <div class="col-md-5">Dieta:</div><div class="col-md-7">{{ $patient->Diet}}</div>
                                                <div class="col-md-5">Estado general:</div><div class="col-md-7">{{ $patient->Ananmnesis◘}}</div>
                                                <div class="col-md-5">Anamnesis:</div><div class="col-md-7">{{ $patient->GeneralCondition}}</div>
                                                <div class="col-md-5">Anormalidades:</div><div class="col-md-7">{{ $patient->Anormalities}}</div>
                                            </div>
                                        </div>
                                        <div class="modal-footer bn-100">
                                          <button type="button" class=" sombra btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- Modal delete-->
                                  <div class="modal fade" id="deleteModal{{$patient->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content sombra bg-white">
                                        <div class="modal-header sombra bn-100">
                                          <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">{{ Str::upper($patient->PatientName)}}</h1>
                                          <button type="button" class="btn-close sombra" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body sombra">
                                          esta seguro(a) de eliminar el registro de: <strong>{{ Str::upper($patient->PatientName)}}</strong>
                                        </div>
                                        <div class="modal-footer bn-100">
                                          <button type="button" class=" sombra btn btn-warning" data-bs-dismiss="modal">Close</button>
                                          <form action="{{ route('medical.destroy', $patient) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class=" sombra btn btn-danger">
                                              Eliminar registro
                                            </button>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                @empty

                                @endforelse
                                </tbody>
                            </table>
                        </div>
                      @endif
                    </div>
                    <div class="col-md-12">
                      {{$patients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
