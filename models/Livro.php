<?php
class Livro {
    private $conn;
    private $table_name = "livros";

    public $id;
    public $titulo;
    public $autor;
    public $data_publicacao;
    public $data_aquisicao;
    public $genero;
    public $sinopse;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Criar novo livro
    public function criar() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET titulo=:titulo, autor=:autor, data_publicacao=:data_publicacao, 
                      data_aquisicao=:data_aquisicao, genero=:genero, sinopse=:sinopse";

        $stmt = $this->conn->prepare($query);

        // Sanitizar
        $this->titulo = htmlspecialchars(strip_tags($this->titulo));
        $this->autor = htmlspecialchars(strip_tags($this->autor));
        $this->data_publicacao = htmlspecialchars(strip_tags($this->data_publicacao));
        $this->data_aquisicao = htmlspecialchars(strip_tags($this->data_aquisicao));
        $this->genero = htmlspecialchars(strip_tags($this->genero));
        $this->sinopse = htmlspecialchars(strip_tags($this->sinopse));

        // Bind
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":autor", $this->autor);
        $stmt->bindParam(":data_publicacao", $this->data_publicacao);
        $stmt->bindParam(":data_aquisicao", $this->data_aquisicao);
        $stmt->bindParam(":genero", $this->genero);
        $stmt->bindParam(":sinopse", $this->sinopse);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Ler todos os livros
    public function ler($filtro_genero = null, $filtro_data = null) {
        $query = "SELECT * FROM " . $this->table_name;
        
        // Adicionar filtros se fornecidos
        $where_clauses = [];
        
        if($filtro_genero) {
            $where_clauses[] = "genero = :genero";
        }
        
        if($filtro_data) {
            $where_clauses[] = "data_publicacao LIKE :data";
        }
        
        if(!empty($where_clauses)) {
            $query .= " WHERE " . implode(" AND ", $where_clauses);
        }
        
        $query .= " ORDER BY titulo ASC";
        
        $stmt = $this->conn->prepare($query);
        
        // Bind dos parâmetros de filtro
        if($filtro_genero) {
            $stmt->bindParam(":genero", $filtro_genero);
        }
        
        if($filtro_data) {
            $filtro_data_param = $filtro_data . "%";
            $stmt->bindParam(":data", $filtro_data_param);
        }
        
        $stmt->execute();
        return $stmt;
    }

    // Obter gêneros únicos para o filtro
    public function getGeneros() {
        $query = "SELECT DISTINCT genero FROM " . $this->table_name . " ORDER BY genero ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}
?>