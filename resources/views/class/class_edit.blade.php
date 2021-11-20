@extends('layout')

@section('class')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">
        <section class="es-form-area">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <header class="card-header bg-gradient border-0 pt-5 pb-5 d-flex align-items-center">
                            <h2 class="text-white mb-0">Edit Class</h2>
                        </header>
                        <div class="card-body">
                            <form action="{{ route('class.update',['class'=>$class->id]) }}" method="POST" class="es-form es-add-form">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Class Name</label>
                                        <input name="class_name" value="{{ old('class_name') ?? $class->class_name }}" type="text" placeholder="Enter Class Name">
                                            @error('class_name')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Status</label>
                                        <select name="status" id="status">

                                            <option value="1" {{ $class->status == 'Active' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $class->status == 'InActive' ? 'selected' : '' }}>InActive</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 offset-lg-4 col-md-12 text-center">
                                        <input type="submit" value="Add Student" class="btn btn-danger  bg-gradient border-0 text-white">
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</div>
@endsection
