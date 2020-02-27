@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
           <!-- Form repeater section start -->
       
            </div>
      
        <!-- // Form repeater section end -->


            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض الدرجات</h4>
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
                          <th>وصف الدرجة</th>
                          <th>الدرجة</th>
                          <th>اسم المادة</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      @foreach ($marktypes as $marktype)
                      <tr>
                        <td>{{ $marktype->name }}</td>
                        <td>{{ $marktype->student_mark }}</td>
                        <td>{{ $marktype->name }}</td>
                        <td>
                         <form style="display: ruby-base; margin-left: 5px;" action="{{ route('marktype.destroy', $marktype->id) }}" method="post">
                          @method('DELETE')
                          {{ csrf_field() }}  
                         <button style="border-radius: 25px;" class="btn btn-danger" type="submit">حذف</button>
                       </form>
                      </td>
                      </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <th>وصف الدرجة</th>
                        <th>الدرجة</th>
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