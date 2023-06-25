
CREATE TABLE expenses(
    id SERIAL NOT NULL,
    create_time date,
    amount character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    category_id integer NOT NULL,
    created_at integer NOT NULL,
    updated_at integer NOT NULL,
    PRIMARY KEY(id)
);
