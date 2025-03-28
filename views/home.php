<?php include_once 'views/templates/header.php'; ?>

<section class="hero">
    <h2>Bem-vindo à Biblioteca Virtual</h2>
    <p>Explore nossa coleção de livros e descubra novos mundos através da leitura.</p>
    <div class="buttons">
        <a href="index.php?route=catalogo" class="btn">Ver Catálogo</a>
        <a href="index.php?route=admin" class="btn btn-admin">
            <i class="admin-icon">👤</i> Área Administrativa
        </a>
    </div>
</section>

<section class="featured-books">
    <h3>Livros em Destaque</h3>
    <div class="book-grid">
        <div class="book-card">
            <div class="book-cover"></div>
            <h4>Dom Casmurro</h4>
            <p>Machado de Assis</p>
        </div>
        <div class="book-card">
            <div class="book-cover"></div>
            <h4>O Pequeno Príncipe</h4>
            <p>Antoine de Saint-Exupéry</p>
        </div>
        <div class="book-card">
            <div class="book-cover"></div>
            <h4>1984</h4>
            <p>George Orwell</p>
        </div>
    </div>
</section>

<?php include_once 'views/templates/footer.php'; ?>