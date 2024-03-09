@extends('admin/layout')
@section('page_title', 'My ECOM :: Customer')
@section('customer_select', 'active')
@section('container')
    <h1 class="mb10">Customers</h1>
    {{-- <a href="{{ url('admin/tax/manage_tax') }}">
        <button type="button" class="btn btn-success">
            Add Tax
        </button>
    </a> --}}
    <div class="row m-t-30">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-info" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slNo = 1; @endphp
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $slNo++ }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->email }}</td>
                                <td>{{ $list->mobile }}</td>
                                <td>
                                    <a href="{{ url('admin/customer/show/') }}/{{ $list->id }}"><button type="button"
                                        class="btn btn-outline-success btn-sm">View</button></a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/customer/status/0') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-outline-primary btn-sm">Active</button></a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/customer/status/1') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-outline-warning btn-sm">Deactive</button></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>

@endsection
