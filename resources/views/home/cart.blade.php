<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Panier</title>

    @include('home.css')
    <style>
        /* styles.css */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            display: flex;
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

        /* Style pour le formulaire */
        .custom-form {
            display: grid;
            grid-gap: 20px;
        }

        /* Style pour les étiquettes */
        label {
            font-weight: bold;
        }

        /* Style pour les champs de saisie */
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        /* Style pour les champs de saisie lorsqu'ils sont survolés */
        input[type="text"]:hover,
        input[type="text"]:focus {
            border-color: #3085d6;
        }

        /* Style pour le bouton de soumission */
        input[type="submit"] {
            background-color: #3085d6;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 0 auto;
        }

        /* Style pour le bouton de soumission lorsqu'il est survolé */
        input[type="submit"]:hover {
            background-color: #2874c4;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Section d'en-tête -->
        @include('home.header')
        <div class="container">
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                    <?php $value = 0; ?>
                </thead>
                <tbody>
                    @foreach ($cart_pro as $cart)
                    <tr>
                        <td>
                            <img src="images/{{ $cart->product->image }}" alt="{{ $cart->product->title }}" class="product-image">
                        </td>
                        <td>{{ $cart->product->title }}</td>
                        <td>{{ $cart->product->price }} €</td>
                        <?php $value += $cart->product->price; ?>
                        <td>
                            <div class="btn-box">
                                <form id="delete-form-{{ $cart->id }}" action="{{ route('cart.destroy', $cart->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="showAlert({{ $cart->id }})" class="btn-delete">Supprimer</button>
                                </form>
                            </div>
                            <div id="custom-alert-{{ $cart->id }}" class="custom-alert">
                                <div class="alert-content">
                                    <h2>Êtes-vous sûr ?</h2>
                                    <p>que vous voulez supprimer</p>
                                    <button class="btn-confirm" onclick="confirmDeletion({{ $cart->id }})">Oui, supprimer</button>
                                    <button class="btn-cancel" onclick="hideAlert({{ $cart->id }})">Annuler</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="form-container">
                <form action="/orders" class="custom-form" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="receiver-name">Nom du destinataire</label>
                        <input type="text" id="receiver-name" name="name" placeholder="Entrez le nom du destinataire" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="text" id="telephone" name="phone" placeholder="Entrez le numéro de téléphone" value="{{ Auth::user()->phone }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" id="address" name="address" placeholder="Entrez l'adresse" value="{{ Auth::user()->adress }}"> <!-- Correction de "adress" en "address" -->
                    </div>
                    <input type="submit" value="Confirmer">
                </form>

            </div>
        </div>
        <div class="total-value" style="margin: 30px 200px;width:70%;">
            <h3>Valeur totale : <span class="value">{{ $value }} €</span></h3>
        </div>
        <!-- Section de pied de page -->
        @include('home.footer')
    </div>
    <script>
        function showAlert(cartId) {
            document.getElementById('custom-alert-' + cartId).style.display = 'flex';
        }

        function hideAlert(cartId) {
            document.getElementById('custom-alert-' + cartId).style.display = 'none';
        }

        function confirmDeletion(cartId) {
            document.getElementById('delete-form-' + cartId).submit();
        }
    </script>
</body>

</html>
