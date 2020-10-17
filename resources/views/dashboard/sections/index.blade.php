@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات الأقسام</h4>
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
                    <table class="table  table-responsive table-bordered dataex-html5-selectors">
                      <thead>
                          <th>اسم القسم</th>
                          <th>عدد الطلاب في القسم</th>
                          <th>عدد الصفوف في القسم</th>
                          <th>عدد المواد في القسم</th>
                          <th>نبذة عن القسم</th>
                          <th>اسم المرحلة</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($sections as $section)
                        <tr>
                          <td>{{ $section->name }}</td>
                          <td>{{ $section->student_count->count() }}</td>
                          <td>{{ $section->classes_count->count() }}</td>
                          <td>{{ $section->material_count->count() }}</td>
                          <td>{{ $section->info }}</td>
                          <td>{{ $section['stage']->name }}</td>
                          
                          <td  class="d-inline-flex">
                            <form  style="display: inline;"   action="{{ route('section.edit', $section->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                           </form>
                           <form  style="display: inline;"   action="{{ route('section.destroy', $section->id) }}" method="post">
                            @method('DELETE')
                            {{ csrf_field() }}  
                           <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                         </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                          <th>الاسم</th>
                          <th>عدد الطلاب في القسم</th>
                          <th>عدد الصفوف في القسم</th>
                          <th>عدد المواد في القسم</th>
                          <th>نبذة عن القسم</th>
                          <th>اسم المرحلة</th>
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