@extends('layout');

@section('teacher')
    active
@endsection

@section('main_content')
<div class="u-content">
    <div class="u-body">

        <!-- breadcumb-area -->
        <section class="breadcumb-area card bg-gradient mb-5">
            <div class="bread-cumb-content card-body d-flex align-items-center">
                <div class="breadcumb-heading">
                    <h2 class="text-white">All Teachers</h2>
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
                                        <th scope="col" class="text-white">Teacher Name</th>
                                        <th scope="col" class="text-white">Teacher Image</th>
                                        <th scope="col" class="text-white text-center">Teacher Phone</th>
                                        <th scope="col" class="text-white text-center">Teacher Email</th>
                                        <th scope="col" class="text-white text-center">Teacher Address</th>
                                        <th scope="col" class="text-white text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all_teacher as $teacher)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teacher->teacher_name }}</td>
                                            <td><img style="width: 80px" src="{{URL::to($teacher->image)}}" alt="teacher_img"></td>
                                            <td>{{ $teacher->teacher_phone }}</td>
                                            <td>{{ $teacher->teacher_email }}</td>
                                            <td>{{ $teacher->teacher_address }}</td>
                                            <td >
                                                <a  href="{{ route('teacher.edit',['teacher'=>$teacher->id]) }}" class="btn btn-info "><i class="fas fa-edit"></i></a>
                                                <a  href="{{ route('teacher.show',['teacher'=>$teacher->id]) }}" class="btn btn-info "><i class="fas fa-eye"></i></a>

                                               <form action="{{ route('teacher.destroy',['teacher'=>$teacher->id]) }}" method="POST">
                                                   @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure !')" class="btn  btn-danger"><i class="fas fa-trash"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center m-3">
                                {{ $all_teacher->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




    </div>
</div>
@endsection
