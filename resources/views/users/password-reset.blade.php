@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    User Password Reset
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('users.update-password', [$user])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Update User Password
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                   <div class="col-12 my-3">
                                       <h6 class="text-danger">Please note, changes will not take effect until you click the save button.</h6>
                                   </div>
                                    <div class="col-6">
                                        <div class="card shadow-lg">
                                            <div class="card-header bg-secondary text-warning text-center">
                                                Generated Password
                                            </div>

                                            <div class="card-body text-center py-4 bg-dark">
                                                <h5 class="text-white">{{$password}}</h5>
                                                <input type="text" value="{{$password}}" name="password" hidden>
                                                <input type="text" value="1" name="password_reset" hidden>
                                                <small class="text-warning">Please copy the password</small>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-sm btn-danger" href="{{route('users.index')}}">Cancel</a>
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
