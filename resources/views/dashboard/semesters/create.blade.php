@extends('dashboard.layouts.master')

@section('content')
 <!-- Basic form layout section start -->
 <section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form">اضافة فصل جديد</h4>
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
                      <a  href="{{route('semester.index')}}" class="btn btn-primary"><i class="ft-corner-down-right">عرض قائمة الفصول (semesters)</i></a> 
                    </div>
                    <form action="{{ route('semester.store') }}" method="POST" class="form form-horizontal form-bordered basic-select2">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الفصل</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر التخصص</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="select2 form-control" name="specialization_id" id="specialization">
                                <option value="" selected="" disabled="" >اختر التخصص</option>
                                @foreach ($specializations as $specialization)
                                  <option value="{{ $specialization->id }}" >{{ $specialization->section->stage->name }} - {{ $specialization->section->name }} - {{ $specialization->name }}</option>
                                @endforeach
                              </select>
                            </div>
                                @if($errors->first('specialization_id'))
                                  <div style="color:red;">{{$errors->first('specialization_id')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم الفصل</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('title')}}" id="projectinput1" class="form-control" placeholder="اسم الفصل"
                            name="title">
                            @if($errors->first('title'))
                                  <div style="color:red;">{{$errors->first('title')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">رمز الفصل</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('semester_code')}}" id="projectinput1" class="form-control" placeholder="رمز الفصل"
                            name="semester_code">
                            @if($errors->first('semester_code'))
                                  <div style="color:red;">{{$errors->first('semester_code')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">تاريخ البدأ</label>
                          <div class="col-md-9">
                            <input type="date" value="{{old('starts_at')}}" id="projectinput1" class="form-control" placeholder="تاريخ البدأ"
                            name="starts_at">
                            @if($errors->first('starts_at'))
                                  <div style="color:red;">{{$errors->first('starts_at')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ الإنتهاء</label>
                          <div class="col-md-9">
                            <input type="date" value="{{old('end_at')}}" id="projectinput2" class="form-control" placeholder="تاريخ الإنتهاء"
                            name="end_at">
                            @if($errors->first('end_at'))
                                  <div style="color:red;">{{$errors->first('end_at')}}</div>
                                @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اقصى عدد للمواد</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('max_courses')}}" id="projectinput2" class="form-control" placeholder="اقصى عدد للمواد"
                            name="max_courses">
                            @if($errors->first('max_courses'))
                                  <div style="color:red;">{{$errors->first('max_courses')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">أدنى عدد للمواد</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('min_courses')}}" id="projectinput2" class="form-control" placeholder="أدنى عدد للمواد"
                            name="min_courses">
                            @if($errors->first('min_courses'))
                                  <div style="color:red;">{{$errors->first('min_courses')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رسوم الفصل</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('semester_fee')}}" id="projectinput2" class="form-control" placeholder="رسوم الفصل"
                            name="semester_fee">
                            @if($errors->first('semester_fee'))
                                  <div style="color:red;">{{$errors->first('semester_fee')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">المبلغ الأدنى الواجب دفعه</label>
                          <div class="col-md-9">
                            <input type="text" value="{{old('min_paid')}}" id="projectinput2" class="form-control" placeholder="المبلغ الأدنى الواجب دفعه"
                            name="min_paid">
                            @if($errors->first('min_paid'))
                                  <div style="color:red;">{{$errors->first('min_paid')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ الاستحقاق</label>
                          <div class="col-md-9">
                            <input type="date" value="{{old('due_date')}}" id="projectinput2" class="form-control" placeholder="تاريخ الاستحقاق"
                            name="due_date">
                            @if($errors->first('due_date'))
                                  <div style="color:red;">{{$errors->first('due_date')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر السنة الدراسية</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="year_id" id="">
                                <option selected="" disabled="" >اختر السنة</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->year_m }}</option>
                                @endforeach
                              </select>
                            </div>
                            @if($errors->first('year_id'))
                                  <div style="color:red;">{{$errors->first('year_id')}}</div>
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