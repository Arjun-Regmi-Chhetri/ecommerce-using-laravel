@extends('layouts.back')

@section('title')
    Slider
@endsection

@section('content')
    <div class="header">
        <div class="container my-2" style="padding:0 40px 0 20px">
            <div class="row">
                <div class="col">
                    <div class="text">
                        <h3 class="fs-5">Welcome to, Slider Page !</h3>
                        <p class="textP">You have 5 Slider</p>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="add position-relative">
                        <a href="{{route('back.slider.create')}}">Add Slider</a>
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
                <th>Image</th>
                <th>Status</th>
                <th>Featured</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i =1;
            ?>
            @foreach($sliders as $slider)
                <tr>
                    <td> <?php echo $i++ ?></td>
                    <td>{{$slider->slug}}</td>
                    <td><img src="/storage/image/sliders/{{$slider->file}}" alt="" width="60px" height="30px" class="rounded img"></td>
                    <td>
                      <span class=" badge rounded-pill bg-{{$slider->status=='Active' ? 'success':'danger'}}">
                            {{$slider->status}}
                       </span>

                    </td>
                    <td>
                      <span class=" badge rounded-pill bg-{{$slider->featured=='Yes' ? 'success':'danger'}}">
                            {{$slider->featured}}
                       </span>

                    </td>
                    <td>{{$slider->created_at}}</td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </div>

@endsection
