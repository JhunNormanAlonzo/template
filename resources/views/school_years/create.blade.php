@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    School Year
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('school_years.store')}}" method="POST">
        @csrf
        @method("POST")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Create School Year
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <x-label>Name</x-label>
                                <x-input-text name="name" placeholder="(ex) 1990-1991"></x-input-text>
                                <x-validation name="name"></x-validation>
                            </div>

                            <div class="col-4">
                                <x-label>Activation</x-label>
                                <select class="form-select form-select-sm" name="activation" id="">
                                    <option value="0">Inactivate</option>
                                    <option value="1">Activate</option>
                                </select>
                                <x-validation name="activation"></x-validation>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-sm btn-danger" href="{{route('school_years.index')}}">Cancel</a>
                            </div>
                            <div class="col-4">
                                <x-btn type="submit">Save</x-btn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @section('script')
        <script>
            $("#table").DataTable();
        </script>
    @endsection



@endsection
