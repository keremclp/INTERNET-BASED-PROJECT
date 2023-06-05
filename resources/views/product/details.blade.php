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
    <div class="d-flex flex-column col-12 col-sm-6">
        <div class="col-12">
            <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image">
        </div>
        <div class="flex-column">
            <h3>
                DEscription
            </h3>
            <p>
                Lorem ipsum represents a long-held tradition for designers,
                typographers and the like. Some people hate it and argue for
                its demise, but others ignore.
            </p>
            </p>
        </div>
    </div>
@endsection
