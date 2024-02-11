@extends('admin/layout')
@section('page_title','My ECOM :: Manage Coupons')
@section('container')
    <h1 class="mb10">Manage Coupons</h1>
    <a href="{{ url('admin/coupon') }}">
        <button type="button" class="btn btn-success">
            Back
        </button>
    </a>
    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('coupon.manage_coupon_process') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="title" class="control-label mb-1">Coupon Name</label>
                                    <input id="title" name="title" type="text" class="form-control"
                                        placeholder="Enter Coupon Name" value="{{$title}}">
                                </div>
                                @error('title')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="code" class="control-label mb-1">Coupon Code</label>
                                    <input id="code" name="code" type="text" class="form-control"
                                        placeholder="Enter Coupon Code" value="{{$code}}">
                                </div>
                                @error('code')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <label for="value" class="control-label mb-1">Coupon Value</label>
                                    <input id="value" name="value" type="text" class="form-control"
                                        placeholder="Enter Coupon Value" value="{{$value}}">
                                </div>
                                @error('value')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="hidden" name="id" value="{{$id}}" />
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
