@extends('teacher-profile.layouts.master')

@section('content')



<div class="content-detached content-left">
        <div class="content-body">

           <!-- Form repeater section start -->
       
           <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">البحث عن الطلاب للتحضير</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                    <div class="repeater-default">
                      <div data-repeater-list="car">
                        <div data-repeater-item>
                          <form class="form row" action="{{ route('lecture-attendance') }}" method="GET">
                            @csrf
                            {{--  <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المرحلة</label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر المرحلة</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر القسم </label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر القسم</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                              </select>
                            </div>  --}}

                            {{--  <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المادة </label>
                              <br>
                              <select class="form-control" id="profession" name="material_id" >
                                <option>اختر المادة</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                              </select>
                            </div>  --}}

                            <div class="form-group mb-1 col-sm-12 col-md-6">
                              <label for="profession">اختر المحاضرة </label>
                              <br>
                              <select class="form-control" id="profession" name="material_id" >
                                <option selected="" disabled="">اختر المحاضرة</option>
                                @foreach ($materials as $material)
                                <option value="{{ $material->id }}">{{ $material['material']->name }} - ( {{ $material['material']->specialization->name }} ) - ( {{ $material['material']->specialization->section->name }} ) </option>
                                @endforeach
                              </select>
                            </div>

                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                              <button data-repeater-create type="submit" class="btn btn-primary">
                              بحث <i class="ft-search"></i> 
                              </button>
                            </div>
                          </form>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
        <!-- // Form repeater section end -->

          @if (!empty($attendancedata))
              <!-- Description -->
              <section id="description" class="card">
                <div class="card-header">
                  <h4 class="card-title">تحضير الطلاب</h4>
                </div>

                <div class="card-content">
                  <div class="card-body">
                    <div class="card-text">
                    
                      <!-- Both borders end-->
      
                      <table class="table table-responsive table-bordered dataex-html5-selectors">
                          <thead>
                            <tr>
                              <th>اسم الطالب</th>
                              <th>الرقم الجامعي</th>
                              <th>المرحلة</th>
                              <th>القسم</th>
                              <th>تحضير</th>
                            </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <td>احمد سعد علي</td>
                              <td>ِAUD85685s</td>
                              <td>ماجستير</td>
                              <td>ادارة اعمال</td>
                              <td>
                                <form style="display: ruby-base; margin-left: 5px;"  action="" method="post">
                                  <button type="submit" class="btn btn-success">حاضر</button>
                                </form>
                                <form style="display: ruby-base; margin-left: 5px;"  action="" method="post">
                                  <button class="btn btn-danger">غائب</button>
                                </form>
                                
                              </td>
                            </tr>
                            <tr>
                              <td>احمد سعد علي</td>
                              <td>ِAUD85685s</td>
                              <td>ماجستير</td>
                              <td>ادارة اعمال</td>
                              <td><button class="btn btn-success">ح</button>
                                  <button class="btn btn-danger">غ</button>
                              </td>
                            </tr>
                            
                            
                          </tbody>
                          <tfoot>
                            <tr>
                              <th>اسم الطالب</th>
                              <th>الرقم الجامعي</th>
                              <th>المرحلة</th>
                              <th>القسم</th>
                              <th>تعيين المواد</th>
                            </tr>
                          </tfoot>
                        </table>
            
            <!-- Both borders end -->

                    </div>
                  </div>
                </div>

              </section>
          @endif
          <!--/ Description -->
          
          
        </div>
      </div>



@endsection