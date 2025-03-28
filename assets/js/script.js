// Script para mostrar/ocultar a sinopse dos livros no catálogo
document.addEventListener('DOMContentLoaded', function() {
    // Adicionar evento de clique para os itens do livro
    const bookItems = document.querySelectorAll('.book-item');
    
    bookItems.forEach(item => {
        const synopsis = item.querySelector('.book-synopsis');
        const title = item.querySelector('h3');
        
        if (title && synopsis) {
            title.addEventListener('click', function() {
                // Toggle da classe para mostrar/ocultar a sinopse
                synopsis.classList.toggle('active');
                
                // Alternar entre expandir e recolher
                if (synopsis.classList.contains('active')) {
                    synopsis.style.maxHeight = synopsis.scrollHeight + 'px';
                } else {
                    synopsis.style.maxHeight = '0';
                }
            });
            
            // Inicializar o estado da sinopse
            synopsis.style.overflow = 'hidden';
            synopsis.style.maxHeight = '0';
            synopsis.style.transition = 'max-height 0.3s ease-out';
            
            // Adicionar cursor de ponteiro ao título para indicar que é clicável
            title.style.cursor = 'pointer';
            
            // Adicionar ícone de expansão
            title.innerHTML += ' <span class="expand-icon">+</span>';
        }
    });
    
    // Limpar mensagens de alerta após 5 segundos
    const alerts = document.querySelectorAll('.alert');
    if (alerts.length > 0) {
        setTimeout(() => {
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s';
                
                setTimeout(() => {
                    alert.remove();
                }, 500);
            });
        }, 5000);
    }
});