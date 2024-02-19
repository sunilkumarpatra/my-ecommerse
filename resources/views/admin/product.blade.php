@extends('admin/layout')
@section('page_title', 'My ECOM :: Product')
@section('product_select', 'active')
@section('container')
    <h1 class="mb10">Product</h1>
    <a href="{{ url('admin/product/manage_product') }}">
        <button type="button" class="btn btn-success">
            Add Product
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>
                                <td>{{ $list->name }}</td>
                                <td>{{ $list->slug }}</td>
                                <td>
                                    @if ($list->image != '')
                                        <img width="50px" height="30px" src="{{ asset('storage/media/' . $list->image) }}" />
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}"><button type="button"
                                        class="btn btn-outline-success btn-sm">Edit</button></a>
                                    <a href="{{ url('admin/product/delete/') }}/{{ $list->id }}"><button type="button"
                                            class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    @if ($list->status == 1)
                                        <a href="{{ url('admin/product/status/0') }}/{{ $list->id }}"><button
                                                type="button" class="btn btn-outline-primary btn-sm">Active</button></a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/product/status/1') }}/{{ $list->id }}"><button
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
