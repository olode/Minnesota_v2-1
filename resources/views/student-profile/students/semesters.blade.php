@extends('student-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
<div class="content-body">


<div class="row">




  <div class="col-xl-2 col-md-2 col-sm-2">
      @foreach($student->student_classes->unique('semester_id') as $class)      
        <a href="{{route('student-semester-materials', $class->semester->id)}}">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <p class="card-text">{{$class->semester->title}}</p>
              </div>
            </div>
          </div>
        </a>

      @endforeach

  </div>


  <div class="col-xl-10 col-md-10 col-sm-10">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <p class="card-text">
            

        
        @if($semester_materials != "" )
                  <div class="row">

                  @foreach($semester_materials as $semester_material)
                    <div class="col-xl-3 col-md-3 col-sm-3 ">
                      <a  data-toggle="modal" data-target="#{{$semester_material->id}}">
                        <div class="card shadow-lg  border">
                          <div class="card-content">
                            <div class="card-body">
                              <p class="card-text"> {{$semester_material->class->material->name}}</p>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

                      <!-- Modal -->
                    <div class="modal fade" id="{{$semester_material->id}}" role="dialog">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                          </div>
                          <div class="modal-body">
                          
                          @foreach($semester_material->marks->unique('mark_type_id') as $marks_title)

                          <br>
                            
                              
                            <h4 class="card-title text-center">{{$marks_title->marktype->title}}</h4>
                                                
            
                            
                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:30%" scope="col">#</th>
                                <th scope="col">الدرجة</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($semester_material->marks->where('class_id', $semester_material->class_id)->where('mark_type_id', $marks_title->marktype->id) as $mark)
                               
                              <tr>
                                <th  scope="row">{{$marks_title->marktype->name}}-{{$loop->iteration}}</th>
                                <td>{{$mark->student_mark}}</td>
                              </tr>
                              
                              @php
                              array_push($toatl_marks, $mark->student_mark)
                              @endphp

                            @endforeach
    
                           
                            </tbody>
                          </table>
                          


                          @endforeach


                          <h4 class="card-title text-center">مجموع الدرجات</h4>
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:30%" scope="col">#</th>
                                <th scope="col">المجموع </th>
                              </tr>
                            </thead>
                            <tr>
                                <td style="width:30%" scope="col">#</td>
                                <td scope="col">{{array_sum($toatl_marks)}}</td>
                              </tr>
                            <tbody>
                            </tbody>
                          </table>

                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach

                  </div>
        @elseif($semester_materials == "")

                 <h4 class="text-center">الرجاء اختيار الفصل</h4>

        @endif



            </p>
          </div>
        </div>
      </div>
  </div>
  

  
</div>



        
          
        </div>
      </div>
      

@endsection