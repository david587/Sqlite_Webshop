@extends("layouts.app")
@section('content')

    <h1>Create your post</h1>
    <form method="post" action="/products">
        @csrf
        <div class="form-row">-
            <label for="">title</label>
            <input type="text" name="title"  class="form-control" required value="{{ old("title") }}">
        </div>
        <div class="form-row">
            <label for="">description</label>
            <input type="text" name="description"  class="form-co requiredntrol" required value="{{ old("description") }}">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input type="text" name="price"  class="form-control"  value="{{ old("price") }}" min="1.00" step="0.01">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input type="text" name="stock"  class="form-control" required value="{{ old("stock") }}" min="0">
        </div>
        <div class="form-row">
            <label for="">Status</label>
           <select name="status" class="custom-select">
            <option value="" selected>Select...</option>
            <option value="available"
            {{ old("status") == "available" ? "selected" : "" }}>
            available
        </option>

            <option value="unavailable" 
            {{ old("status") == "unavailable" ? "selected" : "" }}>
            unavailable
        </option>

           </select>
        </div>
        <div class="form-row">
          <button class="btn btn-primary btn-lg" type="submit">submit</button>
        </div>
    </form>
@endsection