@extends('dashboard.layouts.master')

@section('content')

 <section id="column-selectors">
          <div class="row">

            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات المستخدمين</h4>
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
                          <th>الصورة</th>
                          <th>الرقم التعريفي</th>
                          <th>الاسم الاول</th>
                          <th>الاسم الثاني</th>
                          <th> الاسم الاخير</th>
                          <th>البريد الالكتروني</th>
                          <th>رقم الهاتف</th>
                          <th>الفرع</th>
                          <th>نوع الصلاحية</th>
                          <th>الحالة</th>
                          <th>الاعدادت</th>
                        </tr>
                      </thead>
                      <tbody style="text-align: center;">
                         @foreach ($users as $user)
                            <tr>
                                <td><img style="width: 60px; height: 60px; overflow: hidden; border-radius: 50%;" src="/uploads/users/avatars/{{ $user->avatar ? $user->avatar : 'defult.jpeg' }}" alt=""></td>
                                <td>{{ $user->special_user_id }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->second_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>{{ $user['branch']->name }}</td>
                                <td>{{ $user['role']->name }}</td>   
                                <td>
                                  @if ($user->status === 1)
                                  <form action="{{ route('user.unactive', $user->id) }}" method="post">
                                    {{ csrf_field() }}
                                      <input style="border-radius: 25px;" class="btn btn-dark" type="submit" value="الغاء التفعيل">
                                    </form> 
                                  @else
                                    <form action="{{ route('user.active', $user->id) }}" method="post">
                                      {{ csrf_field() }}
                                      <input style="border-radius: 25px;" class="btn btn-primary" type="submit" value="تفعيل المستخدم">   
                                    </form> 
                                  @endif
                                </td>
                                <td  class="d-inline-flex">
                                  <form  style="display: inline;"  action="{{ route('user.edit', $user->id) }}" method="get">
                                    {{ csrf_field() }}
                                   <button style="border-radius: 25px;" class="btn btn-warning" type="submit">تعديل</button>  
                                 </form>
                                 <form  style="display: inline;"  action="{{ route('user.destroy', $user->id) }}" method="post">
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
                            <th>الصورة</th>
                            <th>الرقم الأكاديمي</th>
                            <th>الاسم الاول</th>
                            <th>الاسم الثاني</th>
                            <th> الاسم الاخير</th>
                            <th>البريد الالكتروني</th>
                            <th>رقم الهاتف</th>
                            <th>الفرع</th>
                            <th>نوع الصلاحية</th>
                            <th>الحالة</th>
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