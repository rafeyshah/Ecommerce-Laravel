<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>

    <!-- partial -->
    @include('admin.sidebar')
    @include('admin.navbar')
    <!-- partial -->
    <div style="padding-bottom: 30px;" class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
            </div>
            @endif
            <table>
                <tr style="background-color: grey;">
                    <td style="padding: 20px;">Title</td>
                    <td style="padding: 20px;">Description</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Image</td>
                    <td style="padding: 20px;">Update</td>
                    <td style="padding: 20px;">Delete</td>
                </tr>

                @foreach($data as $product)
                <tr align="center" style="background-color: black; ">
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><img height="100px" width="100px" src="product_image/{{$product->image}}" alt=""></td>
                    <td><a class="btn btn-primary" href="{{url('update_product', $product->id)}}">Update</a></td>
                    <td><a class="btn btn-danger" href="{{url('delete_product', $product->id)}}">Delete</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
</body>

</html>