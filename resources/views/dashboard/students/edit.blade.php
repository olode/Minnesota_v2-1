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
                      <a  href="{{route('student.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة الطلاب</i></a> 
                    </div>
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                      @method('PUT')
                        @csrf

                        @if (session()->has('success'))
                            <div class="alert alert-success text-center" style="font-size: 22px; margin-top: 30px;">
                                {{session()->get('success')}}
                            </div>
                        @endif
                      <div class="form-body">
                        
                        <h4 class="form-section"><i class="ft-user"></i> معلومات شخصية</h4>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم الاول</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->first_name }}" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="first_name">
                            @if($errors->first('first_name'))
                               <div style="color:red;">{{$errors->first('first_name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->second_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="second_name">
                            @if($errors->first('second_name'))
                               <div style="color:red;">{{$errors->first('second_name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثالث</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->third_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الثالث"
                            name="third_name">
                            @if($errors->first('third_name'))
                               <div style="color:red;">{{$errors->first('third_name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الأخير</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->last_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الأخير"
                            name="last_name">
                            @if($errors->first('last_name'))
                               <div style="color:red;">{{$errors->first('last_name')}}</div>
                            @endif
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
                            @if($errors->first('gender'))
                               <div style="color:red;">{{$errors->first('gender')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">الجنسية</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->nationality }}" id="projectinput4" class="form-control" placeholder="الجنسية" 
                            name="nationality">
                            @if($errors->first('nationality'))
                               <div style="color:red;">{{$errors->first('nationality')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">رقم الجواز</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->passport_number }}"  id="projectinput3" class="form-control" placeholder="رقم الجواز" 
                            name="passport_number">
                            @if($errors->first('passport_number'))
                               <div style="color:red;">{{$errors->first('passport_number')}}</div>
                            @endif
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
                            @if($errors->first('branch_id'))
                               <div style="color:red;">{{$errors->first('branch_id')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اختر القسم</label>
                          <div class="col-md-9">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                            <select id="section" name="section_id" class="form-control">
                              <option selected="" disabled="">اختر القسم</option>
                              @foreach ($sections as $section)
                                  <option value="{{ $section->id }}" >{{ $section->stage->name }} - {{ $section->name }}</option>
                              @endforeach
                            </select>
                            @if($errors->first('section_id'))
                               <div style="color:red;">{{$errors->first('section_id')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اختر التخصص</label>
                          <div class="col-md-9">
                            <input type="hidden" name="specialization_id" value="{{ $student->specialization_id }}">
                            <select id="specialization" name="specialization_id" class="form-control">
                              
                            </select>
                            @if($errors->first('specialization_id'))
                               <div style="color:red;">{{$errors->first('specialization_id')}}</div>
                            @endif
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
                            @if($errors->first('qualification'))
                               <div style="color:red;">{{$errors->first('qualification')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">نسبة التخرج</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $student->graduation_rate }}"  id="projectinput3" class="form-control" placeholder="نسبة التخرج" 
                            name="graduation_rate">
                            @if($errors->first('graduation_rate'))
                               <div style="color:red;">{{$errors->first('graduation_rate')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->email }}"   id="projectinput3" class="form-control" placeholder="البريد الالكتروني" 
                            name="email">
                            @if($errors->first('email'))
                               <div style="color:red;">{{$errors->first('email')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">استعادة كلمة المرور</label>
                          
                          <div class="col-md-9">
                              <a href="{{ route('password.reset1', $student->id) }}" class="form-control btn btn-danger" style=" color:white; font-size: 15px; font-weight: bold; ">استعادة</a>
                          </div>
                          
                        </div>


                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->location }}"  id="projectinput3" class="form-control" placeholder="العنوان" 
                            name="location">
                            @if($errors->first('location'))
                               <div style="color:red;">{{$errors->first('location')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->phone_number }}"   id="projectinput4" class="form-control" placeholder="رقم الهاتف" 
                            name="phone_number">
                            @if($errors->first('phone_number'))
                               <div style="color:red;">{{$errors->first('phone_number')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-md-3 label-control" for="projectinput4">تاريخ الميلاد</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->birthday }}" id="projectinput4" class="form-control" placeholder="تاريخ الميلاد" 
                            name="birthday">
                            @if($errors->first('birthday'))
                               <div style="color:red;">{{$errors->first('birthday')}}</div>
                            @endif
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
                            @if($errors->first('status'))
                               <div style="color:red;">{{$errors->first('status')}}</div>
                            @endif
                          </div>
                        </div>
                        <h4 class="form-section"><i class="ft-clipboard"></i> متطلبات</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput4">الصورة الشخصية</label>
                          <div class="col-md-9">
                            <input type="file"  value="{{ $student->avatar }}"   id="projectinput4"  
                            name="avatar">
                            @if($errors->first('avatar'))
                               <div style="color:red;">{{$errors->first('avatar')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة لأخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file"  value="{{ $student->qualification_image }}"  id="file" name="qualification_image" >
                              <span class="file-custom"></span>
                            </label>
                            @if($errors->first('qualification_image'))
                               <div style="color:red;">{{$errors->first('qualification_image')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة الجواز</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" value="{{ $student->passport_image }}"  id="file" name="passport_image" >
                              <span class="file-custom"></span>
                            </label>
                            @if($errors->first('passport_image'))
                               <div style="color:red;">{{$errors->first('passport_image')}}</div>
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
 
@section('js')

<script src="{{asset('dashboard/js/student.js')}}" type="text/javascript"></script>
@endsection
