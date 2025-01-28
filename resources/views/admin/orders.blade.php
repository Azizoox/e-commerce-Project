<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h5>all orders</h5>
          <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product_title</th>
                    <th>price</th>
                    <th>image</th>
                    <th>action</th>
                    <th>print</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order )
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product->title}}</td>
                        <td>{{$order->product->price}}</td>
                        <td><img src="/images/{{$order->product->image}}" width="100px"></td>
                        <td class="d-flex ">
                            <form action="/orders/refused/{{$order->id}}" method="POST" class="mx-3">
                                @csrf
                                <input type="submit" value="refuser" class="btn btn-primary">

                            </form>
                            <form action="/orders/accpted/{{$order->id}}" method="POST">
                                @csrf
                                <input type="submit" value="accept" class="btn btn-success">

                            </form>
                        </td>
                        <td>
                            <a href="/print_pdf/{{$order->id}}" class="btn btn-secondary">print PDF</a>
                        </td>
                    </tr>

                    @endforeach


                </tbody>
              </table>
          </div>
      </div>
      <div class="mt-4">
        {{$orders->links()}}
    </div>
    </div>
    <!-- JavaScript files-->
    <script src="/admincss/vendor/jquery/jquery.min.js"></script>
    <script src="/admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="/admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="/admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="/admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="/admincss/js/charts-home.js"></script>
    <script src="/admincss/js/front.js"></script>
  </body>
</html>
