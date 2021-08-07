<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    @if(!empty($title))
                        {{ $title }}
                    @endif
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if(!empty($breadcrumb))
                        @foreach($breadcrumb as $key=> $url)
                            <li class="breadcrumb-item"><a href="{{ url($url) }}">{{ $key }}</a></li>
                        @endforeach
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
