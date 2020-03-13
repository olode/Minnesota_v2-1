@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة درجة طالب</h4>
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
                    <form  action="{{ route('studentmark.store') }}" method="POST" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> درجة الطالب</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الدرجة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الدرجة النهائية"
                            name="student_mark">
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اسم الدرجة</label>
                            <div class="col-md-9">
                              <select class="form-control" name="mark_types_id" id="">
                                  <option value="" selected="" disabled="" >اسم الدرجة</option>
                                  @foreach ($marks as $mark)
                                      <option class="form-control" value="{{$mark->id}}">{{$mark->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">المادة</label>
                            <div class="col-md-9">
                              <select class="form-control" name="student_material_id" id="">
                                  <option value="" selected="" disabled="" >اختر المادة</option>
                                  @foreach ($materials as $material)
                                      <option class="form-control" value="{{$material->id}}">{{$material['teacher_material']->material->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                          </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اسم الطالب</label>
                            <div class="col-md-9">
                              <select class="form-control" name="student_id" id="">
                                  <option value="" selected="" disabled="" >اختر الطالب</option>
                                  @foreach ($students as $student)
                                      <option class="form-control" value="{{$student->id}}">{{$student->first_name}} {{$student->second_name}} {{$student->last_name}}  (  الرقم الجامعي {{$student->special_student_id}} )  </option>
                                  @endforeach
                              </select>
                            </div>
                          </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> حفظ
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