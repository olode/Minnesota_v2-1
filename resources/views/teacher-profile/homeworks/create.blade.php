@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">اضافة تكليف جديد</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   

                  <form class="form form-horizontal form-bordered">
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-notebook"></i>تفاصيل التكليف</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المرحلة</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="interested" class="form-control">
                              <option value="none" selected="" disabled="">المرحلة</option>
                              <option value="design">ثانوي</option>
                              <option value="development">دبلوم</option>
                              <option value="illustration">بكالوريوس</option>
                              <option value="branding">ماجستير</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">القسم</label>
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
                          <label class="col-md-3 label-control" for="projectinput6">المادة</label>
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
                          <label class="col-md-3 label-control" for="projectinput6">التكليف</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="interested" class="form-control">
                              <option value="none" selected="" disabled="">التكليف</option>
                              <option value="design">الاول</option>
                              <option value="development">الثاني</option>
                              <option value="illustration">الثالث</option>
                              <option value="branding">الرابع</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ التسليم</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="تاريخ التسليم"
                            name="lname">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عنوان التكليف</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="عنوان التكليف"
                            name="lname">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput9">تفاصيل  التكليف</label>
                          <div class="col-md-9">
                            <textarea id="projectinput9" rows="5" class="form-control" name="comment" placeholder="تفاصيل  التكليف"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> حفظ
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