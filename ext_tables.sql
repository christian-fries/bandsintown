CREATE TABLE tx_bandsintown_domain_model_artist (
	name varchar(255) DEFAULT '' NOT NULL,
	id int(11) DEFAULT '0' NOT NULL,
	slug varchar(255) DEFAULT '/' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	image_url varchar(255) DEFAULT '' NOT NULL,
	thumb_url varchar(255) DEFAULT '' NOT NULL,
	facebook_page_url varchar(255) DEFAULT '' NOT NULL,
	mbid varchar(255) DEFAULT '' NOT NULL,
	tracker_count int(11) DEFAULT '0' NOT NULL
);

CREATE TABLE tx_bandsintown_domain_model_event (
	id int(11) DEFAULT '0' NOT NULL,
	slug varchar(255) DEFAULT '/' NOT NULL,
	url varchar(255) DEFAULT '' NOT NULL,
	on_sale_datetime datetime DEFAULT NULL,
	datetime datetime DEFAULT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	description text,
	lineup text,
	venue_name varchar(255) DEFAULT '' NOT NULL,
	venue_city varchar(255) DEFAULT '' NOT NULL,
	venue_region varchar(255) DEFAULT '' NOT NULL,
	venue_country varchar(255) DEFAULT '' NOT NULL,
	venue_latitude varchar(255) DEFAULT '' NOT NULL,
	venue_longitude varchar(255) DEFAULT '' NOT NULL,
	offer_type varchar(255) DEFAULT '' NOT NULL,
	offer_url varchar(255) DEFAULT '' NOT NULL,
	offer_status varchar(255) DEFAULT '' NOT NULL,
	artist int(11) unsigned DEFAULT '0'
);
