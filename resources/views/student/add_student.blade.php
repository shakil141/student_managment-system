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
                    <h2 class="text-white mb-0">Add New Student</h2>
                </header>
                <div class="card-body">
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" class="es-form es-add-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Student Name</label>
                                <input name="student_name" value="{{ old('student_name') }}" type="text" placeholder="Enter Student Name">
                                    @error('student_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" placeholder="example@gmail.com">
                                    @error('email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Phone</label>
                                <input type="text" value="{{ old('phone') }}"  name="phone" placeholder="+01999999901">
                                    @error('phone')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Parents Email</label>
                                <input type="text" value="{{ old('parents_email') }}" name="parents_email" placeholder="example@gmail.com">
                                    @error('parents_email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="photo">Add Student Photo</label>
                                <input id="photo" name="student_image" type="file">
                                    @error('student_image')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="class_name">Class Name</label>
                                <select name="class_id" id="class">
                                    <option selected disabled>Select Class</option>
                                    @foreach ($all_class as $single_class)
                                        <option value="{{ $single_class->id }}">{{ $single_class->class_name }}</option>
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
