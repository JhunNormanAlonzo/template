@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    User
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('users.update', [$user])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Update User
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12">
                                        <x-label>Name</x-label>
                                        <x-input-text value="{{$user->name}}" name="name" placeholder="(ex) 1990-1991"></x-input-text>
                                        <x-validation name="name"></x-validation>
                                    </div>
                                    <div class="col-6">
                                        <x-label>Email</x-label>
                                        <x-input-text name="email" value="{{$user->email}}"></x-input-text>
                                        <x-validation name="email"></x-validation>
                                    </div>

                                    <div class="col-6">
                                        <x-label>Role</x-label>
                                        <select class="form-select form-select-sm" name="role_id" id="">
                                            @foreach($roles as $role)
                                                <option @if($user->getRoleNames()->first() == $role->name) selected @endif value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-12">
                                        <x-label>Password</x-label>
                                        <small class="text-success">(Please leave empty if no changes to old password.)</small>
                                        <x-input-text type="password" name="password"></x-input-text>
                                        <x-validation name="password"></x-validation>
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
