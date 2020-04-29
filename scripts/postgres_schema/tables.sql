
create table data
(
	id serial not null
		constraint data_pkey
			primary key,
	name varchar(255),
	surname varchar(255),
	page_uid varchar(255) not null,
	created integer not null
);

create index page_uid_pk
	on data (id);

