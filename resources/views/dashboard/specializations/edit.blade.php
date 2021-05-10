@extends('dashboard.layouts.master')

@section('content')

 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">تعديل التخصص</h4>
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
                    <form action="{{ route('specialization.update', $special->id) }}" method="POST" class="form form-horizontal form-bordered">
                      @method('PUT')
                        @csrf
                        <div class="form-body">
                          <h4 class="form-section"><i class="ft-user"></i> معلومات التخصص</h4>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">اختر الفرع</label>
                            <div class="col-md-9">
                              <div class="form-group">
                                <select class="form-control" name="branch_id" id="branch">
                                  @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" @if ($branch->id === $special->branch_id ) selected="" disabled=""  @endif >{{ $branch->name }}</option>
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
                                  @foreach ($stages as $stage)
                                      <option value="{{ $stage->id }}"  @if ($stage->id === $special->stage_id ) selected="" disabled=""  @endif  >{{ $stage->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                                @if($errors->first('total_hours'))
                                  <div style="color:red;">{{$errors->first('total_hours')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">اختر القسم</label>
                            <div class="col-md-9">
                              <div class="form-group">
                                <select class="form-control" name="section_id" id="section">
                                  <option value="" selected="" disabled="" >اختر القسم</option>
                                  @foreach ($sections as $section)
                                    <option value="{{ $section->id }}"  @if ($section->id === $special->section_id ) selected="" disabled=""  @endif  >{{ $section->name }}</option>
                                  @endforeach
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
                              <input type="text" value="{{ $special->name }}" id="projectinput1" class="form-control" placeholder="اسم التخصص"
                              name="name">
                                @if($errors->first('name'))
                                  <div style="color:red;">{{$errors->first('name')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">نبذة عن التخصص</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $special->info }}"  id="projectinput2" class="form-control" placeholder="نبذة عن التخصص"
                              name="info">
                                @if($errors->first('info'))
                                  <div style="color:red;">{{$errors->first('info')}}</div>
                                @endif
                            </div>
                          </div>
  
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">العدد المسموح للطلاب في القسم</label>
                            <div class="col-md-9">
                              <input type="text" value="{{ $special->max_student_number }}"   id="projectinput2" class="form-control" placeholder="عدد الطلاب"
                              name="max_student_number">
                                @if($errors->first('max_student_number'))
                                  <div style="color:red;">{{$errors->first('max_student_number')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">رسوم التخصص</label>
                            <div class="col-md-9">
                              <input type="text" id="projectinput2" value="{{ $special->fees }}" class="form-control" placeholder="رسوم التخصص"
                              name="fees">
                                @if($errors->first('fees'))
                                  <div style="color:red;">{{$errors->first('fees')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">عدد مواد التخصص</label>
                            <div class="col-md-9">
                              <input type="text" id="projectinput2" value="{{ $special->number_of_materials }}" class="form-control" placeholder="عدد مواد التخصص"
                              name="number_of_materials">
                                @if($errors->first('number_of_materials'))
                                  <div style="color:red;">{{$errors->first('number_of_materials')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">عدد المواد الإلزامية</label>
                            <div class="col-md-9">
                              <input type="text" id="projectinput2" value="{{ $special->number_of_mandatory_materials }}" class="form-control" placeholder="عدد المواد"
                              name="number_of_mandatory_materials">
                                @if($errors->first('number_of_mandatory_materials'))
                                  <div style="color:red;">{{$errors->first('number_of_mandatory_materials')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">عدد المواد الإختيارية</label>
                            <div class="col-md-9">
                              <input type="text" id="projectinput2" value="{{ $special->number_of_optional_materials }}" class="form-control" placeholder="عدد المواد"
                              name="number_of_optional_materials">
                                @if($errors->first('number_of_optional_materials'))
                                  <div style="color:red;">{{$errors->first('number_of_optional_materials')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">عدد المستويات الأعلى للتخرج</label>
                            <div class="col-md-9">
                              <input type="text" id="projectinput2" value="{{ $special->number_of_higher_levels }}" class="form-control" placeholder="عدد المستويات الأعلى"
                              name="number_of_higher_levels">
                                @if($errors->first('number_of_higher_levels'))
                                  <div style="color:red;">{{$errors->first('number_of_higher_levels')}}</div>
                                @endif
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="projectinput2">عدد المستويات الاقل للتخرج</label>
                            <div class="col-md-9">
                              <input type="text" id="projectinput2" value="{{ $special->number_of_lower_levels }}" class="form-control" placeholder="عدد المستويات الأقل"
                              name="number_of_lower_levels">
                                @if($errors->first('number_of_lower_levels'))
                                  <div style="color:red;">{{$errors->first('number_of_lower_levels')}}</div>
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