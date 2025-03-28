<?php
// Iniciar sessão
session_start();

// Incluir arquivos de configuração
include_once 'config/database.php';

// Definir rota padrão
$route = isset($_GET['route']) ? $_GET['route'] : 'home';

// Roteamento básico
switch($route) {
    case 'home':
        include_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
    case 'sobre':
        include_once 'controllers/SobreController.php';
        $controller = new SobreController();
        $controller->index();
        break;
    case 'contato':
        include_once 'controllers/ContatoController.php';
        $controller = new ContatoController();
        $controller->index();
        break;
    case 'admin':
        include_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;
    case 'catalogo':
        include_once 'controllers/CatalogoController.php';
        $controller = new CatalogoController();
        $controller->index();
        break;
    case 'salvar-livro':
        include_once 'controllers/AdminController.php';
        $controller = new AdminController();
        $controller->salvarLivro();
        break;
    case 'enviar-contato':
        include_once 'controllers/ContatoController.php';
        $controller = new ContatoController();
        $controller->enviarMensagem();
        break;
    default:
        include_once 'controllers/HomeController.php';
        $controller = new HomeController();
        $controller->index();
        break;
}
?>