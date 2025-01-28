<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Produit</title>
    <link rel="stylesheet" href="styles.css">
    @include('home.css')
    <style>
        /* styles.css */
/* body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f2f5;
    margin: 0;
    padding: 0;
} */

.container {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
    display: grid;
    grid-template-columns: 1fr;
    gap: 20px;
}

.product-details {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: 20px;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    transition: transform 0.3s ease;
}



.product-image {
    display: flex;
    justify-content: center;
    align-items: center;
}

.product-image img {
    max-width: 100%;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-image img:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.product-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 20px;
}

.product-info h1 {
    font-size: 2.5em;
    color: #333;
    margin-bottom: 15px;
}

.product-info .price {
    font-size: 1.8em;
    color: #e63946;
    margin-bottom: 20px;
}

.product-info .category,
.product-info .quantity,
.product-info .description {
    font-size: 1.2em;
    color: #555;
    margin-bottom: 10px;
}

.product-info .category {
    font-style: italic;
}

.btn-add-to-cart {
    background-color: #e63946;
    color: #fff;
    padding: 15px 25px;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 1.2em;
    transition: background-color 0.3s ease, transform 0.3s ease;
    align-self: flex-start;
}

.btn-add-to-cart:hover {
    background-color: #d62828;
    transform: translateY(-2px);
}

    </style>
</head>

<body>
    <div class="hero_area">
        <!-- Section d'en-tête -->
        @include('home.header')
        <div class="container">
            <div class="product-details">
                <div class="product-image">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->title }}">
                </div>
                <div class="product-info">
                    <h1>{{ $product->title }}</h1>
                    <p class="price">{{ $product->price }} €</p>{{$cart}}
                    <p class="category">Catégorie: {{ $product->category }}</p>
                    <p class="quantity">Quantité: {{ $product->quantity }}</p>
                    <p class="description">{{ $product->description }}</p>
                    <button class="btn-add-to-cart">Ajouter au panier</button>
                </div>
            </div>
        </div>
        <!-- Section de pied de page -->
        @include('home.footer')
    </div>
</body>

</html>
