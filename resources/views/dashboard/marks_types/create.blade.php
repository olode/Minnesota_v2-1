@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة بيانات درجة جديدة</h4>
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
                    <form  action="{{ route('marktype.store') }}" method="POST" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الدرجة</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم الدرجة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="اسم الدرجة"
                            name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الدرجة النهائية</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="الدرجة النهائية"
                            name="student_mark">
                          </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 label-control"  for="">اسم المادة</label>
                            <div class="col-md-9">
                              <select class="form-control" name="material_id" id="">
                                  <option></option>
                                  @foreach ($materials as $material)
                                      <option class="form-control" value="{{$material->id}}">{{$material['material']->name}}</option>
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