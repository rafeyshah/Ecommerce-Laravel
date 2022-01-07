<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')

    <style>
        .title {
            color: white;
            padding-top: 25px;
            font-size: 25px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>

    <!-- partial -->
    @include('admin.sidebar')
    @include('admin.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="title">Add Product</h1>

            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
            </div>
            @endif

            <!-- enctype to upload image -->
            <form action="{{url('update_product_save', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="padding:15px">
                    <label for="">Product Title</label>
                    <input style="color: black;" type="text" name="title" value="{{$data->title}}" required>
                </div>
                <div style="padding:15px">
                    <label for="">Price</label>
                    <input style="color: black;" type="number" name="price" value="{{$data->price}}" required>
                </div>
                <div style="padding:15px">
                    <label for="">Description</label>
                    <input style="color: black;" type="text" name="des" value="{{$data->description}}" required>
                </div>
                <div style="padding:15px">
                    <label for="">Quantity</label>
                    <input style="color: black;" type="text" name="quantity" value="{{$data->quantity}}" required>
                </div>
                <div style="padding:15px">
                    <label for="">Old image</label>
                    <img height="100" width="100" src="/product_image/{{$data->image}}">
                </div>
                <div style="padding:15px">
                    <label for="">Change Image</label>
                    <input type="file" name="file">
                </div>
                <div style="padding:15px">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>
        </div>
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
</body>

</html>