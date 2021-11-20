@extends('layout')

@section('subject')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">
        <section class="es-form-area">
            <div class="card">
                <header class="card-header bg-gradient border-0 pt-5 pb-5 d-flex align-items-center">
                    <h2 class="text-white mb-0">Subject</h2>
                </header>
                <div class="card-body">
                    <form action="{{ route('subject.store') }}" method="POST" class="es-form es-add-form">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="title">Subject Name</label>
                                <input name="subject_name" value="{{ old('subject_name') }}" type="text" placeholder="Enter Subject Name">
                                    @error('subject_name')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="class">Class Name</label>
                                <select name="class_id" id="class">
                                    <option selected disabled>Select Class</option>
                                    @foreach ($class as $single_class)
                                        <option value="{{ $single_class->id }}">{{ $single_class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="class">Teacher Name</label>
                                <select name="teacher_id" id="class">
                                    <option selected disabled>Select Teacher</option>
                                    @foreach ($all_teacher as $single_teacher)
                                        <option value="{{ $single_teacher->id }}">{{ $single_teacher->teacher_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="total_mark">Total Mark</label>
                                <input name="total_mark" id="total_mark" value="{{ old('total_mark') }}" type="text">
                                    @error('total_mark')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                <label for="pass_mark">Pass Mark</label>
                                <input name="pass_mark" id="pass_mark" value="{{ old('pass_mark') }}" type="text">
                                    @error('pass_mark')
                                        <span class="text text-danger">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="col-lg-4 offset-lg-4 col-md-12 text-center">
                                <input type="submit" value="Subject" class="btn btn-danger  bg-gradient border-0 text-white">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
