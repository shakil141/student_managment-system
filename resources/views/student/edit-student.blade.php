@extends('layout')

@section('title','Add_Student')

@section('students')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">
        <section class="es-form-area">
            <div class="card">
                <header class="card-header bg-gradient border-0 pt-5 pb-5 d-flex align-items-center">
                    <h2 class="text-white mb-0">Edit Student
                    </h2>

                </header>
                <div class="card-body">
                    <form action="{{ route('student.update',['student'=>$single_student->id]) }}" method="POST" enctype="multipart/form-data" class="es-form es-add-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Student Name</label>
                                <input name="student_name" value="{{ old('student_name') ?? $single_student->student_name }}" type="text" placeholder="Enter Student Name">
                                    @error('student_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Email</label>
                                <input type="text" name="email" value="{{ old('email') ?? $single_student->email }}" placeholder="example@gmail.com">
                                    @error('email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Phone</label>
                                <input type="text" value="{{ old('phone') ?? $single_student->phone }}"  name="phone" placeholder="+01999999901">
                                    @error('phone')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Parents Email</label>
                                <input type="text" value="{{ old('parents_email') ?? $single_student->parents_email }}" name="parents_email" placeholder="example@gmail.com">
                                    @error('parents_email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="photo">Old Student Photo</label>
                                <img style="width: 80px" src="{{ URL::asset($single_student->student_image) }}" alt="single_student_img">

                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="photo">Add New Student Photo</label>
                                <input id="photo" name="student_image" type="file">
                                    @error('student_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="class_name">Class Name</label>
                                <select name="class_id" id="class">
                                    @foreach ($all_class as $class)
                                        <option value="{{ $class->id }}" {{ ( $class->id == $single_student->id ) ? 'selected' : '' }}>{{$class->class_name}}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="col-lg-4 offset-lg-4 col-md-12 text-center">
                                <input type="submit" value="Add Student" class="btn btn-danger  bg-gradient border-0 text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
