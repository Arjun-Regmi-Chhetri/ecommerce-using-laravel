@extends('layouts.back')

@section('title')
    Category
@endsection

@section('content')
    <div class="header">
        <div class="container my-2" style="padding:0 40px 0 20px">
            <div class="row">
                <div class="col">
                    <div class="text">
                        <h3 class="fs-5">Welcome to, Category Page !</h3>
                        <p class="textP">You have 5 Category</p>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="add position-relative">
                        <a href="{{route('back.category.create')}}">Add Category</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid category" >
        @if($categories->isNotEmpty())

        <table class="table profile shadow-lg" style="margin: 10px 0px; border-radius: 0px">
            <thead>
            <tr>
                <th>Id</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
                  <?php
                    $i =1;
                    ?>
            @foreach($categories as $category)
            <tr>
                <th class="fw-semibold">
                    <?php
                    echo $i++;
                    ?>
                </th>
                <td>{{$category->slug}}</td>
                <td>
                    <span class="fw-semibold text-{{$category->status=='Active'?'success':'danger'}}">
                        {{$category->status}}
                    </span>
                </td>
                <td class="small">{{$category->created_at}}</td>
                <td class="small">{{$category->updated_at}}</td>
                <td>
                    <form action="{{route('back.category.destroy',$category)}}" method="post">
                        @method('DELETE')
                        {{csrf_field()}}
                    <a href="{{route('back.category.edit', $category)}}" class="text-success"> <i class="bi bi-pencil-square"></i> </a>
                    <button type="submit" class="text-danger border-0 bg-transparent"><i class="bi bi-trash3"></i></button>

                    </form>
                </td>

            </tr>
            @endforeach
            </tbody>

        </table>

        @endif
    </div>
@endsection
