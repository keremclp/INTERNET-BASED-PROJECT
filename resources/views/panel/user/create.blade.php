@extends('layouts.master')
@section('breadcrumb')
<x-breadcrumb :name="'Create User'" :array="[
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
                        <label for="inputName">First Name</label>
                        <input type="text" id="inputName" class="form-control" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Lastname</label>
                        <textarea id="inputDescription" class="form-control" rows="4" name="lastname"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputClientCompany">Email</label>
                        <input type="number" id="inputClientCompany" class="form-control" name="email">
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">Phone</label>
                        <input type="number" id="inputProjectLeader" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">User name</label>
                        <input type="number" id="inputProjectLeader" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label for="inputProjectLeader">PAssword</label>
                        <input type="number" id="inputProjectLeader" class="form-control" name="password">
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
