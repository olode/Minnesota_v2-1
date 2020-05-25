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
                    <table class="table table-striped table-bordered">
                      <thead>
                          <th>المرحلة</th>
                          <th>القسم</th>
                          <th>المادة</th>
                          <th>المحاضر</th>
                          <th>وقت المحاضرة</th>
                          <th>العدد الاعلى للطلاب</th>
                          <th>رسوم الصف</th>
                          <th>السنة الدراسية</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($classes as $class)
                      <tr>
                        <td>{{ $class['stage']->name }}</td>
                        <td>{{ $class['section']->name }}</td>
                        <td>{{ $class['material']->name }}</td>
                        <td>{{ $class['teacher']->first_name }} {{ $class['teacher']->last_name }}</td>
                        <td>{{ $class->starts_at }} - {{ $class->ends_at }}</td>
                        <td>{{ $class->max_student }}</td>
                        <td>{{ $class->class_fee }}</td>
                        <td>{{ $class['year']->year_m }}</td>
                        <td>
                          <form   style="display: inline;"   action="{{ route('class.show', $class->id) }}" method="get">
                            {{ csrf_field() }}
                           <button style="border-radius: 25px;" class="btn btn-primary" type="submit">عرض التفاصيل</button>  
                         </form>
                          <form  style="display: inline;"  action="{{ route('class.edit', $class->id) }}" method="get">
                            {{ csrf_field() }}
                           <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                         </form>
                         <form   style="display: inline;"   action="{{ route('class.destroy', $class->id) }}" method="post">
                          @method('DELETE')
                          {{ csrf_field() }}  
                         <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                       </form>
                      </td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>المرحلة</th>
                          <th>القسم</th>
                          <th>المادة</th>
                          <th>المحاضر</th>
                          <th>وقت المحاضرة</th>
                          <th>العدد الاعلى للطلاب</th>
                          <th>رسوم الصف</th>
                          <th>السنة الدراسية</th>
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