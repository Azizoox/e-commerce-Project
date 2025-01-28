<!DOCTYPE html>
<html>
  <head>
    @include('admin.css')
    <style>
        .block{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          <h4>add product</h4>
          <div class="col-lg-6">

            <div class="block">
              <div class="block-body">
                <form class="form" method="POST" action="{{ url('/admin/store_product') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group" style="">
                    <label class="form-control-label">Title</label>
                    <input type="text" placeholder="title" class="form-control" name="title">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">description</label>
                    <input type="text" placeholder="description" class="form-control" name="description">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">image</label><br/>
                    <input type="file"   name="image">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">price</label>
                    <input type="text" placeholder="price" class="form-control" name="price">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">quantity</label>
                    <input type="text" placeholder="quantity" class="form-control" name="quantity">
                  </div>
                  <div class="form-group">
                    <label class="form-control-label">category</label><br/>
                    <select name="category">
                        @foreach ($category as $categories )
                        <option value="{{$categories->categorie_name}}">{{$categories->categorie_name}}</option>

                        @endforeach


                    </select>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="add product" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
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
