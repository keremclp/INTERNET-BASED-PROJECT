@extends('layouts.master')
@section('breadcrumb')
    <x-breadcrumb :name="$announcement->title" :array="[
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
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $announcement->title }}</h3>
            </div>
            <div class="card-body">
                {{ $announcement->text }}
            </div>
        </div>
    </section>
@endsection
