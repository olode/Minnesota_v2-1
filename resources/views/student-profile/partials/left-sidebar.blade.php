<div class="sidebar-detached sidebar-right sidebar-sticky"="">
        <div class="sidebar">
          <div class="sidebar-content card d-none d-lg-block">
            <div class="card-body">
              <div class="category-title pb-1">
                <h6>الأخبار والتبيهات</h6>
              </div>
              <!-- Card sample -->
              <div class="text-center">

              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <p>انقر الخبر او التنبيه لعرض التفاصيل</p>
                  </div>
                  <ul class="list-group list-group-flush">
              @foreach($student->student_classes as $student_class)
                @if($student_class->class->news != null)
                   <li class="list-group-item " data-toggle="modal" data-target="#news{{$student_class->class->news->first()->id}}">
                      <span class="badge badge-default badge-pill bg-primary float-right">{{$student_class->class->material->name}}</span>
                      {{$student_class->class->news->max()->title}}

                    </li>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="form-group">
                          <!-- Button trigger modal -->
                          <!-- Modal -->
                          <div class="modal animated pulse text-left" id="news{{$student_class->class->news->first()->id}}" tabindex="-1" role="dialog"
                          aria-labelledby="myModalLabel38" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="myModalLabel38">{{$student_class->class->news->max()->title}}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <h5>التفاصيل</h5>
                                  <p>{{$student_class->class->news->max()->text}}</p>
                                  
                              
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">إغلاق</button>
                                  <!-- <button type="button" class="btn btn-outline-primary">Save changes</button> -->
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                @endif

              @endforeach

                     <!-- <li class="list-group-item">
                      <span class="badge badge-default badge-pill bg-danger float-right">٥</span>
                      Vestibulum at eros
                    </li> -->
                  </ul>
                  
                </div>
              </div>

              </div>
              
              <!-- /Card sample -->
              <!-- Striped Progress sample -->
              <div>

              </div>
              <!-- /Striped Progress sample -->
            
              <!-- /Ratings sample -->
            </div>
          </div>
        </div>
      </div>



      
           <!-- Modal Animations start -->
