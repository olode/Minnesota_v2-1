@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">اضافة اخبار وتنيهات</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   

                  <form action="{{ route('news-announcements.store') }}" method="POST" class="form form-horizontal form-bordered">
                    @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-mic"></i> معلومات الخبر او التنبية</h4>
                        {{--  <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المرحلة</label>
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
                        </div>  --}}
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المادة</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="class_id" class="form-control">
                              <option value="none" selected="" disabled="">اختر المادة المراد إشعارها</option>
                              @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material['material']->name }} - ( {{ $material['material']->specialization->name }} ) - ( {{ $material['material']->specialization->section->name }} ) </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عنوان التنبيه او الخبر</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="عنوان التنبيه او الخبر"
                            name="title">
                          </div>
                        </div>
                     
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput9">تفاصيل الخبر او التنبيه</label>
                          <div class="col-md-9">
                            <textarea id="projectinput9" rows="5" class="form-control" name="text" placeholder="تفاصيل الخبر او التنبيه"></textarea>
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