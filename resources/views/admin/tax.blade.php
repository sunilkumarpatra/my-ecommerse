@extends('admin/layout')
@section('page_title', 'My ECOM :: Tax')
@section('tax_select', 'active')
@section('container')
    <h1 class="mb10">Tax</h1>
    <a href="{{ url('admin/tax/manage_tax') }}">
        <button type="button" class="btn btn-success">
            Add Tax
        </button>
    </a>
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
                            <th>Tax Value</th>
                            <th>Tax Desc</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slNo = 1; @endphp
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $slNo++ }}</td>
                                <td>{{ $list->tax_desc }}</td>
                                <td>{{ $list->tax_value }}</td>
                                <td>
                                    <a href="{{ url('admin/tax/manage_tax/') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-outline-success btn-sm">Edit</button></a>
                                    <a href="{{ url('admin/tax/delete/') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/tax/status/0') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-outline-primary btn-sm">Active</button></a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/tax/status/1') }}/{{ $list->id }}"><button
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
