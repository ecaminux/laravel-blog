@extends('layouts.mylayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('menu')
<div class="list-group">
    
    <button type="button" class="list-group-item list-group-item-action">
        Usuarios
    </button>
    <button type="button" class="list-group-item list-group-item-action">
        Posts
    </button>
    <button type="button" class="list-group-item list-group-item-action">
        Comentarios
    </button>
    
</div>
@endsection

@section('footer')

<ul class="list-group list-group-numbered">
    <li class="list-group-item active">Active item</li>
    <li class="list-group-item">Item</li>
    <li class="list-group-item disabled">Disabled item</li>
</ul>
@endsection
