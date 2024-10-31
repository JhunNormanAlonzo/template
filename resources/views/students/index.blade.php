@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Student
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Student Number</x-th>
                    <x-th>Full Name</x-th>
                    <x-th>Email</x-th>
                    <x-th>Course</x-th>
                    <x-th>Year Level</x-th>
                    <x-th>Created At</x-th>
                    <x-th>Action</x-th>
                </x-thead>
                <x-tbody>
                    @foreach($students as $student)
                        <x-tr>
                            <x-td>{{$student->student_number}}</x-td>
                            <x-td>{{$student->user->name}}</x-td>
                            <x-td>{{$student->user->email}}</x-td>
                            <x-td>{{$student->course->name}}</x-td>
                            <x-td>{{$student->yearLevel->name}}</x-td>
                            <x-td>{{$student->created_at}}</x-td>
                            <x-td>
                                <a class="btn btn-sm btn-secondary" href="{{route('students.edit', [$student->id])}}"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{route('students.destroy', [$student->id])}}" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                            </x-td>
                        </x-tr>
                    @endforeach
                </x-tbody>
            </x-table>
        </div>
    </div>

    @section('script')
        <script>
            $("#table").DataTable();
        </script>
    @endsection



@endsection
