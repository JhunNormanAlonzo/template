@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    School Year
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>School Year</x-th>
                    <x-th>Activation</x-th>
                    <x-th>Created At</x-th>
                    <x-th>Action</x-th>
                </x-thead>
                <x-tbody>
                    @foreach($school_years as $school_year)
                        <x-tr>
                            <x-td>{{$school_year->name}}</x-td>
                            <x-td>
                                @if($school_year->activation == 1)
                                    <span class="badge bg-success">active</span>
                                @else
                                    <span class="badge bg-danger">inactive</span>
                                @endif
                            </x-td>
                            <x-td>{{$school_year->created_at}}</x-td>
                            <x-td>
                                <a class="btn btn-sm btn-secondary" href="{{route('school_years.edit', [$school_year->id])}}"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{route('school_years.destroy', [$school_year->id])}}" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
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
