@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعيين مادة لطالب</h4>
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
                                        
                    </div>
                    <form  action="{{ route('studentclass.store') }}" method="POST" class="form form-horizontal form-bordered">
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
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر المرحلة</label>
                            <div class="col-md-9">
                              <select class="form-control" name="stage_id" id="stage">
                                  
                                
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر القسم</label>
                            <div class="col-md-9">
                              <select class="form-control" name="section_id" id="section">
                                  
                                
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 label-control"  for="">اختر التخصص</label>
                              <div class="col-md-9">
                                <select class="form-control" name="specialization_id" id="specialization">
                                    
                                  
                                </select>
                              </div>
                          </div>
                          <div class="form-group row">
                              <label class="col-md-3 label-control"  for="">اختر اسم الطالب</label>
                              <div class="col-md-9">
                                <select class="form-control" name="student_id" id="student">
                                   

                                </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر الفصل</label>
                            <div class="col-md-9">
                              <select class="form-control" name="semester_id" id="semester">
                                <option value="" selected="" disabled="" >اختر</option>
                                @foreach ($semesters as $semester)
                                  <option value="{{ $semester->id }}">{{ $semester->tittle }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اختر الصف</label>
                            <div class="col-md-9">
                              <select class="form-control" name="class_id" id="class">
                                <option value="" selected="" disabled="" >اختر</option>
                                @foreach ($classes as $class)
                                  <option value="{{ $class->id }}">{{ $class->name }} - {{ $class['material']->name }}</option>
                                @endforeach
                                
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> تعيين المادة
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