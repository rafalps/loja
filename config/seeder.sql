INSERT INTO taxas (descricao, taxa) VALUES ('Taxa 1', 10.00);

INSERT INTO tipos_produtos (descricao, taxa_id) VALUES ('Tipo Produto 1', 1);

INSERT INTO produtos (nome, descricao, preco, tipo_id) VALUES ('Produto 1', 'Produto 1', 100.00, 1);

INSERT INTO estoque (produto_id, tipo_id, quantidade) VALUES (1, 1, 10);

INSERT INTO vendas (produto_id, tipo_id, descricao, quantidade, preco) VALUES (1, 1, 'Venda Produto 1', 5, 100.00);