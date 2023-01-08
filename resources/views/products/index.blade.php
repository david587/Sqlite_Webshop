@extends("layouts.master")
@section("content")
<h1>List of Products</h1>
{{-- ha ures a véltozo jelezze ezt --}}
@empty($products)
    <div class="alert alert-warning">
        the list of products is empty
    </div>
@else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <th>Id</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endempty
@endsection
    