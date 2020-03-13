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
                                        
                    </div>
                    <form action="{{ route('material.store') }}" method="POST"  class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات المادة</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">الإسم </label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="الإسم "
                            name="name">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">نبذة عن المادة</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="نبذة عن المادة" 
                            name="info">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">إجمالي الدرجات</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="إجمالي الدرجات" 
                            name="max_mark">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">عدد الطلاب المسموح بهم</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput4" class="form-control" placeholder="عدد الطلاب" 
                            name="max_students_number">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">التخصص</label>
                          <div class="col-md-9">
                              <select  class="form-control" name="specialization_id" id="">
                                <option selected >اختر التخصص</option>
                                @foreach ($datas as $data)
                                    <option value="{{ $data->id }}">{{ $data->name }}</option>
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