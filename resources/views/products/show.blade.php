{{-- master blade-be emelje be a yield mezőhöz --}}
@extends("layouts.app")
{{-- yield neve --}}
@section('content')
    <h1>{{ $product->title }} ({{ $product->id }})</h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>
    <p>{{ $product->stock }}</p>
    <p>{{ $product->status }}</p>
@endsection
