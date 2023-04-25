<?php

class Estoque extends Database
{
    protected $table = 'estoque';

    public int $id;
    public int $produto_id;
    public int $tipo_id;
    public int $quantidade;

    /**
     * Construtor da classe.
     * @param int|null $id ID de estoque
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if ($id) {
            $this->findById($id);
        }
    }

    /**
     * Buscar estoque pelo ID.
     * @param int $id ID de estoque
     * @return Estoque
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $this->id = $row['id'];
        $this->produto_id = $row['produto_id'];
        $this->tipo_id = $row['tipo_id'];
        $this->quantidade = $row['quantidade'];
        return $this;
    }

    /**
     * Listar todos os estoques.
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table");
        return $stmt->fetchAll();
    }

    /**
     * Salvar um estoque.
     * @return bool
     */
    public function save()
    {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE $this->table 
                SET produto_id = ?, tipo_id = ?, quantidade = ?, updated_at = ? 
                WHERE id = ?");
            $stmt->execute([
                $this->produto_id,
                $this->tipo_id,
                $this->quantidade,
                (new DateTime())->format('Y-m-d'),
                $this->id
            ]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table 
                (produto_id, tipo_id, quantidade) 
                VALUES (?, ?, ?)");
            $stmt->execute([
                $this->produto_id,
                $this->tipo_id,
                $this->quantidade
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
        return true;
    }

    /**
     * Excluir um estoque.
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
