@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{ $internetCategory->name }} {{ $internetSubcategory->name }}
                <small>Products</small>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="flash-message">
                    @foreach(['danger', 'success', 'warning', 'info'] as $msg)
                        @if(Session::has('alert-' . $msg))
                            <div class="alert alert-{{$msg}}">
                                {{ Session::get('alert-' . $msg) }}
                            </div>
                        @endif
                    @endforeach
                </div>
                <table class="table table-striped table-justified">
                    <thead>
                    <tr>
                        <th colspan="2">Shortcode</th>
                        <th colspan="2">Name</th>
                        <th>Capped</th>
                        <th>Shaped</th>
                        <th>Cap</th>
                        <th>Speed</th>
                        <th>Price</th>
                        <th>
                            <a href="{{ route('internet-products:create', ['internetCategoryId' => $internetCategory->id, 'internetSubcategoryId' => $internetSubcategory->id]) }}"
                               class="btn btn-sm btn-primary pull-right">
                                <strong><i class="glyphicon glyphicon-plus"></i> New</strong>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td colspan="2">
                                <form class="form-inline pull-left" method="POST"
                                      action="{{ route('internet-products:delete', ['internetCategoryId' => $internetCategory->id, 'internetSubcategoryId' => $internetSubcategory->id, 'productId' => $product->id ]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                                &nbsp;
                                {{ $product->shortcode }}
                            </td>
                            <td colspan="2">{{ $product->name }}</td>
                            <td>{{ $product->capped === 1 ? "Yes" : "No"}}</td>
                            <td>{{ $product->shaped === 1 ? "Yes" : "No" }}</td>
                            <td>{{ $product->cap }} GB</td>
                            <td>{{ $product->speed }} Mbps</td>
                            <td>R {{ number_format($product->price, 2, '.', ' ')  }}</td>
                            <td class="text-right">
                                <a href="{{ route('internet-products:edit', ['internetCategoryId' => $internetCategory->id, 'internetSubcategoryId' => $internetSubcategory->id, 'productId' => $product->id]) }}"
                                   class="btn btn-sm btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                No products yet, you can <a
                                        href="{{ route('internet-products:create', ['internetCategoryId' => $internetCategory->id, 'internetSubcategoryId' => $internetSubcategory->id]) }}">create
                                    one</a>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection