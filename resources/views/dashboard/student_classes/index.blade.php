@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <teachermaterial id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات التعيينات</h4>
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
                          <th>الفصل</th>
                          <th>الصف</th>
                          <th>السنة الدراسية</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($studentClasses as $studentClass)
                        <tr>
                          <td>{{ $studentClass['student']->first_name }} {{ $studentClass['student']->second_name }} {{ $studentClass['student']->last_name }}</td>
                          <td>{{ $studentClass['semester']->title }}</td>
                          <td>{{ $studentClass['class']->name }}</td>
                          <td>{{ $studentClass->year_id }}</td>
                          
                          <td>
                            <form    style="display: inline;"   action="{{ route('studentclass.edit', $studentClass->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                           </form>
                           <form    style="display: inline;"   action="{{ route('studentclass.destroy', $studentClass->id) }}" method="post">
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
                          <th>الفصل</th>
                          <th>الصف</th>
                          <th>السنة الدراسية</th>
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