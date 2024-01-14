@extends('layouts.back')

@section('content')
    <div class="header">
        <div class="container my-2" style="padding:0 40px 0 20px">
            <div class="row">
                <div class="col">
                    <div class="text">
                        <h3 class="fs-5">You can add Product Here!</h3>
                        <p>If you want to return to product page click cancel button</p>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="add position-relative">
                        <a href="{{route('back.product.index')}}">Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile" style="margin: 10px 20px;">
        <div class="card w-100 bg-success">
            <div class="card-header text-white">
                Create Post
            </div>
        </div>
        <div class="container-fluid">
            <form action="{{route('back.product.update',$product->slug)}}" method="POST" class="pt-3 pb-3" enctype="multipart/form-data">
                {{csrf_field()}}
                @method('PATCH')
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="title" class="form-label">Title <span class="fs-5 fw-semibold text-success">*</span></label>
                            <input type="text" class="form-control"  name="name" id="title" value="{{old('name',$product->name)}}" placeholder="Enter title"  required>
                            <span class="text-danger">@error('name') {{$message}}  @enderror</span>
                        </div>
                        <div class="col">
                            <label for="slug" class="form-label">Slug <span class="fs-5 fw-semibold text-success">*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug',$product->slug)}}">
                            <span class="text-danger">@error('slug') {{$message}}  @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="description" class="mb-3 ">Description <span class="fs-5 fw-semibold text-success">*</span></label>
                            <div class="form-floating">
                                <textarea name="description" class="form-control" placeholder="" id="description"  style="height: 100px">
                                     {{old('description',$product->description)}}
                                </textarea>
                                <span class="text-danger">@error('description') {{$message}}  @enderror</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="summary" class="mb-3">Summary <span class="fs-5 fw-semibold text-success">*</span></label>
                            <div class="form-floating">
                                <textarea name="summary" class="form-control" placeholder="" id="summary"  style="height: 100px">
                                    {{old('summary',$product->summary)}}
                                </textarea>
                                <span class="text-danger">@error('summary') {{$message}}  @enderror</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 price_product">
                    <div class="row">
                        <div class="col">
                            <label for="price" class="mb-2">Price <span class="fs-5 fw-semibold text-success">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="price" class="form-control" aria-label="Amount (to the nearest dollar)" id="price" value="{{old('price',$product->price)}}">
                                <span class="input-group-text">.00</span>

                            </div>
                            <span class="text-danger">@error('price') {{$message}}  @enderror</span>
                        </div>
                        <div class="col">
                            <label for="discount_price" class="mb-2">Discount Price <span class="fs-5 fw-semibold text-success">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="discount_price" class="form-control" aria-label="Amount (to the nearest dollar)" id="discount_price" value="{{old('discount_price',$product->discount_price)}}">
                                <span class="input-group-text">.00</span>
                            </div>
                            <span class="text-danger">@error('discount_price') {{$message}}  @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="stock_qty" class="form-label">Stock Quantity <span class="fs-5 fw-semibold text-success">*</span></label>
                            <input type="number" name="stock_qty" class="form-control" value="{{old('stock_qty',$product->stock_qty)}}" id="stock_qty" placeholder="Enter stock Qty.">
                        </div>
                        <span class="text-danger">@error('stock_qty') {{$message}}  @enderror</span>
                        <div class="col">
                            <label for="product_id" class="form-label mb-3">product Id <span class="fs-5 fw-semibold text-success">*</span></label>
                            <select class="form-select" aria-label="product_id" id="product_id" name="product_id">
                                @foreach($categories as $key => $category)
                                    <option value="{{$key}}"  {{old('category_id',$product->category_id)==$key ? 'selected': ' '}} required>{{$category}}</option>
                                @endforeach

                            </select>
                            <span class="text-danger">@error('product_id') {{$message}}  @enderror</span>
                        </div>
                        <div class="col">
                            <label for="brand_id" class="form-label mb-3">Brand Id <span class="fs-5 fw-semibold text-success">*</span></label>
                            <select class="form-select" aria-label="brand_id" id="brand_id" name="brand_id">
                                @foreach($brands as $key => $brand)
                                    <option value="{{$key}}" {{old('brand_id',$product->brand_id)==$key ?'selected': ''}} required>
                                        {{$brand}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="text-danger">@error('brand_id') {{$message}}  @enderror</span>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Product Image <span class="fs-5 fw-semibold text-success">*</span></label>
                    <input class="form-control" type="file" id="file" name="file" value="{{old('file',$product->file)}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status<span class="fs-5 fw-semibold text-success">*</span></label>
                    <select class="form-select"  name="status" id="status" aria-label="Default select example">
                        <option value="Yes" {{old('status',$product->status)=='Active'?'selected':''}}>Yes</option>
                        <option value="NO" {{old('status',$product->status)=='Inactive'?'selected':''}}>NO</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Featured<span class="fs-5 fw-semibold text-success">*</span></label>
                    <select class="form-select"  name="featured" id="featured" aria-label="Default select example">
                        <option value="Yes" {{old('featured',$product->featured)=='Yes'?'selected':''}}>Yes</option>
                        <option value="NO" {{old('featured',$product->featured)=='No'?'selected':''}}>No</option>
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
