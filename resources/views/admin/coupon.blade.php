@extends('admin/layout')
@section('page_title', 'My ECOM :: Coupon')
@section('coupon_select', 'active')
@section('container')
    <h1 class="mb10">Coupon</h1>
    <a href="coupon/manage_coupon">
        <button type="button" class="btn btn-success">
            Add Coupon
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
                            <th>SL#</th>
                            <th>Coupon Name</th>
                            <th>Code</th>
                            <th>Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slNo = 1; @endphp
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $slNo++ }}</td>
                                <td>{{ $list->title }}</td>
                                <td>{{ $list->code }}</td>
                                <td>{{ $list->value }}</td>
                                <td>
                                    <a href="{{ url('admin/coupon/manage_coupon/') }}/{{ $list->id }}"><button
                                            type="button" class="btn btn-outline-success btn-sm">Edit</button></a>
                                    <a href="{{ url('admin/coupon/delete/') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/coupon/status/0') }}/{{ $list->id }}">
                                            <button type="button" class="btn btn-outline-primary btn-sm">
                                                Active
                                            </button>
                                        </a>
                                        @elseif($list->status == 0)
                                            <a href="{{ url('admin/coupon/status/1') }}/{{ $list->id }}">
                                                <button type="button" class="btn btn-outline-secondary btn-sm">
                                                    Inactive
                                                </button>
                                            </a>
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
