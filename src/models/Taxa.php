<?php

class Taxa extends Database
{
    protected $table = 'taxas';

    public int $id = 0;
    public string $descricao;
    public float $taxa;

    /**
     * Construtor da classe.
     * @param int|null $id ID de taxa
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
        $this->taxa = $row['taxa'];
    }

    /**
     * Buscar taxa pelo ID.
     * @param int $id ID de taxa
     * @return Taxa
     */
    public function findById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        $this->id = $row['id'];
        $this->descricao = $row['descricao'];
        $this->taxa = $row['taxa'];
        return $this;
    }

    /**
     * Listar todas as taxas.
     * @return array
     */
    public function findAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM $this->table ORDER BY descricao");
        return $stmt->fetchAll();
    }

    /**
     * Salvar uma taxa.
     * @return bool
     */
    public function save()
    {
        if ($this->id) {
            $stmt = $this->pdo->prepare("UPDATE $this->table 
                SET descricao = ?, taxa = ?, updated_at = ? 
                WHERE id = ?");
            $stmt->execute([
                $this->descricao,
                $this->taxa,
                (new DateTime())->format('Y-m-d'),
                $this->id
            ]);
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO $this->table 
                (descricao, taxa) 
                VALUES (?, ?)");
            $stmt->execute([
                $this->descricao,
                $this->taxa
            ]);
            $this->id = $this->pdo->lastInsertId();
        }
        return true;
    }

    /**
     * Excluir uma taxa.
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
