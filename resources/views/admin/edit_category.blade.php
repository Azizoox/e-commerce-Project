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
          <h4>Edit categorie</h4>
          <div class="col-lg-8">
            <div class="block">
              <div class="block-body">
                <form class="form-inline" method="POST" action="/admin/update_categorie/{{$categories->id}}">
                    @csrf

                  <div class="form-group">
                    <label for="inlineFormInput" class="sr-only">Name</label>
                    <input id="inlineFormInput" type="text" style="width:320px " value="{{$categories->categorie_name}}" class="mr-sm-3 form-control" name="categorie">
                  </div>

                  <div class="form-group">
                    <input type="submit" value="update" class="btn btn-primary" style="width: 65px">
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
