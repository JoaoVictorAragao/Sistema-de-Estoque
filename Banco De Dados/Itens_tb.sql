use users;

create table itens_tb(
	id INT AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(255),
    DESCRICAO VARCHAR(255),
    QUANTIDADE INT,
    Categoria INT,
    FOREIGN KEY (Categoria) REFERENCES categorias_tb(id),
    FOTO BLOB
);

select * from itens_tb;

select itens_tb.id, itens_tb.NOME, categorias_tb.NOME AS Categoria, itens_tb.DESCRICAO, itens_tb.QUANTIDADE
FROM itens_tb
INNER JOIN categorias_tb ON itens_tb.Categoria = categorias_tb.ID;