@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                Update
                <small> Internet Product</small>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST">
                    {{ method_field('PUT') }}
                    @include('internet-products._form')
                </form>
            </div>
        </div>
    </div>
@endsection