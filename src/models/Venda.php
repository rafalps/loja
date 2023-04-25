<?php

class Venda extends Database
{
    protected $table = 'vendas';

    public int $id;
    public int $produto_id;
    public int $tipo_id;
    public string $descricao;
    public int $quantidade;
    public float $preco;
    public string $situacao;

    /**
     * Construtor da classe.
     * @param int|null $id ID de venda
     */
    public function __construct($id = null)
    {
        parent::__construct();
        if ($id) {
            $this->findById($id);
        }
    }

    /**
     * Buscar venda pelo ID.
     * @param int $id ID de venda
     * @return Venda
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $this->id = $row['id'];
        $this->produto_id = $row['produto_id'];
        $this->tipo_id = $row['tipo_id'];
        $this->descricao = $row['descricao'];
        $this->quantidade = $row['quantidade'];
        $this->preco = $row['preco'];
        $this->situacao = $row['situacao'];
        return $this;
    }

    /**
     * Listar todas as vendas.
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table");
        return $stmt->fetchAll();
    }

    /**
     * Salvar uma venda.
     * @return bool
     */
    public function save()
    {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE $this->table 
                SET produto_id = ?, tipo_id = ?, descricao = ?, quantidade = ?, preco = ?, situacao = ?, updated_at = ? 
                WHERE id = ?");
            $stmt->execute([
                $this->produto_id,
                $this->tipo_id,
                $this->descricao,
                $this->quantidade,
                $this->preco,
                $this->situacao,
                (new DateTime())->format('Y-m-d'),
                $this->id
            ]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table 
                (produto_id, tipo_id, descricao, quantidade, preco, situacao) 
                VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $this->produto_id,
                $this->tipo_id,
                $this->descricao,
                $this->quantidade,
                $this->preco,
                $this->situacao
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
        return true;
    }

    /**
     * Excluir uma venda.
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
