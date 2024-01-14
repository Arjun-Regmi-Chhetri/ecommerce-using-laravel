@extends('layouts.front')

@section('title') $product->name @endsection

@section('content')

    <div class="col-12 mb-3 py-3">
        <!-- Main Content -->
        <main class="row " style="width: 95%; margin: auto;">
            <div class="col-12 bg-white py-3 my-3">
                <div class="row">

                    <!-- Product Images -->
                    <div class="col-lg-5 col-md-12 mb-3">
                        <div class="col-12 mb-3">
                            <div class="img-large border" style="background-image: url({{url("/storage/image/products/{$product->file}")}})"></div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                @foreach($product as $products)
                                    <div class="col-sm-2 col-3">

                                        <div class="img-small border"
                                             style="background-image: url({{url("/storage/image/products/{$product->file}")}})"
                                             data-src="{{url("/storage/image/products/{$product->file}")}}"></div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Product Images -->

                    <!-- Product Info -->
                    <div class="col-lg-5 col-md-9">
                        <div class="col-12 product-name large">
                            {{$product->name}}
                            <small>By <a href="{{route('front.brand.show',$product->brand->slug)}}">{{$product->brand->name}}</a></small>
                        </div>
                        <div class="col-12 px-0">
                            <hr>
                        </div>
                        <div class="col-12">
                            {!! $product->summary !!}
                        </div>
                    </div>
                    <!-- Product Info -->

                    <!-- Sidebar -->
                    <div class="col-lg-2 col-md-3 text-center">
                        <div class="col-12 border-left border-top sidebar h-100">
                            <div class="row">
                                <div class="col-12">
                                    @empty($product->discount_price)
                                        <span class="detail-price">
                                            Rs.{{number_format($product->price)}}
                                        </span>
                                    @else
                                        <span class="detail-price">
                                            Rs.{{number_format($product->discount_price)}}
                                        </span>
                                        <span class="detail-price-old">
                                           Rs. {{number_format($product->price)}}
                                        </span>
                                    @endif
                                </div>
                                <div class="col-xl-5 col-md-9 col-sm-3 col-5 mx-auto mt-3">
                                    <div class="mb-3">
                                        <label for="qty">Quantity</label>
                                        <input type="number" id="qty" min="1" value="1" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-outline-dark" type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-outline-secondary btn-sm" type="button"><i class="fas fa-heart me-2"></i>Add to wishlist</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar -->

                </div>
            </div>

            <div class="col-12 mb-3 py-3 bg-white text-justify">
                <div class="row">

                    <!-- Details -->
                    <div class="col-md-7">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 text-uppercase">
                                    <h2><u>Details</u></h2>
                                </div>
                                <div class="col-12" id="details">
                                    {!! $product->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Details -->

                    <!-- Ratings & Reviews -->
                    <div class="col-md-5">
                        <div class="col-12 px-md-4 border-top border-left sidebar h-100">

                            <!-- Rating -->
                            <div class="row">
                                <div class="col-12 mt-md-0 mt-3 text-uppercase">
                                    <h2><u>Ratings & Reviews</u></h2>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-sm-4 text-center">
                                            <div class="row">
                                                <div class="col-12 average-rating">
                                                    {{$average ?? 0}}
                                                </div>
                                                <div class="col-12">
                                                    of {{$reviews->count()}} reviews
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <ul class="rating-list mt-3">
                                                @foreach($ratings as $k => $v)
                                                    <li>
                                                        <div class="progress">
                                                            <div class="progress-bar bg-dark" role="progressbar" style="width: {{$v}}%;"
                                                                 aria-valuenow="{{$v}}" aria-valuemin="0" aria-valuemax="100">{{$v}}%</div>
                                                        </div>
                                                        <div class="rating-progress-label">
                                                            {{$k}}<i class="fas fa-star ms-1"></i>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Rating -->

                            <div class="row">
                                <div class="col-12 px-md-3 px-0">
                                    <hr>
                                </div>
                            </div>

                            <!-- Add Review -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>Add Review</h4>
                                </div>
                                <div class="col-12">
                                    @auth
                                        <form method="post" action="{{route('front.product.review',$product->slug)}}">
                                            @csrf
                                            <div class="mb-3">
                                                <textarea class="form-control" name="comment" id="comment" placeholder="Give your review"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <div class="d-flex ratings justify-content-end flex-row-reverse">
                                                    <input type="radio" value="5" name="rating" id="rating-5"><label
                                                        for="rating-5"></label>
                                                    <input type="radio" value="4" name="rating" id="rating-4"><label
                                                        for="rating-4"></label>
                                                    <input type="radio" value="3" name="rating" id="rating-3"><label
                                                        for="rating-3"></label>
                                                    <input type="radio" value="2" name="rating" id="rating-2"><label
                                                        for="rating-2"></label>
                                                    <input type="radio" value="1" name="rating" id="rating-1" checked><label
                                                        for="rating-1"></label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-outline-dark">Add Review</button>
                                            </div>
                                        </form>
                                    @else
                                        <div class="col-12 text-justify py-2 px-3 mb-3 bg-gray">
                                            Please <a href="{{route('login')}}">Login</a> to add your review.
                                        </div>
                                    @endauth
                                </div>
                            </div>
                            <!-- Add Review -->

                            <div class="row">
                                <div class="col-12 px-md-3 px-0">
                                    <hr>
                                </div>
                            </div>

                            <!-- Review -->
                            <div class="row">
                                <div class="col-12">

                                    @if($reviews->isNotEmpty())
                                        @foreach($reviews as $review)
                                            <!-- Comments -->
                                            <div class="col-12 text-justify py-2 px-3 mb-3 bg-gray">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong class="me-2">{{$review->user->full_name}}</strong>
                                                        <small>
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <i class="{{$i<=$review->rating ? 'fas' : 'far'}} fa-star"></i>
                                                            @endfor
                                                        </small>
                                                    </div>
                                                    <div class="col-12">
                                                        {{$review->comment}}
                                                    </div>
                                                    <div class="col-12">
                                                        <small>
                                                            <i class="fas fa-clock me-2"></i>{{$review->created_at->diffForHumans()}}
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Comments -->
                                        @endforeach
                                    @else
                                        No review has been added yet.
                                    @endif


                                </div>
                            </div>
                            <!-- Review -->

                        </div>
                    </div>
                    <!-- Ratings & Reviews -->

                </div>
            </div>

            <!-- Similar Product -->
            <div class="col-12">
                <div class="row">
                    <div class="col-12 py-3">
                        <div class="row">
                            <div class="col-12 text-center text-uppercase">
                                <h2>Similar Products</h2>
                            </div>
                        </div>
                        <div class="row">

                            <!-- Product -->
                            @foreach($similarProducts as $similar)
                                <div class="col-lg-3 col-sm-6 my-3">
                                    <div class="col-12 bg-white text-center h-100 product-item">
                                        <div class="row h-100">
                                            <div class="col-12 p-0 mb-3">
                                                <a href="{{route('front.product.show',$similar->slug)}}">
                                                    <div class="product-image"
                                                         style="background:url({{url("/storage/image/products/{$similar->file}")}});
                                                         background-size:80% 101% ;
                                                         background-position: center center;
                                                         background-repeat: no-repeat;">

                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <a href="{{route('front.product.show',$similar->slug)}}" class="product-name">{{$similar->name}}</a>
                                            </div>
                                            <div class="col-12 mb-3">
                                                @empty($similar->discount_price)
                                                    <span class="product-price">
                                                      Rs. {{number_format($similar->price)}}
                                                </span>
                                                @else
                                                    <span class="product-price-old">
                                                    Rs. {{number_format($similar->discount_price)}}
                                                </span>
                                                    <br>
                                                    <span class="product-price">
                                                      Rs. {{number_format($similar->price)}}
                                                </span>
                                                @endif
                                            </div>
                                            <div class="col-12 mb-3 align-self-end">
                                                <button class="btn " type="button"><i class="fas fa-cart-plus me-2"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- Product -->



                        </div>
                    </div>
                </div>
            </div>
            <!-- Similar Products -->

        </main>
        <!-- Main Content -->
    </div>

@endsection
