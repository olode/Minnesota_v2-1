@extends('dashboard.layouts.master')

@section('content')
 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة صف دراسي جديد</h4>
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
                    <form action="{{ route('class.store') }}" method="POST" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الصف</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المرحلة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="stage_id" id="stage">
                                <option value="" selected="" disabled="" >اختر المرحلة</option>
                                @foreach ($stages as $stage)
                                  <option value="{{ $stage->id }}" >{{ $stage->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر القسم</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="section_id" id="section">
                                <option value="" selected="" disabled="" >اختر القسم</option>
                                @foreach ($sections as $section)
                                  <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر الفصل الدراسي</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="semester_id" id="semester">
                                <option value="" selected="" disabled="" >اختر الفصل الدراسي</option>
                                @foreach ($semesters as $semester)
                                  <option value="{{ $semester->id }}" >{{ $semester->tittle }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المادة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="material_id" id="material">
                                <option value="" selected="" disabled="" >اختر المادة</option>
                                @foreach ($materials as $material)
                                  <option value="{{ $material->id }}" >{{ $material->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المدرس</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="teacher_id" id="teacher">
                                <option value="" selected="" disabled="" >اختر المدرس</option>
                                @foreach ($teachers as $teacher)
                                  <option value="{{ $teacher->id }}" >{{ $teacher->first_name }} {{ $teacher->second_name }} {{ $teacher->last_name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر السنة الدراسية</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="year_id" id="year">
                                <option value="" selected="" disabled="" >اختر السنة</option>
                                @foreach ($years as $year)
                                  <option value="{{ $year->id }}" >{{ $year->year_m }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم الصف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="الاسم"
                            name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اليوم</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="class_day" id="class">
                                <option value="" disabled="" selected="">اختر اليوم</option>
                                <option value="الأحد" > الأحد </option>
                                <option value="الإثنين" > الإثنين </option>
                                <option value="الثلاثاء" > الثلاثاء </option>
                                <option value="الأربعاء" > الأربعاء </option>
                                <option value="الخميس" > الخميس </option>
                                <option value="الجمعة" > الجمعة </option>
                                <option value="السبت" > السبت </option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">وقت البداية</label>
                          <div class="col-md-9">
                            <input type="time" id="projectinput1" class="form-control" placeholder="الوقت"
                            name="starts_at">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">وقت النهاية</label>
                          <div class="col-md-9">
                            <input type="time" id="projectinput1" class="form-control" placeholder="الوقت"
                            name="ends_at">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد الطلاب المسموح</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="عدد الطلاب المسموح"
                            name="max_student">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">مكافأة المحاضر</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="مكافأة المحاضر"
                            name="lecturing_allowance">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رابط القاعة</label>
                          <div class="col-md-9">
                            <input type="url" id="projectinput2" class="form-control" placeholder="رابط القاعة"
                            name="classroom_url">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">نسبة الحضور الطلابي المطلوبة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="نسبة الحضور الطلابي المطلوبة"
                            name="required_attendance">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رسوم الصق</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="رسوم الصف"
                            name="class_fee">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ تسليم المكافأة</label>
                          <div class="col-md-9">
                            <input type="date" id="projectinput2" class="form-control" 
                            name="fee_due_date">
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