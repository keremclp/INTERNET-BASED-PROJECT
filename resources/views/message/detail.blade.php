@extends('layouts.master')
@section('title',"Message - Messages")
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
                'name' => 'Message',
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
                            <h3 class="card-title">Messages</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-body">

                                <div class="direct-chat-messages">

                                    @foreach($messages as $key => $message)
                                    <div class="direct-chat-msg @if($message->sender_id != auth()->user()->user_id) right @endif">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">{{ $message->sender->firstname }} {{ $message->sender->lastname }}</span>
                                            <span class="direct-chat-timestamp float-right">
                                                {{ $message->created_at }}
                                            </span>
                                        </div>
                                        <img class="direct-chat-img" src="/dist/img/user1-128x128.jpg" alt="">
                                        <div class="direct-chat-text">
                                            {{ $message->message }}
                                            @switch($message->status)
                                                @case(0):
                                                <i class="fa fa-check"></i>
                                                @break
                                                @case(1):
                                                <i class="fa fa-regular fa-check-double"></i>
                                                @break
                                                @case(2)
                                                <i class="fa fa-regular fa-check-double" style="color:green;"></i>
                                                @break
                                            @endswitch
                                        </div>
                                    </div>
                                    @endforeach




                                </div>



                            </div>
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
