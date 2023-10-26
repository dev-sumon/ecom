@extends('admin.layout.master')
@section('title', 'Category Create')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Create Category</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a class="btn btn-primary btn-sm" href="{{ route('product.category.index') }}">{{ __('Back') }}</a>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="{{ route('product.category.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span
                                        class="required text-danger">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" data-validate-length-range="6" data-validate-words="2" value="{{old('name')}}"
                                        name="name" required="required" />
                                </div>
                                @include('message.error',['field'=>'name'])
                            </div>
                            <div class="field item form-group">
                                <label class="col-form-label col-md-3 col-sm-3  label-align">Image<span
                                    class="required text-danger">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input class="form-control" accept="image/*" class="image" required="required" name="image" type="file" />
                                </div>
                                @include('message.error',['field'=>'image'])
                            </div>
                            <div class="ln_solid">
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <button type='submit' class="btn btn-primary">Submit</button>
                                        <button type='reset' class="btn btn-success">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
