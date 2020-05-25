@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">تعيين مواد للطالب</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                  <div class="card-text">
                    <!-- Both borders end-->
                    <form action="{{ route('assign.student-to.course') }}" class="form form-horizontal form-bordered" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-body">
                          <h4 class="form-section"><i class="icon-user"></i>معلومات الطالب</h4>
                      
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">اسم الطالب</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $student->first_name }} {{ $student->second_name }} {{ $student->last_name }}" id="projectinput2" disabled="" class="form-control" 
                              name="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">الرقم الجامعي</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $student->special_student_id }}" disabled="" id="projectinput2" class="form-control" 
                              name="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">المرحلة</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $student['specialization']->section->stage->name }}" disabled="" id="projectinput2" class="form-control"
                              name="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">القسم</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $student['specialization']->section->name }}" disabled="" id="projectinput2" class="form-control"
                              name="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">التخصص</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $student['specialization']->name }}" disabled="" id="projectinput2" class="form-control"
                              name="">
                            </div>
                          </div>
                        </div>
                    <!-- Both borders end -->
                  </div>
                </div>
              </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                  <!-- Both borders end-->
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-notebook"></i>تفاصيل المادة</h4>
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">السنة الدراسية</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="اكتب السنة"
                            name="year_of_add">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المادة</label>
                          <div class="col-md-9">
                            <select multiple class="form-control" name="teacher_material_id" id="">
                                <option></option>
                                @foreach ($teacherMaterials as $teacherMaterial)
                                    <option value="{{ $teacherMaterial->id }}">{{ $teacherMaterial['material']->name }}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> تعيين المادة للطالب
                        </button>
                      </div>
                    </form>
                  <!-- Both borders end -->
                </div>
              </div>
            </div>
          </section>
          <!--/ Description -->
          
          
        </div>
      </div>


@endsection