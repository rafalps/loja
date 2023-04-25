<!DOCTYPE html>
<html>

<head>
    <title>LOJA</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <!-- Referência ao arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Referência ao arquivo jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <!-- Referência ao arquivo JS do Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">LOJA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?page=home&action=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=produtos">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=tiposProdutos">Tipos Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=taxas">Taxas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>