<?php
class ContatoController {
    public function index() {
        include_once 'views/contato.php';
    }
    
    public function enviarMensagem() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $mensagem = $_POST['mensagem'] ?? '';
            
            // Aqui você poderia salvar no banco de dados ou enviar por email
            // Por simplicidade, apenas definimos uma mensagem de sucesso
            
            $_SESSION['mensagem'] = "Mensagem enviada com sucesso!";
            header("Location: index.php?route=contato");
            exit;
        }
    }
}
?>