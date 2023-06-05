@extends('layouts.master')
@section('title',"Roles")
@section('breadcrumb')
    <x-breadcrumb :name="'Home'" :array="[
            [
                'name' => 'Dashboard',
                'active' => false,
                'href' => '/'
            ],
            [
                'name' => 'Panel',
                'active' => false,
                'href' => '#'
            ],
            [
                'name' => 'Roles',
                'active' => true,
                'href' => '#'
            ]
        ]"></x-breadcrumb>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Panel roles for users</h3>

                            @can('role:create')
                            <div class="text-right">
                                <a href="{{ route('role.create.page') }}" class="btn btn-info">
                                    <i class="fa fa-plus"></i> New Role
                                </a>
                            </div>
                            @endcan
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $role)
                                <tr id="role-row-{{$role->id}}">
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @can('role:update')
                                        <a class="btn btn-info" href="{{ route('role.update.page',['role_id' => $role->id]) }}">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        @endcan
                                        @can('role:delete')
                                        <button class="btn btn-danger delete-role" role-id="{{$role->id}}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        @endcan

                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        $('.delete-role').on('click',function(){
            var role_id = $(this).attr('role-id')

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:'{{ route('role.delete') }}',
                        type:"DELETE",
                        data:{role_id:role_id},
                        success: function (res){
                            Swal.fire(
                                res.title,
                                res.text,
                                'success'
                            )
                            $('#role-row-'+role_id).remove()
                        },
                        error: function(res){
                            Swal.fire(
                                'Error!',
                                JSON.parse(res.responseText).message,
                                'error'
                            )
                        }
                    })

                }
            })

        })
    </script>
@endsection

