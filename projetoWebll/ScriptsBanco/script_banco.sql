--
-- PostgreSQL database dump
--

-- Dumped from database version 10.16
-- Dumped by pg_dump version 13.2

-- Started on 2021-04-27 21:28:27

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE postgres;
--
-- TOC entry 2871 (class 1262 OID 12938)
-- Name: postgres; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';


ALTER DATABASE postgres OWNER TO postgres;

\connect postgres

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2872 (class 0 OID 0)
-- Dependencies: 2871
-- Name: DATABASE postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- TOC entry 1 (class 3079 OID 16384)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 2873 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


SET default_tablespace = '';

--
-- TOC entry 200 (class 1259 OID 16408)
-- Name: cliente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cliente (
    clienteid integer NOT NULL,
    cpf character varying(11) NOT NULL,
    telefone character varying(30),
    email character varying(50),
    cartaocredito character varying(20),
    enderecoid character varying,
    nome character varying(255) NOT NULL
);


ALTER TABLE public.cliente OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16406)
-- Name: cliente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cliente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cliente_id_seq OWNER TO postgres;

--
-- TOC entry 2874 (class 0 OID 0)
-- Dependencies: 199
-- Name: cliente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cliente_id_seq OWNED BY public.cliente.clienteid;


--
-- TOC entry 201 (class 1259 OID 16419)
-- Name: endereco; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.endereco (
    "enderecoID" character varying NOT NULL,
    rua character varying NOT NULL,
    numero character varying,
    complemento character varying,
    bairro character varying,
    cep character varying NOT NULL,
    cidade character varying NOT NULL,
    estado character varying NOT NULL
);


ALTER TABLE public.endereco OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16464)
-- Name: estoque; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.estoque (
    quantidade integer NOT NULL,
    preco double precision
);


ALTER TABLE public.estoque OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 16429)
-- Name: fornecedor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.fornecedor (
    fornecedorid integer NOT NULL,
    nome character varying(255),
    cnpj character varying,
    descricao character varying,
    telefone character varying,
    email character varying,
    enderecoid character varying
);


ALTER TABLE public.fornecedor OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16427)
-- Name: fornecedor_idFornecedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."fornecedor_idFornecedor_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."fornecedor_idFornecedor_seq" OWNER TO postgres;

--
-- TOC entry 2875 (class 0 OID 0)
-- Dependencies: 202
-- Name: fornecedor_idFornecedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."fornecedor_idFornecedor_seq" OWNED BY public.fornecedor.fornecedorid;


--
-- TOC entry 207 (class 1259 OID 16467)
-- Name: intemPedido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public."intemPedido" (
    quantidade integer,
    preco double precision
);


ALTER TABLE public."intemPedido" OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16450)
-- Name: pedido; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pedido (
    numero integer NOT NULL,
    "dataPedido" date,
    "dataEntregue" date,
    situacao character varying
);


ALTER TABLE public.pedido OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 16458)
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto (
    nome character varying,
    descricao character varying,
    foto bytea[],
    produtoid integer NOT NULL
);


ALTER TABLE public.produto OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16535)
-- Name: produto_produtoid_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.produto_produtoid_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.produto_produtoid_seq OWNER TO postgres;

--
-- TOC entry 2876 (class 0 OID 0)
-- Dependencies: 208
-- Name: produto_produtoid_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.produto_produtoid_seq OWNED BY public.produto.produtoid;


--
-- TOC entry 198 (class 1259 OID 16395)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id integer NOT NULL,
    login character varying(30) NOT NULL,
    senha character varying(255) NOT NULL,
    nome character varying(255) NOT NULL
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16393)
-- Name: usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuario_id_seq OWNER TO postgres;

--
-- TOC entry 2877 (class 0 OID 0)
-- Dependencies: 197
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 2712 (class 2604 OID 16411)
-- Name: cliente clienteid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente ALTER COLUMN clienteid SET DEFAULT nextval('public.cliente_id_seq'::regclass);


--
-- TOC entry 2713 (class 2604 OID 16432)
-- Name: fornecedor fornecedorid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor ALTER COLUMN fornecedorid SET DEFAULT nextval('public."fornecedor_idFornecedor_seq"'::regclass);


--
-- TOC entry 2714 (class 2604 OID 16537)
-- Name: produto produtoid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto ALTER COLUMN produtoid SET DEFAULT nextval('public.produto_produtoid_seq'::regclass);


--
-- TOC entry 2711 (class 2604 OID 16398)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- TOC entry 2857 (class 0 OID 16408)
-- Dependencies: 200
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (71, '342432', '432432', '', '', NULL, 'José Mario Bros ');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (9, '478569874', '54998774574', 'anac.batiista@gmail.com', '435435345', NULL, 'Jorginho de Souza');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (57, '3453543535', '342r243243', 'saa@sas.com', '', NULL, 'Felipe  Zanardi teste');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (1, '07531066947', '5499874721', 'ana@teste.com', '12345467889', '1', 'Ana Claudiaaa');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (82, '123456789', '54996442762', 'teste@teste.com', '', NULL, 'Teste Hoje');


