@extends('layout')

@section('subject')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">

        <!-- breadcumb-area -->
        <section class="breadcumb-area card bg-gradient mb-5">
            <div class="bread-cumb-content card-body d-flex align-items-center">
                <div class="breadcumb-heading">
                    <h2 class="text-white">Subejcts</h2>
                </div>
                <div class="breadcumb-image ml-auto">
                    <img src="assets/img/breadcumb-students.png" alt="">
                </div>
            </div>
        </section>
        <!-- End breadcumb-area -->




        <section class="es-form-area">
            <div class="card">

                <div class="card-body">
                    @if (session()->has('alert-danger'))
                    <div class="alert alert-danger">
                        <span>{{session('alert-danger')}}</span>
                    </div>
                    @endif

                    @if (session()->has('alert-success'))
                    <div class="alert alert-success">
                        <span>{{session('alert-success')}}</span>
                    </div>
                    @endif

                    <div class="attendances-list-wrap mt-5">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-gradient">
                                    <tr>
                                        <th scope="col" class="text-white">SL No</th>
                                        <th scope="col" class="text-white">Subject Name</th>
                                        <th scope="col" class="text-white">Class</th>
                                        <th scope="col" class="text-white text-center">Teacher Name</th>
                                        <th scope="col" class="text-white text-center">Total Mark</th>
                                        <th scope="col" class="text-white text-center">Pass Mark</th>
                                        <th scope="col" class="text-white text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all_sub as $sub)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $sub->subject_name  }}</td>
                                            <td>{{ $sub->subjectclass->class_name }}</td>
                                            <td>{{ $sub->teacher->teacher_name  }}</td>
                                            <td>{{  $sub->total_mark }}</td>
                                            <td>{{ $sub->pass_mark }}</td>
                                            <td class="d-flex">
                                                <a style="margin-right: 5px" href="{{ route('subject.edit',['subject'=>$sub->id]) }}" class="btn btn-info "><i class="fas fa-edit"></i></a>

                                               <form action="{{ route('subject.destroy',['subject'=>$sub->id]) }}" method="POST">
                                                   @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure !')" class="btn  btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>
</div>
@endsection
