@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل بيانات الطالب</h4>
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
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                      @method('PUT')
                        @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات شخصية</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم الاول</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->first_name }}" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="first_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->second_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="second_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثالث</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->third_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الثالث"
                            name="third_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الأخير</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->last_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الأخير"
                            name="last_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">الجنس</label>
                          <div class="col-md-9">
                            <input type="hidden" name="gender" value="{{ $student->gender }}">
                            <select id="projectinput6" name="gender" class="form-control">
                              <option value="0" @if ($student->gender === '0' ) selected="" disabled="" @endif >ذكر</option>
                              <option value="1" @if ($student->gender === '1' ) selected="" disabled="" @endif >أنثى</option>
                              <option value="2" @if ($student->gender === '2' ) selected="" disabled="" @endif >غير ذلك</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">الجنسية</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->nationality }}" id="projectinput4" class="form-control" placeholder="الجنسية" 
                            name="nationality">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">رقم الجواز</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->passport_number }}"  id="projectinput3" class="form-control" placeholder="رقم الجواز" 
                            name="passport_number">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اختر الفرع</label>
                          <div class="col-md-9">
                            <input type="hidden" name="branch_id" value="{{ $student->branch_id }}">
                            <select id="projectinput6" name="branch_id" id="branch" class="form-control">
                              <option value="none" selected="" disabled="">إختر الفرع</option>
                              @foreach ($branches as $branch)
                                  <option value="{{ $branch->id }}" @if ($student->branch_id === $branch->id ) selected="" disabled="" @endif >{{ $branch->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اختر القسم</label>
                          <div class="col-md-9">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                            <select id="section" name="section_id" class="form-control">
                              <option selected="" disabled="">اختر القسم</option>
                              @foreach ($sections as $section)
                                  <option value="{{ $section->id }}" >{{ $section->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اختر التخصص</label>
                          <div class="col-md-9">
                            <input type="hidden" name="specialization_id" value="{{ $student->specialization_id }}">
                            <select id="specialization" name="specialization_id" class="form-control">
                              
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <input type="hidden" name="qualification" value="{{ $student->qualification }}">
                            <select id="projectinput6" name="qualification" class="form-control">
                              <option  value="{{ $student->qualification }}"  selected="" disabled="">اخر مؤهل علمي</option>
                              <option value="1">ثانوي</option>
                              <option value="2">دبلوم</option>
                              <option value="3">بكالوريوس</option>
                              <option value="4">ماجستير</option>
                              <option value="5">دكتورا</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">نسبة التخرج</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $student->graduation_rate }}"  id="projectinput3" class="form-control" placeholder="نسبة التخرج" 
                            name="graduation_rate">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->email }}"   id="projectinput3" class="form-control" placeholder="البريد الالكتروني" 
                            name="email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->location }}"  id="projectinput3" class="form-control" placeholder="العنوان" 
                            name="location">
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->phone_number }}"   id="projectinput4" class="form-control" placeholder="رقم الهاتف" 
                            name="phone_number">
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-md-3 label-control" for="projectinput4">تاريخ الميلاد</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->birthday }}" id="projectinput4" class="form-control" placeholder="تاريخ الميلاد" 
                            name="birthday">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">حالة الطالب</label>
                          <div class="col-md-9">
                            <input type="hidden" name="status" value="{{ $student->status }}">
                            <select id="projectinput6" name="status" class="form-control">
                              <option  value="{{ $student->status }}"   selected="" disabled="">الحالة</option>
                              <option value="0">غير مفعل</option>
                              <option value="1">مفعول</option>
                            </select>
                          </div>
                        </div>
                        <h4 class="form-section"><i class="ft-clipboard"></i> متطلبات</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput4">الصورة الشخصية</label>
                          <div class="col-md-9">
                            <input type="file"  value="{{ $student->avatar }}"   id="projectinput4"  
                            name="avatar">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة لأخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file"  value="{{ $student->qualification_image }}"  id="file" name="qualification_image" >
                              <span class="file-custom"></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة الجواز</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" value="{{ $student->passport_image }}"  id="file" name="passport_image" >
                              <span class="file-custom"></span>
                            </label>
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
@section('js')
<script src="{{asset('dashboard/js/student.js')}}" type="text/javascript"></script>
@endsection