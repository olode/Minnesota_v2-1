@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات الفصل</h4>
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
                    <table class="table  table-responsive table-bordered">
                      <thead>
                          <th>رمز الفصل</th>
                          <th>اسم الفصل</th>
                          <th>تاريخ البداية</th>
                          <th>تاريخ النهاية</th>
                          <th>أقصى عدد للمواد</th>
                          <th>أدنى عدد للمواد</th>
                          <th>الرسوم</th>
                          <th>اقل مبلغ للدفع</th>
                          <th>تاريخ الإستحقاق</th>
                          <th>السنة الدراسية</th>
                          <th>التخصص</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($semesters as $semester)
                      <tr>
                        <td>{{ $semester->semester_code }}</td>
                        <td>{{ $semester->title }}</td>
                        <td>{{ $semester->starts_at }}</td>
                        <td>{{ $semester->end_at }}</td>
                        <td>{{ $semester->max_courses }}</td>
                        <td>{{ $semester->min_courses }}</td>
                        <td>{{ $semester->semester_fee }}</td>
                        <td>{{ $semester->min_paid }}</td>
                        <td>{{ $semester->due_date }}</td>
                        <td>{{ $semester['year']->year_m }}</td>
                        <td>{{ $semester['specialization']->name }}</td>
                        <td  class="d-inline-flex">
                          <form  style="display: inline;"   action="{{ route('semester.edit', $semester->id) }}" method="get">
                            {{ csrf_field() }}
                           <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                         </form>
                         <form  style="display: inline;"   action="{{ route('semester.destroy', $semester->id) }}" method="post">
                          @method('DELETE')
                          {{ csrf_field() }}  
                         <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                       </form>
                      </td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>رمز الفصل</th>
                        <th>اسم الفصل</th>
                        <th>تاريخ البداية</th>
                        <th>تاريخ النهاية</th>
                        <th>أقصى عدد للمواد</th>
                        <th>أدنى عدد للمواد</th>
                        <th>الرسوم</th>
                        <th>اقل مبلغ للدفع</th>
                        <th>تاريخ الإستحقاق</th>
                        <th>السنة الدراسية</th>
                        <th>التخصص</th>
                        <th>الاعدادت</th>
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!--/ Column selectors table -->

@endsection