<?php include_once 'views/templates/header.php'; ?>

<section class="contact">
    <h2>Entre em Contato</h2>
    
    <?php if(isset($_SESSION['mensagem'])): ?>
        <div class="alert alert-success">
            <?php 
                echo $_SESSION['mensagem']; 
                unset($_SESSION['mensagem']);
            ?>
        </div>
    <?php endif; ?>
    
    <div class="contact-container">
        <div class="contact-form">
            <h3>Envie uma Mensagem</h3>
            <form action="index.php?route=enviar-contato" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" required>
                </div>
                
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="mensagem">Mensagem</label>
                    <textarea id="mensagem" name="mensagem" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn">Enviar Mensagem</button>
            </form>
        </div>
        
        <div class="contact-info">
            <h3>Informações de Contato</h3>
            <p><strong>Endereço:</strong> Rua dos Livros, 123 - Centro</p>
            <p><strong>Telefone:</strong> (11) 1234-5678</p>
            <p><strong>E-mail:</strong> contato@bibliotecavirtual.com</p>
            
            <h3>Redes Sociais</h3>
            <div class="social-links">
                <a href="#" class="social-link">Facebook</a>
                <a href="#" class="social-link">Instagram</a>
                <a href="#" class="social-link">Twitter</a>
                <a href="#" class="social-link">YouTube</a>
            </div>
            
            <h3>Horário de Funcionamento</h3>
            <p>Segunda a Sexta: 8h às 20h</p>
            <p>Sábados: 9h às 15h</p>
            <p>Domingos e Feriados: Fechado</p>
        </div>
    </div>
</section>

<?php include_once 'views/templates/footer.php'; ?>