@extends('layout')

@section('student')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">

        <!-- breadcumb-area -->
        <section class="breadcumb-area card bg-gradient mb-5">
            <div class="bread-cumb-content card-body d-flex align-items-center">
                <div class="breadcumb-heading">
                    <h2 class="text-white">Student Profile --- {{ $single_student->student_name }}</h2>
                </div>
                <div class="breadcumb-image ml-auto">
                    <img src="assets/img/breadcumb-dashboard.png" alt="">
                </div>
            </div>
        </section>
        <!-- End breadcumb-area -->




        <section class="profile-area card">
              <div class="profile-content card-body d-flex">
                  <div class="user-image-wrap mr-5">
                      <img style="width: 250px" src="{{URL::to($single_student->student_image)}}" alt="">
                  </div>
                  <div class="user-about">
                      <h2 class="text-danger">{{ $single_student->student_name }}</h2>
                        <p>Class : {{ $single_student->class->class_name }}</p>
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                      <p>{{ $single_student->email }}</p>
                      <p>Phone: {{ $single_student->phone}}</p>

                      <br>
                      <br>

                  </div>
              </div>
        </section>

    </div>
</div>
@endsection
