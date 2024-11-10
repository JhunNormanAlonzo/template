@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    User Permission
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <form action="{{route('user-permissions.update', [$user->id])}}" method="POST">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Update User Permission
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mt-2">
                                <h5>{{$user->name}}</h5>
                                <p class="text-secondary">{{$user->getRoleNames()->first()}}</p>
                                <hr>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="toggle-all">
                                    <div class="btn btn-sm btn-outline-secondary font-weight-bolder user-select-none">
                                        <x-input-check hidden id="toggle-all"></x-input-check>
                                        Check | Uncheck
                                    </div>
                                </label>
                            </div>
                        @foreach($permissions as $permission)
                            <div class="col-12 col-lg-2 col-md-4 col-sm-12">
                                <x-input-check id="{{$permission->id}}"   check="{{ $user->hasPermissionTo($permission->name) ? '1' : '0' }}" class="permission-checkbox" name="permissions[]" value="{{$permission->id}}"></x-input-check>
                                <label  for="{{$permission->id}}" class="{{ strpos($permission->name, "access") !== false ? "text-success" : "" }} mx-2 user-select-none" for="">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-4">
                                <a class="btn btn-sm btn-danger" href="{{route('user-permissions.index')}}">Cancel</a>
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


            $("#toggle-all").on('change', function(){

                console.log("test");
                var isChecked = $(this).prop('checked');

                // Set all individual checkboxes based on "select all" status
                $(".permission-checkbox").prop('checked', isChecked);
            });
        </script>
    @endsection



@endsection
