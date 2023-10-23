@extends('admin.layout.master')
@section('title', 'View')
@section('content')
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>View User</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a class="btn btn-primary btn-sm" href="{{ route('user.index') }}">{{ __('Back') }}</a>
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
                                                <td>{{$user->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Cover Image</th>
                                                <td>:</td>
                                                <td><img src="{{ asset('storage/' . $user->cover_image) }}"
                                                    alt="{{ __('Cover Photo') }}" height="40px" width="40px"></td>
                                            </tr>
                                            <tr>
                                                <th>Image</th>
                                                <td>:</td>
                                                <td><img src="{{ asset('storage/' . $user->image) }}"
                                                    alt="{{ __('Cover Photo') }}" height="40px" width="40px"></td>
                                            </tr>
                                            <tr>
                                                <th>Role</th>
                                                <td>:</td>
                                                <td>{{$user->role}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>:</td>
                                                <td>{{$user->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    <span class="badge {{$user->status == 1 ? 'badge-success' : 'badge-warning'}}">{{$user->status == 1 ? 'Active' : 'Deactive'}}</span>
                                                </td>
                                            </tr>
                                            @if(is_array(json_decode($user->billing_address,true)))
                                                @foreach (json_decode($user->billing_address) as $key=>$address)
                                                    <tr>
                                                        <th>Billing Address-{{$key}}</th>
                                                        <td>:</td>
                                                        <td>{{$address->billing}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th>Billing Address</th>
                                                    <td>:</td>
                                                    <td>NULL</td>
                                                </tr>
                                            @endif

                                            @if(is_array(json_decode($user->shipping_address,true)))
                                                @foreach (json_decode($user->shipping_address) as $key=>$address)
                                                    <tr>
                                                        <th>Shipping Address-{{$key}}</th>
                                                        <td>:</td>
                                                        <td>{{$address->shipping}}</td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th>Shipping Address</th>
                                                    <td>:</td>
                                                    <td>NULL</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Created At</th>
                                                <td>:</td>
                                                <td>{{date('d-M-Y', strtotime($user->created_at))}}</td>
                                            </tr>
                                            <tr>
                                                <th>Updated At</th>
                                                <td>:</td>
                                                <td>{{($user->created_at != $user->updated_at) ? (date('d-M-Y', strtotime($user->updated_at))) : "N/A" }}</td>
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

