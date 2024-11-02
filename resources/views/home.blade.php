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
                            <h6>{{$fees}}</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Sales</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{number_format($sales, '2')}}</h6>
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
                            <h6>{{$student_counts}}</h6>
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
                    <x-th>Total Fee</x-th>
                    <x-th>Status</x-th>
                </x-thead>
                <x-tbody>
                   @foreach($students as $student)
                        <x-tr>
                            <x-td>{{$student->user->name}}</x-td>
                            <x-td>{{$student->course->name}}</x-td>
                            <x-td>{{$student->yearLevel->name}}</x-td>
                            <x-td>{{number_format($student->getBalance(), 2)}}</x-td>
                            <x-td>{{number_format($student->getTotalFees(), 2)}}</x-td>
                            <x-td>{{$student->getBalance() == 0 ? "Paid" : "Unpaid"}}</x-td>
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
