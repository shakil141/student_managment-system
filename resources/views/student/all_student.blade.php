@extends('layout')

@section('title', 'all_student_list')

@section('main_content')
<div class="u-content">
    <div class="u-body">

        <!-- breadcumb-area -->
        <section class="breadcumb-area card bg-gradient mb-5">
            <div class="bread-cumb-content card-body d-flex align-items-center">
                <div class="breadcumb-heading">
                    <h2 class="text-white">All Students</h2>
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

                    <div class="attendances-list-wrap mt-5">

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-gradient">
                                    <tr>
                                        <th scope="col" class="text-white">SL No</th>
                                        <th scope="col" class="text-white">Student Name</th>
                                        <th scope="col" class="text-white">Student Image</th>
                                        <th scope="col" class="text-white text-center">Student Email</th>
                                        <th scope="col" class="text-white text-center">Student Phone</th>
                                        <th scope="col" class="text-white text-center">Parents Email</th>
                                        <th scope="col" class="text-white text-center">Class Name</th>
                                        <th scope="col" class="text-white text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all_student as $student)
                                        <tr class="text-center">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->student_name }}</td>
                                            <td><img  style="width: 100px" src="{{URL::to($student->student_image)}}" alt="student_img"></td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->parents_email }}</td>
                                            <td>{{ $student->class->class_name }}</td>
                                            <td>
                                                <a  href="{{ route('student.edit',['student'=>$student->id]) }}" class="btn btn-info "><i class="fas fa-edit"></i></a>
                                                <a  href="{{ route('student.show',['student'=>$student->id]) }}" class="btn btn-info "><i class="fas fa-eye"></i></a>

                                               <form action="{{ route('student.destroy',['student'=>$student->id]) }}" method="POST">
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
