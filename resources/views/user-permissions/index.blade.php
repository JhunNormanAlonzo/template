@extends('layouts.master')

<x-navbar></x-navbar>

@section('page_title')
    Permission Setting
@endsection

<x-sidebar></x-sidebar>

@section('main')

    <div class="row">
        <div class="col-12">
            <x-table id="table" class="">
                <x-thead>
                    <x-th>Name</x-th>
                    <x-th>Role</x-th>
                    <x-th>Action</x-th>
                </x-thead>
                <x-tbody>
                    @foreach($users as $user)
                        <x-tr>
                            <x-td>{{$user->name}}</x-td>
                            <x-td>{{$user->getRoleNames()->first()}}</x-td>

                            <x-td>
                                <a class="btn btn-sm btn-secondary" href="{{route('user-permissions.edit', [$user->id])}}"><i class="bi bi-pencil"></i></a>
                                <a class="btn btn-sm btn-danger" href="{{route('user-permissions.destroy', [$user->id])}}" data-confirm-delete="true"><i class="bi bi-trash"></i></a>
                            </x-td>
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
