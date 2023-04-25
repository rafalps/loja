CREATE TABLE IF NOT EXISTS taxas (
  id SERIAL PRIMARY KEY,
  descricao TEXT NOT NULL,
  taxa NUMERIC(5,2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS tipos_produtos (
  id SERIAL PRIMARY KEY,
  descricao TEXT NOT NULL,
  taxa_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (taxa_id) REFERENCES taxas (id)
);

CREATE TABLE IF NOT EXISTS produtos (
  id SERIAL PRIMARY KEY,
  nome TEXT NOT NULL,
  descricao TEXT NOT NULL,
  preco NUMERIC(10,2) NOT NULL,
  tipo_id INT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (tipo_id) REFERENCES tipos_produtos (id)
);

CREATE TABLE IF NOT EXISTS estoque (
  id SERIAL PRIMARY KEY,
  produto_id INT NOT NULL,
  tipo_id INT NOT NULL,
  quantidade INT NOT NULL,
  FOREIGN KEY (produto_id) REFERENCES produtos (id),
  FOREIGN KEY (tipo_id) REFERENCES tipos_produtos (id)
);

CREATE TABLE IF NOT EXISTS vendas (
  id SERIAL PRIMARY KEY,
  produto_id INT NOT NULL,
  tipo_id INT NOT NULL,
  descricao TEXT NOT NULL,
  quantidade INT NOT NULL,
  preco NUMERIC(10, 2) NOT NULL,
  FOREIGN KEY (produto_id) REFERENCES produtos (id),
  FOREIGN KEY (tipo_id) REFERENCES tipos_produtos (id)
);