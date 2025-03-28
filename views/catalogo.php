<?php include_once 'views/templates/header.php'; ?>

<section class="catalog">
    <h2>Catálogo de Livros</h2>
    
    <div class="filter-container">
        <h3>Filtros</h3>
        <form action="index.php" method="GET" class="filter-form">
            <input type="hidden" name="route" value="catalogo">
            
            <div class="form-group">
                <label for="genero">Gênero</label>
                <select id="genero" name="genero">
                    <option value="">Todos os gêneros</option>
                    <?php 
                    while ($row = $generos_stmt->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($filtro_genero == $row['genero']) ? 'selected' : '';
                        echo "<option value='" . $row['genero'] . "' $selected>" . $row['genero'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="ano">Ano de Publicação</label>
                <input type="text" id="ano" name="ano" placeholder="Ex: 2020" value="<?php echo $filtro_data ?? ''; ?>">
            </div>
            
            <button type="submit" class="btn">Filtrar</button>
            <a href="index.php?route=catalogo" class="btn btn-secondary">Limpar Filtros</a>
        </form>
    </div>
    
    <div class="book-list">
        <?php
        if($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                
                // Formatar datas
                $data_pub_formatada = date('d/m/Y', strtotime($data_publicacao));
                $data_aq_formatada = date('d/m/Y', strtotime($data_aquisicao));
                
                echo "<div class='book-item'>";
                    echo "<div class='book-cover'></div>";
                    echo "<div class='book-details'>";
                        echo "<h3>{$titulo}</h3>";
                        echo "<p><strong>Autor:</strong> {$autor}</p>";
                        echo "<p><strong>Gênero:</strong> {$genero}</p>";
                        echo "<p><strong>Publicação:</strong> {$data_pub_formatada}</p>";
                        echo "<p><strong>Aquisição:</strong> {$data_aq_formatada}</p>";
                        echo "<div class='book-synopsis'>";
                            echo "<h4>Sinopse</h4>";
                            echo "<p>{$sinopse}</p>";
                        echo "</div>";
                    echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-results'>Nenhum livro encontrado com os filtros selecionados.</p>";
        }
        ?>
    </div>
</section>

<?php include_once 'views/templates/footer.php'; ?>