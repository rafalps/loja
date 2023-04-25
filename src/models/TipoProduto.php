<?php

class TipoProduto extends Database
{
    public $table = 'tipos_produtos';

    public int $id = 0;
    public string $descricao;
    public int $taxa_id;

    /**
     * Construtor da classe.
     * @param int|null $id ID do tipo de produto
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if ($id) {
            $this->findById($id);
        }
    }

    /**
     * Preencher atributos do objeto.
     * @param array $row
     */
    public function fill($row)
    {
        $this->descricao = $row['descricao'];
        $this->taxa_id = $row['taxa_id'];
    }

    /**
     * Buscar tipo de produto pelo ID.
     * @param int $id ID do tipo de produto
     * @return TipoProduto
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $this->id = $row['id'];
        $this->descricao = $row['descricao'];
        $this->taxa_id = $row['taxa_id'];
        return $this;
    }

    /**
     * Listar todos os tipos de produtos.
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table ORDER BY descricao");
        return $stmt->fetchAll();
    }

    /**
     * Salvar um tipo de produto.
     * @return bool
     */
    public function save()
    {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE $this->table 
                SET descricao = ?, taxa_id = ?, updated_at = ? 
                WHERE id = ?");
            $stmt->execute([
                $this->descricao,
                $this->taxa_id,
                (new DateTime())->format('Y-m-d'),
                $this->id
            ]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table 
                (descricao, taxa_id) 
                VALUES (?, ?)");
            $stmt->execute([
                $this->descricao,
                $this->taxa_id
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
        return true;
    }

    /**
     * Excluir um tipo de produto.
     * @return bool
     */
    public function delete()
    {
        $stmt = $this->pdo->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->execute([$this->id]);
        return true;
    }

    /**
     * Total de registros da tabela.
     * @return bool
     */
    public function contador()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM $this->table");
        return $stmt->fetchColumn();
    }
}
