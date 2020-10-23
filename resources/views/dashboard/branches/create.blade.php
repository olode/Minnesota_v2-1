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
                      <a  href="{{route('branche.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة الفروع</i></a> 
                    </div>
                    <form action="{{route('branche.store')}}" method="POST" enctype="multipart/form-data" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الفرع</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم الفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('name')}}" id="projectinput1" class="form-control" placeholder="اسم الفرع"
                            name="name">
                            @if($errors->first('name'))
                               <div style="color:red;">{{$errors->first('name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput3">البريد الالكتروني الخاص بالفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('email_of_branch')}}" id="projectinput3" class="form-control" placeholder="البريد الالكتروني الخاص بالفرع" 
                            name="email_of_branch">
                            @if($errors->first('email_of_branch'))
                               <div style="color:red;">{{$errors->first('email_of_branch')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row last">
                          <label class="col-md-3 label-control" for="projectinput4">رقم الهاتف الخاص بالفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('phone_number')}}" id="projectinput4" class="form-control" placeholder="رقم الهاتف الخاص بالفرع"
                             name="phone_number">
                             @if($errors->first('phone_number'))
                               <div style="color:red;">{{$errors->first('phone_number')}}</div>
                            @endif
                          </div>
                        </div>
                 
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">المنطقة</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('location')}}" id="projectinput2" class="form-control" placeholder="المنطقة"
                            name="location">
                            @if($errors->first('location'))
                               <div style="color:red;">{{$errors->first('location')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">الدولة</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('country')}}" id="projectinput2" class="form-control" placeholder="الدولة"
                            name="country">
                            @if($errors->first('country'))
                               <div style="color:red;">{{$errors->first('country')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اسم مدير الفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('manger_full_name')}}" id="projectinput2" class="form-control" placeholder="اسم مدير الفرع"
                            name="manger_full_name">
                            @if($errors->first('manger_full_name'))
                               <div style="color:red;">{{$errors->first('manger_full_name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">هاتف مدير الفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('manger_phone_number')}}" id="projectinput2" class="form-control" placeholder="هاتف مدير الفرع"
                            name="manger_phone_number">
                            @if($errors->first('manger_phone_number'))
                               <div style="color:red;">{{$errors->first('manger_phone_number')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">البريد الالكتروني الخاص بمدير الفرع</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('manger_email')}}" id="projectinput2" class="form-control" placeholder="البريد الالكتروني الخاص بمدير الفرع"
                            name="manger_email">
                            @if($errors->first('manger_email'))
                               <div style="color:red;">{{$errors->first('manger_email')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">حالة الفرع</label>
                          <div class="col-md-9">
                              <label for=""></label>
                              <select class="select" name="status" id="">
                                <option selected>اختر الحالة</option>
                                <option value="0">غير مفعل</option>
                                <option value="1">مفعل</option>
                              </select>
                              @if($errors->first('status'))
                               <div style="color:red;">{{$errors->first('status')}}</div>
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