@extends('layouts.front')
@section('title') $category->name @endsection

@section('content')
    <div class="col-12">
        <!-- Main Content -->
        <main class="row " style="width: 95%; margin: auto;">

            <!-- category Products -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>{{$category->name}}</h2>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Product -->
                            @foreach($products as $product)
                                <div class="col-xl-2 col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a href="{{route('front.product.show',$product->slug)}}">
                                                    <div class="product-image"
                                                         style="background:url({{url("/storage/image/products/{$product->file}")}});
                                                         background-size:80% 101% ;
                                                         background-position: center center;
                                                         background-repeat: no-repeat;
                                                         height: 190px;">

                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="{{route('front.product.show',$product->slug)}}" class="product-name">{{$product->name}}</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                @empty($product->discount_price)
                                                    <span class="product-price">
                                                      Rs. {{number_format($product->price)}}
                                                     </span>
                                                @else
                                                    <span class="product-price-old">
                                                    Rs. {{number_format($product->price)}}
                                                </span>
                                                    <br>
                                                    <span class="product-price">
                                                      Rs. {{number_format($product->discount_price)}}
                                                     </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- category Products -->

            <div class="col-12">
                <nav aria-label="Page navigation example">
                    {{$products->links()}}
                </nav>
            </div>

        </main>
        <!-- Main Content -->
    </div>
@endsection
