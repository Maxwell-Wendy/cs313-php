CREATE TABLE user_info (
	id SERIAL NOT NULL primary key,
	username varchar(80) NOT NULL UNIQUE
);

ALTER TABLE user_info ADD COLUMN password varchar(120);
ALTER TABLE user_info ALTER COLUMN password SET NOT NULL;

CREATE TABLE author (
	id SERIAL NOT NULL primary key,
	name varchar(80) NOT NULL
);

ALTER TABLE author ADD CONSTRAINT unique_author_constraint UNIQUE (name);

CREATE TABLE genre (
	id SERIAL NOT NULL primary key,
	name varchar(80) NOT NULL
);

ALTER TABLE genre ADD CONSTRAINT unique_genre_constraint UNIQUE (name);

CREATE TABLE book (
	id SERIAL NOT NULL primary key,
	author_id int NOT NULL REFERENCES author(id),
	genre_id int REFERENCES genre(id),
	title TEXT NOT NULL
);

ALTER TABLE book ADD CONSTRAINT unique_book_constraint UNIQUE (title);

CREATE TABLE book_user (
	user_id int NOT NULL REFERENCES user_info(id),
	book_id int NOT NULL REFERENCES book(id),
	PRIMARY KEY (user_id, book_id),
	is_owned BOOLEAN,
	is_read BOOLEAN,
	is_wishlist BOOLEAN,
	date_read date
);

INSERT INTO author (name) 
	VALUES ('Brandon Sanderson');

INSERT INTO author (name) 
	VALUES ('Brandon Mull');	

INSERT INTO author (name) 
	VALUES ('J. K. Rowling');

INSERT INTO author (name) 
	VALUES ('Shannon Hale');

INSERT INTO author (name) 
	VALUES ('Kiera Cass');

INSERT INTO genre (name) 
	VALUES ('Fantasy');

INSERT INTO genre (name) 
	VALUES ('Fiction');

INSERT INTO genre (name) 
	VALUES ('Young Adult Fiction');

INSERT INTO genre (name) 
	VALUES ('Romance');

INSERT INTO genre (name) 
	VALUES ('Non-Fiction');

INSERT INTO book (author_id, genre_id, title)
	VALUES (1, 1, 'Mistborn: The Final Empire');

INSERT INTO book (author_id, genre_id, title)
	VALUES (1, 1, 'Mistborn: The Well of Ascension');

INSERT INTO book (author_id, genre_id, title)
	VALUES (2, 1, 'Fablehaven');	

INSERT INTO book (author_id, genre_id, title)
	VALUES (3, 1, 'Harry Potter and the Sorcerers Stone');

INSERT INTO book (author_id, genre_id, title)
	VALUES (4, 3, 'Book of a Thousand Days');

INSERT INTO book (author_id, genre_id, title)
	VALUES (5, 4, 'The Selection');

INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist, date_read)
	VALUES (1, 1, true, true, false, '2019-10-15');

INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist, date_read)
	VALUES (1, 2, true, true, false, '2019-07-04');

INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist)
	VALUES (2, 3, true, false, false);

INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist)
	VALUES (2, 4, true, false, false);

INSERT INTO book_user (user_id, book_id, is_owned, is_read, is_wishlist, date_read)
	VALUES (1, 5, false, true, true, '2018-08-12');

UPDATE book SET title = 'Harry Potter and the Sorcerer&#039;s Stone' WHERE id = 4;
