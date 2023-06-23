CREATE TABLE expenses(
    id SERIAL NOT NULL,
    create_time date,
    amount character varying(255) NOT NULL,
    description character varying(255) NOT NULL,
    category_id integer NOT NULL,
    created_at timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
);
