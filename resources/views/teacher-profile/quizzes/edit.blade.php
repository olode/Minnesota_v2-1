@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">تعديل إختبار</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   

                  <form action="{{ route('quizze.update', $quizze->id) }}" method="POST" class="form form-horizontal form-bordered">
                    @method('PUT')
                    @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-notebook"></i>تفاصيل الإختبار</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">الصف</label>
                          <div class="col-md-9">
                            <select id="class" name="class_id" class="form-control">
                                <option selected disabled>اختر</option>
                              @foreach ($classes as $class)
                                  <option value="{{ $class->id }}" @if ( $class->id == $quizze->class_id)  selected disabled @endif >{{ $class->name }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ</label>
                          <div class="col-md-9">
                            <input type="date" value="{{ $quizze->date }}" id="projectinput2" class="form-control" placeholder="تاريخ"
                            name="date">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عنوان الإختبار</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $quizze->title }}"  id="projectinput2" class="form-control" placeholder="عنوان الإختبار"
                            name="title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">درجة الإختبار</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $quizze->full_mark }}"  id="projectinput2" class="form-control" placeholder="درجة الإختبار"
                            name="full_mark">
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