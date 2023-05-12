<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
  use HasFactory;

  protected $fillable = [
    'MedicalNumber',
    'AdmissionDate',
    'AdmissionTime',
    'Professional',
    'ProfessionalDocument',
    'Proprietary',
    'ProprietaryAddress',
    'ProprietaryDocument',
    'ProprietaryPhoneNumber',
    'PatientName',
    'Location',
    'Department',
    'City',
    'Species',
    'Race',
    'Sex',
    'Age',
    'Color',
    'Weight',
    'ReasonConsultation',
    'ReproductiveStatus',
    'VaccinesVermifugesBaths',
    'Diet',
    'Ananmnesis',
    'GeneralCondition',
    'Anormalities',
    'Photo',
  ];
}
