<?php
class CatalogoController {
    public function index() {
        // Incluir arquivos necessários
        include_once 'config/database.php';
        include_once 'models/Livro.php';
        
        // Instanciar banco de dados e objeto livro
        $database = new Database();
        $db = $database->getConnection();
        
        $livro = new Livro($db);
        
        // Obter filtros da URL
        $filtro_genero = isset($_GET['genero']) ? $_GET['genero'] : null;
        $filtro_data = isset($_GET['ano']) ? $_GET['ano'] : null;
        
        // Obter livros com filtros aplicados
        $stmt = $livro->ler($filtro_genero, $filtro_data);
        
        // Obter gêneros para o filtro
        $generos_stmt = $livro->getGeneros();
        
        include_once 'views/catalogo.php';
    }
}
?>