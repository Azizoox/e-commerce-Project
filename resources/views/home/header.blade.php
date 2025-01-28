<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="/">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/product">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonial.html">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        @if (Route::has('login'))
            @auth
            <div style="margin: 0 20px">
               <a href="/cart" style="text-decoration: none;color:black"> <i class="fa-solid fa-cart-shopping"></i> cart {{$cart}}</a>
            </div>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <i class="fa-solid fa-right-to-bracket"></i><button type="submit" style="border: none; background:none;" >logout</button>
            </form>
        @else

        <div class="user_option">
          <a href="/login">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Login
            </span>
          </a>
          <a href="/register">
            <i class="fas fa-user-plus"></i>

            <span>
                Register
            </span>
          </a>
          {{-- <a href="">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          </a> --}}
          {{-- <form class="form-inline ">
            <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form> --}}


        </div>
        @endauth
        @endif
      </div>
    </nav>
  </header>
