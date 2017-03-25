@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="page-header">
            <h1>
                {{ $internetCategory->name }}
                <small>Subcategories</small>
            </h1>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
                        <th>
                            Name
                        </th>
                        <th>
                            <a href="{{ route('internet-subcategories:create', ['internetCategoryId' => $internetCategory->id]) }}"
                               class="btn btn-sm btn-primary pull-right">
                                <strong><i class="glyphicon glyphicon-plus"></i> New</strong>
                            </a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($subcategories as $category)
                        <tr>
                            <td>
                                <form class="form-inline pull-left" method="POST"
                                      action="{{ route('internet-subcategories:delete', ['internetCategoryId' => $internetCategory->id, 'internetSubcategoryId' => $category->id ]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </form>
                                &nbsp;
                                {{ $category->name }}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('internet-subcategories:edit', ['internetCategoryId' => $internetCategory->id, 'internetSubcategoryId' => $category->id ]) }}"
                                   class="btn btn-sm btn-primary">
                                    <i class="glyphicon glyphicon-pencil"></i> Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2">No categories yet, you can <a href="{{ route('internet-subcategories:create', ['internetCategoryId' => $internetCategory->id]) }}">create one</a></td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection