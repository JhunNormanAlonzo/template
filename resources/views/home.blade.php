@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
   Students
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-btn class="float-end">Add Students</x-btn>
        </div>
        <div class="col-12">
            <x-table>
                <x-thead>
                    <x-th>First Name</x-th>
                    <x-th>Middle Name</x-th>
                    <x-th>Last Name</x-th>
                    <x-th>Course</x-th>
                    <x-th>Action</x-th>
                    <x-th></x-th>
                </x-thead>
                <x-tbody>
                    <x-tr>
                        <x-td>Jhun</x-td>
                        <x-td>Norman</x-td>
                        <x-td>Alonzo</x-td>
                        <x-td>BSIT</x-td>

                         <x-td>
                            <i class="btn btn-warning bi bi-pencil"></i>
                            <i class="btn btn-danger bi bi-trash"></i>
                        </x-td>
                    </x-tr>   <x-tr>
                        <x-td>Jhun</x-td>
                        <x-td>Norman</x-td>
                        <x-td>Alonzo</x-td>
                        <x-td>BSIT</x-td>
                         <x-td>
                            <i class="btn btn-warning bi bi-pencil"></i>
                            <i class="btn btn-danger bi bi-trash"></i>
                        </x-td>
                    </x-tr>   <x-tr>
                        <x-td>Jhun</x-td>
                        <x-td>Norman</x-td>
                        <x-td>Alonzo</x-td>
                        <x-td>BSIT</x-td>
                         <x-td>
                            <i class="btn btn-warning bi bi-pencil"></i>
                            <i class="btn btn-danger bi bi-trash"></i>
                        </x-td>
                    </x-tr>   <x-tr>
                        <x-td>Jhun</x-td>
                        <x-td>Norman</x-td>
                        <x-td>Alonzo</x-td>
                        <x-td>BSIT</x-td>
                         <x-td>
                            <i class="btn btn-warning bi bi-pencil"></i>
                            <i class="btn btn-danger bi bi-trash"></i>
                        </x-td>
                    </x-tr>
                    <x-tr>
                        <x-td>Jhun</x-td>
                        <x-td>Norman</x-td>
                        <x-td>Alonzo</x-td>
                        <x-td>BSIT</x-td>
                         <x-td>
                            <i class="btn btn-warning bi bi-pencil"></i>
                            <i class="btn btn-danger bi bi-trash"></i>
                        </x-td>
                    </x-tr>

                </x-tbody>
            </x-table>
        </div>
    </div>

@endsection
