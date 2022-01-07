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
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <table>
                <tr style="background-color: grey;">
                    <td style="padding: 20px;">Customer Name</td>
                    <td style="padding: 20px;">Phone</td>
                    <td style="padding: 20px;">Address</td>
                    <td style="padding: 20px;">Product Title</td>
                    <td style="padding: 20px;">Price</td>
                    <td style="padding: 20px;">Quantity</td>
                    <td style="padding: 20px;">Status</td>
                    <td style="padding: 20px;">Actions</td>
                </tr>
                @foreach($orders as $order)
                <tr align="center">
                    <td style="padding: 20px;">{{$order->name}}</td>
                    <td style="padding: 20px;">{{$order->phone}}</td>
                    <td style="padding: 20px;">{{$order->address}}</td>
                    <td style="padding: 20px;">{{$order->product_name}}</td>
                    <td style="padding: 20px;">{{$order->price}}</td>
                    <td style="padding: 20px;">{{$order->quantity}}</td>
                    <td style="padding: 20px;">{{$order->status}}</td>
                    <td style="padding: 20px;">
                        <a class="btn btn-success" href="{{url('update_status', $order->id)}}">
                            Delivered
                        </a>
                    </td>
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