--
-- TOC entry 2858 (class 0 OID 16419)
-- Dependencies: 201
-- Data for Name: endereco; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.endereco ("enderecoID", rua, numero, complemento, bairro, cep, cidade, estado) VALUES ('1', 'Rua dos Bobos', '123', NULL, 'Centro', '9587445', 'Caxias do Sul', 'RS');


--
-- TOC entry 2863 (class 0 OID 16464)
-- Dependencies: 206
-- Data for Name: estoque; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2860 (class 0 OID 16429)
-- Dependencies: 203
-- Data for Name: fornecedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (1, 'Fornecedor de Salgadinhos LTDA', '84.554.874/0001-54', NULL, NULL, NULL, '1');
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (5, 'Fornecedor 1', '548.874.965/0001-84', NULL, '(54) 9 5488-7458', 'fornecedor1@teste.com', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (6, 'Fornecedor 2', '532.544.435/0001-32', NULL, '(54) 9 4328-6328', 'fornecedor2@teste.com', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (7, 'Fornecedor 3', '02.603.612/0001-12', NULL, '(54) 9 6128-6472', 'fornecedor3@teste.com', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (12, 'Fornecedor 4', '', '', '', '', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (23, 'Teste', '438.791.487/0001-08', '', '', '', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (24, 'Fornecedor Hoje', '874558745844', '', '54988554785', 'teste@teste.com', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (27, 'Novo Fornecedor', '54854785455', 'Vende Latinhas', '54877458474', 'teste@teste.com', NULL);
INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (28, 'Teste Hoje', '548.557.487/0001-01', '', '54996442762', '', NULL);


--
-- TOC entry 2864 (class 0 OID 16467)
-- Dependencies: 207
-- Data for Name: intemPedido; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2861 (class 0 OID 16450)
-- Dependencies: 204
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2862 (class 0 OID 16458)
-- Dependencies: 205
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Doritos', 'doritos picante', NULL, 1);
INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Paçoquinha', 'paçoquinha de amendiom torrado', NULL, 2);
INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Bicicleta de Rodinhas', 'Com e sem rodinhas', NULL, 6);
INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Paçoquinha', 'paçoquinha de amendiom torrado', NULL, 7);
INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Pastel', 'Pastel com cana de açucar', NULL, 8);
INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Teste', 'jhj', NULL, 15);
INSERT INTO public.produto (nome, descricao, foto, produtoid) VALUES ('Jose Mario', 'V3', NULL, 16);


--
-- TOC entry 2855 (class 0 OID 16395)
-- Dependencies: 198
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario (id, login, senha, nome) VALUES (6, 'adm', 'adm', 'Admin');
INSERT INTO public.usuario (id, login, senha, nome) VALUES (7, 'hoje', 'hoje', 'Josivaldo');
INSERT INTO public.usuario (id, login, senha, nome) VALUES (8, 'postgres', 'e8a48653851e28c69d0506508fb27fc5', 'Ana Claudia Batista');


--
-- TOC entry 2878 (class 0 OID 0)
-- Dependencies: 199
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cliente_id_seq', 85, true);


--
-- TOC entry 2879 (class 0 OID 0)
-- Dependencies: 202
-- Name: fornecedor_idFornecedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."fornecedor_idFornecedor_seq"', 28, true);


--
-- TOC entry 2880 (class 0 OID 0)
-- Dependencies: 208
-- Name: produto_produtoid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.produto_produtoid_seq', 18, true);


--
-- TOC entry 2881 (class 0 OID 0)
-- Dependencies: 197
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 8, true);


--
-- TOC entry 2720 (class 2606 OID 16416)
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (clienteid);


--
-- TOC entry 2722 (class 2606 OID 16426)
-- Name: endereco endereco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.endereco
    ADD CONSTRAINT endereco_pkey PRIMARY KEY ("enderecoID");


--
-- TOC entry 2724 (class 2606 OID 16439)
-- Name: fornecedor fornecedor_cnpj_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor
    ADD CONSTRAINT fornecedor_cnpj_key UNIQUE (cnpj);


--
-- TOC entry 2726 (class 2606 OID 16437)
-- Name: fornecedor fornecedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor
    ADD CONSTRAINT fornecedor_pkey PRIMARY KEY (fornecedorid);


--
-- TOC entry 2728 (class 2606 OID 16457)
-- Name: pedido pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (numero);


--
-- TOC entry 2730 (class 2606 OID 16545)
-- Name: produto produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (produtoid);


--
-- TOC entry 2716 (class 2606 OID 16403)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- TOC entry 2718 (class 2606 OID 16405)
-- Name: usuario usuario_usuario_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_usuario_key UNIQUE (login);


--
-- TOC entry 2731 (class 2606 OID 16445)
-- Name: cliente cliente_enderecoID_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT "cliente_enderecoID_fkey" FOREIGN KEY (enderecoid) REFERENCES public.endereco("enderecoID") NOT VALID;


--
-- TOC entry 2732 (class 2606 OID 16440)
-- Name: fornecedor fornecedor_enderecoID_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor
    ADD CONSTRAINT "fornecedor_enderecoID_fkey" FOREIGN KEY (enderecoid) REFERENCES public.endereco("enderecoID");


-- Completed on 2021-04-27 21:28:29

--
-- PostgreSQL database dump complete
--

