PGDMP         	                z            cabin    14.3    14.3 m    ?           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            ?           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            ?           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ?           1262    16394    cabin    DATABASE     a   CREATE DATABASE cabin WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE cabin;
                postgres    false            ?            1259    16395    administrador    TABLE     ?   CREATE TABLE public.administrador (
    id_adm integer NOT NULL,
    usuario character varying(16),
    contrasena character varying(16)
);
 !   DROP TABLE public.administrador;
       public         heap    postgres    false            ?            1259    16398    administrador_id_adm_seq    SEQUENCE     ?   CREATE SEQUENCE public.administrador_id_adm_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.administrador_id_adm_seq;
       public          postgres    false    209            ?           0    0    administrador_id_adm_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.administrador_id_adm_seq OWNED BY public.administrador.id_adm;
          public          postgres    false    210            ?            1259    16531    banco    TABLE     _   CREATE TABLE public.banco (
    id_banco integer NOT NULL,
    nombre character varying(16)
);
    DROP TABLE public.banco;
       public         heap    postgres    false            ?            1259    16530    banco_id_banco_seq    SEQUENCE     ?   CREATE SEQUENCE public.banco_id_banco_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.banco_id_banco_seq;
       public          postgres    false    235            ?           0    0    banco_id_banco_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.banco_id_banco_seq OWNED BY public.banco.id_banco;
          public          postgres    false    234            ?            1259    16399    cabin    TABLE     I  CREATE TABLE public.cabin (
    id_cabin integer NOT NULL,
    nombre character varying(60),
    cuartos integer,
    tematica character varying(60),
    descripcion character varying(1000),
    id_fabricante integer,
    id_categoria integer,
    precio integer,
    id_ubicacion integer,
    url_img character varying(5000)
);
    DROP TABLE public.cabin;
       public         heap    postgres    false            ?            1259    16404    cabin_id_cabin_seq    SEQUENCE     ?   CREATE SEQUENCE public.cabin_id_cabin_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.cabin_id_cabin_seq;
       public          postgres    false    211            ?           0    0    cabin_id_cabin_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.cabin_id_cabin_seq OWNED BY public.cabin.id_cabin;
          public          postgres    false    212            ?            1259    16543 
   categorias    TABLE     h   CREATE TABLE public.categorias (
    id_categoria integer NOT NULL,
    nombre character varying(16)
);
    DROP TABLE public.categorias;
       public         heap    postgres    false            ?            1259    16409 
   fabricante    TABLE     ?   CREATE TABLE public.fabricante (
    id_fabricante integer NOT NULL,
    nit character varying(16),
    nombre character varying(60)
);
    DROP TABLE public.fabricante;
       public         heap    postgres    false            ?            1259    16555 	   ubicacion    TABLE     ?   CREATE TABLE public.ubicacion (
    id_ubicacion integer NOT NULL,
    nombre character varying(16),
    departamento character varying(16),
    cuidad character varying(16),
    direccion character varying(100)
);
    DROP TABLE public.ubicacion;
       public         heap    postgres    false            ?            1259    16566    cabint    VIEW     ?  CREATE VIEW public.cabint AS
 SELECT c.id_cabin,
    c.nombre,
    c.cuartos,
    c.tematica,
    c.descripcion,
    f.nombre AS fabricante,
    ca.nombre AS categoria,
    c.precio,
    u.nombre AS ubicacion,
    c.url_img
   FROM (((public.cabin c
     JOIN public.fabricante f ON ((f.id_fabricante = c.id_fabricante)))
     JOIN public.categorias ca ON ((ca.id_categoria = c.id_categoria)))
     JOIN public.ubicacion u ON ((u.id_ubicacion = c.id_ubicacion)));
    DROP VIEW public.cabint;
       public          postgres    false    211    211    211    211    211    211    211    211    211    211    215    215    237    237    239    239            ?            1259    16542    categorias_id_categoria_seq    SEQUENCE     ?   CREATE SEQUENCE public.categorias_id_categoria_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.categorias_id_categoria_seq;
       public          postgres    false    237            ?           0    0    categorias_id_categoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.categorias_id_categoria_seq OWNED BY public.categorias.id_categoria;
          public          postgres    false    236            ?            1259    16405    cliente    TABLE     ?   CREATE TABLE public.cliente (
    id_cliente integer NOT NULL,
    nombre character varying(60),
    apellido character varying(60),
    correo character varying(60),
    usuario character varying(16),
    contrasena character varying(16)
);
    DROP TABLE public.cliente;
       public         heap    postgres    false            ?            1259    16408    cliente_id_cliente_seq    SEQUENCE     ?   CREATE SEQUENCE public.cliente_id_cliente_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.cliente_id_cliente_seq;
       public          postgres    false    213            ?           0    0    cliente_id_cliente_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.cliente_id_cliente_seq OWNED BY public.cliente.id_cliente;
          public          postgres    false    214            ?            1259    16412    fabricante_id_fabricante_seq    SEQUENCE     ?   CREATE SEQUENCE public.fabricante_id_fabricante_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public.fabricante_id_fabricante_seq;
       public          postgres    false    215            ?           0    0    fabricante_id_fabricante_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE public.fabricante_id_fabricante_seq OWNED BY public.fabricante.id_fabricante;
          public          postgres    false    216            ?            1259    16413    factura    TABLE     ?   CREATE TABLE public.factura (
    id_factura integer NOT NULL,
    fecha_factura date,
    estado_pago boolean,
    id_reserva integer
);
    DROP TABLE public.factura;
       public         heap    postgres    false            ?            1259    16416    factura_id_factura_seq    SEQUENCE     ?   CREATE SEQUENCE public.factura_id_factura_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.factura_id_factura_seq;
       public          postgres    false    217            ?           0    0    factura_id_factura_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.factura_id_factura_seq OWNED BY public.factura.id_factura;
          public          postgres    false    218            ?            1259    16417    informacion_pago    TABLE     ?   CREATE TABLE public.informacion_pago (
    id_informacion integer NOT NULL,
    id_cliente integer,
    id_metp integer,
    id_banco integer,
    ncuenta character varying(16)
);
 $   DROP TABLE public.informacion_pago;
       public         heap    postgres    false            ?            1259    16420 #   informacion_pago_id_informacion_seq    SEQUENCE     ?   CREATE SEQUENCE public.informacion_pago_id_informacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public.informacion_pago_id_informacion_seq;
       public          postgres    false    219            ?           0    0 #   informacion_pago_id_informacion_seq    SEQUENCE OWNED BY     k   ALTER SEQUENCE public.informacion_pago_id_informacion_seq OWNED BY public.informacion_pago.id_informacion;
          public          postgres    false    220            ?            1259    16421    metodo_de_pago    TABLE     g   CREATE TABLE public.metodo_de_pago (
    id_metp integer NOT NULL,
    nombre character varying(16)
);
 "   DROP TABLE public.metodo_de_pago;
       public         heap    postgres    false            ?            1259    16424    metodo_de_pago_id_metp_seq    SEQUENCE     ?   CREATE SEQUENCE public.metodo_de_pago_id_metp_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.metodo_de_pago_id_metp_seq;
       public          postgres    false    221            ?           0    0    metodo_de_pago_id_metp_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.metodo_de_pago_id_metp_seq OWNED BY public.metodo_de_pago.id_metp;
          public          postgres    false    222            ?            1259    16571    metodos_cliente    VIEW     n  CREATE VIEW public.metodos_cliente AS
 SELECT cl.nombre,
    me.nombre AS metodo_de_pago,
    ba.nombre AS banco,
    inf.ncuenta
   FROM (((public.informacion_pago inf
     JOIN public.metodo_de_pago me ON ((me.id_metp = inf.id_metp)))
     JOIN public.cliente cl ON ((cl.id_cliente = inf.id_cliente)))
     JOIN public.banco ba ON ((ba.id_banco = inf.id_banco)));
 "   DROP VIEW public.metodos_cliente;
       public          postgres    false    219    219    219    219    221    221    235    235    213    213            ?            1259    16425    reservas    TABLE     ?   CREATE TABLE public.reservas (
    id_reserva integer NOT NULL,
    fecha_ini date,
    fecha_fin date,
    id_cliente integer,
    id_cabin integer,
    id_informacion integer
);
    DROP TABLE public.reservas;
       public         heap    postgres    false            ?            1259    16428    reservas_id_reserva_seq    SEQUENCE     ?   CREATE SEQUENCE public.reservas_id_reserva_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public.reservas_id_reserva_seq;
       public          postgres    false    223            ?           0    0    reservas_id_reserva_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public.reservas_id_reserva_seq OWNED BY public.reservas.id_reserva;
          public          postgres    false    224            ?            1259    16554    ubicacion_id_ubicacion_seq    SEQUENCE     ?   CREATE SEQUENCE public.ubicacion_id_ubicacion_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.ubicacion_id_ubicacion_seq;
       public          postgres    false    239            ?           0    0    ubicacion_id_ubicacion_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.ubicacion_id_ubicacion_seq OWNED BY public.ubicacion.id_ubicacion;
          public          postgres    false    238            ?            1259    16429    vista1    VIEW     ?   CREATE VIEW public.vista1 AS
