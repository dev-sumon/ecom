@extends('admin.layout.master')
@section('title', 'Category View')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>View Category</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a class="btn btn-primary btn-sm" href="{{ route('product.category.index') }}">{{ __('Back') }}</a>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-responsive"
                                        class="table table-striped dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <tbody>
                                            <tr>
                                                <th>Name</th>
                                                <td>:</td>
                                                <td>{{$category->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Image</th>
                                                <td>:</td>
                                                <td><img src="{{ asset('storage/' . $category->image) }}"
                                                    alt="{{ __('Product Image') }}" height="40px" width="40px"></td>
                                            </tr>
                                            <tr>
                                                <th>Slug</th>
                                                <td>:</td>
                                                <td>{{$category->slug}}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    <span class="badge {{$category->status == 1 ? 'badge-success' : 'badge-warning'}}">{{$category->status == 1 ? 'Active' : 'Deactive'}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Created By</th>
                                                <td>:</td>
                                                <td>{{$category->createdBy->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated By</th>
                                                <td>:</td>
                                                {{-- <td>{{$category->updated_by ? $category->updatedBy->name : 'N/A'}}</td> --}}
                                                <td>{{ optional($category->updatedBy)->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Created At</th>
                                                <td>:</td>
                                                <td>{{date('d-M-Y', strtotime($category->created_at))}}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At</th>
                                                <td>:</td>
                                                <td>{{($category->created_at != $category->updated_at) ? (date('d-M-Y', strtotime($category->updated_at))) : "N/A" }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

