<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">{{ $name }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach($array as $key => $value)
                    <li class="breadcrumb-item  @if($value['active']) active @endif ">
                        @if($value['active'])
                            {{ $value['name'] }}
                        @else
                            <a href="{{ $value['href'] }}">
                                {{ $value['name'] }}
                            </a>
                        @endif
                    </li>
                    @endforeach
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
