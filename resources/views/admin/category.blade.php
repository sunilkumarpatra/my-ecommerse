@extends('admin/layout')
@section('page_title','My ECOM :: Category')
@section('category_select','active')
@section('container')
    <h1 class="mb10">Category</h1>
    <a href="category/manage_category">
        <button type="button" class="btn btn-success">
            Add Category
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
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slNo = 1; @endphp
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $slNo++ }}</td>
                                <td>{{ $list->category_name }}</td>
                                <td>{{ $list->category_slug }}</td>
                                <td>
                                    <a href="{{url('admin/category/manage_category/')}}/{{$list->id}}"><button type="button" class="btn btn-outline-success btn-sm">Edit</button></a>
                                    <a href="{{url('admin/category/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    @if ($list->status == 1)
                                    <a href="{{ url('admin/category/status/0') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                            Active
                                        </button>
                                    </a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/category/status/1') }}/{{ $list->id }}">
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
        </div>
    </div>
@endsection
