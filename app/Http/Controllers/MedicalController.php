<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\Request;
use PDF;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $patients = MedicalHistory::orderBy('id', 'desc')->paginate(10);
      return view('Medical.index', compact('patients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
      $patient = MedicalHistory::findOrFail($id);
      $path = base_path('public/'.$patient->Photo);
      $type = pathinfo($path, PATHINFO_EXTENSION);
      $data = file_get_contents($path);
      $img = 'data:image/'.$type.';base64,'.base64_encode($data);

      $pdf = PDF::loadView('Medical.reportPdf', compact('patient','img'));
      return $pdf->download('Historia_clinica_'.$patient->PatientName.'.pdf');
      // return view('Medical.medicalHistory');
      // return 'Medical.medicalHistory';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Medical.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $año = now()->format('ms');
      $newPatient = new MedicalHistory();
      $doc = $request->ProprietaryDocument;
      $pre = strtoupper($request->Species);
      if($pre == "GATO"){
        $prefij = "GA";
      }else{
        $prefij = "PE";
      }
      $id = MedicalHistory::orderBy('id','desc')->first();
      if($id == null){
          $code = $prefij.$doc."-".$año;
      }else{
          $code = $prefij.$doc."-".$año;
      }
      if($request->hasfile('Photo')){
        $file = $request->file('Photo');
        $pathUrl = 'images/Photos/';
        $fileName = time()."-".$file->getClientOriginalName();
        $uploadSuccess = $request->file('Photo')->move($pathUrl, $fileName);
        $newPatient->Photo = $uploadSuccess;
      }
      $newPatient->MedicalNumber = $code;
      $newPatient->AdmissionDate = $request->AdmissionDate;
      $newPatient->AdmissionTime = $request->AdmissionTime;
      $newPatient->Professional = $request->Professional;
      $newPatient->ProfessionalDocument = $request->ProfessionalDocument;
      $newPatient->Proprietary = $request->Proprietary;
      $newPatient->ProprietaryAddress = $request->ProprietaryAddress;
      $newPatient->ProprietaryDocument = $request->ProprietaryDocument;
      $newPatient->ProprietaryPhoneNumber = $request->ProprietaryPhoneNumber;
      $newPatient->PatientName = $request->PatientName;
      $newPatient->Location = $request->Location;
      $newPatient->Department = $request->Department;
      $newPatient->City = $request->City;
      $newPatient->Species = $request->Species;
      $newPatient->Race = $request->Race;
      $newPatient->Sex = $request->Sex;
      $newPatient->Age = $request->Age;
      $newPatient->Color = $request->Color;
      $newPatient->Weight = $request->Weight;
      $newPatient->ReasonConsultation = $request->ReasonConsultation;
      $newPatient->ReproductiveStatus = $request->ReproductiveStatus;
      $newPatient->VaccinesVermifugesBaths = $request->VaccinesVermifugesBaths;
      $newPatient->Diet = $request->Diet;
      $newPatient->Ananmnesis = $request->Ananmnesis;
      $newPatient->GeneralCondition = $request->GeneralCondition;
      $newPatient->Anormalities = $request->Anormalities;
      try {
        $newPatient->save();
      } catch (\Throwable $th) {
          return redirect()->route('medical.index')->dangerBanner('no se pudo agregar nuevo registro por que => '.$th);
      }
      return redirect()->route('medical.index')->banner('Registro creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $patient = MedicalHistory::findOrFail($id);
      return view('Medical.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $patientUpdate = MedicalHistory::findOrFail($id);
      if($request->hasFile('Photo')){
        $file = $request->file('Photo');
        $pathUrl = 'images/Photos/';
        $fileName = time()."-".$file->getClientOriginalName();
        $uploadSuccess = $request->file('Photo')->move($pathUrl, $fileName);
        $patientUpdate->Photo = $uploadSuccess;
      }
      $patientUpdate->MedicalNumber = $request->MedicalNumber;
      $patientUpdate->AdmissionDate = $request->AdmissionDate;
      $patientUpdate->AdmissionTime = $request->AdmissionTime;
      $patientUpdate->Professional = $request->Professional;
      $patientUpdate->ProfessionalDocument = $request->ProfessionalDocument;
      $patientUpdate->Proprietary = $request->Proprietary;
      $patientUpdate->ProprietaryAddress = $request->ProprietaryAddress;
      $patientUpdate->ProprietaryDocument = $request->ProprietaryDocument;
      $patientUpdate->ProprietaryPhoneNumber = $request->ProprietaryPhoneNumber;
      $patientUpdate->PatientName = $request->PatientName;
      $patientUpdate->Location = $request->Location;
      $patientUpdate->Department = $request->Department;
      $patientUpdate->City = $request->City;
      $patientUpdate->Species = $request->Species;
      $patientUpdate->Race = $request->Race;
      $patientUpdate->Sex = $request->Sex;
      $patientUpdate->Age = $request->Age;
      $patientUpdate->Color = $request->Color;
      $patientUpdate->Weight = $request->Weight;
      $patientUpdate->ReasonConsultation = $request->ReasonConsultation;
      $patientUpdate->ReproductiveStatus = $request->ReproductiveStatus;
      $patientUpdate->VaccinesVermifugesBaths = $request->VaccinesVermifugesBaths;
      $patientUpdate->Diet = $request->Diet;
      $patientUpdate->Ananmnesis = $request->Ananmnesis;
      $patientUpdate->GeneralCondition = $request->GeneralCondition;
      $patientUpdate->Anormalities = $request->Anormalities;

      try {
        $patientUpdate->update();
        return redirect()->route('medical.index')->banner('Regisatro actualizado con exito!');
      } catch (\Throwable $th) {
        return redirect()->route('medical.index')->dangerBanner('No se pudo actualizar el registro validar por favor '.$th);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalHistory $patient)
    {
      return $patient->delete();
      return redirect()->route('medical.index')->banner('Regisatro eliminado con exito!');

    }
}
