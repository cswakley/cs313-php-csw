--
-- PostgreSQL database dump
--

-- Dumped from database version 10.1
-- Dumped by pg_dump version 10.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: messages; Type: TABLE; Schema: public; Owner: rahcccsbnamvss
--

CREATE TABLE messages (
    id integer NOT NULL,
    message text,
    datetime timestamp without time zone NOT NULL,
    sender_id integer NOT NULL,
    is_read boolean
);


ALTER TABLE messages OWNER TO rahcccsbnamvss;

--
-- Name: messages_id_seq; Type: SEQUENCE; Schema: public; Owner: rahcccsbnamvss
--

CREATE SEQUENCE messages_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE messages_id_seq OWNER TO rahcccsbnamvss;

--
-- Name: messages_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rahcccsbnamvss
--

ALTER SEQUENCE messages_id_seq OWNED BY messages.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: rahcccsbnamvss
--

CREATE TABLE users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(50) NOT NULL,
    steamname character varying(50),
    originname character varying(50),
    uplayname character varying(50)
);


ALTER TABLE users OWNER TO rahcccsbnamvss;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: rahcccsbnamvss
--

CREATE SEQUENCE users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_id_seq OWNER TO rahcccsbnamvss;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: rahcccsbnamvss
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: messages id; Type: DEFAULT; Schema: public; Owner: rahcccsbnamvss
--

ALTER TABLE ONLY messages ALTER COLUMN id SET DEFAULT nextval('messages_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: rahcccsbnamvss
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: rahcccsbnamvss
--

COPY messages (id, message, datetime, sender_id, is_read) FROM stdin;
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: rahcccsbnamvss
--

COPY users (id, username, password, steamname, originname, uplayname) FROM stdin;
\.


--
-- Name: messages_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rahcccsbnamvss
--

SELECT pg_catalog.setval('messages_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: rahcccsbnamvss
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: rahcccsbnamvss
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: rahcccsbnamvss
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- Name: messages messages_sender_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: rahcccsbnamvss
--

ALTER TABLE ONLY messages
    ADD CONSTRAINT messages_sender_id_fkey FOREIGN KEY (sender_id) REFERENCES users(id);


--
-- Name: plpgsql; Type: ACL; Schema: -; Owner: postgres
--

GRANT ALL ON LANGUAGE plpgsql TO rahcccsbnamvss;


--
-- PostgreSQL database dump complete
--

