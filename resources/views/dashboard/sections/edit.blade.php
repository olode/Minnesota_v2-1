@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل بيانات القسم</h4>
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
                    <form  action="{{ route('section.update', $section->id) }}" method="POST" class="form form-horizontal form-bordered">
                      @method('PUT')
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات القسم</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم القسم</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $section->name }}" id="projectinput1" class="form-control" placeholder="اسم القسم"
                            name="name">
                          </div>
                        </div>
                        
                 
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">نبذة عن القسم</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $section->info }}" id="projectinput2" class="form-control" placeholder="نبذة عن القسم"name="info">
                          </div>
                        </div>
                       
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="">اختر المرحلة</label>
                          <div class="col-md-9">
                          <select class="form-control" name="stage_id" id="">
                            <option value="" selected></option>
                            @foreach ($stages as $stage)
                            <option @if ($section->stage_id === $stage->id) {{"selected='' disabled=''"}} @endif  value="{{ $stage->id }}" >{{ $stage->name }}</option>
                            @endforeach
                          </select>
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