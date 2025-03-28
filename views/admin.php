<?php include_once 'views/templates/header.php'; ?>

<section class="admin">
    <h2>Área Administrativa</h2>
    
    <?php if(isset($_SESSION['mensagem'])): ?>
        <div class="alert alert-success">
            <?php 
                echo $_SESSION['mensagem']; 
                unset($_SESSION['mensagem']);
            ?>
        </div>
    <?php endif; ?>
    
    <div class="admin-container">
        <h3>Cadastro de Livros</h3>
        <form action="index.php?route=salvar-livro" method="POST" class="book-form">
            <div class="form-row">
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>
                
                <div class="form-group">
                    <label for="autor">Autor</label>
                    <input type="text" id="autor" name="autor" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="data_publicacao">Data de Publicação</label>
                    <input type="date" id="data_publicacao" name="data_publicacao" required>
                </div>
                
                <div class="form-group">
                    <label for="data_aquisicao">Data de Aquisição</label>
                    <input type="date" id="data_aquisicao" name="data_aquisicao" required>
                </div>
            </div>
            
            <div class="form-group">
                <label for="genero">Gênero</label>
                <select id="genero" name="genero" required>
                    <option value="">Selecione um gênero</option>
                    <option value="Romance">Romance</option>
                    <option value="Ficção Científica">Ficção Científica</option>
                    <option value="Fantasia">Fantasia</option>
                    <option value="Biografia">Biografia</option>
                    <option value="História">História</option>
                    <option value="Autoajuda">Autoajuda</option>
                    <option value="Negócios">Negócios</option>
                    <option value="Infantil">Infantil</option>
                    <option value="Poesia">Poesia</option>
                    <option value="Outro">Outro</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="sinopse">Sinopse</label>
                <textarea id="sinopse" name="sinopse" rows="5" required></textarea>
            </div>
            
            <button type="submit" class="btn">Cadastrar Livro</button>
        </form>
    </div>
</section>

<?php include_once 'views/templates/footer.php'; ?>