@extends('dashboard.layouts.master')

@section('content')
 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة تخصص جديد</h4>
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
                      <a  href="{{route('specialization.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة التخصصات</i></a> 
                    </div>
                    <form action="{{ route('specialization.store') }}" method="POST" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات التخصص</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر الفرع</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="branch_id" id="branch">
                                <option selected="" disabled="" >اختر الفرع</option>
                                @foreach ($branches as $branch)
                                  <option value="{{ $branch->id }}" >{{ $branch->name }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('branch_id'))
                               <div style="color:red;">{{$errors->first('branch_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر المرحلة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="stage_id" id="stage">
                                <option value="noun" selected="" disabled="" >اختر المرحلة</option>
                                
                              </select>
                            </div>
                            @if($errors->first('stage_id'))
                               <div style="color:red;">{{$errors->first('stage_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر القسم</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="section_id" id="section">
                                <option value="" selected="" disabled="" >اختر القسم</option>
                                
                              </select>
                            </div>
                            @if($errors->first('section_id'))
                               <div style="color:red;">{{$errors->first('section_id')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم التخصص</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('name')}}" id="projectinput1" class="form-control" placeholder="اسم التخصص"
                            name="name">
                            @if($errors->first('name'))
                              <div style="color:red;">{{$errors->first('name')}}</div>
                            @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">نبذة عن التخصص</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('info')}}" id="projectinput2" class="form-control" placeholder="نبذة عن التخصص"
                            name="info">
                              @if($errors->first('info'))
                               <div style="color:red;">{{$errors->first('info')}}</div>
                              @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">العدد المسموح للطلاب في القسم</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('max_student_number')}}" id="projectinput2" class="form-control" placeholder="عدد الطلاب"
                            name="max_student_number">
                              @if($errors->first('max_student_number'))
                               <div style="color:red;">{{$errors->first('max_student_number')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رسوم التخصص</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('fees')}}" id="projectinput2" class="form-control" placeholder="رسوم التخصص"
                            name="fees">
                              @if($errors->first('fees'))
                               <div style="color:red;">{{$errors->first('fees')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد مواد التخصص</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('number_of_materials')}}" id="projectinput2" class="form-control" placeholder="عدد مواد التخصص"
                            name="number_of_materials">
                              @if($errors->first('number_of_materials'))
                               <div style="color:red;">{{$errors->first('number_of_materials')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد المواد الإلزامية</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('number_of_mandatory_materials')}}" id="projectinput2" class="form-control" placeholder="عدد المواد"
                            name="number_of_mandatory_materials">
                              @if($errors->first('number_of_mandatory_materials'))
                               <div style="color:red;">{{$errors->first('number_of_mandatory_materials')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد المواد الإختيارية</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('number_of_optional_materials')}}" id="projectinput2" class="form-control" placeholder="عدد المواد"
                            name="number_of_optional_materials">
                              @if($errors->first('number_of_optional_materials'))
                               <div style="color:red;">{{$errors->first('number_of_optional_materials')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد المستويات الأعلى للتخرج</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('number_of_higher_levels')}}" id="projectinput2" class="form-control" placeholder="عدد المستويات الأعلى"
                            name="number_of_higher_levels">
                              @if($errors->first('number_of_higher_levels'))
                               <div style="color:red;">{{$errors->first('number_of_higher_levels')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">عدد المستويات الاقل للتخرج</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('number_of_lower_levels')}}" id="projectinput2" class="form-control" placeholder="عدد المستويات الأقل"
                            name="number_of_lower_levels">
                              @if($errors->first('number_of_lower_levels'))
                               <div style="color:red;">{{$errors->first('number_of_lower_levels')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">إجمالي عدد ساعات التخصص</label>
                          <div class="col-md-9">
                            <input type="text" vaule="{{old('total_hours')}}" id="projectinput2" class="form-control" placeholder="إجمالي عدد الساعات"
                            name="total_hours">
                              @if($errors->first('total_hours'))
                               <div style="color:red;">{{$errors->first('total_hours')}}</div>
                              @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر الحالة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="status" id="">
                                <option selected="" disabled="" >اختر الحالة</option>
                                <option value="0">غير مفعل</option>
                                <option value="1" >مفعل</option>
                              </select>
                            </div>
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


<script>


</script>

@endsection
@section('js')
<script src="{{asset('dashboard/js/specialization.js')}}" type="text/javascript"></script>
@endsection