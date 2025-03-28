<?php
class AdminController {
    public function index() {
        include_once 'views/admin.php';
    }
    
    public function salvarLivro() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Incluir arquivos necessários
            include_once 'config/database.php';
            include_once 'models/Livro.php';
            
            // Instanciar banco de dados e objeto livro
            $database = new Database();
            $db = $database->getConnection();
            
            $livro = new Livro($db);
            
            // Definir valores do livro
            $livro->titulo = $_POST['titulo'] ?? '';
            $livro->autor = $_POST['autor'] ?? '';
            $livro->data_publicacao = $_POST['data_publicacao'] ?? '';
            $livro->data_aquisicao = $_POST['data_aquisicao'] ?? '';
            $livro->genero = $_POST['genero'] ?? '';
            $livro->sinopse = $_POST['sinopse'] ?? '';
            
            // Criar o livro
            if($livro->criar()) {
                $_SESSION['mensagem'] = "Livro cadastrado com sucesso!";
            } else {
                $_SESSION['mensagem'] = "Erro ao cadastrar livro.";
            }
            
            header("Location: index.php?route=admin");
            exit;
        }
    }
}
?>