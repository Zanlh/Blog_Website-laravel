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
                        <a href="{{route('admin.category.create')}}" class="btn btn-theme"> <i class="fas fa-plus"></i> Add Category</a>
                    </div>
                    <table class="table-responsive table  table-bordered display Datatable" style="width:100%">
                        <thead>
                            <tr class="bg-light">
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Action</th>
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
                ajax: "/admin/category/datatable/ssd",
                columns: [{
                        data: "category_name",
                        name: "category_name",
                    },
                    {
                        data: "category_desc",
                        name: "category_desc",
                    },  
                    {
                        data: "action",
                        name: "action",
                    },
                    // {
                    //     data: "created_at",
                    //     name: "created_at",
                    // },
                    // {
                    //     data: "updated_at",
                    //     name: "updated_at",
                    // },
                ],

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
                           url : '/admin/category/' + id,
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