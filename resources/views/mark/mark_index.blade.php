@extends('layout')


@section('main_content')
<div class="u-content">
    <div class="u-body">

        <!-- breadcumb-area -->
        <section class="breadcumb-area card bg-gradient mb-5">
            <div class="bread-cumb-content card-body d-flex align-items-center">
                <div class="breadcumb-heading">
                    <h2 class="text-white">All Students Marks</h2>
                </div>
                <div class="breadcumb-image ml-auto">
                    <img src="assets/img/breadcumb-marks.png" alt="">
                </div>
            </div>
        </section>
        <!-- End breadcumb-area -->




        <section class="es-form-area">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('mark.store') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <select name="class_id" id="class_menu" class="form-control">
                                    <option selected disabled>Select Class</option>
                                    @foreach ($all_classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <select name="student_name" id="student_menu" class="form-control">
                                    <option selected disabled>Select Student</option>

                                </select>
                            </div>

                            <div class="col-md-6">
                                <select name="subject_name" id="" class="form-control">
                                    <option selected disabled>Select Subject</option>
                                    @foreach ($all_subjects as $subject)
                                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">

                                <input type="text" name="mark" id="mark" class="form-control" placeholder="Add Mark">
                            </div>
                            <div class="m-3">
                                <input type="submit" class="btn btn-success" value="Add Mark">
                            </div>

                        </div>
                    </form>

                    <div class="attendances-list-wrap mt-5">


                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="bg-gradient">
                                    <tr>
                                        <th scope="col" class="text-white">SL No</th>
                                        <th scope="col" class="text-white">Class Name</th>
                                        <th scope="col" class="text-white">Student Name</th>
                                        <th scope="col" class="text-white">Subject Name</th>
                                        <th scope="col" class="text-white">Mark</th>
                                        <th scope="col" class="text-white">Action</th>

                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($all_marks as $mark)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $mark->class->class_name }}</td>
                                            <td>{{ $mark->student->student_name  }}</td>
                                            <td>{{ $mark->subject_name }}</td>
                                            <td>{{ $mark->mark }}</td>
                                            <td>
                                                @if ($mark->mark <='33')
                                                    <a href="{{ route('sent.mail',['id'=>$mark->id]) }}" class="btn btn-danger">Fail</a>
                                                @endif

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
