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
                    <form action="{{ route('semester.update', $semester->id) }}" method="POST" class="form form-horizontal form-bordered">
                      @method('PUT')
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات الفصل</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر التخصص</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="specialization_id" id="specialization">
                                @foreach ($specializations as $specialization)
                                  <option value="{{ $specialization->id }}" @if ($specialization->id === $semester->specialization_id) selected="" disabled=""  @endif  >{{ $specialization->section->stage->name }} - {{ $specialization->section->name }} - {{ $specialization->name }}</option>
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
                            <input type="text" id="projectinput1" class="form-control" value="{{ $semester->title }}"
                            name="title">
                            @if($errors->first('title'))
                                  <div style="color:red;">{{$errors->first('title')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">رمز الفصل</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" value="{{ $semester->semester_code }}"
                            name="semester_code">
                            @if($errors->first('semester_code'))
                                  <div style="color:red;">{{$errors->first('semester_code')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">تاريخ البدأ</label>
                          <div class="col-md-9">
                            <input type="date" id="projectinput1" class="form-control"  value="{{ $semester->starts_at }}"
                            name="starts_at">
                            @if($errors->first('starts_at'))
                                  <div style="color:red;">{{$errors->first('starts_at')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ الإنتهاء</label>
                          <div class="col-md-9">
                            <input type="date" id="projectinput2" class="form-control"  value="{{ $semester->end_at }}"
                            name="end_at">
                            @if($errors->first('end_at'))
                                  <div style="color:red;">{{$errors->first('end_at')}}</div>
                                @endif
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اقصى عدد للمواد</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control"  value="{{ $semester->max_courses }}"
                            name="max_courses">
                            @if($errors->first('max_courses'))
                                  <div style="color:red;">{{$errors->first('max_courses')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">أدنى عدد للمواد</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control"  value="{{ $semester->min_courses }}"
                            name="min_courses">
                            @if($errors->first('min_courses'))
                                  <div style="color:red;">{{$errors->first('min_courses')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">رسوم الفصل</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control"  value="{{ $semester->semester_fee }}"
                            name="semester_fee">
                            @if($errors->first('semester_fee'))
                                  <div style="color:red;">{{$errors->first('semester_fee')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">المبلغ الأدنى الواجب دفعه</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control"  value="{{ $semester->min_paid }}"
                            name="min_paid">
                            @if($errors->first('min_paid'))
                                  <div style="color:red;">{{$errors->first('min_paid')}}</div>
                                @endif
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">تاريخ الاستحقاق</label>
                          <div class="col-md-9">
                            <input type="date" id="projectinput2" class="form-control"  value="{{ $semester->due_date }}"
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
                                @foreach ($years as $year)
                                    <option value="{{ $year->id }}" @if ($year->id === $semester->year_id) selected="" disabled=""  @endif >{{ $year->year_m }}</option>
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