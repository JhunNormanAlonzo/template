@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
   Dashboard
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">

        <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Fees</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>145</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Pendings</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-dash-circle"></i>
                        </div>
                        <div class="ps-3">
                            <h6>3,264</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-4 col-xl-12">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6>1244</h6>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Full Name</x-th>
                    <x-th>Course</x-th>
                    <x-th>Year Level</x-th>
                    <x-th>Balance</x-th>
                </x-thead>
                <x-tbody>
                    <x-tr>
                        <x-td>Jhun Norman Alonzo</x-td>
                        <x-td>First Year</x-td>
                        <x-td>BSIT</x-td>
                        <x-td>1,500</x-td>
                    </x-tr>
                    <x-tr>
                        <x-td>Jhun Norman Alonzo</x-td>
                        <x-td>First Year</x-td>
                        <x-td>BSIT</x-td>
                        <x-td>1,500</x-td>
                    </x-tr>
                    <x-tr>
                        <x-td>Jhun Norman Alonzo</x-td>
                        <x-td>First Year</x-td>
                        <x-td>BSIT</x-td>
                        <x-td>1,500</x-td>
                    </x-tr>
                    <x-tr>
                        <x-td>Jhun Norman Alonzo</x-td>
                        <x-td>First Year</x-td>
                        <x-td>BSIT</x-td>
                        <x-td>1,500</x-td>
                    </x-tr>
                    <x-tr>
                        <x-td>Jhun Norman Alonzo</x-td>
                        <x-td>First Year</x-td>
                        <x-td>BSIT</x-td>
                        <x-td>1,500</x-td>
                    </x-tr>

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
