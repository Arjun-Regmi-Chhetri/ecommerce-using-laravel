@extends('layouts.back')

@section('content')
    <div class="header">
        <div class="container my-2" style="padding:0 40px 0 20px">
            <div class="row">
                <div class="col">
                    <div class="text">
                        <h3 class="fs-5">You can add Category Here!</h3>
                        <p>If you want to return to category page click cancel button</p>
                    </div>
                </div>
                <div class="col text-end">
                    <div class="add position-relative">
                        <a href="{{route('back.brand.index')}}">Brand</a>
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

            <form action="{{route('back.brand.store')}}" method="POST" class="pt-3 pb-3" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="mb-3">
                    <label for="title" class="form-label">Title <span class="fs-5 fw-semibold text-success">*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{old('name')}}" placeholder="Enter title"  required>
                </div>
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span class="fs-5 fw-semibold text-success">*</span></label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{old('slug')}}">
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Brand logo <span class="fs-5 fw-semibold text-success">*</span></label>
                    <input class="form-control" type="file" id="file" name="file">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status<span class="fs-5 fw-semibold text-success">*</span></label>
                    <select class="form-select"  name="status" id="status" aria-label="Default select example">
                        <option value="Active" {{old('status')}} >Active</option>
                        <option value="Inactive" v{{old('status')}}>Inactive</option>

                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
