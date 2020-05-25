

           <!-- Form repeater section start -->
       
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="repeat-form">البحث عن الطلاب</h4>
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
                              <select class="form-control" id="branch">
                                <option>اختر الفرع</option>
                                @foreach($branches as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                @endforeach
                              </select>
                            </div>
                           
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر المرحلة</label>
                              <br>
                              <select class="form-control" id="stage">
                               
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر القسم </label>
                              <br>
                              <select class="form-control" id="section">
                                
                              </select>
                            </div>
                            
                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="specialization">اختر التخصص</label>
                              <br>
                              <select class="form-control" id="specialization">
                                
   
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="material">اختر المادة</label>
                              <br>
                              <select class="form-control" id="material">
                                <option>اختر المادة</option>
                             
                              </select>
                            </div>

                            <div class="form-group mb-1 col-sm-12 col-md-2">
                              <label for="profession">اختر السنة</label>
                              <br>
                              <select class="form-control" id="profession">
                                <option>اختر السنة</option>
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
  @section('js')
    <script src="{{asset('dashboard/js/studentFilter.js')}}" type="text/javascript"></script>
  @endsection