@extends('student-profile.layouts.master')

@section('content')


      
<div class="content-detached content-left">
        <div class="content-body">
         
          <!-- CSS Classes -->
          <section id="css-classes" class="card">
            <div class="card-header">
              <h4 class="card-title">الخطة الدراسية الشخصية</h4>
            </div>
            <div class="card-content">
              <div class="card-body">
                <div class="card-text">

              @foreach($semesters as $semester)
                <p class="text-center">{{$semester->title}}</p>

                <div class="table-responsive">
                  <table class="table table-bordered mb-0">
                    <thead>
                        <td>المادة</td>
                        <td>الحالة</td>
                        <td>وضع المادة</td>
                        <td>عدد الساعات</td>
                    </thead>
                    <tbody>

                    @foreach($semester->classes as $class)
                      <tr>{{--$class->material--}}
                        <td>{{$class->material->name}}</td>
                        <td>{{'تم او لم يتم'}}</td>
                        <td>{{$class->material->optional == 1 ? "اختياري" : "الزامي"}}
                            @if($class->material->requirement != 0)
                              <span class="badge badge-default badge-pill bg-primary float-right"> {{$class->material->required->name}} </span>
                            @endif
                        </td>
                        <td>{{$class->material->hours}}</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>

                <br>
                <br>
                <br>
              @endforeach


                </div>
              </div>
            </div>
          </section>
          <!--/ CSS Classes -->

          
        </div>
      </div>


@endsection