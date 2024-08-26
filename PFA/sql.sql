create table interns (
  id bigint primary key generated always as identity,
  first_name text not null,
  last_name text not null,
  date_of_birth date not null,
  email text not null unique,
  phone_number text,
  graduation_year int,
  experience text,
  request_status text default 'pending',
  submitted_at timestamp with time zone default now()
);

create table admins (
  id bigint primary key generated always as identity,
  username text not null unique,
  password text not null
);

create table internship_requests (
  id bigint primary key generated always as identity,
  intern_id bigint references interns (id),
  admin_id bigint references admins (id),
  status text default 'pending',
  updated_at timestamp with time zone default now()
);