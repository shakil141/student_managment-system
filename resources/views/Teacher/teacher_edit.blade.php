@extends('layout');

@section('teacher')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">
        <section class="es-form-area">
            <div class="card">
                <header class="card-header bg-gradient border-0 pt-5 pb-5 d-flex align-items-center">
                    <h2 class="text-white mb-0">Edit Teacher</h2>
                </header>
                <div class="card-body">

                    @if (session()->has('alert-success'))
                    <div class="alert alert-success">
                        <span>{{session('alert-success')}}</span>
                    </div>
                    @endif

                    <form action="{{ route('teacher.update',['teacher'=>$single_teacher->id]) }}" enctype="multipart/form-data" method="POST" class="es-form es-add-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Teacher Name</label>
                                <input name="teacher_name" value="{{ old('teacher_name') ?? $single_teacher->teacher_name }}" type="text" placeholder="Enter Teacher Name">
                                    @error('teacher_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Teacher Phone</label>
                                <input type="text" value="{{ old('teacher_phone') ?? $single_teacher->teacher_phone }}" name="teacher_phone" placeholder="+01999999901">
                                    @error('teacher_phone')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Teacher Email</label>
                                <input type="text" value="{{ old('teacher_email') ?? $single_teacher->teacher_email }}" name="teacher_email" placeholder="example@gmail.com">
                                    @error('teacher_email')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Address</label>
                                <input type="text" value="{{ old('teacher_address') ?? $single_teacher->teacher_address }}" name="teacher_address">
                                    @error('teacher_address')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="class">Class Name</label>
                                <select name="class_id" id="class">

                                    @foreach ($class as $single_class)
                                    <option value="{{ $single_class->id }}" {{ ( $single_class->id == $single_teacher->id ) ? 'selected' : '' }}>{{$single_class->class_name}}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="photo">Old Teacher Photo</label>
                                <img style="width: 80px" src="{{URL::to($single_teacher->image)}}" alt="teacher_img">

                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="photo">Add New Teacher Photo</label>
                                <input id="photo" name="image" type="file">
                                    @error('image')
                                    <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="col-lg-4 offset-lg-4 col-md-12 text-center">
                                <input type="submit" value="Add Teacher" class="btn btn-danger  bg-gradient border-0 text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
