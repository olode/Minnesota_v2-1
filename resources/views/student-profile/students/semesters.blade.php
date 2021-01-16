@extends('student-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
<div class="content-body">


<div class="row">




  {{--<div class="col-xl-2 col-md-2 col-sm-2">

      @foreach($student->student_classes->unique('semester_id')->sortByDesc('semester_id') as $class)      
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
--}}

  <div class="col-xl-12 col-md-12 col-sm-12">
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
                              <p class="card-text text-center"> {{$semester_material->class->material->name}}</p>
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
                          
                          <br>
                            
                              
                            <h4 class="card-title text-center">درجات الحضور والواجبات والمشاركات</h4>
                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:30%" scope="col">المحاضرة</th>
                                <th scope="col">درجة الحضور</th>
                                <th scope="col">درجة الواجب</th>
                                <th scope="col">درجة المشاركة</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($semester_material->lectures as $lecture)
                                <tr>
                                  <th  scope="row">{{$lecture->title}}</th>
                                  <td>
                                    <!-- {{--$lecture->attendance == null ? "0" : $lecture->attendance->mark--}} /  {{--$lecture->full_mark--}} -->
                                    @if($lecture->attendance != null)

                                     {{$lecture->attendance->mark}} / {{$lecture->full_mark}}

                                     <?php

                                        array_push($total_marks , $lecture->attendance->mark)
                                     ?> 

                                    @else
                                      {{0}} / {{$lecture->full_mark}}
                                    @endif
                                  
                                  
                                  </td>
                               
                                  <td>
                                    @if($lecture->home_work != null)

                                        @if($lecture->home_work->follow_up_home_work != null)

                                          {{$lecture->home_work->follow_up_home_work->mark}} /  {{$lecture->home_work->full_mark}}

                                     <?php

                                            array_push($total_marks , $lecture->home_work->follow_up_home_work->mark)
                                      ?> 

                                        @else

                                          {{0}} /  {{$lecture->home_work->full_mark}}

                                        @endif

                                    @else

                                        {{'لايوجد واجب' }}

                                    @endif
                                  </td>
                                  
                                  <td>#مشاركة</td>

                                  
                                </tr> 
                               @endforeach
                            </tbody>
                          </table>

                          
                          <br>
                            
                              
                            <h4 class="card-title text-center">درجات الاختبارات الصفية </h4>
                            <table class="table table-bordered">
                            <thead>

                              <tr>
                                <th style="width:30%" scope="col">كويز</th>
                                <th scope="col">الدرجة</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach($semester_material->quizzes as  $quizze)
                                  <tr>
                                    <th scope="row">{{$quizze->title}}</th>
                                    <td>
                                    <!-- {{--$quizze->quizze_mark == null ? "0" : $quizze->quizze_mark->mark--}} / {{--$quizze->full_mark--}} -->
                                    @if($quizze->quizze_mark != null)

                                     {{$quizze->quizze_mark->mark}} / {{$quizze->full_mark}}

                                     <?php

                                      array_push($total_marks , $quizze->quizze_mark->mark)
                                     ?> 

                                    @else
                                      {{0}} / {{$quizze->full_mark}}
                                    @endif

                                    </td>
                                  </tr> 
                              @endforeach
                               
                            </tbody>
                          </table>
                          

                          <br>
                            
                              
                            <h4 class="card-title text-center">درجات الاختبارات النهائية </h4>
                            <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:30%" scope="col">#</th>
                                <th scope="col">الدرجة</th>
                              </tr>
                            </thead>
                            <tbody>

                              @foreach($semester_material->final_exams as  $final_exam)
                                  <tr>
                                    <th scope="row">{{$final_exam->title}}</th>
                                    <td>
                                    
                                      <!-- {{--$final_exam->final_exam_mark == null ? "0" : $final_exam->final_exam_mark->mark--}} / {{--$final_exam->full_mark--}} -->
                                      @if($final_exam->final_exam_mark != null)

                                        {{$final_exam->final_exam_mark->mark}} / {{$final_exam->full_mark}}

                                        <?php

                                          array_push($total_marks , $final_exam->final_exam_mark->mark)
                                        ?> 

                                      @else

                                        {{0}} / {{$final_exam->full_mark}}

                                      @endif
                                    </td>
                                  </tr> 
                              @endforeach
                               
                            </tbody>
                          </table>


                          <br>

                          
                          
                          
                          <h4 class="card-title text-center">مجموع الدرجات</h4>
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:30%" scope="col"> المجموع</th>
                                <th scope="col">الدرجة </th>
                              </tr>
                            </thead>
                            <tr>
                                <td style="width:30%" scope="col">{{ array_sum($total_marks) }}</td>
                                <td scope="col">{{Greades::mark_code(array_sum($total_marks))}}</td>
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
  

  
    <div class="col-xl-12 col-md-12 col-sm-12">
      <div class="row justify-content-center">
      @foreach($student->student_classes->unique('semester_id')->sortByDesc('semester_id') as $class)  
        <div class="col-xl-3 col-md-3 col-sm-3">
          <h5>    
            <a href="{{route('student-semester-materials', $class->semester->id)}}">
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <p class="card-text text-center">{{$class->semester->title}}</p>
                  </div>
                </div>
              </div>
            </a>
          </h5>
        </div>
      @endforeach
      </div>
    </div>


</div>



        
          
        </div>
      </div>
      

@endsection




















{{--@extends('student-profile.layouts.master')

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
      

@endsection--}}