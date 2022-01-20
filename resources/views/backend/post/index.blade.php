@extends('backend.layouts.app')
@section('post-active', 'active')
@section('title', 'Post')
@section('header-name', 'Post')
@section('content')
    <div class="container">
        <div class="main-content">
            <div class="card">
                <div class="card-body">
                    <table class="table-responsive table  table-bordered display Datatable" style="width:100%">
                        <thead>
                            <tr class="bg-light">
                                <th>Title</th>
                                <th>Contnet</th>
                                <th>Author</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Updated</th>
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
        $(document).ready(function() {
            var table = $('.Datatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: "/admin/post/datatable/ssd",
                columns: [{
                        name: 'title',
                        data: 'title',
                    },
                    {
                        name: 'content',
                        data: 'content',
                    }, 
                    {
                        name: 'by',
                        data: 'by',
                    },
                    {
                        name: 'category',
                        data: 'category',
                    },
                    {
                        data: "created_at",
                        name: "created_at",
                    },
                    {
                        data: "updated_at",
                        name: "updated_at",
                    },
                ],

            });
        })
    </script>

@endsection