SELECT
    NULL::integer AS id_cliente,
    NULL::character varying(60) AS nombre,
    NULL::character varying(60) AS apellido,
    NULL::bigint AS count;
    DROP VIEW public.vista1;
       public          postgres    false            ?            1259    16433    vista10    VIEW     ?   CREATE VIEW public.vista10 AS
 SELECT ca.id_cabin,
    ca.nombre,
    ca.tematica,
    ca.descripcion
   FROM public.cabin ca
  WHERE ((ca.tematica)::text = 'Mexico'::text);
    DROP VIEW public.vista10;
       public          postgres    false    211    211    211    211            ?            1259    16575    vista11    VIEW       CREATE VIEW public.vista11 AS
 SELECT r.fecha_ini,
    r.fecha_fin,
    c.nombre,
    ca.nombre AS "cabaña",
    mtp.nombre AS metodo_pago,
    b.nombre AS banco
   FROM (((((public.reservas r
     JOIN public.cliente c ON ((c.id_cliente = r.id_cliente)))
     JOIN public.cabin ca ON ((ca.id_cabin = r.id_cabin)))
     JOIN public.informacion_pago inf ON ((inf.id_informacion = r.id_informacion)))
     JOIN public.metodo_de_pago mtp ON ((mtp.id_metp = inf.id_metp)))
     JOIN public.banco b ON ((b.id_banco = inf.id_banco)));
    DROP VIEW public.vista11;
       public          postgres    false    211    219    221    221    223    223    223    223    223    235    235    219    219    213    213    211            ?            1259    16580    vista12    VIEW       CREATE VIEW public.vista12 AS
 SELECT r.fecha_ini,
    r.fecha_fin,
    c.nombre,
    ca.nombre AS "cabaña",
    mtp.nombre AS metodo_pago,
    b.nombre AS banco,
    fa.estado_pago,
        CASE fa.estado_pago
            WHEN true THEN 'PAGO'::text
            WHEN false THEN 'NO PAGO'::text
            ELSE NULL::text
        END AS "case"
   FROM ((((((public.reservas r
     JOIN public.cliente c ON ((c.id_cliente = r.id_cliente)))
     JOIN public.cabin ca ON ((ca.id_cabin = r.id_cabin)))
     JOIN public.informacion_pago inf ON ((inf.id_informacion = r.id_informacion)))
     JOIN public.metodo_de_pago mtp ON ((mtp.id_metp = inf.id_metp)))
     JOIN public.banco b ON ((b.id_banco = inf.id_banco)))
     JOIN public.factura fa ON ((fa.id_reserva = r.id_reserva)));
    DROP VIEW public.vista12;
       public          postgres    false    217    211    211    213    213    217    219    219    235    235    223    223    223    223    223    223    221    221    219            ?            1259    16585    vista13    VIEW     ?  CREATE VIEW public.vista13 AS
 SELECT r.fecha_ini,
    r.fecha_fin,
    c.nombre,
    ca.nombre AS "cabaña",
    mtp.nombre AS metodo_pago,
    b.nombre AS banco,
        CASE fa.estado_pago
            WHEN true THEN 'PAGO'::text
            WHEN false THEN 'NO PAGO'::text
            ELSE NULL::text
        END AS estado_pago
   FROM ((((((public.reservas r
     JOIN public.cliente c ON ((c.id_cliente = r.id_cliente)))
     JOIN public.cabin ca ON ((ca.id_cabin = r.id_cabin)))
     JOIN public.informacion_pago inf ON ((inf.id_informacion = r.id_informacion)))
     JOIN public.metodo_de_pago mtp ON ((mtp.id_metp = inf.id_metp)))
     JOIN public.banco b ON ((b.id_banco = inf.id_banco)))
     JOIN public.factura fa ON ((fa.id_reserva = r.id_reserva)));
    DROP VIEW public.vista13;
       public          postgres    false    219    213    221    217    221    217    223    223    223    219    219    211    223    223    211    223    235    235    213            ?            1259    16590    vista14    VIEW       CREATE VIEW public.vista14 AS
 SELECT r.fecha_ini,
    r.fecha_fin,
    c.nombre,
    ca.nombre AS "cabaña",
    mtp.nombre AS metodo_pago,
    b.nombre AS banco,
    fa.id_factura,
        CASE fa.estado_pago
            WHEN true THEN 'PAGO'::text
            WHEN false THEN 'NO PAGO'::text
            ELSE NULL::text
        END AS estado_pago
   FROM ((((((public.reservas r
     JOIN public.cliente c ON ((c.id_cliente = r.id_cliente)))
     JOIN public.cabin ca ON ((ca.id_cabin = r.id_cabin)))
     JOIN public.informacion_pago inf ON ((inf.id_informacion = r.id_informacion)))
     JOIN public.metodo_de_pago mtp ON ((mtp.id_metp = inf.id_metp)))
     JOIN public.banco b ON ((b.id_banco = inf.id_banco)))
     JOIN public.factura fa ON ((fa.id_reserva = r.id_reserva)));
    DROP VIEW public.vista14;
       public          postgres    false    223    213    213    223    223    223    223    221    217    221    219    219    219    217    217    223    235    235    211    211            ?            1259    16595    vista15    VIEW     9  CREATE VIEW public.vista15 AS
 SELECT r.id_reserva,
    r.fecha_ini,
    r.fecha_fin,
    c.nombre,
    ca.nombre AS "cabaña",
    mtp.nombre AS metodo_pago,
    b.nombre AS banco,
    fa.id_factura,
        CASE fa.estado_pago
            WHEN true THEN 'PAGO'::text
            WHEN false THEN 'NO PAGO'::text
            ELSE NULL::text
        END AS estado_pago
   FROM ((((((public.reservas r
     JOIN public.cliente c ON ((c.id_cliente = r.id_cliente)))
     JOIN public.cabin ca ON ((ca.id_cabin = r.id_cabin)))
     JOIN public.informacion_pago inf ON ((inf.id_informacion = r.id_informacion)))
     JOIN public.metodo_de_pago mtp ON ((mtp.id_metp = inf.id_metp)))
     JOIN public.banco b ON ((b.id_banco = inf.id_banco)))
     JOIN public.factura fa ON ((fa.id_reserva = r.id_reserva)))
  ORDER BY r.id_reserva;
    DROP VIEW public.vista15;
       public          postgres    false    223    219    219    221    221    223    223    223    223    223    235    235    219    217    217    217    213    213    211    211            ?            1259    16437    vista2    VIEW     ?   CREATE VIEW public.vista2 AS
