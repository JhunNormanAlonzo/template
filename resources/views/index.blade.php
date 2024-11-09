<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <link href="{{ asset('NiceAdmin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('NiceAdmin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">


    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">


    <link href="{{asset('NiceAdmin/assets/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/flatpicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/datatable.css')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/dateTime.css')}}">
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/flatpicker.js')}}"></script>
    <script src="{{asset('js/datatable.js')}}"></script>
    <script src="{{asset('js/alpine.js')}}"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>
    <script src="{{asset('typed.js/typed.js')}}"></script>
    <livewire:styles></livewire:styles>

</head>

<body>
<x-navbar></x-navbar>
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card w-100">
        <div class="card-header">
            Student Fee Information Checker
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <x-table id="table" class="">
                        <x-thead>
                            <x-th>Student Number</x-th>
                            <x-th>Course</x-th>
                            <x-th>Year Level</x-th>
                            <x-th>Balance</x-th>
                            <x-th>Total Fee</x-th>
                            <x-th>Status</x-th>
                        </x-thead>
                        <x-tbody>
                            @foreach($students as $student)
                                @if($student->getBalance() != "0")
                                    <x-tr>
                                        <x-td>{{$student->student_number}}</x-td>
                                        <x-td>{{$student->course->name}}</x-td>
                                        <x-td>{{$student->yearLevel->name}}</x-td>
                                        <x-td>{{number_format($student->getBalance(), 2)}}</x-td>
                                        <x-td>{{number_format($student->getTotalFees(), 2)}}</x-td>
                                        <x-td>{{$student->getBalance() == 0 ? "Paid" : "Unpaid"}}</x-td>
                                    </x-tr>
                                @endif
                            @endforeach
                        </x-tbody>
                    </x-table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('NiceAdmin/assets/js/main.js') }}"></script>


<script src="{{asset('assets/bootstrap/for_dataTable/buttons_dt.js')}}"></script>
<script src="{{asset('assets/bootstrap/for_dataTable/pdfmake.js')}}"></script>
<script src="{{asset('assets/bootstrap/for_dataTable/pdf_fonts.js')}}"></script>
<script src="{{asset('assets/bootstrap/for_dataTable/buttons_html.js')}}"></script>
<script src="{{asset('assets/bootstrap/for_dataTable/print.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/moment.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/dateTime.js')}}"></script>
<livewire:scripts></livewire:scripts>

<script>
    $("#table").DataTable();
</script>
</body>

</html>
