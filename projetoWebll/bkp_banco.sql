--
-- PostgreSQL database dump
--

-- Dumped from database version 10.16
-- Dumped by pg_dump version 13.2

-- Started on 2021-04-26 13:11:03

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
-- TOC entry 1 (class 3079 OID 16384)
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- TOC entry 2869 (class 0 OID 0)
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
    telefone character varying(12),
    email character varying(30),
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
-- TOC entry 2870 (class 0 OID 0)
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
    nome character varying NOT NULL,
    cnpj character varying NOT NULL,
    descricao character varying,
    telefone character varying,
    email character varying,
    enderecoid character varying NOT NULL
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
-- TOC entry 2871 (class 0 OID 0)
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
    foto bytea[]
);


ALTER TABLE public.produto OWNER TO postgres;

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
-- TOC entry 2872 (class 0 OID 0)
-- Dependencies: 197
-- Name: usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_seq OWNED BY public.usuario.id;


--
-- TOC entry 2710 (class 2604 OID 16411)
-- Name: cliente clienteid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente ALTER COLUMN clienteid SET DEFAULT nextval('public.cliente_id_seq'::regclass);


--
-- TOC entry 2711 (class 2604 OID 16432)
-- Name: fornecedor fornecedorid; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor ALTER COLUMN fornecedorid SET DEFAULT nextval('public."fornecedor_idFornecedor_seq"'::regclass);


--
-- TOC entry 2709 (class 2604 OID 16398)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.usuario_id_seq'::regclass);


--
-- TOC entry 2856 (class 0 OID 16408)
-- Dependencies: 200
-- Data for Name: cliente; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (1, '07531066947', '5499877468', 'ana@teste.com', '12345467889', '1', 'Ana Teste');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (5, '95010-002', '54996442762', 'anac.batiista@gmail.com', '153453', NULL, 'ANA CLAUDIA BATISTA DA SILVA');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (9, '', '4566778890', 'jorginho@testando.com', '435435345', NULL, 'Jorginho da SIlva');
INSERT INTO public.cliente (clienteid, cpf, telefone, email, cartaocredito, enderecoid, nome) VALUES (23, '2123132', '12122', 'teste@teste.com', '12123', NULL, 'felipe');


--
-- TOC entry 2857 (class 0 OID 16419)
-- Dependencies: 201
-- Data for Name: endereco; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.endereco ("enderecoID", rua, numero, complemento, bairro, cep, cidade, estado) VALUES ('1', 'Rua dos Bobos', '123', NULL, 'Centro', '9587445', 'Caxias do Sul', 'RS');


--
-- TOC entry 2862 (class 0 OID 16464)
-- Dependencies: 206
-- Data for Name: estoque; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2859 (class 0 OID 16429)
-- Dependencies: 203
-- Data for Name: fornecedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.fornecedor (fornecedorid, nome, cnpj, descricao, telefone, email, enderecoid) VALUES (1, 'Fornecedor de Salgadinhos', '84.554.874/0001/01', 'Vende Doritos', '54998877458', 'salgadinhos@top.com', '1');


--
-- TOC entry 2863 (class 0 OID 16467)
-- Dependencies: 207
-- Data for Name: intemPedido; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2860 (class 0 OID 16450)
-- Dependencies: 204
-- Data for Name: pedido; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2861 (class 0 OID 16458)
-- Dependencies: 205
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2854 (class 0 OID 16395)
-- Dependencies: 198
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.usuario (id, login, senha, nome) VALUES (6, 'adm', 'adm', 'Admin');
INSERT INTO public.usuario (id, login, senha, nome) VALUES (7, 'hoje', 'hoje', 'Josivaldo');
INSERT INTO public.usuario (id, login, senha, nome) VALUES (8, 'postgres', 'e8a48653851e28c69d0506508fb27fc5', 'Ana Claudia Batista');


--
-- TOC entry 2873 (class 0 OID 0)
-- Dependencies: 199
-- Name: cliente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cliente_id_seq', 45, true);


--
-- TOC entry 2874 (class 0 OID 0)
-- Dependencies: 202
-- Name: fornecedor_idFornecedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."fornecedor_idFornecedor_seq"', 1, false);


--
-- TOC entry 2875 (class 0 OID 0)
-- Dependencies: 197
-- Name: usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_seq', 8, true);


--
-- TOC entry 2717 (class 2606 OID 16482)
-- Name: cliente cliente_cpf_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_cpf_key UNIQUE (cpf);


--
-- TOC entry 2719 (class 2606 OID 16502)
-- Name: cliente cliente_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_email_key UNIQUE (email);


--
-- TOC entry 2721 (class 2606 OID 16416)
-- Name: cliente cliente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (clienteid);


--
-- TOC entry 2723 (class 2606 OID 16426)
-- Name: endereco endereco_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.endereco
    ADD CONSTRAINT endereco_pkey PRIMARY KEY ("enderecoID");


--
-- TOC entry 2725 (class 2606 OID 16439)
-- Name: fornecedor fornecedor_cnpj_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor
    ADD CONSTRAINT fornecedor_cnpj_key UNIQUE (cnpj);


--
-- TOC entry 2727 (class 2606 OID 16437)
-- Name: fornecedor fornecedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor
    ADD CONSTRAINT fornecedor_pkey PRIMARY KEY (fornecedorid);


--
-- TOC entry 2729 (class 2606 OID 16457)
-- Name: pedido pedido_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pedido
    ADD CONSTRAINT pedido_pkey PRIMARY KEY (numero);


--
-- TOC entry 2713 (class 2606 OID 16403)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- TOC entry 2715 (class 2606 OID 16405)
-- Name: usuario usuario_usuario_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_usuario_key UNIQUE (login);


--
-- TOC entry 2730 (class 2606 OID 16445)
-- Name: cliente cliente_enderecoID_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT "cliente_enderecoID_fkey" FOREIGN KEY (enderecoid) REFERENCES public.endereco("enderecoID") NOT VALID;


--
-- TOC entry 2731 (class 2606 OID 16440)
-- Name: fornecedor fornecedor_enderecoID_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.fornecedor
    ADD CONSTRAINT "fornecedor_enderecoID_fkey" FOREIGN KEY (enderecoid) REFERENCES public.endereco("enderecoID");


-- Completed on 2021-04-26 13:11:04

--
-- PostgreSQL database dump complete
--

