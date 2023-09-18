@extends('layouts.app')

@section('content')
    <section>
        <div class="container my-5">
            <header class="mb-4">
                <h3>Produkty {{ count($products) }}</h3>
            </header>

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                        <div class="card w-100 my-2 shadow-2-strong">
                            @if (!is_null($product->image_path))
                                <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img-top"
                                    style="aspect-ratio: 1 / 1" alt="Zdjecie produktu" />
                            @else
                                <img src="https://bootstrap-ecommerce.com/bootstrap5-ecommerce/images/items/1.webp"
                                    class="card-img-top" style="aspect-ratio: 1 / 1" alt="Zdjecie produktu" />
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->price }}</p>
                                <div
                                    class="card-footer d-flex align-items-center pt-3 px-0 pb-0 mt-auto justify-content-center">
                                    <a href="#!" class="btn btn-primary shadow-0 mb-2">Add to cart</a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Products -->
@endsection
