@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة معلم جديد</h4>
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
                    <form class="form form-horizontal form-bordered">
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات شخصية</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم الاول</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="الإسم الاول"
                            name="fname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثاني</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الإسم الثاني"
                            name="2endname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الإسم الثالث</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الإسم الثالث"
                            name="3endname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اسم العائلة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="اسم العائلة"
                            name="lname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">العنوان</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" placeholder="العنوان" name="address">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" placeholder="البريد الالكتروني" name="email">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="رقم الهاتف" name="phone">
                          </div>
                        </div>
                        <h4 class="form-section"><i class="ft-clipboard"></i> متطلبات</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">اخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="interested" class="form-control">
                              <option value="none" selected="" disabled="">اخر مؤهل علمي</option>
                              <option value="design">ثانوي</option>
                              <option value="development">دبلوم</option>
                              <option value="illustration">بكالوريوس</option>
                              <option value="branding">ماجستير</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة لأخر مؤهل علمي</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" id="file">
                              <span class="file-custom"></span>
                            </label>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">رقم الجواز</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput3" class="form-control" placeholder="رقم الجواز" name="idNumber">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">صورة الجواز</label>
                          <div class="col-md-9">
                            <label id="projectinput8" class="file center-block">
                              <input type="file" id="file">
                              <span class="file-custom"></span>
                            </label>
                          </div>
                        </div>
                        <!-- <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput9">About Project</label>
                          <div class="col-md-9">
                            <textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="About Project"></textarea>
                          </div>
                        </div> -->
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