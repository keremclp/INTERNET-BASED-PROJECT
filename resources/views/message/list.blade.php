@extends('layouts.master')
@section('title',"Message - Contact Lists")
@section('breadcrumb')
    <x-breadcrumb :name="'Home'" :array="[
            [
                'name' => 'Dashboard',
                'active' => false,
                'href' => '/'
            ],
            [
                'name' => 'Message',
                'active' => false,
                'href' => '#'
            ],
            [
                'name' => 'Contact Lists',
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
                            <h3 class="card-title">Contact Lists</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>User Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $key => $user)
                                    @if($user->user_id != auth()->user()->user_id)
                                    <tr>
                                        <td><a href="{{ route('messages.detail',['receive_id' => $user->user_id]) }}">{{ $user->firstname }} {{ $user->lastname }}</a></td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
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


