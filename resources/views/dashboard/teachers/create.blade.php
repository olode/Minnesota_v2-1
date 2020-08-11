@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة دكتور جديد</h4>
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
                    <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> المعلومات الشخصية</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم الاول</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="first_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="second_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثالث</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الإسم الثالث"
                            name="third_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الأخير</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الإسم الأخير"
                            name="last_name">
                          </div>
                        </div>
                        <div class="form-group row ">
                          <label class="col-md-3 label-control" for="projectinput4">التخصص</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="التخصص" 
                            name="specializatio_name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="qualification" class="form-control">
                              <option value="none" selected="" disabled="">اخر مؤهل علمي</option>
                              <option value="1">ثانوي</option>
                              <option value="2">دبلوم</option>
                              <option value="3">بكالوريوس</option>
                              <option value="4">ماجستير</option>
                              <option value="5">دكتورا</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">رقم الجواز</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" placeholder="رقم الجواز" 
                            name="passport_number">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="رقم الهاتف" 
                            name="phone_number">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" placeholder="البريد الالكتروني" 
                            name="email">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" placeholder="العنوان" 
                            name="location">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">كلمة المرور</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="كلمة المرور" 
                            name="password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">حالة الدكتور</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="status" class="form-control">
                              <option value="none" selected="" disabled="">الحالة</option>
                              <option value="0">غير مفعل</option>
                              <option value="1">مفعول</option>
                            </select>
                          </div>
                        </div>
                        <h4 class="form-section"><i class="ft-clipboard"></i> متطلبات</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput4">الصورة الشخصية</label>
                          <div class="col-md-9">
                            <input type="file" id="projectinput4" 
                            name="avatar">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة لأخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" id="file" name="qualification_image" >
                              <span class="file-custom"></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة الجواز</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" id="file" name="passport_image" >
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