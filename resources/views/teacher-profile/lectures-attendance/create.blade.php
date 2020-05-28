@extends('teacher-profile.layouts.master')

@section('content')


<div class="content-detached content-left">
        <div class="content-body">
          <!-- Description -->
          <section id="description" class="card">
            <div class="card-header">
              <h4 class="card-title">اضافة محاضرة جديدة</h4>
            </div>

            <div class="card-content">
              <div class="card-body">
                <div class="card-text">
                 
                  <!-- Both borders end-->
   

                  <form action="{{ route('lectures.store') }}" class="form form-horizontal form-bordered" method="POST" enctype="multipart/form-data">
                    @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-notebook"></i>تفاصيل المحاضرة</h4>
                        
                        
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المادة</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="class_id" class="form-control">
                              <option value="none" selected="" disabled="">المادة</option>
                              @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material['material']->name }} - ( {{ $material['material']->specialization->name }} ) - ( {{ $material['material']->specialization->section->name }} ) </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">ترتيب المحاضرة كتابتاُ</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="ترتيب المحاضرة كتابتاُ"
                            name="article_arrangement">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">ترتيب المحاضرة رقماً</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="ترتيب المحاضرة رقماً"
                            name="article_arrangement_number">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ المحاضرة</label>
                          <div class="col-md-9">
                            <input type="date" id="projectinput2" class="form-control" placeholder="تاريخ المحاضرة"
                            name="date">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عنوان المحاضرة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="عنوان المحاضرة"
                            name="title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">درجات المحاضرة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="المجوع الكلي  لدرجات هذه المحاضرة"
                            name="mark">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput9">ملف المحاضرة</label>
                          <div class="col-md-9">
                            <input type="file" id="projectinput2" class="form-control" 
                            name="about">
                          </div>
                        </div>
                      </div>
                      <div class="form-actions text-center">
                        <button type="submit" class="btn btn-primary">
                          <i class="fa fa-check-square-o"></i> نشر المحاضرة
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