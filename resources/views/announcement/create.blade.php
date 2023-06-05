@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb :name="'Add Product'" :array="[
            [
                'name' => 'Dashboard',
                'active' => false,
                'href' => '#'
            ],
            [
                'name' => 'Home',
                'active' => true,
                'href' => '#'
            ]
        ]"></x-breadcrumb>
@endsection
@section('content')
    <!-- Default box -->
    <section class="content">
        <form id="announcement-create-form" method="post" action="{{ route('announcement.create.post')  }}" autocomplete="off">
        <div class="row">
            <div class="col">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputName">Title</label>
                            <input type="text" id="inputName" class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Text</label>
                            <textarea id="text" class="form-control" name="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select" name="status">
                                <option selected disabled>Select one</option>
                                <option value="1">Active</option>
                                <option value="0">Not Active</option>
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <button type="submit" class="btn btn-success float-right">Create new Announcement</button>
            </div>
        </div>
        </form>
    </section>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
@section('js')
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript">
        $('#announcement-create-form').on('submit',function (e){
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
                    let href = response.href
                    delete response.href
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
