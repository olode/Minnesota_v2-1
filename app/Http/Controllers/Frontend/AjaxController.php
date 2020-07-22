<?php

namespace App\Http\Controllers\Frontend;
use  App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stage;
use App\Models\Specialization;
use App\Models\Section;
use Image;
use Auth;

class AjaxController extends Controller
{

    public function getAjaxStages($branch_id)
  {
    $stages = Stage::Select('id', 'name')->Where('branch_id', $branch_id)->get();
    if($stages == null){
      $stages = 'null';

    }
    return  compact('stages');
  }

  
  public function getAjaxSections($stage_id)
  {
      $sections = Section::Select('id', 'name')->Where('stage_id', $stage_id)->get();

      if($sections == null){

        $sections = 'null';
      }

      return  compact('sections');
  }

  
  public function getAjaxSpecializations($section_id)
  {
      $specializations = Specialization::Select('id', 'name')->Where('section_id', $section_id)->get();
      
      if($specializations == null){

        $specializations = 'null';
      }

      return  compact('specializations');
  }
}
