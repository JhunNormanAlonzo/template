@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    User
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Name</x-th>
                    <x-th>Email</x-th>
                    <x-th>Role</x-th>
                    <x-th>Created At</x-th>
                    @role('Administrator')
                    <x-th>Action</x-th>
                    @endrole
                </x-thead>
                <x-tbody>
                    @foreach($users as $user)
                        <x-tr>
                            <x-td>{{$user->name}}</x-td>
                            <x-td>{{$user->email}}</x-td>
                            <x-td>{{$user->getRoleNames()->first()}}</x-td>
                            <x-td>{{$user->created_at}}</x-td>
                            @role('Administrator')
                            <x-td>
                                <a class="btn btn-sm btn-secondary" href="{{route('users.edit', [$user->id])}}"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{route('users.destroy', [$user->id])}}" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                            </x-td>
                            @endrole
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
