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
                                        
                    </div>
                    <form action="{{ route('specialization.store') }}" method="POST" class="form form-horizontal form-bordered">
                      @csrf
                      <div class="form-body">
                        <h4 class="form-section"><i class="ft-user"></i> معلومات التخصص</h4>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput1">اسم التخصص</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput1" class="form-control" placeholder="اسم التخصص"
                            name="name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">نبذة عن التخصص</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="نبذة عن التخصص"
                            name="info">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">العدد المسموح للطلاب في القسم</label>
                          <div class="col-md-9">
                            <input type="text" id="projectinput2" class="form-control" placeholder="عدد الطلاب"
                            name="maxStudentNumber">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر القسم</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="section_id" id="">
                                <option selected >اختر القسم</option>
                                @foreach ($sections as $section)
                                <option value="{{ $section->id }}" >{{ $section->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="projectinput2">اختر الحالة</label>
                          <div class="col-md-9">
                            <div class="form-group">
                              <select class="form-control" name="status" id="">
                                <option selected >اختر الحالة</option>
                                <option value="0">غير مفعل</option>
                                <option value="1" >مفعل</option>
                              </select>
                            </div>
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