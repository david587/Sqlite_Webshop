@extends("layouts.app")
@section("content")
    @empty($products)
        <div class="alert alert-warning">
            the list of products is empty
        </div>
    @else
    <div class="row">
        @foreach($products as $product)
        <div class="col-3">
            {{-- component in blade --}}
            @include('components.product-card')
        </div>
        @endforeach
    </div>
   
   
    @endif
@endsection