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
          <h2>add categorie</h2>
          <div class="col-lg-8">
            <div class="block">
              <div class="block-body">
                <form class="form-inline" method="POST" action="/admin/add_categorie">
                    @csrf
                  <div class="form-group">
                    <label for="inlineFormInput" class="sr-only">Name</label>
                    <input id="inlineFormInput" type="text" style="width:320px " placeholder="name categorie" class="mr-sm-3 form-control" name="categorie">
                  </div>

                  <div class="form-group">
                    <input type="submit" value="add" class="btn btn-primary" style="width: 65px">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-lg-6 my-4">
            <div class="block margin-bottom-sm">
              <div class="title"><strong>list of category</strong></div>
              <div class="table-responsive">
                <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $index => $category)
                      <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $category->categorie_name }}</td>
                        <td><a href="/admin/edit_categorie/{{$category->id}}" class="btn btn-success">Edit</a></td>
                        <td>
                          <form id="delete-form-{{ $category->id }}" action="{{ url('/admin/delete_categorie/' . $category->id) }}" method="POST" style="display: none;">
                            @csrf
                          </form>
                          <button class="btn btn-primary" onclick="confirmDelete({{ $category->id }})">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <script>
                    function confirmDelete(id) {
                      Swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                          document.getElementById('delete-form-' + id).submit();
                        }
                      })
                    }
                  </script>


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
