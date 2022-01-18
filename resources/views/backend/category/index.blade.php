@extends('backend.layouts.app')
@section('category-active', 'active')
@section('title', 'Category')
@section('header-name', 'Category')
@section('content')
    <div class="container">
        <div class="main-content">
            <div class="card">
                <div class="card-body">
                    <div class="pt-3 mb-2">
                        <a href="{{route('admin.user.create')}}" class="btn btn-theme"> <i class="fas fa-user"></i> Create User</a>
                    </div>
                    <table class="table-responsive table  table-bordered display Datatable" style="width:100%">
                        <thead>
                            <tr class="bg-light">
                                <th>Name</th>
                                <th>Email</th>
                                <th>IP</th>
                                <th class="no-sort">User Agent</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th class="no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            var table = $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "/admin/user/datatable/ssd",
                columns: [{
                        data: "name",
                        name: "name",
                    },
                    {
                        data: "email",
                        name: "email",
                    },  
                    {
                        data: "ip",
                        name: "ip"
                    },
                    {
                        data: "user_agent",
                        name: "user_agent",
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                    },
                    {
                        data: "updated_at",
                        name: "updated_at",
                    },
                    {
                        data: "action",
                        name: "action",
                    },
                ],
                order: [[ 5, "desc" ]],
                columnDefs: [{
                    targets: 'no-sort',
                    sortable: false
                }]

            });
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure, you want to delete?',
                    showCancelButton: true,
                    confirmButtonText: 'confirm', 
                }).then((result) => {
                    if (result.isConfirmed) {
                       $.ajax({
                           url : '/admin/user/' + id,
                           type : 'DELETE', 
                           success: function() {
                               table.ajax.reload();
                           }
                       });
                    }
                })
            });
        })
    </script>

@endsection