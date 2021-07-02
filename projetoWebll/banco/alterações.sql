ALTER TABLE public.estoque ADD produtoid int4 NULL;
ALTER TABLE public.estoque ADD CONSTRAINT estoque_fk FOREIGN KEY (produtoid) REFERENCES public.produto(produtoid);
ALTER TABLE public.produto DROP COLUMN foto;

ALTER TABLE public.produto
    ADD COLUMN foto bytea;

ALTER TABLE public."intemPedido" RENAME TO "itemPedido";

ALTER TABLE public."itemPedido" ADD pedidoid int NOT NULL;
ALTER TABLE public."itemPedido" ADD CONSTRAINT itempedido_fk FOREIGN KEY (pedidoid) REFERENCES public.pedido(numero);

ALTER TABLE public."itemPedido" ADD produtoid int4 NOT NULL;
ALTER TABLE public."itemPedido" ADD CONSTRAINT itempedido_fk FOREIGN KEY (produtoid) REFERENCES public.produto(produtoid);

ALTER TABLE public.cliente ADD usuarioid int4 NULL;
ALTER TABLE public.cliente ADD CONSTRAINT cliente_fk FOREIGN KEY (usuarioid) REFERENCES public.usuario(id);


