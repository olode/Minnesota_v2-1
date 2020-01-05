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
                    <table class="table table-striped table-bordered dataex-html5-selectors">
                      <thead>
                          <th>الاسم</th>
                          <th>عدد الطلاب في القسم</th>
                          <th>عدد المعلمين في القسم</th>
                          <th>عدد المواد في القسم</th>
                          <th>نبذة عن القسم</th>
                          <th>الاعدادت</th>
                      </thead>
                      <tbody>
                      <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>ادارة أعمال</td>
                          <td>٥٠</td>
                          <td>٦</td>
                          <td>٨</td>
                          <td>يعني كلام عن قسم ادارة الاعمال</td>
                          <td></td>
                        </tr>
                      </tbody>
                      <tfoot>
                          <th>الاسم</th>
                          <th>عدد الطلاب في القسم</th>
                          <th>عدد المعلمين في القسم</th>
                          <th>عدد المواد في القسم</th>
                          <th>نبذة عن القسم</th>
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