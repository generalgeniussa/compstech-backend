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
    <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}"/>
</div>
<div class="form-group">
    <label>Shortcode</label>
    <input type="text" class="form-control" name="shortcode" value="{{ old('shortcode', $product->shortcode) }}"/>
</div>
<div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control" name="description" value="{{ old('description', $product->description) }}"/>
</div>
<div class="form-group">
    <label>
        <input type="checkbox" class="" name="capped" value="1" @if(old('capped', $product->capped) === 1) checked @endif/>
        Capped
    </label>
</div>
<div class="form-group">
    <label>Cap (GB)</label>
    <input type="text" class="form-control" name="cap" value="{{ old('cap', $product->cap) }}"/>
</div>
<div class="form-group">
    <label>
        <input type="checkbox" class="" name="shaped" value="1" @if(old('shaped', $product->shaped) === 1) checked @endif />
        Shaped
    </label>
</div>
<div class="form-group">
    <label>Speed (Mbps)</label>
    <input type="text" class="form-control" name="speed" value="{{ old('speed', $product->speed) }}"/>
</div>
<div class="form-group">
    <label>Price (ZAR)</label>
    <input type="text" class="form-control" name="price" value="{{ old('price', $product->price) }}"/>
</div>
<div class="form-group">
    <input type="submit" class="btn btn-primary" value="Save" />
</div>
