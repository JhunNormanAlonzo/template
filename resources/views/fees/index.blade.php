@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Fee
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Fee</x-th>
                    <x-th>Amount</x-th>
                    <x-th>Course</x-th>
                    <x-th>Year Level</x-th>
                    <x-th>School Year</x-th>
                    <x-th>Activation</x-th>
                    <x-th>Created At</x-th>
                    <x-th>Action</x-th>
                </x-thead>
                <x-tbody>
                    @foreach($fees as $fee)
                        <x-tr>
                            <x-td>{{$fee->name}}</x-td>
                            <x-td>{{$fee->amount}}</x-td>
                            <x-td>{{$fee->course->name}}</x-td>
                            <x-td>{{$fee->yearLevel->name}}</x-td>
                            <x-td>{{$fee->schoolYear->name}}</x-td>
                            <x-td>
                                @if($fee->activation)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </x-td>
                            <x-td>{{$fee->created_at}}</x-td>
                            <x-td>
                                <a class="btn btn-sm btn-secondary" href="{{route('fees.edit', [$fee->id])}}"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{route('fees.destroy', [$fee->id])}}" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
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
