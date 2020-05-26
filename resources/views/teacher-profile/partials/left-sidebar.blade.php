
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
                  @foreach ($news as $item)
                  <li class="list-group-item " data-toggle="modal" data-target="#{{ $item->id}}">
                    <span class="badge badge-default badge-pill bg-primary float-right">{{ $item->id}}</span>
                    {{ $item->title}}
                  </li>
                  @endforeach
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

    @foreach ($news as $item)
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="form-group">
        <!-- Button trigger modal -->
        <!-- Modal -->
        <div class="modal animated pulse text-left" id="{{ $item->id}}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel38" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel38">عنوان الخبر او التنبيه</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h5>التفاصيل</h5>
                <p>{{ $item->text }}</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">اغلاق</button>
                <!-- <button type="button" class="btn btn-outline-primary">حفظ التغيرات</button> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach


     <!-- Modal Animations start -->
