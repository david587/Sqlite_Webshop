@extends("layouts.master")
@section('content')

    <h1>Edit a product</h1>
    <form method="post" action="{{ route("products.update", ["product"=> $product->id]) }}">
        @csrf
        @method("PUT")
        <div class="form-row">-
            <label for="">title</label>
            {{-- set the editable value --}}
            <input required type="text" name="title" value="{{ old("title") ??
            $product->title }}"  class="form-control">
        </div>
        <div class="form-row">
            <label for="">description</label>
            <input required type="text" name="description" value="{{ old("description") ??
            $product->description }}"  class="form-control">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input required type="text" name="price" value="{{ old("price") ??
            $product->price }}"  class="form-control" min="1.00" step="0.01">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input required type="text" name="stock" value="{{ old("stock") ??
            $product->stock }}"  class="form-control" min="0">
        </div>
        <div class="form-row">
            <label for="">Status</label>
           <select name="status" class="custom-select">
            <option value="available"  {{ old("status")== "available" ? "selected" : ($product->status == "available" ? "selected" : "" )}}> 
            available</option>
            <option value="unavailable"  {{ old("status")=="unavailable" ? "selected" : ($product->status == "unavailable" ? "selected" : "")}}>
            unavailable</option>
           </select>
        </div>
        <div class="form-row">
          <button class="btn btn-primary btn-lg" type="submit">Update</button>
        </div>
    </form>
@endsection