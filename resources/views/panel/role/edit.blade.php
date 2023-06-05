@extends('layouts.master')
@section('title','Update Role')
@section('breadcrumb')
    <x-breadcrumb :name="'Home'" :array="[
            [
                'name' => 'Dashboard',
                'active' => false,
                'href' => '/'
            ],
            [
                'name' => 'Roles',
                'active' => false,
                'href' => route('role.all')
            ],
            [
                'name' => 'Update Role',
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
                            <div class="text-right">
                                <button class="btn btn-success" onclick="$('#role-update-form').submit()">
                                    <i class="fa fa-save"></i> Save
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form id="role-update-form" method="POST" action="{{ route('role.update',['role_id' => $role->id])  }}" autocomplete="off">
                                {{ method_field('PATCH') }}
                                <div class="mb-3">
                                    <label for="name">Role Name</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ $role->name }}" placeholder="Enter the role name">
                                </div>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Permission Name</th>
                                        <th>Read</th>
                                        <th>Create</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>Announcement</td>
                                        <td><input @if(in_array('announcement:read',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="announcement:read"></td>

                                        <td><input @if(in_array('announcement:create',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="announcement:create"></td>

                                        <td><input @if(in_array('announcement:update',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="announcement:update"></td>

                                        <td><input @if(in_array('announcement:delete',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="announcement:delete"></td>
                                    </tr>
                                    <tr>
                                        <td>Message</td>
                                        <td><input @if(in_array('message:read',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="message:read"></td>

                                        <td><input @if(in_array('message:create',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="message:create"></td>

                                        <td><input @if(in_array('message:update',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="message:update"></td>

                                        <td><input @if(in_array('message:delete',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="message:delete"></td>
                                    </tr>
                                    <tr>
                                        <td>Product</td>
                                        <td><input @if(in_array('product:read',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="product:read"></td>

                                        <td><input @if(in_array('product:create',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="product:create"></td>

                                        <td><input @if(in_array('product:update',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="product:update"></td>

                                        <td><input @if(in_array('product:delete',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="product:delete"></td>
                                    </tr>
                                    <tr>
                                        <td>User</td>
                                        <td><input @if(in_array('user:read',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="user:read"></td>

                                        <td><input @if(in_array('user:create',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="user:create"></td>

                                        <td><input @if(in_array('user:update',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="user:update"></td>

                                        <td><input @if(in_array('user:delete',$permissions)) checked @endif
                                                type="checkbox" name="permissions[]" value="user:delete"></td>
                                    </tr>
                                    <tr>
                                        <td>Role</td>
                                        <td><input @if(in_array('role:read',$permissions)) checked @endif
                                            type="checkbox" name="permissions[]" value="role:read"></td>
                                        <td><input @if(in_array('role:create',$permissions)) checked @endif
                                            type="checkbox" name="permissions[]" value="role:create"></td>
                                        <td><input @if(in_array('role:update',$permissions)) checked @endif
                                            type="checkbox" name="permissions[]" value="role:update"></td>
                                        <td><input @if(in_array('role:delete',$permissions)) checked @endif
                                            type="checkbox" name="permissions[]" value="role:delete"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
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
        var form =  $('#role-update-form');
        form.on('submit',function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0])
            var setting = {
                type: this.getAttribute('method'),
                url: this.getAttribute('action'),
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(response) {
                    Swal.fire(
                        '',
                        response.message,
                        'success'
                    )
                },
            }
            $.ajax(setting)
        })
    </script>
@endsection
