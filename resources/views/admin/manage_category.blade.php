@extends('admin/layout')
@section('page_title', 'My ECOM :: Manage Category')
@section('container')
    <h4 class="mb10">Manage Category</h4>

    <div class="row m-t-30">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('category.manage_category_process') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card">
                            <div class="card-header">
                                <strong>Manage</strong> Category
                                <a href="{{ url('admin/category') }}" style="float: right;">
                                    <button type="button" class="btn btn-primary btn-sm">
                                        Back
                                    </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="category_name" class="control-label mb-1">Category Name</label>
                                            <input id="category_name" value="{{ $category_name }}" name="category_name"
                                                type="text" class="form-control" aria-required="true"
                                                aria-invalid="false" required>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="category_name" class="control-label mb-1">Parent Category</label>
                                            <select id="parent_category_id" name="parent_category_id" class="form-control"
                                                required>
                                                <option value="0">Select Categories</option>
                                                @foreach ($category as $list)
                                                    @if ($parent_category_id == $list->id)
                                                        <option selected value="{{ $list->id }}">
                                                        @else
                                                        <option value="{{ $list->id }}">
                                                    @endif
                                                    {{ $list->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="category_slug" class="control-label mb-1">Category Slug</label>
                                            <input id="category_slug" value="{{ $category_slug }}" name="category_slug"
                                                type="text" class="form-control" aria-required="true"
                                                aria-invalid="false" required>
                                            @error('category_slug')
                                                <div class="alert alert-danger" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="control-label mb-1"> Image</label>
                                    <input id="category_image" name="category_image" type="file" class="form-control"
                                        aria-required="true" aria-invalid="false">
                                    @error('category_image')
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                    @if ($category_image != '')
                                        <a href="{{ asset('storage/media/category/' . $category_image) }}"
                                            target="_blank"><img width="100px"
                                                src="{{ asset('storage/media/category/' . $category_image) }}" /></a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="is_home" class="control-label mb-1"> Is in Home Page</label>
                                    <input id="is_home" name="is_home" type="checkbox" {{ $is_home_selected }}>
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
