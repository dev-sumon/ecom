@extends('admin.layout.master')
@section('title', 'Sub Category List')
@push('css_link')
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->
    <link href="{{ asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 ">

            <div class="x_panel">
                <div class="x_title">
                    <h2>Sub Category List</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <a class="btn btn-primary btn-sm" href="{{ route('product.sub_category.create') }}">{{ __('Create Sub Category') }}</a>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="row">
                        <div class="col-sm-12">
                            @include('message.feedback')
                            <div class="card-box table-responsive">

                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Status</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sub_categories as $sub_category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $sub_category->name }}</td>
                                                <td>{{ $sub_category->category->name }}</td>
                                                <td>
                                                    <a href="{{ route('product.sub_category.status', $sub_category->id) }}"
                                                        class="btn btn-sm {{ $sub_category->status == 1 ? 'btn-danger' : 'btn-success' }}">
                                                        {{ $sub_category->status == 1 ? 'Deactive' : 'Active' }}
                                                    </a>
                                                </td>
                                                <td>{{$sub_category->createdBy->name}}</td>
                                                <td>{{date('d-m-y', strtotime($sub_category->created_at))}}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-outline-primary btn-sm btn_view"  data-id="{{$sub_category->id}}">View</a>
                                                        <a href="{{ route('product.sub_category.edit', $sub_category->id) }}"
                                                            class="btn btn-outline-info btn-sm">Edit</a>
                                                        <a href="{{ route('product.sub_category.delete', $sub_category->id) }}" onclick="alert('Are you sure?')"
                                                            class="btn btn-outline-danger btn-sm">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  
  {{-- View Modal  --}}
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">View Sub Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js_link')
    <!-- Datatables -->
    <script src="{{ asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endpush
@push('js')
<script>
    $(document).ready(function() {
        $('.btn_view').on('click', function() {
            var id = $(this).data('id');
            var url = "{{route('product.sub_category.view',['sub_cat_id'])}}"
            let _url = url.replace('sub_cat_id', id);
            $.ajax({
                url: _url,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    var status = ((data.sub_category.status == 1) ? "Active" : "Deactive");
                    var statusClass = ((data.sub_category.status == 1) ? "badge-success" : "badge-warning");
                    var updated_by = (data.sub_category.updated_by ? data.sub_category.updated_by.name : "N/A");
                    var view_data = `
                                    <table class="table">
                                        <tr>
                                            <th>Name</th>
                                            <td>:</td>
                                            <td>${data.sub_category.name}</td>
                                        </tr>
                                        <tr>
                                            <th>Category</th>
                                            <td>:</td>
                                            <td>${data.sub_category.category.name}</td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>:</td>
                                            <td><span class="badge ${statusClass}">${status}</span></td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>:</td>
                                            <td>${data.sub_category.created_by.name}</td>
                                        </tr>
                                        <tr>
                                            <th>Updated By</th>
                                            <td>:</td>
                                            <td>${updated_by}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>:</td>
                                            <td>${data.sub_category.created_at}</td>
                                        </tr>
                                        <tr>
                                            <th>Created By</th>
                                            <td>:</td>
                                            <td>${data.sub_category.updated_at}</td>
                                        </tr>
                                    </table>
                                    `;
                    $('.modal-body').html(view_data);
                    $('.modal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching member data:', error);
                }
            });
        });
    });
</script>
@endpush
