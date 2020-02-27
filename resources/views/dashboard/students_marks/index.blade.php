@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <teachermaterial id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات الدرجات</h4>
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
                      <thead>
                          <th>اسم الطالب</th>
                          <th>اسم المادة</th>
                          <th>اسم الدرجة</th>
                          <th>درجة الطالب</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($students as $student)
                        <tr>
                          <td>{{ $student['student']->firstName}} {{ $student['student']->secondName}} {{ $student['student']->lastName}}</td>
                          <td>{{ $student['student_material']->teacher_material->material->name }}</td>
                          <td>يجب طباعت الناتج من جدول اخر</td>
                          <td>{{ $student->student_mark }}</td>
                          
                          <td>
                            <form style="display: ruby-base; margin-left: 5px;" action="{{ route('studentmark.edit', $student->id) }}" method="get">
                            {{ csrf_field() }}  
                            <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>
                            </form>
                           <form style="display: ruby-base; margin-left: 5px;" action="{{ route('studentmark.destroy', $student->id) }}" method="post">
                            @method('DELETE')
                            {{ csrf_field() }}  
                           <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                         </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>اسم الطالب</th>
                        <th>رمز المادة</th>
                        <th>اسم الدرجة</th>
                        <th>درجة الطالب</th>
                        <th>الاعدادت</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </teachermaterial>
        <!--/ Column selectors table -->

@endsection