<?php

class Produto extends Database
{
    protected $table = 'produtos';

    public int $id = 0;
    public string $nome;
    public string $descricao;
    public float $preco;
    public int $tipo_id;

    /**
     * Construtor da classe.
     * @param int|null $id ID do Produto
     */
    public function __construct(?int $id = null)
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
        $this->nome = $row['nome'];
        $this->descricao = $row['descricao'];
        $this->preco = $row['preco'];
        $this->tipo_id = $row['tipo_id'];
    }

    /**
     * Buscar produto pelo ID.
     * @param int $id ID do produto
     * @return Produto
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $this->id = $row['id'];
        $this->nome = $row['nome'];
        $this->descricao = $row['descricao'];
        $this->preco = $row['preco'];
        $this->tipo_id = $row['tipo_id'];
        return $this;
    }

    /**
     * Listar todos os produtos.
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table ORDER BY nome");
        return $stmt->fetchAll();
    }

    /**
     * Salvar um produto.
     * @return bool
     */
    public function save()
    {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE $this->table 
                SET nome = ?, descricao = ?, preco = ?, tipo_id = ? 
                WHERE id = ?");
            $stmt->execute([
                $this->nome,
                $this->descricao,
                $this->preco,
                $this->tipo_id,
                $this->id
            ]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table 
                (nome, descricao, preco, tipo_id) 
                VALUES (?, ?, ?, ?)");
            $stmt->execute([
                $this->nome,
                $this->descricao,
                $this->preco,
                $this->tipo_id
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
        return true;
    }

    /**
     * Excluir um produto.
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
