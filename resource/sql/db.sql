CREATE TABLE credit_calc_history (
	id serial PRIMARY KEY,
    "date" TIMESTAMP NOT NULL,
    amount NUMERIC NOT NULL,
    number_of_years SMALLINT NOT NULL,
    interest NUMERIC NOT NULL,
    installment NUMERIC
);