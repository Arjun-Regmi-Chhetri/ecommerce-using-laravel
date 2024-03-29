@extends('layouts.back')

@section('title')
  Product
@endsection

@section('content')
    <div class="header">
        <div class="container my-2" style="padding:0 40px 0 20px">
            <div class="row">
                <div class="col">
                    <div class="text">
                        <h3 class="fs-5">Welcome to, Product Page !</h3>
                        <p class="textP">You have 5 Product</p>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="add position-relative">
                        <a href="{{route('back.product.create')}}">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="container-fluid products">
       <table class="table profile shadow-lg" style="margin: 10px 0px; border-radius: 0px">
           <thead>
           <tr>
               <th>Id</th>
               <th>Slug</th>
               <th>Price</th>
               <th>Stock Qty</th>
               <th>Category</th>
               <th>Brand</th>
               <th>Thumbnail</th>
               <th>Status</th>
               <th>Created At</th>
               <th>Actions</th>
           </tr>
           </thead>
           <tbody>
           @foreach($products as $product)
           <tr>
               <th scope="row">1</th>
               <td>{{$product->slug}}</td>
               <td><span>$. </span>{{$product->price}}</td>
               <td>{{$product->stock_qty}}</td>
               <td>{{$product->category_id}}</td>
               <td>{{$product->brand_id}}</td>
               <td>
                   <img src="/storage/image/products/{{$product->file}}" alt=""  width="40px" height="30px" class="rounded img">
               </td>
               <td>
                   <span class=" badge rounded-pill bg-{{$product->status=='Active' ? 'success':'danger'}}">
                            {{$product->status}}
                       </span>

               </td>
               <td>{{$product->updated_at}}</td>
               <td>
                   <form action="{{route('back.product.destroy',$product)}}" method="post">
                       @method('DELETE')
                       {{csrf_field()}}
                       <a href="{{route('back.product.edit', $product)}}" class="text-success"> <i class="bi bi-pencil-square"></i> </a>
                       <button type="submit" class="text-danger border-0 bg-transparent"><i class="bi bi-trash3"></i></button>
                   </form>
               </td>
           </tr>
           @endforeach
           </tbody>
       </table>
   </div>
@endsection
