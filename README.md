# Magic Deck

This project is a deck builder for Magic The Gathering card game.

## Project setup

* Initalize composer

````bash
composer init
````

* Project structure

````bash
DeckBuilder/
|
├─ config/
│
├─ public/
│   ├─ assets/
│      ├─ css
│      ├─ js
│      └─ pictures
│   ├─ .htaccess
│   └─ index.php
|
├─ src/
│   ├─ Controller/
│   ├─ Entity/
│   └─ Service/
|
├─ templates/
|
└─ var/
    └─ cache/
````

In each folders, we have to create a README.md fil to explain the folder responsability

* Initialize npm

````bash
cd public
````

````bash
npm init
````

* Install Materialize CSS

````bash
cd public
````

````bash
npm install materialize-css@next
````

[Materialize](https://materializecss.com/)

## PHPStorm setup

````bash
server configuration
````

### SQL Commands

```sql
create or replace table card
(
	id int auto_increment
		primary key,
	name varchar(255) not null,
	mana_cost varchar(255) not null,
	description varchar(255) not null,
	picture longblob not null
);

create or replace table color
(
	id int auto_increment
		primary key,
	name varchar(255) null
);

create or replace table card_color
(
	id int auto_increment
		primary key,
	card int null,
	color int null,
	constraint card
		foreign key (card) references card (id),
	constraint color_list
		foreign key (color) references color (id)
);

create or replace table deck_size
(
	id int auto_increment
		primary key,
	size int not null
);

create or replace table deck_type
(
	id int auto_increment
		primary key,
	type varchar(255) not null
);

create or replace table email
(
	id int auto_increment
		primary key,
	email varchar(255) not null
);

create or replace table nickname
(
	id int auto_increment
		primary key,
	nickname varchar(255) not null
);

create or replace table password
(
	id int auto_increment
		primary key,
	password varchar(255) not null
);

create or replace table user
(
	id int auto_increment
		primary key,
	email int null,
	nickname int null,
	password int null,
	constraint email
		foreign key (email) references email (id),
	constraint nickname
		foreign key (nickname) references nickname (id),
	constraint password
		foreign key (password) references password (id)
);

create or replace table deck
(
	id int auto_increment
		primary key,
	size int null,
	type int null,
	user int null,
	constraint size
		foreign key (size) references deck_size (id),
	constraint type
		foreign key (type) references deck_type (id),
	constraint user
		foreign key (user) references user (id)
);

create or replace table deck_card
(
	id int auto_increment
		primary key,
	card int null,
	deck int null,
	constraint deck_card_card_fk
		foreign key (card) references card (id),
	constraint deck_card_deck_fk
		foreign key (deck) references deck (id)
);
```
