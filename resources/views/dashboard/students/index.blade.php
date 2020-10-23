@extends('dashboard.layouts.master')

@section('content')

@include('dashboard.students.filter')
 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
        <!-- // Form repeater section end -->


            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات الطلاب</h4>
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
                        <tr>
                          <th>الرقم الجامعي</th>
                          <th>الاسم</th>
                          <th>المرحلة</th>
                          <th>المؤهل</th>
                          <th>رقم الهاتف</th>
                          <th>رقم الجواز</th>
                          <th>حالة الطالب</th>
                          <th>الاعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($students as $student)
                        <tr>
                          <td>{{$student->special_student_id}}</td>
                          <td>{{ $student->first_name }} {{ $student->second_name }} {{ $student->third_name }} {{ $student->last_name }}</td>
                          <td>{{$student['section']->stage->name}}</td>
                          <td>
                            @if ($student->qualification === '1') {{"ثانوي"}} @endif
                            @if ($student->qualification === '2') {{"دبلوم"}} @endif
                            @if ($student->qualification === '3') {{"بكالوريوس"}} @endif
                            @if ($student->qualification === '4') {{"ماجستير"}} @endif
                            @if ($student->qualification === '5') {{"دكتورا"}} @endif
                          </td>
                          <td>{{$student->phone_number}}</td>
                          <td>{{$student->passport_number}}</td>
                          <td>
                            @if ($student->status === 1)
                            <form action="{{ route('student.unactive', $student->id) }}" method="post">
                              {{ csrf_field() }}
                                <input style="border-radius: 25px;" class="btn btn-dark" type="submit" value="الغاء التفعيل">
                              </form> 
                            @else
                               <form action="{{ route('student.active', $student->id) }}" method="post">
                                 {{ csrf_field() }}
                                <input style="border-radius: 25px;" class="btn btn-success" type="submit" value="تفعيل">   
                              </form> 
                            @endif
                          </td>
                          <td  class="d-inline-flex">
                            <form style="display: inline;" action="{{ route('student.show', $student->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="border-radius: 25px;" class="btn btn-primary" type="submit">عرض التفاصيل</button>  
                           </form>
                            <form style="display: inline;" action="{{ route('student.edit', $student->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                           </form>
                           <form style="display: inline;" action="{{ route('student.destroy', $student->id) }}" method="post">
                            @method('DELETE')
                            {{ csrf_field() }}  
                           <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                         </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>الرقم الجامعي</th>
                          <th>الاسم</th>
                          <th>المرحلة</th>
                          <th>المؤهل</th>
                          <th>رقم الهاتف</th>
                          <th>رقم الجواز</th>
                          <th>حالة الطالب</th>
                          <th>الاعدادت</th>
                        </tr>
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