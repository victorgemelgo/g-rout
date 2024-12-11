<?php
require 'Router.php';

// Cria uma instância do Router
$router = new Router();

// Carrega as rotas do arquivo externo
require 'routes/routes.php';

// Resolve a requisição
$router->resolve();

// Função para renderizar a view
function renderView($view) {
    $viewFile = __DIR__ . "/views/{$view}.php";
    if (file_exists($viewFile)) {
        include $viewFile;
    } else {
        echo "View não encontrada: {$view}";
    }
}
