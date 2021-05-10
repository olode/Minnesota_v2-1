@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل بيانات المعلم</h4>
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
                      <a  href="{{route('teacher.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">رجوع الى الخلف</i></a> 
                                        
                    </div>
                    <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                      @method('PUT')
                        @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات شخصية</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم الاول</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $teacher->first_name }}" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="first_name">
                            @if($errors->first('first_name'))
                               <div style="color:red;">{{$errors->first('first_name')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $teacher->second_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="second_name">
                            @if($errors->first('second_name'))
                               <div style="color:red;">{{$errors->first('second_name')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثالث</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" value="{{ $teacher->third_name }}" 
                            name="third_name">
                            @if($errors->first('third_name'))
                               <div style="color:red;">{{$errors->first('third_name')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الأخير</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $teacher->last_name }}"  id="projectinput2" class="form-control" placeholder="الإسم الأخير"
                            name="last_name">
                            @if($errors->first('last_name'))
                               <div style="color:red;">{{$errors->first('last_name')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $teacher->location }}"  id="projectinput3" class="form-control" placeholder="العنوان" 
                            name="location">
                            @if($errors->first('location'))
                               <div style="color:red;">{{$errors->first('location')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-md-3 label-control" for="projectinput4">التخصص</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control"  value="{{ $teacher->specialization_name }}" 
                            name="specialization_name">
                            @if($errors->first('specialization_name'))
                               <div style="color:red;">{{$errors->first('specialization_name')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اخر مؤهل علمي</label>  
                        <input type="hidden" name="qualification" value="{{ $teacher->qualification }}">
                        <div class="col-md-9">
                          <select id="projectinput6" name="qualification" class="form-control">
                            <option  value="{{ $teacher->qualification }}"  selected="" disabled="">اخر مؤهل علمي</option>
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
                          <label class="col-md-3 label-control" for="projectinput3">الوصف الوظيفي</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $teacher->job_description }}" id="projectinput3" class="form-control" placeholder="الوصف الوظيفي" 
                            name="job_description">
                            @if($errors->first('job_description'))
                               <div style="color:red;">{{$errors->first('job_description')}}</div>
                           @endif
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="projectinput3">رقم الجواز</label>
                        <div class="col-md-9">
                          <input type="text" value="{{ $teacher->passport_number }}"  id="projectinput3" class="form-control" placeholder="رقم الجواز" 
                          name="passport_number">
                          @if($errors->first('passport_number'))
                               <div style="color:red;">{{$errors->first('passport_number')}}</div>
                           @endif
                        </div>
                      </div>
                      <div class="form-group row last">
                        <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                        <div class="col-md-9">
                          <input type="text" value="{{ $teacher->phone_number }}"   id="projectinput4" class="form-control" placeholder="رقم الهاتف" 
                          name="phone_number">
                          @if($errors->first('phone_number'))
                               <div style="color:red;">{{$errors->first('phone_number')}}</div>
                           @endif
                        </div>
                      </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $teacher->email }}"   id="projectinput3" class="form-control" placeholder="البريد الالكتروني" 
                            name="email">
                            @if($errors->first('email'))
                               <div style="color:red;">{{$errors->first('email')}}</div>
                           @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">حالة المعلم</label>
                          <div class="col-md-9">
                            <input type="hidden" name="status" value="{{ $teacher->status }}">
                            <select id="projectinput6" name="status" class="form-control">
                              <option  value="{{ $teacher->status }}"   selected="" disabled="">الحالة</option>
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
                            <input type="file"  value="{{ $teacher->avatar }}"   id="projectinput4"  
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
                              <input type="file"  value="{{ $teacher->qualification_image }}"  id="file" name="qualification_image" >
                              @if($errors->first('qualification_image'))
                               <div style="color:red;">{{$errors->first('qualification_image')}}</div>
                              @endif
                              <span class="file-custom"></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة الجواز</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" value="{{ $teacher->passport_image }}"  id="file" name="passport_image" >
                              @if($errors->first('passport_image'))
                               <div style="color:red;">{{$errors->first('passport_image')}}</div>
                           @endif
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