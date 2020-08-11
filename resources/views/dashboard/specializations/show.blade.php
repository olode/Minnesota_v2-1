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
                  <h1 class="card-title">عرض معلومات التخصص</h1>
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
                            <h3 class="heads">اسم التخصص</h3>
                            <p class="data">{{ $data->name }}</p>
                        </div>
                        <div class="col col-md-2">
                          <h3 class="heads">المرحلة</h3>
                          <p class="data">{{ $data['section']->stage->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">نبذة عن التخصص</h3>
                            <p class="data">{{ $data->info }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">رسوم المرحلة</h3>
                            <p class="data">{{ $data->fees }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">عدد المواد في التخصص</h3>
                            <p class="data">{{ $data->number_of_materials }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">عدد المواد الإلزامية</h3>
                            <p class="data">{{ $data->number_of_mandatory_materials }}</p>
                        </div>
                      </div>

                      <hr>
                      <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-2">
                            <h3 class="heads">عدد المواد الإختيارية</h3>
                            <p class="data">{{ $data->number_of_optional_materials }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">مستويات التخرج الأعلى</h3>
                            <p class="data"> {{ $data->number_of_higher_levels }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">مستويات التخرج الأقل</h3>
                            <p class="data">{{ $data->number_of_lower_levels }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">القسم</h3>
                            <p class="data">{{ $data['section']->name }}</p>
                        </div>

                        <div class="col col-md-2">
                            <h3 class="heads">الفرع</h3>
                            <p class="data">{{ $data['section']->stage->branch->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">عدد الساعات</h3>
                            <p class="data">{{ $data->total_hours }} </p>
                        </div>
                      </div>

                      <hr>
                      <div class="row" style="margin-bottom:45px">

                        <div class="col col-md-2">
                          <h3 class="heads">العدد الطلاب المسموح</h3>
                          <p class="data">{{ $data->max_student_number }}</p>
                      </div>
                        <div class="col col-md-2">
                            <h3 class="heads">حالة التخصص</h3>
                            <p class="data">
                                @if ($data->status === 1)
                                    {{"مفعل"}}
                                @elseif($data->status === 0)
                                    {{"غير مفعل"}}
                                @endif
                            </p>
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