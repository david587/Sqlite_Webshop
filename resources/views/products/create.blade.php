@extends("layouts.master")
@section('content')

    <h1>Create your post</h1>
    <form method="post" action="/products">
        @csrf
        <div class="form-row">-
            <label for="">title</label>
            <input type="text" name="title" required class="form-control">
        </div>
        <div class="form-row">
            <label for="">description</label>
            <input type="text" name="description" required class="form-control">
        </div>
        <div class="form-row">
            <label for="">Price</label>
            <input type="text" name="price" required class="form-control" min="1.00" step="0.01">
        </div>
        <div class="form-row">
            <label for="">Stock</label>
            <input type="text" name="stock" required class="form-control" min="0">
        </div>
        <div class="form-row">
            <label for="">Status</label>
           <select name="status" class="custom-select">
            <option value="available" selected>available</option>
            <option value="unavailable" selected>unavailable</option>
           </select>
        </div>
        <div class="form-row">
          <button class="btn btn-primary btn-lg" type="submit">submit</button>
        </div>
    </form>
@endsection