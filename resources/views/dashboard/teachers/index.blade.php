@extends('dashboard.layouts.master')

@section('content')

 <!-- Column selectors table -->
 <section id="column-selectors">
          <div class="row">
           <!-- Form repeater section start -->
       
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">البحث عن المعلمين</h4>
                  <a class="heading-elements-toggle"><i class="ft-ellipsis-h font-medium-3"></i></a>
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
                  <div class="card-body">
                    <div class="repeater-default">
                      <div data-repeater-list="car">
                        <div data-repeater-item>
                          <form class="form row">
                            
                          <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الفرع</label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر الفرع</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                              </select>
                            </div>
                           
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المرحلة</label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر المرحلة</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر القسم </label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر القسم</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر الفصل</label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر الفصل</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المادة</label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر المادة</option>
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                                <option>Option 4</option>
                                <option>Option 5</option>
                              </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                              <button data-repeater-create class="btn btn-primary">
                              بحث<i class="ft-search"></i> 
                              </button>
                            </div>
                          </form>
                          <hr>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      
        <!-- // Form repeater section end -->


            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">عرض معلومات المعلمين</h4>
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
                        <tr>
                          <th>الاسم</th>
                          <th>المؤهل</th>
                          <th>رقم الهاتف</th>
                          <th> عدد المواد</th>
                          <th>رقم الجواز</th>
                          <th>الاعدادت</th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td> سعد احمد  علي </td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>١</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>احمد سعد علي</td>
                          <td>بكالوريوس</td>
                          <td>٠٥٦٦٦٢٥٣٧</td>
                          <td>٣</td>
                          <td>٢٨٧٧٤٨</td>
                          <td></td>
                        </tr>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <<th>الاسم</th>
                          <th>المؤهل</th>
                          <th>رقم الهاتف</th>
                          <th>عدد المواد</th>
                          <th>رقم الجواز</th>
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