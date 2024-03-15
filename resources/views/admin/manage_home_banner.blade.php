@extends('admin/layout')
@section('page_title', 'My ECOM :: Manage Home Banner')
@section('container')
    <h4 class="mb10">Manage Home Banner</h4>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{route('home_banner.manage_home_banner_process')}}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <strong>Manage</strong> Home Banner
                                <a href="{{url('admin/home_banner')}}" style="float: right;">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Back
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="category_name" class="control-label mb-1">Btn Text</label>
                                            <input id="btn_txt" value="{{$btn_txt}}" name="btn_txt" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        </div>

                                       
                                        <div class="col-md-6">
                                            <label for="category_slug" class="control-label mb-1">Btn Link</label>
                                            <input id="btn_link" value="{{$btn_link}}" name="btn_link" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="image" class="control-label mb-1"> Image</label>
                                            <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false">
                                            @error('image')
                                            <div class="alert alert-danger" role="alert">
                                            {{$message}}		
                                            </div>
                                            @enderror
        
                                            @if($image!='')
                                                    <a href="{{asset('storage/media/banner/'.$image)}}" target="_blank"><img width="100px" src="{{asset('storage/media/banner/'.$image)}}"/></a>
                                                @endif
                                        </div>

                                    </div>

                                </div>
                                
                                
                                {{-- <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                        Submit
                                    </button>
                                </div> --}}
                                <input type="hidden" name="id" value="{{ $id }}" />

                            </div>
                            <div class="card-footer">
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
