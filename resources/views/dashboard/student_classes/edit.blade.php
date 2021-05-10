@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل مادة لطالب</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collpase show">
                  <div class="card-body">
                    <div class="card-text">
                      <a  href="{{route('studentclass.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة تعينات الطلاب</i></a> 
                                        
                    </div>
                    <form  action="{{ route('studentclass.update', $student->id) }}" method="POST" class="form form-horizontal form-bordered">
                      @method('PUT')
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات التعيين </h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control"  for="">اختر الفرع</label>
                          <div class="col-md-9">
                            <select class="form-control" name="branch_id" id="branch">
                                <option></option>
                                @foreach ($branches as $branch)
                                    <option class="form-control" value="{{$branch->id}}">{{ $branch->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->first('branch_id'))
                               <div style="color:red;">{{$errors->first('branch_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر المرحلة</label>
                            <div class="col-md-9">
                              <select class="form-control" name="stage_id" id="stage">
                                  
                                
                              </select>
                              @if($errors->first('stage_id'))
                               <div style="color:red;">{{$errors->first('stage_id')}}</div>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر القسم</label>
                            <div class="col-md-9">
                              <select class="form-control" name="section_id" id="section">
                                  
                                
                              </select>
                              @if($errors->first('section_id'))
                               <div style="color:red;">{{$errors->first('section_id')}}</div>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 label-control"  for="">اختر التخصص</label>
                              <div class="col-md-9">
                                <select class="form-control" name="specialization_id" id="specialization">
                                    
                                  
                                </select>
                                @if($errors->first('specialization_id'))
                               <div style="color:red;">{{$errors->first('specialization_id')}}</div>
                              @endif
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 label-control"  for="">اختر اسم الطالب</label>
                              <div class="col-md-9">
                                <select class="form-control" name="student_id" id="student">
                                   

                                </select>
                                @if($errors->first('student_id'))
                               <div style="color:red;">{{$errors->first('student_id')}}</div>
                              @endif
                              </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر الفصل</label>
                            <div class="col-md-9">
                              <select class="form-control" name="semester_id" id="semester">
                                @foreach ($semesters as $semester)
                                  <option value="{{ $semester->id }}" @if ($semester->id  === $student->semester_id) selected="" disabled="" @endif >{{ $semester->tittle }}</option>
                                @endforeach
                                
                              </select>
                              @if($errors->first('semester_id'))
                               <div style="color:red;">{{$errors->first('semester_id')}}</div>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر الصف</label>
                            <div class="col-md-9">
                              <select class="form-control" name="class_id" id="class">
                                @foreach ($classes as $class)
                                  <option value="{{ $class->id }}" @if ($class->id  === $student->class_id) selected="" disabled="" @endif >{{ $class->name }}</option>
                                @endforeach
                                
                              </select>
                              @if($errors->first('class_id'))
                               <div style="color:red;">{{$errors->first('class_id')}}</div>
                              @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر السنة</label>
                            <div class="col-md-9">
                              <select class="form-control" name="year_id" id="year">
                                <option value="" selected="" disabled="" >اختر</option>
                                @foreach ($years as $year)
                                  <option value="{{ $year->id }}"@if ($year->id  === $student->year_id) selected="" disabled="" @endif>{{ $year->year_m }}</option>
                                @endforeach
                                
                              </select>
                              @if($errors->first('year_id'))
                               <div style="color:red;">{{$errors->first('year_id')}}</div>
                              @endif
                            </div>
                          </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> تعديل المادة
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </section>


@endsection

@section('js')
    <script src="{{asset('dashboard/js/studentClasses.js')}}" type="text/javascript"></script>
@endsection