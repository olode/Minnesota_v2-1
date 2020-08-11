@extends('dashboard.layouts.master')

@section('content')
<style>
      .heads{
        background-color: #e5ecff;
        padding: 10px;
        /* border: solid #4f52ff; */
        font-size: 20px;
    }
    .data{
        background-color: #b9bbbb;
        padding: 10px;
        font-size: 21px;
        color: #ffffff;
    }
</style>
 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
        <!-- // Form repeater section end -->


            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h1 class="card-title">عرض معلومات الصفوف</h1>
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
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <p class="card-text text-center"></p>
                    <table class="table table-striped table-bordered dataex-html5-selectors">
                      
                        <hr>
                        <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-2">
                            <h3 class="heads">اسم الصف</h3>
                            <p class="data">{{ $data->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">المرحلة</h3>
                            <p class="data">{{ $data['material']->specialization->section->stage->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">القسم</h3>
                            <p class="data">{{ $data['material']->specialization->section->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">التخصص</h3>
                            <p class="data">{{ $data['material']->specialization->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">المادة</h3>
                            <p class="data">{{ $data['material']->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">المدرس</h3>
                            <p class="data">{{ $data['teacher']->first_name }} {{ $data['teacher']->second_name }} {{ $data['teacher']->third_name }} {{ $data['teacher']->last_name }}</p>
                        </div>
                      </div>

                      <hr>
                      <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-2">
                            <h3 class="heads">اليوم</h3>
                            <p class="data">{{ $data->class_day }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">الوقت</h3>
                            <p class="data"> {{ $data->starts_at }} - {{ $data->ends_at }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">عدد الطلاب المسموح</h3>
                            <p class="data">{{ $data->max_student }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">مكافأة المحاضر</h3>
                            <p class="data">{{ $data->lecturing_allowance }}</p>
                        </div>

                        <div class="col col-md-2">
                            <h3 class="heads">الحضور الطلابي المطلوب</h3>
                            <p class="data">{{ $data->required_attendance }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">مكافأة المحاضر</h3>
                            <p class="data">{{ $data->class_fee }} </p>
                        </div>
                      </div>

                      <hr>
                      <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-2">
                          <h3 class="heads">تاريخ استلام المكافأة</h3>
                          <p class="data">{{ $data->fee_due_date }}</p>
                        </div>
                        <div class="col col-md-2">
                          <h3 class="heads">السنة الدراسية</h3>
                          <p class="data">{{ $data['section']->stage->branch->name }}</p>
                        </div>
                      </div>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Column selectors table -->

@endsection