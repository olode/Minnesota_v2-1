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
   

                  <form action="{{ route('lectures.update', $lecture->id) }}" class="form form-horizontal form-bordered" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="icon-notebook"></i>تفاصيل المحاضرة</h4>
                        
                        
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">المادة</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="material_id" class="form-control">
                              @foreach ($materials as $material)
                                <option  @if ($material->id === $lecture->material_id) {{ "selected='' disabled=''" }} @endif  value="{{ $material->id }}">{{ $material['material']->name }} - ( {{ $material['material']->specialization->name }} ) - ( {{ $material['material']->specialization->section->name }} ) </option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">ترتيب المحاضرة كتابتاُ</label>
                          <div class="col-md-9">
                            <input value="{{ $lecture->articleArrangement }}" type="text" id="projectinput2" class="form-control" 
                            name="articleArrangement">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">ترتيب المحاضرة رقماً</label>
                          <div class="col-md-9">
                            <input value="{{ $lecture->articleArrangementNumber }}"  type="text" id="projectinput2" class="form-control" 
                            name="articleArrangementNumber">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ المحاضرة</label>
                          <div class="col-md-9">
                            <input value="{{ $lecture->date }}"  type="text" id="projectinput2" class="form-control" 
                            name="date">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عنوان المحاضرة</label>
                          <div class="col-md-9">
                            <input value="{{ $lecture->tittle }}"  type="text" id="projectinput2" class="form-control" 
                            name="tittle">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput9">ملف المحاضرة</label>
                          <div class="col-md-9">
                            <input  value="{{ $lecture->about }}"  type="file" id="projectinput2" class="form-control" 
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