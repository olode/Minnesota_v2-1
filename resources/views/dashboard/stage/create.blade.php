@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة مادة جديدة</h4>
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
                      <a  href="{{route('stage.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة المراحل</i></a> 
                    </div>
                    <form method="POST" action="{{ route('stage.store') }}" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                        @csrf
                        <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات المرحلة</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم المرحلة </label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('name')}}" id="projectinput1" class="form-control" placeholder="الإسم " name="name">
                            @if($errors->first('name'))
                               <div style="color:red;">{{$errors->first('name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">نبذة عن المرحلة</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('info')}}" id="projectinput4" class="form-control" placeholder="نبذة" name="info">
                            @if($errors->first('info'))
                               <div style="color:red;">{{$errors->first('info')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput6">الفرع</label>
                          <div class="col-md-9">
                            <select id="projectinput6" name="branch_id" class="form-control">
                              <option selected="" disabled="">اختر الفرع</option>
                              @foreach ($branches as $branche)
                              <option value="{{$branche->id}}">{{ $branche->name }}</option> 
                              @endforeach
                            </select>
                              @if($errors->first('branch_id'))
                                <div style="color:red;">{{$errors->first('branch_id')}}</div>
                              @endif
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