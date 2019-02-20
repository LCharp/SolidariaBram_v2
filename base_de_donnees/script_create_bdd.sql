-- Database: bd_projet_course

-- DROP DATABASE bd_projet_course;

CREATE DATABASE bd_projet_course
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'French_France.1252'
       LC_CTYPE = 'French_France.1252'
       CONNECTION LIMIT = -1;

	   
-- Table: association

-- DROP TABLE association;

CREATE TABLE association
(
  id_asso serial NOT NULL,
  nom_asso character varying(25),
  adresse_asso character varying(50),
  cp_asso character varying(5),
  ville_asso character varying(25),
  description_asso text,
  tel_asso character varying(10),
  nom_directeur_asso character varying(25),
  asso_check boolean NOT NULL DEFAULT false,
  CONSTRAINT prk_constraint_association PRIMARY KEY (id_asso)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE association
  OWNER TO postgres;

  
  -- Table: c_parcours

-- DROP TABLE c_parcours;

CREATE TABLE c_parcours
(
  id_parcours_carte serial NOT NULL,
  forme_p character varying(25),
  id_p integer,
  CONSTRAINT prk_constraint_c_parcours PRIMARY KEY (id_parcours_carte)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_parcours
  OWNER TO postgres;

  
  -- Table: c_points

-- DROP TABLE c_points;

CREATE TABLE c_points
(
  id_c_pt serial NOT NULL,
  CONSTRAINT prk_constraint_c_points PRIMARY KEY (id_c_pt)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_points
  OWNER TO postgres;

  
  -- Table: c_ville

-- DROP TABLE c_ville;

CREATE TABLE c_ville
(
  id_ville_carte serial NOT NULL,
  fond_ville character varying(25),
  CONSTRAINT prk_constraint_c_ville PRIMARY KEY (id_ville_carte)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE c_ville
  OWNER TO postgres;

  
  -- Table: commune

-- DROP TABLE commune;

CREATE TABLE commune
(
  code_insee character varying(2000) NOT NULL,
  nom_commune character varying(2000),
  code_postal integer,
  latitude character(25),
  longitude character(25),
  CONSTRAINT prk_constraint_commune PRIMARY KEY (code_insee)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE commune
  OWNER TO postgres;

  
  -- Table: construit

-- DROP TABLE construit;

CREATE TABLE construit
(
  id_loca serial NOT NULL,
  id_inscrit serial NOT NULL,
  id_individu serial NOT NULL,
  CONSTRAINT prk_constraint_construit PRIMARY KEY (id_loca, id_inscrit, id_individu)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE construit
  OWNER TO postgres;

  
  -- Table: correspond

-- DROP TABLE correspond;

CREATE TABLE correspond
(
  id_point integer NOT NULL,
  id_c_pt serial NOT NULL,
  CONSTRAINT prk_constraint_correspond PRIMARY KEY (id_point, id_c_pt)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE correspond
  OWNER TO postgres;

  
  -- Table: course

-- DROP TABLE course;

CREATE TABLE course
(
  id_course serial NOT NULL,
  nom_course character varying(25),
  infos_course character varying(25),
  CONSTRAINT prk_constraint_course PRIMARY KEY (id_course)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE course
  OWNER TO postgres;

  
  -- Table: date

-- DROP TABLE date;

CREATE TABLE date
(
  date_jour date NOT NULL,
  CONSTRAINT prk_constraint_date PRIMARY KEY (date_jour)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE date
  OWNER TO postgres;

  
  -- Table: individu

-- DROP TABLE individu;

CREATE TABLE individu
(
  id_individu serial NOT NULL,
  nom_p character varying(25),
  prenom_p character varying(25),
  adresse_p character varying(25),
  ville_p character varying(25),
  cp_p character varying(25),
  civilite_p character varying(25),
  date_naissance_p date,
  mail_p character varying(50),
  tel_p character varying(25),
  organisateur boolean,
  mdp_p text,
  code_insee character varying(2000),
  CONSTRAINT prk_constraint_individu PRIMARY KEY (id_individu)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE individu
  OWNER TO postgres;

  
  -- Table: inscrits

-- DROP TABLE inscrits;

CREATE TABLE inscrits
(
  id_inscrit serial NOT NULL,
  num_dossard character varying(25),
  certificat_medical_p boolean,
  licence_p boolean,
  paiement boolean,
  document_med character varying(25),
  id_individu serial NOT NULL,
  id_p integer
)
WITH (
  OIDS=FALSE
);
ALTER TABLE inscrits
  OWNER TO postgres;

  
  -- Table: parcours

-- DROP TABLE parcours;

CREATE TABLE parcours
(
  id_p integer NOT NULL,
  lieu character varying(50),
  heure_p character varying,
  longueur_p double precision,
  denivelee_p double precision,
  type_p character varying(50),
  niveau character varying(25),
  tarif integer,
  date_p character varying(50),
  id_parcours_carte integer,
  id_course integer,
  CONSTRAINT prk_constraint_parcours PRIMARY KEY (id_p)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE parcours
  OWNER TO postgres;

  
  -- Table: performe

-- DROP TABLE performe;

CREATE TABLE performe
(
  id_inscrit serial NOT NULL,
  chrono double precision,
  id_point "char"
)
WITH (
  OIDS=FALSE
);
ALTER TABLE performe
  OWNER TO postgres;

  
  -- Table: point

-- DROP TABLE point;

CREATE TABLE point
(
  id_point serial NOT NULL,
  "position" integer,
  id_p integer,
  id_type_p integer,
  CONSTRAINT prk_constraint_point PRIMARY KEY (id_point)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE point
  OWNER TO postgres;

  
  -- Table: possede

-- DROP TABLE possede;

CREATE TABLE possede
(
  id_course serial NOT NULL,
  id_sponso serial NOT NULL,
  CONSTRAINT prk_constraint_possede PRIMARY KEY (id_course, id_sponso)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE possede
  OWNER TO postgres;

  
  -- Table: profite

-- DROP TABLE profite;

CREATE TABLE profite
(
  id_course serial NOT NULL,
  id_asso serial NOT NULL,
  date_jour date NOT NULL,
  CONSTRAINT prk_constraint_profite PRIMARY KEY (id_course, id_asso, date_jour)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE profite
  OWNER TO postgres;

  
  -- Table: responsable

-- DROP TABLE responsable;

CREATE TABLE responsable
(
  id_resp serial NOT NULL,
  id_individu serial NOT NULL,
  CONSTRAINT prk_constraint_responsable PRIMARY KEY (id_individu)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE responsable
  OWNER TO postgres;

  
  -- Table: sponsor

-- DROP TABLE sponsor;

CREATE TABLE sponsor
(
  id_sponso serial NOT NULL,
  nom_sponsor character varying(25),
  dons_financiers double precision,
  CONSTRAINT prk_constraint_sponsor PRIMARY KEY (id_sponso)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE sponsor
  OWNER TO postgres;

  
  -- Table: supervise

-- DROP TABLE supervise;

CREATE TABLE supervise
(
  id_individu serial NOT NULL,
  id_p serial NOT NULL,
  CONSTRAINT prk_constraint_supervise PRIMARY KEY (id_individu, id_p)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE supervise
  OWNER TO postgres;

  
  -- Table: t_localisation

-- DROP TABLE t_localisation;

CREATE TABLE t_localisation
(
  date_heure date,
  trace_p character varying(25),
  id_loca serial NOT NULL,
  CONSTRAINT prk_constraint_t_localisation PRIMARY KEY (id_loca)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE t_localisation
  OWNER TO postgres;

  
  -- Table: type_point

-- DROP TABLE type_point;

CREATE TABLE type_point
(
  id_type_p serial NOT NULL,
  nom_type character varying(25),
  CONSTRAINT prk_constraint_type_point PRIMARY KEY (id_type_p)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE type_point
  OWNER TO postgres;
