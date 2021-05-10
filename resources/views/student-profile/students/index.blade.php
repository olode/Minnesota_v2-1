@extends('student-profile.layouts.master')

@section('content')



      
<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">جدول المواد الدراسية</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   
                  <div class="table-responsive table-borded">
                  <table class="table table-bordered mb-0">
                    <thead>
                      <tr>
                        <th >اليوم</th>
                        <th>اسم المادة</th>
                        <th>رمز المادة</th>
                        <th>الدكتور</th>
                        <th>موعد المحاضرة</th>
                        <th>قاعة المحاضرة</th>
                        <th>تفاصيل المادة</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($student->student_classes as $student_class)

                        @if($student_class->year->year_m != now()->year)
                          @continue
                        @endif

                       <tr>
                        <td>{{$student_class->class->class_day}}</td>
                        <td>{{$student_class->class->material->name}}</td>
                        <td>{{$student_class->class->material->code}}</td>
                        <td>{{$student_class->class->teacher->first_name}} {{$student_class->class->teacher->last_name}}</td>
                        <td>من : {{Str::limit($student_class->class->starts_at, 5, '')}} الى : {{Str::limit($student_class->class->ends_at, 5, '')}}</td>
                        <td>

                        @if(Str::limit($student_class->class->starts_at, 5, '') <= date('H:i') && Str::limit($student_class->class->ends_at, 5, '') >= date('H:i'))

                          <form action="{{route('get-in-class')}}" method="POST" target="_blank">
                          @csrf
                            <input type="text" name="id" value="{{$student_class->class->id}}" hidden>
                            <input type="text" name="start" value="{{Str::limit($student_class->class->starts_at, 5, '')}}" hidden>
                            <input type="text" name="end" value="{{Str::limit($student_class->class->ends_at, 5, '')}}" hidden>
                            <button type="supmet" class="badge badge-success" target="_blank">دخول</button>
                          </form>

                        @endif

                        </td>
                        <td><button class="badge badge-success" data-toggle="modal" data-target="#sigl-class{{$student_class->class->id}}">عرض</button></td>
                      </tr>

                      <!-- Modal -->
                      <div id="sigl-class{{$student_class->class->id}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title"></h4>
                            </div>





                            <div class="modal-body">
                            <div class="card">


                            <ul class="list-group">
                            <h4 class="card-title text-center"> درجات الحضور والواجب والمشاركة</h4>
                          
                           
                            @foreach($student_class->lectures as $lecture)
                                  <li class="list-group-item">{{$lecture->title}} 
                                  <span class="badge badge-pill badge-success" style="padding:5px;" >
                                  
                                  @if($lecture->attendance != null)

                                     {{$lecture->attendance->mark}} / {{$lecture->full_mark}}

                                     <?php

                                        // array_push($total_marks , $lecture->attendance->mark)
                                     ?> 

                                    @else
                                      {{0}} / {{$lecture->full_mark}}
                                    @endif
                                  
                                  </span>  

                                  <span class="" style="padding-right:40px;">
                                      {{"الواجب"}}
                                      <span class="badge badge-pill badge-success" style="padding:5px;" >
                                          @if($lecture->home_work != null)

                                          @if($lecture->home_work->follow_up_home_work != null)

                                            {{$lecture->home_work->follow_up_home_work->mark}} /  {{$lecture->home_work->full_mark}}

                                          <?php

                                              // array_push($total_marks , $lecture->home_work->follow_up_home_work->mark)
                                          ?> 

                                          @else

                                            {{0}} /  {{$lecture->home_work->full_mark}}

                                          @endif

                                          @else

                                          {{'لايوجد واجب' }}

                                          @endif
                                      </span> 
                                  </span>

                                <span style="padding-right:40px;">
                                      {{"#مشاركة"}}
                                      <span class="badge badge-pill badge-success" >
                                      {{"#مشاركة"}}
                                      </span>
                                  </span>
                                  </li>
                            @endforeach      
                           

                            </ul>

                            <br>




                            <ul class="list-group">
                            <h4 class="card-title text-center">درجات الاختبارات الصفية</h4>
                          
                           
                            @foreach($student_class->quizzes as  $quizze)
                                  <li class="list-group-item">{{$quizze->title}} <span class="" style="padding:30px;">
                                  
                                  @if($quizze->quizze_mark != null)

                                     {{$quizze->quizze_mark->mark}} / {{$quizze->full_mark}}

                                     <?php

                                      // array_push($total_marks , $quizze->quizze_mark->mark)
                                     ?> 

                                    @else
                                      {{0}} / {{$quizze->full_mark}}
                                    @endif
                                  
                                  </span>  
                                  <span class="badge badge-pill badge-success"></span> 
                                  </li>
                            @endforeach      
                           

                            </ul>

                            <br>
                            <ul class="list-group">
                            <h4 class="card-title text-center">درجات الاختبارات النهائية</h4>
                          
                           
                            @foreach($student_class->final_exams as  $final_exam)
                                  <li class="list-group-item">{{$final_exam->title}} <span class="" style="padding:30px;">
                                  
                                  @if($final_exam->final_exam_mark != null)

                                  {{$final_exam->final_exam_mark->mark}} / {{$final_exam->full_mark}}

                                  <?php

                                    // array_push($total_marks , $final_exam->final_exam_mark->mark)
                                  ?> 

                                  @else

                                  {{0}} / {{$final_exam->full_mark}}

                                  @endif
                                  
                                  </span>  
                                  <span class="badge badge-pill badge-success"></span> 
                                  </li>
                            @endforeach      
                           

                            </ul>
                            <br>

                             
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
                            </div>
                          </div>

                        </div>
                      </div>
                    @endforeach

                    </tbody>
                  </table>
                </div>
        
        <!-- Both borders end -->

                </div>
              </div>
            </div>

          </section>
          <!--/ Description -->
          <!-- CSS Classes -->
          <section id="css-classes" class="card">
            <div class="card-header">
              <h4 class="card-title">المعلومات الشخصية</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                  <p></p>
                 
                                 <!-- Both borders end-->
   
                                 <div class="table-responsive">
                  <table class="table table-bordered mb-0">
                    <thead>
                   
                    </thead>
                    <tbody>
                      <tr>
                        <td>الاسم</td>
                        <td>{{$student->first_name}} {{$student->second_name}} {{$student->last_name}}</td>
                  
                      </tr>
                      <tr>
                        <td>الرقم الجامعي</td>
                        <td>{{$student->special_student_id}}</td>
                     
                      </tr>
                      <tr>
                        <td>البريد الالكتروني</td>
                        <td>{{$student->email}}</td>
                      
                      </tr>
                      <tr>
                        <td>رقم الهاتف</td>
                        <td>{{$student->phone_number}}</td>
                      
                      </tr>
                      <tr>
                        <td>الفرع</td>
                        <td>{{$student->branch->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>المرحلة</td>
                        <td>{{$student->specialization->section->stage->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>القسم</td>
                        <td>{{$student->section->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>التخصص</td>
                        <td>{{$student->specialization->name}}</td>
                      
                      </tr>
                      <tr>
                        <td>الفصل</td>
                        <td>{{$student->student_classes->where('student_id', Auth::user()->id)->unique('semester_id')->count()}}</td>
                      
                      </tr>
                      <tr>
                        <td>إجمالي الساعات</td>
                        <td>{{$student->specialization->total_hours}}</td>
                      
                      </tr>
                      <tr>
                        <td>الساعات المكتملة</td>
                        <td>{{$taking_hors}}</td>
                      </tr>
                      <tr>
                        <td>الساعات المتبقية</td>
                        <td>{{$student->specialization->total_hours - $taking_hors}}</td>
                      </tr>
                      <tr>
                        <td>المعدل</td>
                        <td>٪٣٫٥٠</td>
                      
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
        
        <!-- Both borders end -->

                </div>
              </div>
            </div>
          </section>
          <!--/ CSS Classes -->

          
        </div>
      </div>


@endsection


{{--@foreach($student_class->marks->unique('mark_type_id')->where('class_id', $student_class->class_id) as $marks_title)
                            <ul class="list-group">
                            <h4 class="card-title text-center">{{$marks_title->marktype->title}}</h4>
                          
                              @foreach($student_class->marks->where('mark_type_id', $marks_title->marktype->id) as $mark)
                                  
                                  <li class="list-group-item"> <span class="" style="padding:30px;">{{$mark->marktype->name}}-{{$loop->iteration}}</span>  <span class="badge badge-pill badge-success"> {{$mark->student_mark}}</span> </li>
                                  
                                  @php
                                    <!-- array_push($toatl_marks, $mark->student_mark) -->
                                  @endphp

                              @endforeach

                            </ul>
                            <br>

                              @endforeach--}}