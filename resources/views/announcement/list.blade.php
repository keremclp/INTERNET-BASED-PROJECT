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
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Announment List</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Announment Title
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($announcements as $key => $announcement)
                    <tr>
                        <td>
                            #
                        </td>
                        <td>
                            {{ $announcement->title }}

                            <br/>
                            <small>
                                Created 01.01.2019
                            </small>
                        </td>
                        <td class="project-state">
                            <span class="badge badge-success">Success</span>
                        </td>
                        <td class="project-actions text-right">
                            @can('announcement:read')
                            <a class="btn btn-primary btn-sm" href="{{ route('announcement.detail',['announcement_id' =>  $announcement->announcement_id]) }}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            @endcan
                            @can('announcement:update')
                            <a class="btn btn-info btn-sm" href="{{ route('announcement.update',['announcement_id' =>  $announcement->announcement_id]) }}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            @endcan
                            @can('announcement:delete')
                            <a class="btn btn-danger btn-sm" href="#">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
@endsection
