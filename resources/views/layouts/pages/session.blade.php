<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 sm-p-t-15">
        @if (session()->has('delete'))
        <div class="alert alert-danger" role="alert">
            <button aria-label="" class="close" data-dismiss="alert"></button>
            {{ session()->get('delete') }}
        </div>
        @elseif (session()->has('warning'))
        <div class="alert alert-warning" role="alert">
            <button aria-label="" class="close" data-dismiss="alert"></button>
            {{ session()->get('warning') }}
        </div>
        @elseif (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <button aria-label="" class="close" data-dismiss="alert"></button>
            {{ session()->get('success') }}
        </div>
        @elseif (session()->has('update'))
        <div class="alert alert-info" role="alert">
            <button aria-label="" class="close" data-dismiss="alert"></button>
            {{ session()->get('update') }}
        </div>
        @endif
    </div>
    <div class="col-lg-3"></div>
</div>
