
CREATE TABLE transactions(
    id SERIAL NOT NULL,
    amount character varying(255) NOT NULL,
    description character varying(255),
    type integer NOT NULL,
    user_id integer NOT NULL,
    category_id integer NOT NULL,
    scheduled integer,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    PRIMARY KEY(id)
);
