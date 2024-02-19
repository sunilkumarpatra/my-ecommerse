@extends('admin/layout')
@section('page_title','My ECOM :: Brand')
@section('brand_select','active')
@section('container')
    <h1 class="mb10">Brand</h1>
    <a href="brand/manage_brand">
        <button type="button" class="btn btn-success">
            Add Brand
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
                            <th>Brand Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $slNo = 1; @endphp
                        @foreach ($data as $list)
                            <tr>
                                <td>{{ $slNo++ }}</td>
                                <td>{{ $list->name }}</td>
                                <td>
                                    @if($list->image!='')
                                        <img width="50px" height="30px" src="{{asset('storage/media/brand/'.$list->image)}}"/>
                                    @endif
                                    </td>
                                <td>
                                    <a href="{{url('admin/brand/manage_brand/')}}/{{$list->id}}"><button type="button" class="btn btn-outline-success btn-sm">Edit</button></a>
                                    <a href="{{url('admin/brand/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
                                    @if ($list->status == 1)
                                    <a href="{{ url('admin/brand/status/0') }}/{{ $list->id }}">
                                        <button type="button" class="btn btn-outline-primary btn-sm">
                                            Active
                                        </button>
                                    </a>
                                    @elseif($list->status == 0)
                                        <a href="{{ url('admin/brand/status/1') }}/{{ $list->id }}">
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