SELECT
    NULL::integer AS id_cliente,
    NULL::character varying(60) AS nombre,
    NULL::character varying(60) AS apellido,
    NULL::integer AS id_reserva,
    NULL::text AS estado_de_pago;
    DROP VIEW public.vista2;
       public          postgres    false            ?            1259    16441    vista3    VIEW       CREATE VIEW public.vista3 AS
 SELECT c.id_cliente,
    c.nombre,
    c.apellido,
    ca.nombre AS "cabaña",
    ca.descripcion
   FROM ((public.cliente c
     JOIN public.reservas r ON ((c.id_cliente = r.id_cliente)))
     JOIN public.cabin ca ON ((ca.id_cabin = r.id_cabin)));
    DROP VIEW public.vista3;
       public          postgres    false    223    223    213    213    213    211    211    211            ?            1259    16449    vista5    VIEW     ?   CREATE VIEW public.vista5 AS
 SELECT c.id_cliente,
    c.nombre,
    c.apellido,
    c.usuario,
    c.contrasena
   FROM public.cliente c
  WHERE ((c.nombre)::text ~~ '%Ma%'::text);
    DROP VIEW public.vista5;
       public          postgres    false    213    213    213    213    213            ?            1259    16453    vista6    VIEW     ?   CREATE VIEW public.vista6 AS
 SELECT c.id_cliente,
    c.nombre,
    adm.usuario,
    adm.contrasena
   FROM (public.cliente c
     JOIN public.administrador adm ON (((adm.usuario)::text = (c.usuario)::text)));
    DROP VIEW public.vista6;
       public          postgres    false    213    209    209    213    213            ?            1259    16457    vista7    VIEW     ?   CREATE VIEW public.vista7 AS
 SELECT c.id_cliente,
    c.nombre,
    c.apellido,
    c.correo
   FROM public.cliente c
  WHERE (NOT (c.id_cliente IN ( SELECT r.id_cliente
           FROM public.reservas r)));
    DROP VIEW public.vista7;
       public          postgres    false    213    223    213    213    213            ?            1259    16461    vista8    VIEW     ?   CREATE VIEW public.vista8 AS
 SELECT ca.id_cabin,
    ca.nombre,
    ca.cuartos,
    ca.descripcion
   FROM public.cabin ca
  WHERE (NOT (ca.id_cabin IN ( SELECT r.id_cabin
           FROM public.reservas r)));
    DROP VIEW public.vista8;
       public          postgres    false    211    223    211    211    211            ?            1259    16465    vista9    VIEW       CREATE VIEW public.vista9 AS
 SELECT c.id_cliente,
    c.nombre,
    c.apellido,
    c.correo,
        CASE
            WHEN (f.estado_pago = true) THEN 'Pago al dia'::text
            ELSE 'No esta al dia'::text
        END AS estado_de_pago
   FROM ((public.factura f
     JOIN public.reservas r ON ((r.id_reserva = f.id_reserva)))
     JOIN public.cliente c ON ((c.id_cliente = r.id_cliente)))
  WHERE ((f.fecha_factura >= '2022-01-01'::date) AND (f.fecha_factura <= '2022-04-30'::date) AND (f.estado_pago = true));
    DROP VIEW public.vista9;
       public          postgres    false    217    223    213    213    213    213    217    217    223            ?           2604    16470    administrador id_adm    DEFAULT     |   ALTER TABLE ONLY public.administrador ALTER COLUMN id_adm SET DEFAULT nextval('public.administrador_id_adm_seq'::regclass);
 C   ALTER TABLE public.administrador ALTER COLUMN id_adm DROP DEFAULT;
       public          postgres    false    210    209            ?           2604    16534    banco id_banco    DEFAULT     p   ALTER TABLE ONLY public.banco ALTER COLUMN id_banco SET DEFAULT nextval('public.banco_id_banco_seq'::regclass);
 =   ALTER TABLE public.banco ALTER COLUMN id_banco DROP DEFAULT;
       public          postgres    false    235    234    235            ?           2604    16471    cabin id_cabin    DEFAULT     p   ALTER TABLE ONLY public.cabin ALTER COLUMN id_cabin SET DEFAULT nextval('public.cabin_id_cabin_seq'::regclass);
 =   ALTER TABLE public.cabin ALTER COLUMN id_cabin DROP DEFAULT;
       public          postgres    false    212    211            ?           2604    16546    categorias id_categoria    DEFAULT     ?   ALTER TABLE ONLY public.categorias ALTER COLUMN id_categoria SET DEFAULT nextval('public.categorias_id_categoria_seq'::regclass);
 F   ALTER TABLE public.categorias ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    236    237    237            ?           2604    16472    cliente id_cliente    DEFAULT     x   ALTER TABLE ONLY public.cliente ALTER COLUMN id_cliente SET DEFAULT nextval('public.cliente_id_cliente_seq'::regclass);
 A   ALTER TABLE public.cliente ALTER COLUMN id_cliente DROP DEFAULT;
       public          postgres    false    214    213            ?           2604    16473    fabricante id_fabricante    DEFAULT     ?   ALTER TABLE ONLY public.fabricante ALTER COLUMN id_fabricante SET DEFAULT nextval('public.fabricante_id_fabricante_seq'::regclass);
 G   ALTER TABLE public.fabricante ALTER COLUMN id_fabricante DROP DEFAULT;
       public          postgres    false    216    215            ?           2604    16474    factura id_factura    DEFAULT     x   ALTER TABLE ONLY public.factura ALTER COLUMN id_factura SET DEFAULT nextval('public.factura_id_factura_seq'::regclass);
 A   ALTER TABLE public.factura ALTER COLUMN id_factura DROP DEFAULT;
       public          postgres    false    218    217            ?           2604    16475    informacion_pago id_informacion    DEFAULT     ?   ALTER TABLE ONLY public.informacion_pago ALTER COLUMN id_informacion SET DEFAULT nextval('public.informacion_pago_id_informacion_seq'::regclass);
 N   ALTER TABLE public.informacion_pago ALTER COLUMN id_informacion DROP DEFAULT;
       public          postgres    false    220    219            ?           2604    16476    metodo_de_pago id_metp    DEFAULT     ?   ALTER TABLE ONLY public.metodo_de_pago ALTER COLUMN id_metp SET DEFAULT nextval('public.metodo_de_pago_id_metp_seq'::regclass);
 E   ALTER TABLE public.metodo_de_pago ALTER COLUMN id_metp DROP DEFAULT;
       public          postgres    false    222    221            ?           2604    16477    reservas id_reserva    DEFAULT     z   ALTER TABLE ONLY public.reservas ALTER COLUMN id_reserva SET DEFAULT nextval('public.reservas_id_reserva_seq'::regclass);
 B   ALTER TABLE public.reservas ALTER COLUMN id_reserva DROP DEFAULT;
       public          postgres    false    224    223            ?           2604    16558    ubicacion id_ubicacion    DEFAULT     ?   ALTER TABLE ONLY public.ubicacion ALTER COLUMN id_ubicacion SET DEFAULT nextval('public.ubicacion_id_ubicacion_seq'::regclass);
 E   ALTER TABLE public.ubicacion ALTER COLUMN id_ubicacion DROP DEFAULT;
       public          postgres    false    238    239    239            ?          0    16395    administrador 
   TABLE DATA           D   COPY public.administrador (id_adm, usuario, contrasena) FROM stdin;
    public          postgres    false    209   ??       ?          0    16531    banco 
   TABLE DATA           1   COPY public.banco (id_banco, nombre) FROM stdin;
    public          postgres    false    235   r?       ?          0    16399    cabin 
   TABLE DATA           ?   COPY public.cabin (id_cabin, nombre, cuartos, tematica, descripcion, id_fabricante, id_categoria, precio, id_ubicacion, url_img) FROM stdin;
    public          postgres    false    211   ??       ?          0    16543 
   categorias 
   TABLE DATA           :   COPY public.categorias (id_categoria, nombre) FROM stdin;
    public          postgres    false    237   ;?       ?          0    16405    cliente 
   TABLE DATA           \   COPY public.cliente (id_cliente, nombre, apellido, correo, usuario, contrasena) FROM stdin;
    public          postgres    false    213   d?       ?          0    16409 
   fabricante 
   TABLE DATA           @   COPY public.fabricante (id_fabricante, nit, nombre) FROM stdin;
    public          postgres    false    215   ??       ?          0    16413    factura 
   TABLE DATA           U   COPY public.factura (id_factura, fecha_factura, estado_pago, id_reserva) FROM stdin;
    public          postgres    false    217   ??       ?          0    16417    informacion_pago 
   TABLE DATA           b   COPY public.informacion_pago (id_informacion, id_cliente, id_metp, id_banco, ncuenta) FROM stdin;
    public          postgres    false    219   ??       ?          0    16421    metodo_de_pago 
   TABLE DATA           9   COPY public.metodo_de_pago (id_metp, nombre) FROM stdin;
    public          postgres    false    221   U?       ?          0    16425    reservas 
   TABLE DATA           j   COPY public.reservas (id_reserva, fecha_ini, fecha_fin, id_cliente, id_cabin, id_informacion) FROM stdin;
    public          postgres    false    223   ??       ?          0    16555 	   ubicacion 
   TABLE DATA           Z   COPY public.ubicacion (id_ubicacion, nombre, departamento, cuidad, direccion) FROM stdin;
    public          postgres    false    239   ??       ?           0    0    administrador_id_adm_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.administrador_id_adm_seq', 7, true);
          public          postgres    false    210            ?           0    0    banco_id_banco_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.banco_id_banco_seq', 6, true);
          public          postgres    false    234            ?           0    0    cabin_id_cabin_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.cabin_id_cabin_seq', 34, true);
          public          postgres    false    212            ?           0    0    categorias_id_categoria_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.categorias_id_categoria_seq', 2, true);
          public          postgres    false    236            ?           0    0    cliente_id_cliente_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.cliente_id_cliente_seq', 38, true);
          public          postgres    false    214            ?           0    0    fabricante_id_fabricante_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('public.fabricante_id_fabricante_seq', 38, true);
          public          postgres    false    216            ?           0    0    factura_id_factura_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.factura_id_factura_seq', 32, true);
          public          postgres    false    218            ?           0    0 #   informacion_pago_id_informacion_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.informacion_pago_id_informacion_seq', 32, true);
          public          postgres    false    220            ?           0    0    metodo_de_pago_id_metp_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.metodo_de_pago_id_metp_seq', 4, true);
          public          postgres    false    222            ?           0    0    reservas_id_reserva_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.reservas_id_reserva_seq', 32, true);
          public          postgres    false    224            ?           0    0    ubicacion_id_ubicacion_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.ubicacion_id_ubicacion_seq', 1, true);
          public          postgres    false    238            ?           2606    16479     administrador administrador_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.administrador
    ADD CONSTRAINT administrador_pkey PRIMARY KEY (id_adm);
 J   ALTER TABLE ONLY public.administrador DROP CONSTRAINT administrador_pkey;
       public            postgres    false    209            ?           2606    16536    banco banco_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.banco
    ADD CONSTRAINT banco_pkey PRIMARY KEY (id_banco);
 :   ALTER TABLE ONLY public.banco DROP CONSTRAINT banco_pkey;
       public            postgres    false    235            ?           2606    16481    cabin cabin_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.cabin
    ADD CONSTRAINT cabin_pkey PRIMARY KEY (id_cabin);
 :   ALTER TABLE ONLY public.cabin DROP CONSTRAINT cabin_pkey;
       public            postgres    false    211            ?           2606    16548    categorias categorias_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id_categoria);
 D   ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
       public            postgres    false    237            ?           2606    16483    cliente cliente_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.cliente
    ADD CONSTRAINT cliente_pkey PRIMARY KEY (id_cliente);
 >   ALTER TABLE ONLY public.cliente DROP CONSTRAINT cliente_pkey;
       public            postgres    false    213            ?           2606    16485    fabricante fabricante_pkey 
   CONSTRAINT     c   ALTER TABLE ONLY public.fabricante
    ADD CONSTRAINT fabricante_pkey PRIMARY KEY (id_fabricante);
 D   ALTER TABLE ONLY public.fabricante DROP CONSTRAINT fabricante_pkey;
       public            postgres    false    215            ?           2606    16487    factura factura_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.factura
    ADD CONSTRAINT factura_pkey PRIMARY KEY (id_factura);
 >   ALTER TABLE ONLY public.factura DROP CONSTRAINT factura_pkey;
       public            postgres    false    217            ?           2606    16489 &   informacion_pago informacion_pago_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.informacion_pago
    ADD CONSTRAINT informacion_pago_pkey PRIMARY KEY (id_informacion);
 P   ALTER TABLE ONLY public.informacion_pago DROP CONSTRAINT informacion_pago_pkey;
       public            postgres    false    219            ?           2606    16491 "   metodo_de_pago metodo_de_pago_pkey 
   CONSTRAINT     e   ALTER TABLE ONLY public.metodo_de_pago
    ADD CONSTRAINT metodo_de_pago_pkey PRIMARY KEY (id_metp);
 L   ALTER TABLE ONLY public.metodo_de_pago DROP CONSTRAINT metodo_de_pago_pkey;
       public            postgres    false    221            ?           2606    16493    reservas reservas_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT reservas_pkey PRIMARY KEY (id_reserva);
 @   ALTER TABLE ONLY public.reservas DROP CONSTRAINT reservas_pkey;
       public            postgres    false    223            ?           2606    16560    ubicacion ubicacion_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.ubicacion
    ADD CONSTRAINT ubicacion_pkey PRIMARY KEY (id_ubicacion);
 B   ALTER TABLE ONLY public.ubicacion DROP CONSTRAINT ubicacion_pkey;
       public            postgres    false    239            ?           2618    16432    vista1 _RETURN    RULE     ?   CREATE OR REPLACE VIEW public.vista1 AS
 SELECT c.id_cliente,
    c.nombre,
    c.apellido,
    count(c.id_cliente) AS count
   FROM (public.cliente c
     JOIN public.reservas r ON ((r.id_cliente = c.id_cliente)))
  GROUP BY c.id_cliente;
 ?   CREATE OR REPLACE VIEW public.vista1 AS
