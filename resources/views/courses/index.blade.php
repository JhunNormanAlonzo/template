@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Course
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Course</x-th>
                    <x-th>Description</x-th>
                    <x-th>Created At</x-th>
                    <x-th>Action</x-th>
                </x-thead>
                <x-tbody>
                    @foreach($courses as $course)
                        <x-tr>
                            <x-td>{{$course->name}}</x-td>
                            <x-td>{{$course->description}}</x-td>
                            <x-td>{{$course->created_at}}</x-td>
                            <x-td>
                                <a class="btn btn-sm btn-secondary" href="{{route('courses.edit', [$course->id])}}"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{route('courses.destroy', [$course->id])}}" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
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
