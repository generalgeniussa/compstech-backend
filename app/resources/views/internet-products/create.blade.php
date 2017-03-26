@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{ $internetCategory->name }} {{ $internetSubcategory->name }}
                <small>New Product</small>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form method="POST">
                    @include('internet-products._form')
                </form>
            </div>
        </div>
    </div>
@endsection