@extends('admin/layout')
@section('page_title','My ECOM :: Home Banner')
@section('home_banner_select','active')
@section('container')
    <h1 class="mb10">Home Banner</h1>
    <a href="{{url('admin/home_banner/manage_home_banner')}}">
        <button type="button" class="btn btn-success">
            Add Home Banner
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
                            <th>Btn Text</th>
                            <th>Btn Link</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($data as $list)
                        <tr>
                            <td>{{$list->id}}</td>
                            <td>{{$list->btn_txt}}</td>
                            <td>{{$list->btn_link}}</td>
                            <td>
                            <img width="100px" src="{{asset('storage/media/banner/'.$list->image)}}"/>
                            </td>
                            <td>
                                <a href="{{url('admin/home_banner/manage_home_banner/')}}/{{$list->id}}"><button type="button" class="btn btn-outline-success btn-sm">Edit</button></a>

                                @if($list->status==1)
                                    <a href="{{url('admin/home_banner/status/0')}}/{{$list->id}}"><button type="button" class="btn btn-outline-secondary btn-sm">Active</button></a>
                                 @elseif($list->status==0)
                                    <a href="{{url('admin/home_banner/status/1')}}/{{$list->id}}"><button type="button" class="btn btn-outline-secondary btn-sm">Deactive</button></a>
                                @endif

                                <a href="{{url('admin/home_banner/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-outline-danger btn-sm">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
