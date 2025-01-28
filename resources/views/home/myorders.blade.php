<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
     .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;

            gap: 20px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
                display: block;
                gap: 100px;
            }
        }

        .cart-table {
            width: 70%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .cart-table thead {
            background-color: #f8f8f8;
        }

        .cart-table th,
        .cart-table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            font-weight: bold;
        }

        .cart-table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .product-image {
            max-width: 100px;
            border-radius: 8px;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .product-info h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .product-info .price {
            font-size: 1.5em;
            color: #ff5722;
            margin-bottom: 10px;
        }

        .product-info .category,
        .product-info .quantity,
        .product-info .description {
            margin-bottom: 10px;
        }

        .btn-add-to-cart {
            background-color: #ff5722;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }

        .btn-add-to-cart:hover {
            background-color: #e64a19;
        }

        .total-value {
            margin-top: 20px;
            padding: 20px;
            background-color: #ff5722;
            color: white;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .total-value h3 {
            font-size: 1.8em;
            margin: 0;
            color: #333;
        }

        .total-value .value {
            font-weight: bold;
            font-size: 2em;
            display: block;
            margin-top: 10px;
            color: #f1f1ef;
        }

        .btn-delete {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        /* Style pour le conteneur de l'alerte */
        .custom-alert {
            display: none;
            /* Masqué par défaut */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        /* Style pour le contenu de l'alerte */
        .alert-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            width: 300px;
            animation: fadeIn 0.3s ease;
        }

        .alert-content h2 {
            margin-top: 0;
        }

        .alert-content p {
            margin: 20px 0;
        }

        .btn-confirm,
        .btn-cancel {
            background: #3085d6;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-cancel {
            background: #d33;
        }

        .btn-confirm:hover {
            background: #2874c4;
        }

        .btn-cancel:hover {
            background: #c1272d;
        }

        /* Animation pour faire apparaître l'alerte */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Style pour le conteneur du formulaire */
        .form-container {
            max-width: 400px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
        }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">

    <div class="container">
      <div class="heading_container heading_center">
        <h2>
            Latest Products
          </h2>

      </div>

        <table class="cart-table">
            <thead>
                <tr>

                    <th>Title</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>status</th>
                </tr>

            </thead>
            <tbody>
                <tr>
                @foreach ($order as $orders)

                    <td>{{$orders->product->title}}</td>
                    <td>{{$orders->product->price}}</td>
                    <td><img src="images/{{$orders->product->image}}" width="150px"></td>
                    <td>{{$orders->status}}</td>

                </tr>

                @endforeach

            </tbody>
        </table>
    </div>
  </section>

  <!-- end shop section -->

  <!-- info section -->

  @include('home.footer')

</body>

</html>
