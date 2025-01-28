<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="/admincss/img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="/home"> <i class="icon-home"></i>Home </a></li>
            <li><a href="/admin/categorie"> <i class="icon-grid"></i>categorie</a></li>
            {{-- <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts </a></li>
            <li><a href="forms.html"> <i class="icon-padnote"></i>Forms </a></li>
            <li><a href="login.html"> <i class="icon-logout"></i>Login page </a></li> --}}
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>product </a>
                <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                  <li><a href="/admin/add_product">add product</a></li>
                  <li><a href="/admin/products">show all product</a></li>

                </ul>
              </li>
              <li><a href="/admin/orders"> <i class="icon-padnote"></i>all orders </a></li>

    </ul>

  </nav>
  <!-- Sidebar Navigation end-->
