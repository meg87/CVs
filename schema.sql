create database cv;
use cv;

create table persons
(
	person_id integer not null auto_increment,
	person_name varchar(255) not null,
	person_gender enum('Male', 'Female'),
	person_email varchar(255) not null,
	person_website varchar(255),
	person_code varchar(255),

	primary key (person_id), 
	unique (person_email)
);

create table educations
(
	education_owner integer not null,
	education_major varchar(255) not null,
	education_degree varchar(255) not null,
	education_university varchar(255),
	education_level varchar(255),
	education_location varchar(255),
	education_start integer,
	education_end integer,

	foreign key (education_owner) references persons(person_id) on delete cascade,
	constraint education_id unique (education_owner, education_major, education_degree, education_university)
);

create table certifications
(
	certification_owner integer not null,
	certification_name varchar(255) not null,
	certification_date integer,

	foreign key (certification_owner) references persons(person_id) on delete cascade,
	constraint certification_id unique (certification_owner, certification_name)
);

create table skills
(
	skill_owner integer not null,
	skill_name varchar(255) not null,
	skill_description text,
	skill_level integer,
	skill_type enum('language', 'technologies', 'tool'),
	skill_field enum('programming', 'webdev', 'database', 'platform', 'other'),

	foreign key (skill_owner) references persons(person_id) on delete cascade,
	constraint skill_id unique (skill_owner, skill_name)
);

create table languages
(
	language_owner integer not null,
	language_name varchar(255) not null,
	language_reading integer,
	language_writing integer,
	language_speaking integer,
	language_native integer,

	foreign key (language_owner) references persons(person_id) on delete cascade,
	constraint language_id unique (language_owner, language_name)
);

create table courses
(
	course_owner integer not null,
	course_name varchar(255) not null,

	foreign key (course_owner) references persons(person_id) on delete cascade,
	constraint course_id unique (course_owner, course_name)
);

create table jobs
(
	job_owner integer not null,
	job_title varchar(255) not null,
	job_description text,
	job_company varchar(255),
	job_start integer,
	job_end integer,

	foreign key (job_owner) references persons(person_id) on delete cascade,
	constraint job_id unique (job_owner, job_title)
);

create table projects
(
	project_owner integer not null,
	project_title varchar(255) not null,
	project_description text,
	project_technologies text,
	project_date integer,

	foreign key (project_owner) references persons(person_id) on delete cascade,
	constraint project_id unique (project_owner, project_title)
);

