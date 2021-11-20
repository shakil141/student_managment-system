@extends('layout')

@section('class')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">
        <section class="es-form-area">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <header class="card-header bg-gradient border-0 pt-5 pb-5 d-flex align-items-center">
                            <h2 class="text-white mb-0">All Class</h2>
                        </header>
                        <div class="card-body">


                            @if (session()->has('alert-success'))
                            <div class="alert alert-success">
                                <span>{{session('alert-success')}}</span>
                            </div>
                            @endif

                            <div class="attendances-list-wrap mt-5">

                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead class="bg-gradient">
                                            <tr class="text-center">
                                                <th scope="col" class="text-white">SL No</th>
                                                <th scope="col" class="text-white">Class Name</th>
                                                <th scope="col" class="text-white">Status</th>
                                                <th scope="col" class="text-white">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($all_class as $class)
                                                <tr class="text-center">
                                                    <td>{{ $loop->iteration}}</td>
                                                    <td>{{ $class->class_name}}</td>
                                                    <td>
                                                        @if ($class->status == 'Active')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">InActive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($class->status == 'Active')
                                                            <a href="{{ route('un_active',['class_id'=>$class->id]) }}" style="margin-right: 5px" class="btn btn-danger  white">
                                                                <i class="fas fa-thumbs-down"></i>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('active',['class_id'=>$class->id]) }}" style="margin-right: 5px" class="btn btn-success white">
                                                                <i class="fas fa-thumbs-up"></i>
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('class.edit',['class'=>$class->id]) }}" class="btn-info btn"><i class="fas fa-edit"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                        <div>
                                            {{ $all_class->links() }}
                                        </div>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <header class="card-header bg-gradient border-0 pt-5 pb-5 d-flex align-items-center">
                            <h2 class="text-white mb-0">Add Class</h2>
                        </header>
                        <div class="card-body">
                            <form action="{{ route('class.store') }}" method="POST" class="es-form es-add-form">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Class Name</label>
                                        <input name="class_name" value="{{ old('class_name') }}" type="text" placeholder="Enter Class Name">
                                            @error('class_name')
                                                <span class="text text-danger">{{ $message }}</span>
                                            @enderror
                                    </div>

                                    <div class="col-lg-8 offset-lg-2 col-md-12 mb-4">
                                        <label for="title">Status</label>
                                        <select name="status" id="status">
                                            <option selected disabled>Select Class</option>
                                            <option value="1">Active</option>
                                            <option value="0">InActive</option>
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
