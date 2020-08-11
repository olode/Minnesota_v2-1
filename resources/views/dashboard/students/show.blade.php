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
                  <h1 class="card-title">عرض معلومات الطالب</h1>
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
                            <h3 class="heads">الرقم الجامعي</h3>
                            <p class="data">{{ $data->special_student_id }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">الاسم الأول</h3>
                            <p class="data">{{ $data->first_name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">الاسم الثاني</h3>
                            <p class="data">{{ $data->second_name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">الاسم الاخير</h3>
                            <p class="data">{{ $data->last_name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">تاريخ الميلاد</h3>
                            <p class="data">{{ $data->birthday }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">الجنس</h3>
                            <p class="data">
                                @if ($data->gender === '0') {{"ذكر"}} @endif
                                @if ($data->gender === '1') {{"أنثى"}} @endif
                                @if ($data->gender === '2') {{"غير ذلك"}} @endif
                            </p>
                        </div>
                      </div>

                      <hr>
                        <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-2">
                            <h3 class="heads">الجنسية</h3>
                            <p class="data">{{ $data->nationality }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">النسبة</h3>
                            <p class="data">{{ $data->graduation_rate }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">المؤهل الدراسي</h3>
                            <p class="data">
                            @if ($data->qualification === '1') {{"ثانوي"}} @endif
                            @if ($data->qualification === '2') {{"دبلوم"}} @endif
                            @if ($data->qualification === '3') {{"بكالوريوس"}} @endif
                            @if ($data->qualification === '4') {{"ماجستير"}} @endif
                            @if ($data->qualification === '5') {{"دكتورا"}} @endif
                            </p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">البريد الإلكتروني</h3>
                            <p class="data">{{ $data->email }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">رقم الهاتف</h3>
                            <p class="data">{{ $data->phone_number }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">العنوان</h3>
                            <p class="data">{{ $data->location }}</p>
                        </div>
                      </div>

                      <hr>
                      <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-2">
                            <h3 class="heads">رقم الجواز</h3>
                            <p class="data">{{ $data->passport_number }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">الفرع</h3>
                            <p class="data">{{ $data['specialization']->section->stage->branch->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">القسم</h3>
                            <p class="data">{{ $data['specialization']->section->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">التخصص</h3>
                            <p class="data">{{ $data['specialization']->name }}</p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">حالة الطالب</h3>
                            <p class="data">
                                @if ($data->status === 1)
                                    {{"مفعل"}}
                                @elseif($data->status === 0)
                                    {{"غير مفعل"}}
                                @endif
                            </p>
                        </div>
                        <div class="col col-md-2">
                            <h3 class="heads">صورة الطالب</h3>
                            <div style="width: 100%; height: 245px; background-size: contain;">
                                <img src="/uploads/students/avatars/{{$data->avatar}}"  onContextMenu="return false" onDragStart="return false" galleryimg="no"  style="width: 100%; height: 100%; border: solid #4f52ff;" alt="">
                            </div>
                            <form action="{{ route('avatar.download', $data->id) }}" method="get">
                                <button style="width: 100%; margin-top:5px; height: 50px;" class="btn btn-success" type="submit">تحميل الصورة الشخصية</button>
                            </form>
                        </div>
                      </div>

                      <hr>
                        <div class="row" style="margin-bottom:45px">
                        <div class="col col-md-6">
                            <h3 class="heads">صورة جواز السفر</h3>
                            <div style="width: 100%; height: 445px; background-size: contain;">
                                <img src="/uploads/students/passports/{{$data->passport_image}}" onContextMenu="return false" onDragStart="return false" galleryimg="no"  style="width: 100%; height: 100%; border: solid #4f52ff;" alt="">
                            </div>
                            <form action="{{ route('qualification.download', $data->id) }}" method="get">
                                <button style="width: 100%; margin-top:5px; height: 50px;" class="btn btn-success" type="submit">تحميل نسخة جواز السفر للطالب</button>
                            </form>
                        </div>
                        <div class="col col-md-6">
                            <h3 class="heads">صورة المؤهل الدراسي</h3>
                            <div style="width: 100%; height: 445px; background-size: contain; ">
                                <img src="/uploads/students/qualifications/{{$data->qualification_image}}" onContextMenu="return false" onDragStart="return false" galleryimg="no"  style="width: 100%; height: 100%; border: solid #4f52ff;" alt="">
                            </div>
                            <form action="{{ route('passport.download', $data->id) }}" method="get">
                                <button style="width: 100%; margin-top:5px; height: 50px;" class="btn btn-success" type="submit">تحميل المؤهل العلمي للطالب</button>
                            </form>
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