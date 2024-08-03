CREATE TABLE "book" (
  "bk_id" integer,
  "author_id" integer,
  "gnr_id" integer,
  "bk_pages" integer,
  "bk_date_finished" datetime,
  PRIMARY KEY ("bk_id", "author_id")
);

CREATE TABLE "book_group" (
  "bg_id" integer PRIMARY KEY,
  "bg_name" varchar(40),
  "bg_current_book_id" integer
);

CREATE TABLE "book_group_members" (
  "bg_id" integer,
  "bg_user_id" integer,
  PRIMARY KEY ("bg_id", "bg_user_id")
);

CREATE TABLE "book_progress" (
  "bp_id" integer PRIMARY KEY,
  "bk_id" integer,
  "user_id" integer,
  "current_page" integer
);

CREATE TABLE "author" (
  "author_id" integer PRIMARY KEY,
  "author_first_name" varchar(255),
  "author_last_name" varchar(255)
);

CREATE TABLE "metadata" (
  "mtd_id" integer PRIMARY KEY,
  "mtd_bk_id" integer,
  "mtd_field" text,
  "mtd_field_type" integer,
  "mtd_review_score" double,
  "mtd_created_at" timestamp
);

CREATE TABLE "user_notes" (
  "unt_id" integer PRIMARY KEY,
  "unt_bk_id" integer,
  "unt_user_id" integer,
  "unt_field" text,
  "unt_created_at" timestamp
);

CREATE TABLE "genre" (
  "gnr_id" integer PRIMARY KEY,
  "gnr_descr" text
);

CREATE TABLE "legend_metadata_type" (
  "mtd_field_type" integer PRIMARY KEY,
  "mtd_field_type_descr" varchar(120)
);

CREATE TABLE "user" (
  "user_id" integer PRIMARY KEY,
  "user_pass" varchar(255),
  "user_email" varchar(255)
);

CREATE TABLE "user_friends" (
  "user_id" integer,
  "friend_user_id" integer,
  PRIMARY KEY ("user_id", "friend_user_id")
);

ALTER TABLE "book_group_members" ADD FOREIGN KEY ("bg_user_id") REFERENCES "user" ("user_id");

ALTER TABLE "book_group" ADD FOREIGN KEY ("bg_current_book_id") REFERENCES "book" ("bk_id");

-- ALTER TABLE "author" ADD FOREIGN KEY ("author_id") REFERENCES "book" ("author_id");

ALTER TABLE "book" ADD FOREIGN KEY ("author_id") REFERENCES "author" ("author_id");

ALTER TABLE "user_friends" ADD FOREIGN KEY ("user_id") REFERENCES "user" ("user_id");

ALTER TABLE "book_group_members" ADD FOREIGN KEY ("bg_id") REFERENCES "book_group" ("bg_id");

ALTER TABLE "book" ADD FOREIGN KEY ("gnr_id") REFERENCES "genre" ("gnr_id");

ALTER TABLE "book_progress" ADD FOREIGN KEY ("bk_id") REFERENCES "book" ("bk_id");

ALTER TABLE "user" ADD FOREIGN KEY ("user_id") REFERENCES "book_progress" ("user_id");

ALTER TABLE "user_friends" ADD FOREIGN KEY ("friend_user_id") REFERENCES "user" ("user_id");

ALTER TABLE "user_notes" ADD FOREIGN KEY ("unt_user_id") REFERENCES "user" ("user_id");

ALTER TABLE "user_notes" ADD FOREIGN KEY ("unt_bk_id") REFERENCES "book" ("bk_id");

ALTER TABLE "metadata" ADD FOREIGN KEY ("mtd_bk_id") REFERENCES "book" ("bk_id");

ALTER TABLE "metadata" ADD FOREIGN KEY ("mtd_field_type") REFERENCES "legend_metadata_type" ("mtd_field_type");