SELECT
    NULL::integer AS id_cliente,
    NULL::character varying(60) AS nombre,
    NULL::character varying(60) AS apellido,
    NULL::bigint AS count;
       public          postgres    false    213    3294    213    213    223    225            ?           2618    16440    vista2 _RETURN    RULE     ?  CREATE OR REPLACE VIEW public.vista2 AS
 SELECT c.id_cliente,
    c.nombre,
    c.apellido,
    f.id_reserva,
        CASE
            WHEN (f.estado_pago = false) THEN 'No pago'::text
            WHEN (f.estado_pago = true) THEN 'pago'::text
            ELSE 'null'::text
        END AS estado_de_pago
   FROM ((public.factura f
     JOIN public.reservas r ON ((f.id_reserva = r.id_reserva)))
     JOIN public.cliente c ON ((r.id_cliente = c.id_cliente)))
  GROUP BY c.id_cliente, f.id_reserva, f.estado_pago;
 ?   CREATE OR REPLACE VIEW public.vista2 AS
SELECT
    NULL::integer AS id_cliente,
    NULL::character varying(60) AS nombre,
    NULL::character varying(60) AS apellido,
    NULL::integer AS id_reserva,
    NULL::text AS estado_de_pago;
       public          postgres    false    3294    223    223    217    217    213    213    213    227            ?           2606    16537    informacion_pago fkbanco    FK CONSTRAINT     ~   ALTER TABLE ONLY public.informacion_pago
    ADD CONSTRAINT fkbanco FOREIGN KEY (id_banco) REFERENCES public.banco(id_banco);
 B   ALTER TABLE ONLY public.informacion_pago DROP CONSTRAINT fkbanco;
       public          postgres    false    219    3306    235            ?           2606    16495    cabin fkcabin    FK CONSTRAINT     ?   ALTER TABLE ONLY public.cabin
    ADD CONSTRAINT fkcabin FOREIGN KEY (id_fabricante) REFERENCES public.fabricante(id_fabricante);
 7   ALTER TABLE ONLY public.cabin DROP CONSTRAINT fkcabin;
       public          postgres    false    211    3296    215            ?           2606    16549    cabin fkcategoria    FK CONSTRAINT     ?   ALTER TABLE ONLY public.cabin
    ADD CONSTRAINT fkcategoria FOREIGN KEY (id_categoria) REFERENCES public.categorias(id_categoria);
 ;   ALTER TABLE ONLY public.cabin DROP CONSTRAINT fkcategoria;
       public          postgres    false    3308    211    237            ?           2606    16500    factura fkfactura    FK CONSTRAINT     ~   ALTER TABLE ONLY public.factura
    ADD CONSTRAINT fkfactura FOREIGN KEY (id_reserva) REFERENCES public.reservas(id_reserva);
 ;   ALTER TABLE ONLY public.factura DROP CONSTRAINT fkfactura;
       public          postgres    false    223    217    3304            ?           2606    16505    informacion_pago fkinfo    FK CONSTRAINT     ?   ALTER TABLE ONLY public.informacion_pago
    ADD CONSTRAINT fkinfo FOREIGN KEY (id_cliente) REFERENCES public.cliente(id_cliente);
 A   ALTER TABLE ONLY public.informacion_pago DROP CONSTRAINT fkinfo;
       public          postgres    false    3294    219    213            ?           2606    16510    informacion_pago fkinfo2    FK CONSTRAINT     ?   ALTER TABLE ONLY public.informacion_pago
    ADD CONSTRAINT fkinfo2 FOREIGN KEY (id_metp) REFERENCES public.metodo_de_pago(id_metp);
 B   ALTER TABLE ONLY public.informacion_pago DROP CONSTRAINT fkinfo2;
       public          postgres    false    3302    221    219            ?           2606    16515    reservas fkreservas    FK CONSTRAINT        ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT fkreservas FOREIGN KEY (id_cliente) REFERENCES public.cliente(id_cliente);
 =   ALTER TABLE ONLY public.reservas DROP CONSTRAINT fkreservas;
       public          postgres    false    223    3294    213            ?           2606    16520    reservas fkreservas1    FK CONSTRAINT     z   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT fkreservas1 FOREIGN KEY (id_cabin) REFERENCES public.cabin(id_cabin);
 >   ALTER TABLE ONLY public.reservas DROP CONSTRAINT fkreservas1;
       public          postgres    false    211    223    3292            ?           2606    16525    reservas fkreservas2    FK CONSTRAINT     ?   ALTER TABLE ONLY public.reservas
    ADD CONSTRAINT fkreservas2 FOREIGN KEY (id_informacion) REFERENCES public.informacion_pago(id_informacion);
 >   ALTER TABLE ONLY public.reservas DROP CONSTRAINT fkreservas2;
       public          postgres    false    223    3300    219            ?           2606    16561    cabin fkubicacion    FK CONSTRAINT     ?   ALTER TABLE ONLY public.cabin
    ADD CONSTRAINT fkubicacion FOREIGN KEY (id_ubicacion) REFERENCES public.ubicacion(id_ubicacion);
 ;   ALTER TABLE ONLY public.cabin DROP CONSTRAINT fkubicacion;
       public          postgres    false    211    239    3310            ?   ?   x???j?0 ??s?"O ????L1??c???Û??Z	??Ȟ~?ǡ?΅?ِEP?Z??1B?X??,;Q\߯???8???
