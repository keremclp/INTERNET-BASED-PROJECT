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
                            <label for="photoInput">Select a photo:</label>
                            <input type="file" class="form-control-file" id="photoInput">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Project Name</label>
                            <input type="text" id="inputName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Project Description</label>
                            <textarea id="inputDescription" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Status</label>
                            <select id="inputStatus" class="form-control custom-select">
                                <option selected disabled>Select one</option>
                                <option>Active</option>
                                <option>Not Active</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputClientCompany">Price</label>
                            <input type="number" id="inputClientCompany" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputProjectLeader">Quantity</label>
                            <input type="number" id="inputProjectLeader" class="form-control">
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
                <input type="submit" value="Create new Product" class="btn btn-success float-right">
            </div>
        </div>
    </section>
@endsection
