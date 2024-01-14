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
                        <h3 class="fs-5">Welcome to, Brand Page !</h3>
                        <p class="textP">You have 5 Brand</p>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="add position-relative">
                        <a href="{{route('back.brand.create')}}">Add Brand</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid brand" >
        <table class="table profile shadow-lg" style="margin: 10px 0px; border-radius: 0px">
            <thead>
            <tr>
                <th>Id</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Brands</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i =1;
            ?>
            @foreach($brands as $brand)
            <tr>
                <th class="fw-semibold"><?php
                    echo $i++;
                    ?></th>
                <td>{{$brand->slug}}</td>
                <td>
                    <span class=" badge rounded-pill bg-{{$brand->status=='Active' ? 'success':'danger'}}">
                            {{$brand->status}}
                       </span>
                </td>
                <td>
                    <img src="/storage/image/brands/{{$brand->file}}" alt="" width="60px" height="30px" class="rounded img">
                </td>
                <td>{{$brand->created_at}}</td>
                <td>
                    <form action="" method="post" enctype="multipart/form-data">
                        @method('DELETE')
                        {{csrf_field()}}
                        <a href="" class="text-success"> <i class="bi bi-pencil-square"></i> </a>
                        <button type="submit" class="text-danger border-0 bg-transparent"><i class="bi bi-trash3"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
