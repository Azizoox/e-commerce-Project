<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">
                    <h4>Products List</h4>
                    <div class="col-lg-12">
                        <div class="block">
                            <div class="block-body">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form action="/admin/SearchProduct" method="POST" >
                                    @csrf
                                    <div class="form-group" style="">
                                        <label class="form-control-label">search now </label>
                                        <input type="text" placeholder="search" class="form-control" name="search">
                                      </div>
                                      <input type="submit" value="add product" class="btn btn-primary">

                                </form>

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->title }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td><img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}" style="width: 100px;"></td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->category }}</td>
                                                <td>
                                                    <a href="{{ url('/admin/edit_product/' . $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                            <!-- Your form -->
                                            <form id="delete-product-form-{{ $product->id }}" action="{{ url('/admin/delete_product/' . $product->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $product->id }})">Delete</button>
                                            </form>
                                            <script>
                                                function confirmDelete(productId) {
                                                    Swal.fire({
                                                        title: 'Are you sure?',
                                                        text: "You won't be able to revert this!",
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#d33',
                                                        cancelButtonColor: '#3085d6',
                                                        confirmButtonText: 'Yes, delete it!'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('delete-product-form-' + productId).submit();
                                                        }
                                                    })
                                                }
                                            </script>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{$products->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/admincss/vendor/jquery/jquery.min.js"></script>
    <script src="/admincss/vendor/popper.js/umd/popper.min.js"></script>
    <script src="/admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admincss/vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="/admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="/admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/admincss/js/charts-home.js"></script>
    <script src="/admincss/js/front.js"></script>
</body>
</html>
