@extends('dashboard.layouts.master')

@section('content')
 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل صف دراسي (class)</h4>
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
                    <a  href="{{route('class.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة الصفوف(classes)</i></a> 
                    </div>
                    <form action="{{ route('class.update', $class->id) }}" method="POST" class="form form-horizontal form-bordered">
                      @method('PUT')
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الصف</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المرحلة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="stage_id" id="stage">
                                @foreach ($stages as $stage)
                                  <option value="{{ $stage->id }}" @if ($stage->id  === $class->stage_id)  selected="" disabled=""  @endif >{{ $stage->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('stage_id'))
                               <div style="color:red;">{{$errors->first('stage_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر القسم</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="section_id" id="section">
                                @foreach ($sections as $section)
                                  <option value="{{ $section->id }}" @if ($section->id  === $class->section_id)  selected="" disabled=""  @endif  >{{ $section->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('section_id'))
                               <div style="color:red;">{{$errors->first('section_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر الفصل الدراسي</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="semester_id" id="semester">
                                @foreach ($semesters as $semester)
                                  <option value="{{ $semester->id }}" @if ($semester->id  === $class->semester_id)  selected="" disabled=""  @endif  >{{ $semester->title }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('semester_id'))
                               <div style="color:red;">{{$errors->first('semester_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المادة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="material_id" id="material">
                                @foreach ($materials as $material)
                                  <option value="{{ $material->id }}" @if ($material->id  === $class->material_id)  selected="" disabled=""  @endif  >{{ $material->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('material_id'))
                               <div style="color:red;">{{$errors->first('material_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المدرس</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="teacher_id" id="teacher">
                                @foreach ($teachers as $teacher)
                                  <option value="{{ $teacher->id }}" @if ($teacher->id  === $class->teacher_id)  selected="" disabled=""  @endif  >{{ $teacher->first_name }} {{ $teacher->second_name }} {{ $teacher->last_name }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('teacher_id'))
                               <div style="color:red;">{{$errors->first('teacher_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر السنة الدراسية</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="year_id" id="year">
                                @foreach ($years as $year)
                                  <option value="{{ $year->id }}" @if ($year->id  === $class->year_id)  selected="" disabled=""  @endif  >{{ $year->year_m }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('year_id'))
                               <div style="color:red;">{{$errors->first('year_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم الصف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" value="{{ $class->name }}"
                            name="name">
                            @if($errors->first('name'))
                               <div style="color:red;">{{$errors->first('name')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اليوم</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="class_day" id="class">
                                <option value="الأحد"   @if ($class->class_day === "الأحد")  selected="" disabled=""  @endif  > الأحد </option>
                                <option value="الإثنين" @if ($class->class_day === "الإثنين")  selected="" disabled=""  @endif  > الإثنين </option>
                                <option value="الثلاثاء"  @if ($class->class_day === "الثلاثاء")  selected="" disabled=""  @endif > الثلاثاء </option>
                                <option value="الأربعاء" @if ($class->class_day === "الأربعاء")  selected="" disabled=""  @endif > الأربعاء </option>
                                <option value="الخميس"   @if ($class->class_day === "الخميس")  selected="" disabled=""  @endif > الخميس </option>
                                <option value="الجمعة"   @if ($class->class_day === "الجمعة")  selected="" disabled=""  @endif > الجمعة </option>
                                <option value="السبت"    @if ($class->class_day === "السبت")  selected="" disabled=""  @endif > السبت </option>
                              </select>
                            </div>
                            @if($errors->first('class_day'))
                               <div style="color:red;">{{$errors->first('class_day')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">وقت البداية</label>
                          <div class="col-md-9">
                            <input type="time" id="projectinput1" class="form-control" value="{{ $class->starts_at }}" 
                            name="starts_at">
                            @if($errors->first('starts_at'))
                               <div style="color:red;">{{$errors->first('starts_at')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">وقت النهاية</label>
                          <div class="col-md-9">
                            <input type="time" id="projectinput1" class="form-control" value="{{ $class->ends_at }}" 
                            name="ends_at">
                            @if($errors->first('ends_at'))
                               <div style="color:red;">{{$errors->first('ends_at')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد الطلاب المسموح</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" value="{{ $class->max_student }}" 
                            name="max_student">
                            @if($errors->first('max_student'))
                               <div style="color:red;">{{$errors->first('max_student')}}</div>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">مكافأة المحاضر</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" value="{{ $class->lecturing_allowance }}" 
                            name="lecturing_allowance">
                            @if($errors->first('lecturing_allowance'))
                               <div style="color:red;">{{$errors->first('lecturing_allowance')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رابط القاعة</label>
                          <div class="col-md-9">
                            <input type="url" id="projectinput2" class="form-control" value="{{ $class->classroom_url }}" 
                            name="classroom_url">
                            @if($errors->first('classroom_url'))
                               <div style="color:red;">{{$errors->first('classroom_url')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">نسبة الحضور الطلابي المطلوبة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" value="{{ $class->required_attendance }}" 
                            name="required_attendance">
                            @if($errors->first('required_attendance'))
                               <div style="color:red;">{{$errors->first('required_attendance')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رسوم الصق</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" value="{{ $class->class_fee }}" 
                            name="class_fee">
                            @if($errors->first('class_fee'))
                               <div style="color:red;">{{$errors->first('class_fee')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ تسليم المكافأة</label>
                          <div class="col-md-9">
                            <input type="date" value="{{ $class->fee_due_date }}" id="projectinput2" class="form-control" 
                            name="fee_due_date">
                            @if($errors->first('fee_due_date'))
                               <div style="color:red;">{{$errors->first('fee_due_date')}}</div>
                              @endif
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