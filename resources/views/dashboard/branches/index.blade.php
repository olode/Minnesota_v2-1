@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
          

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات الفروع</h4>
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
                    <table class="table table-responsive table-bordered dataex-html5-selectors">
                      <thead>
                         <th>الاسم</th>
                          <th>البريد الالكتروني للفرع</th>
                          <th>رقم الهاتف</th>
                          <th>الموقع</th>
                          <th>الدولة</th>
                          <th>اسم المدير</th>
                          <th>رقم هاتف المديير</th>
                          <th>البريد الالكتروني للمدير</th>
                          <th>حالة الفرع</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                   
                      @foreach ($branches as $branche)
                        <tr>
                          <td>{{ $branche->name }}</td>
                          <td>{{ $branche->emailOfBranch }}</td>
                          <td>{{ $branche->phoneNumber }}</td>
                          <td>{{ $branche->location }}</td>
                          <td>{{ $branche->country }}</td>
                          <td>{{ $branche->mangerFullName }}</td>
                          <td>{{ $branche->mangerPhoneNumber }}</td>
                          <td>{{ $branche->mangerEmail }}</td>
                          <td>
                            @if ($branche->status === 1)
                            <form action="{{ route('branche.unactive', $branche->id) }}" method="post">
                              {{ csrf_field() }}
                                <input style="border-radius: 25px;" class="btn btn-dark" type="submit" value="الغاء التفعيل">
                              </form> 
                            @else
                               <form action="{{ route('branche.active', $branche->id) }}" method="post">
                                 {{ csrf_field() }}
                                <input style="border-radius: 25px;" class="btn btn-primary" type="submit" value="تفعيل الفرع">   
                              </form> 
                            @endif
                          </td>
                          <td>
                            <form style="display: ruby-base; margin-left: 5px;" action="{{ route('branche.edit', $branche->id) }}" method="get">
                              {{ csrf_field() }}
                             <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل الفرع</button>  
                           </form>
                           <form style="display: ruby-base; margin-left: 5px;" action="{{ route('branche.destroy', $branche->id) }}" method="post">
                            @method('DELETE')
                            {{ csrf_field() }}  
                           <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف الفرع</button>
                         </form>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>الاسم</th>
                        <th>البريد الالكتروني للفرع</th>
                        <th>رقم الهاتف</th>
                        <th>الموقع</th>
                        <th>الدولة</th>
                        <th>اسم المدير</th>
                        <th>رقم هاتف المديير</th>
                        <th>البريد الالكتروني للمدير</th>
                        <th>حالة الفرع</th>
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