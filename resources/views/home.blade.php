@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Dashboard
@endsection

<x-sidebar></x-sidebar>

@section('main')

    {{--    <div class="row">--}}

    {{--        <div class="col-xxl-4 col-md-6">--}}
    {{--            <div class="card info-card sales-card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <h5 class="card-title">Fees</h5>--}}

    {{--                    <div class="d-flex align-items-center">--}}
    {{--                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">--}}
    {{--                            <i class="bi bi-cart"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="ps-3">--}}
    {{--                            <h6>{{$fees}}</h6>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="col-xxl-4 col-md-6">--}}
    {{--            <div class="card info-card revenue-card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <h5 class="card-title">Sales</h5>--}}

    {{--                    <div class="d-flex align-items-center">--}}
    {{--                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">--}}
    {{--                            <i class="bi bi-graph-up"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="ps-3">--}}
    {{--                            <h6>{{number_format($sales, '2')}}</h6>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--            </div>--}}
    {{--        </div>--}}
    {{--        <div class="col-xxl-4 col-xl-12">--}}
    {{--            <div class="card info-card customers-card">--}}
    {{--                <div class="card-body">--}}
    {{--                    <h5 class="card-title">Students</h5>--}}

    {{--                    <div class="d-flex align-items-center">--}}
    {{--                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">--}}
    {{--                            <i class="bi bi-people"></i>--}}
    {{--                        </div>--}}
    {{--                        <div class="ps-3">--}}
    {{--                            <h6>{{$student_counts}}</h6>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                </div>--}}
    {{--            </div>--}}

    {{--        </div>--}}

    {{--    </div>--}}




    <div class="card">
        <div class="card-header">
            <p class="card-text">History Logs</p>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <x-table id="table" class="">
                        <x-thead>
                            <x-th>Collector</x-th>
                            <x-th>Student Name</x-th>
                            <x-th>Student Number</x-th>
                            <x-th>Email</x-th>
                            <x-th>Course</x-th>
                            <x-th>Year Level</x-th>
                            <x-th>Fee</x-th>
                            <x-th>Amount</x-th>
                            <x-th>Payment At</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($payments as $payment)
                                <x-tr>
                                    <x-td>{{$payment->collector->name}}</x-td>
                                    <x-td>{{$payment->name}}</x-td>
                                    <x-td>{{$payment->student_number}}</x-td>
                                    <x-td>{{$payment->email}}</x-td>
                                    <x-td>{{$payment->course}}</x-td>
                                    <x-td>{{$payment->year_level}}</x-td>
                                    <x-td>{{$payment->fee_name}}</x-td>
                                    <x-td>{{$payment->amount}}</x-td>
                                    <x-td>{{$payment->created_at}}</x-td>
                                </x-tr>
                            @endforeach
                        </x-tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>



    @section('script')
        <script>
            $("#table").DataTable();
        </script>
    @endsection



@endsection
