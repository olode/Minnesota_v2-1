@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة فرع جديد</h4>
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
                    <form action="{{route('branche.update', $data->id)}}" method="POST" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                        @method('PUT')
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الفرع</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم الفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{ $data->name }}" id="projectinput1" class="form-control"
                            name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني الخاص بالفرع</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->emailOfBranch }}" id="projectinput3" class="form-control" 
                            name="emailOfBranch">
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف الخاص بالفرع</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->phoneNumber }}" id="projectinput4" class="form-control" 
                             name="phoneNumber">
                          </div>
                        </div>
                 
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">المنطقة</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->location }}" id="projectinput2" class="form-control" 
                            name="location">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الدولة</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->country }}" id="projectinput2" class="form-control" 
                            name="country">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اسم مدير الفرع</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->mangerPhoneNumber }}" id="projectinput2" class="form-control"
                            name="mangerFullName">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">هاتف مدير الفرع</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->mangerPhoneNumber }}" id="projectinput2" class="form-control" 
                            name="mangerPhoneNumber">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">البريد الالكتروني الخاص بمدير الفرع</label>
                          <div class="col-md-9">
                            <input type="text"  value="{{ $data->mangerEmail }}" id="projectinput2" class="form-control" 
                            name="mangerEmail">
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