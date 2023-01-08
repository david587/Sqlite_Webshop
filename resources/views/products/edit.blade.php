@extends("layouts.master")
@section('content')

    <h1>Edit a product</h1>
    <form method="post" action="{{ route("products.update", ["product"=> $product->id]) }}">
        @csrf
        @method("PUT")
        <div class="form-row">-
            <label for="">title</label>
            {{-- set the editable value --}}
            <input type="text" name="title" value="{{ $product->title }}" required class="form-control">
        </div>
        <div class="form-row">
            <label for="">description</label>
            <input type="text" name="description" value="{{ $product->description }}" required class="form-control">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input type="text" name="price" value="{{ $product->price }}" required class="form-control" min="1.00" step="0.01">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input type="text" name="stock" value="{{ $product->stock }}" required class="form-control" min="0">
        </div>
        <div class="form-row">
            <label for="">Status</label>
           <select name="status" class="custom-select">
            <option value="available" selected {{ $product->status == "available" ? "selected" : "" }}> 
            available</option>
            <option value="unavailable" selected {{ $product->status == "unavailable" ? "selected" : "" }}>
            unavailable</option>
           </select>
        </div>
        <div class="form-row">
          <button class="btn btn-primary btn-lg" type="submit">Update</button>
        </div>
    </form>
@endsection