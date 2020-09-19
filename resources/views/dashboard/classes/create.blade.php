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
                                  <option value="{{ $stage->id }}" > {{ $stage->name }}</option>
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
                                <option value="" selected="" disabled="" >اختر القسم</option>
                                @foreach ($sections as $section)
                                  <option value="{{ $section->id }}" >{{$section->stage->name}} - {{ $section->name }}</option>
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
                                <option value="" selected="" disabled="" >اختر الفصل الدراسي</option>
                                @foreach ($semesters as $semester)
                                  <option value="{{ $semester->id }}" >{{ $semester->title }}</option>
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
                                <option value="" selected="" disabled="" >اختر المادة</option>
                                @foreach ($materials as $material)
                                  <option value="{{ $material->id }}" >{{ $material->name }}</option>
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
                                <option value="" selected="" disabled="" >اختر المدرس</option>
                                @foreach ($teachers as $teacher)
                                  <option value="{{ $teacher->id }}" >{{ $teacher->first_name }} {{ $teacher->second_name }} {{ $teacher->last_name }}</option>
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
                                <option value="" selected="" disabled="" >اختر السنة</option>
                                @foreach ($years as $year)
                                  <option value="{{ $year->id }}" >{{ $year->year_m }}</option>
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
                            <input type="text" value="{{old('name')}}" id="projectinput1" class="form-control" placeholder="الاسم"
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
                            @if($errors->first('class_day'))
                               <div style="color:red;">{{$errors->first('class_day')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">وقت البداية</label>
                          <div class="col-md-9">
                            <input type="time" value="{{old('starts_at')}}" id="projectinput1" class="form-control" placeholder="الوقت"
                            name="starts_at">
                            @if($errors->first('starts_at'))
                               <div style="color:red;">{{$errors->first('starts_at')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">وقت النهاية</label>
                          <div class="col-md-9">
                            <input type="time" value="{{old('ends_at')}}" id="projectinput1" class="form-control" placeholder="الوقت"
                            name="ends_at">
                            @if($errors->first('ends_at'))
                               <div style="color:red;">{{$errors->first('ends_at')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد الطلاب المسموح</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('max_student')}}"id="projectinput2" class="form-control" placeholder="عدد الطلاب المسموح"
                            name="max_student">
                            @if($errors->first('max_student'))
                               <div style="color:red;">{{$errors->first('max_student')}}</div>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">مكافأة المحاضر</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('lecturing_allowance')}}" id="projectinput2" class="form-control" placeholder="مكافأة المحاضر"
                            name="lecturing_allowance">
                            @if($errors->first('lecturing_allowance'))
                               <div style="color:red;">{{$errors->first('lecturing_allowance')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رابط القاعة</label>
                          <div class="col-md-9">
                            <input type="url" value="{{old('classroom_url')}}" id="projectinput2" class="form-control" placeholder="رابط القاعة"
                            name="classroom_url">
                            @if($errors->first('classroom_url'))
                               <div style="color:red;">{{$errors->first('classroom_url')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">نسبة الحضور الطلابي المطلوبة</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('required_attendance')}}"id="projectinput2" class="form-control" placeholder="نسبة الحضور الطلابي المطلوبة"
                            name="required_attendance">
                            @if($errors->first('required_attendance'))
                               <div style="color:red;">{{$errors->first('required_attendance')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رسوم الصق</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('class_fee')}}" id="projectinput2" class="form-control" placeholder="رسوم الصف"
                            name="class_fee">
                            @if($errors->first('class_fee'))
                               <div style="color:red;">{{$errors->first('class_fee')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ تسليم المكافأة</label>
                          <div class="col-md-9">
                            <input type="date" value="{{old('fee_due_date')}}"  id="projectinput2" class="form-control" 
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