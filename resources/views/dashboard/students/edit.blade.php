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
                            <input type="text" value="{{ $student->firstName }}" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="firstName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->secondName }}"  id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="secondName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثالث</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->lastName }}"  id="projectinput2" class="form-control" placeholder="الإسم الثالث"
                            name="lastName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->location }}"  id="projectinput3" class="form-control" placeholder="العنوان" 
                            name="location">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->email }}"   id="projectinput3" class="form-control" placeholder="البريد الالكتروني" 
                            name="email">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->phoneNumber }}"   id="projectinput4" class="form-control" placeholder="رقم الهاتف" 
                            name="phoneNumber">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">الصورة الشخصية</label>
                          <div class="col-md-9">
                            <input type="file"  value="{{ $student->avatar }}"   id="projectinput4" class="form-control"  
                            name="avatar">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اختر التخصص</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="specialization_id" class="form-control">
                              <option  value="{{ $student->qualification }}"   selected="" disabled="">التخصص</option>
                              @foreach ($specailizations as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">حالة الطالب</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="status" class="form-control">
                              <option  value="{{ $student->status }}"   selected="" disabled="">الحالة</option>
                              <option value="0">غير مفعل</option>
                              <option value="1">مفعول</option>
                            </select>
                          </div>
                        </div>
                        <h4 class="form-section"><i class="ft-clipboard"></i> متطلبات</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اخر مؤهل علمي</label>
                          <div class="col-md-9">
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
                          <label class="col-md-3 label-control">صورة لأخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file"  value="{{ $student->imageOfQualification }}"  id="file" name="imageOfQualification" >
                              <span class="file-custom"></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">رقم الجواز</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $student->passportNumber }}"  id="projectinput3" class="form-control" placeholder="رقم الجواز" 
                            name="passportNumber">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة الجواز</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" value="{{ $student->imageOfPassport }}"  id="file" name="imageOfPassport" >
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