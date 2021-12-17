@if(count($errors) > 0)
    <div class="alert alert-dismissible alert-danger" role="alert">
        <div class="alert-body">
            <strong>Informasi</strong>
            <ul class="list-unstyled">
                @foreach($errors->all() as $error)
                    <li class="">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('flash.message'))
    <div class="alert alert-dismissible alert-{{ session()->get('flash.type') }}" role="alert">
        <div class="alert-body">
            {!! session()->get('flash.message') !!}
        </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif