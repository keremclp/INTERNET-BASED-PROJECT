@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb :name="'Home'" :array="[
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
    <div class="card card-solid">
        <div class="card-body">

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection
