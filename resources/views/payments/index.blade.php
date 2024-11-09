@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    History Logs
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Collector Name</x-th>
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


    @section('script')
        <script>
            $(document).ready(function() {
                var table = $("#table").DataTable({
                    dom: "Blfrtip",
                    fixedColumns: true,
                    buttons: [
                        {
                            extend: 'pdf',
                            title: "History Logs",
                            text: '<i class="bi bi-filetype-pdf"></i>',
                            className: 'btn btn-primary mb-3',
                            download: 'download',
                            orientation: "landscape",
                            pageSize: "A4",
                            exportOptions: {
                                columns: [0,1,2,3,4,5,6,7,8] // Make sure this is correctly defined in your controller
                            },
                            customize: function(doc) {
                                doc.pageMargins = [10, 10, 10, 10];
                                doc.defaultStyle.fontSize = 7;
                                doc.styles.tableHeader.fontSize = 7;
                                doc.styles.title.fontSize = 9;
                                doc.content[0].text = doc.content[0].text.trim();

                                // Create a footer
                                doc['footer'] = (function(page, pages) {
                                    return {
                                        columns: [
                                            'Printed on : {{ \Carbon\Carbon::now()->tz('Asia/Manila')->isoFormat('LLLL') }}',
                                            {
                                                alignment: 'right',
                                                text: ['page ', { text: page.toString() }, ' of ', { text: pages.toString() }]
                                            }
                                        ],
                                        margin: [10, 0]
                                    };
                                });

                                // Styling the table
                                var objLayout = {};
                                objLayout['hLineWidth'] = function(i) { return .5; };
                                objLayout['vLineWidth'] = function(i) { return .5; };
                                objLayout['hLineColor'] = function(i) { return '#aaa'; };
                                objLayout['vLineColor'] = function(i) { return '#aaa'; };
                                objLayout['paddingLeft'] = function(i) { return 4; };
                                objLayout['paddingRight'] = function(i) { return 4; };

                                doc.content[1].layout = objLayout;
                                doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                            }
                        }
                    ]
                }).columns.adjust();
            });
        </script>
    @endsection



@endsection
