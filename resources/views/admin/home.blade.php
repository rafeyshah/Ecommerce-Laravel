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
            @include('admin.body')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
</body>

</html>