(??1?_???q????Zc	}???{J	??\?O?U]? ????!&?c???҈?+??蕈-!>a??P?K???5tK?%䰆{?????Ɛ6p      ?   ?   x?3?tJ?K????M?L???2?v??q??T?????D.N?ĬD???????=... A`?      ?   j  x?eTˎ?F<?????????W? ??8k?????A????%g??Њ?+9??S?OXX??'? /???U??a?w?뽮??#.Y?@/???+݅?Ro?? a?CC?\?X?A%,?`?bW???????56h+8?9K%?x?	a???
??i4%????m?h???H4~?&h?e??r-UOρ???R?t]p?????@?^8??	Œ??????f???*-??{?pX?>?ѩ???b?h<{??????jt?H?D?dA\??
X,?E?~?7?Hjʄ
?lH?߾?????!?+R??v???lʘ??h?惂u??P˧?i????,I?4?3}???zSM??%??.?\?eJ-M8<3.a??d?Up?7]??^??z???驴,)^?J??>l???~??7?!?????fQL*??&)??????+u?Y?-9\??E?xF????Q=??Us?r*>?5"C?K@߼?hK?V?LQ????D?jo)?;???C)YQ@6ޯ????[7$bd?b"?|???|?u?S???)j1?9?????.??`1xe? ?!nbBD?=?Z???;?IJ?H??n	?ؓ?O8?X._?M?????p:??Th?$f???-?y?`?w?cc?1m?xr?2
?&嬦?I??0??3"'紾3??|?????p?&s?r&??xY??v0N=V???e?1M??{83??̐?1??'@J?r??Jܘ??-Z?M?d?7x???K?M???t޿uQ??~?	H?x?7?!????s??Vw????n??>.+?J??KGC?0???I%R??yY*?3??uZJ??y??\	΋,??ś7??R?Mߥ?WJ??	???????w???߉?=?:?B??DUc???v/????~???f????      ?      x?3?LM?????LN?????? /??      ?   >  x?]??v?:E?K_????xz???l'dݗj??ɍ??%;I??%?C$N?:?؃k?,???k?5?j?????y??m?f.^5$?y7?^Bo~`>D?p?$?hJ?Z?^c??вm.?<\????t?
???O??N??<{?gօ?D??s?k`????趑Z?ڇ8??i?8謣???Y kͥ3昕@[0\??i??Wqz?P??B!?;??a??t??>.Ƭ?Zd???ᤉK??iժ??????.`ʥ?XB4N????q?za}vE'EU?6D?6???[?*?
?????滴?-????????;s??I?+??I???t??6?5????D?9A??*???iQR?E?Lu[H40AE;???E??Cȍ~(rZ????F?r?[?lD+?N??R?+????
??i?7?}?Vh~ނ??Z]??9???t?o???@X?t?ДB?Vp@w7??y??=㚫?+HN?a'Mf?d?<??*? ??b)^ᶒ??
t???t?X??q܉_???Yd?&??-j?u??4mI??	r㢋u?~?YWp???0??,?????ȼ.qN?B?9M??+ȑuN4??jy? ??7??٨?FG??2/?EM?u6??H??
~??y??t:??m??Rz^&Rhg?Ke ????VJ|g??,??A??iy???l??ק?`???٫?W@?A\)?5%?.?&?Y#???7???psf? ?<???%7????鄖R?p?5-???{?????|???68??7?????E$?-m ?[	?B???2?B?cw??d?mO?ݙL?,L?
!q??L???vh?/????9??t?xɌ?bLPN?U??n8R??¥DsG??xZ?e?f%FQ?U?l??Yt&?M??ʅC+???/?re?>^?G?i????aWZ"'!hswv?o? ?I?Jװ?,???j38D???Ky?Ve?ܫ?0?U?[?J̄?u?V2??b?v??c?O??`.?_A?9ɺ5??r-u?~o????״ճ??????w??G??ɦW*	???J?6UoԻ՗pڢS?'?????i??>????U|e?A??^?iy??Ҕ4???m??i???SS
m?I??4??p??m+?я?\?(\????E??0?+m?\??a??)?????of;??-?d??W??????#?6O?j̩?J
&%?P5_d?9,??4^???v ?VԆ??0lZ?8?걿,?mtn?[B2??F?}ԏ?????g??^??!7????????d???ި????U?J?m???k?????(+o??JC???????r6???d???#??K?????/G????(|??a?????쬾#      ?   ?  x?MR?n?0=??_`X???h86`@q??ͩF?(??R??'?A|#83o?)?l?Of?Ξ?I6?ތ9ʃ?瘂?(鲡c????ٟ?5{Q?R???ɝ??}ʓr???dSN,*??5??P??8??????BSSu????+?V???m?}v9?L??윑{3Zg#d=Q7Tu?l?C?d?}??J?Ԗ?^9Aï???_?0??bv?????S}??T?I?-?y'y?q?q??3?O?EA?R??p???њ??
E度̈́??,?~EI]????Y????}4i~???.?0?8?-?^츤??֤?~??,{;???k?????	?Q;??¶𷐥h?/ ?^T???? O???5VS|??|?G983r????B?ʊv1ɟ?3??F$?uK???0?0?e?
ߪ?Wޮ?_???????^W?????&?sh@?q???0[/????p18??<???kg4,?񫻖@?.???W?y&??B????a      ?   ?   x?EQK??0Z?w??v?w??;??_7?*U??1????ue?????)Yk??~??Ҥ?ȳ))M???@???+9C?Q??4?A??EUVC47??Ӳq?????????M?rS?%p???:7kaԲ1?AB?и,?E???n =?;Z??????T?#%
p?d????m??x?5????????z?i?§_?)Y?Ϸ)???z/??[R?Fǜso???y.ߏ????_U      ?   ?   x?MP?C!??T?űD'x????Q		,F???Va?N2i?,???i`#??1=N?-????ݱ-??dD蔂p?5???`.1?q'?Cj?2???6??K?=?4?(????O?h?֥x(???I??[	N唂$>a?qm??????E??e??!8y>??R?@u      ?   )   x?3??,N?2??M,.I-JN,J?2??K-,??????? ?Y	      ?   [  x?]S[?? ???8ǀϽ???c??8???LBL?????^???e%?H???ޕݝ?g??m4??xq?fk%kQ??P??(ɦ??f׺??????0?]5UE?4????^??	i???6?Ƣ??spO_?V?A&?k?a6?	???\Ѫ??:?w@J?#??A??????>?I?a??չn?-?񯆿?ĸ?????ہ0? ܍A?a??K????`U?QQ@G=!?B!>.J??6?2h?????R?F????dk?B'?v?-?b?V`?z%???????w?1	@%θ????rS???a?5?=Vz?Q"????	??	R˟?ﵫ????????+      ?   =   x?3?(MM??W?L???t.?K??K?M,JN?t?O?/I?t??Q04uT(.-R?????? ??*     