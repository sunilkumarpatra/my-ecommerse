@extends('admin/layout')
@section('page_title', 'My ECOM :: Size')
@section('size_select', 'active')
@section('container')
    <h1 class="mb10">Size</h1>
    <a href="{{ url('admin/size/manage_size') }}">
        <button type="button" class="btn btn-success">
            Add Size
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
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slNo = 1; @endphp
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $slNo++ }}</td>
                                <td>{{ $list->size }}</td>
                                <td>
                                    <a href="{{ url('admin/size/manage_size/') }}/{{ $list->id }}"><button
                                            type="button" class="btn btn-outline-success btn-sm">Edit</button></a>
                                    <a href="{{ url('admin/size/delete/') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/size/status/0') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-outline-primary btn-sm">Active</button></a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/size/status/1') }}/{{ $list->id }}"><button
                                                type="button"
                                                class="btn btn-outline-secondary btn-sm">Deactive</button></a>
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
