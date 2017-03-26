{{ csrf_field() }}
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}"/>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Save" />
</div>
