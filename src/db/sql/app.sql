
CREATE TABLE transactions(
    id SERIAL NOT NULL,
    amount numeric NOT NULL,
    description character varying(255),
    type integer NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    scheduled integer,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    PRIMARY KEY(id)
);


CREATE TABLE users(
    id SERIAL NOT NULL,
    first_name character varying(255) NOT NULL,
    last_name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    PRIMARY KEY(id)
);

CREATE TABLE categories(
    id SERIAL NOT NULL,
    name character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    PRIMARY KEY(id)
);
