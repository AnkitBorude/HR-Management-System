create table Employees(
 employee_id int PRIMARY KEY,
 employee_full_name varchar(50) NOT NULL,
 
 employee_email_id varchar(40) UNIQUE NOT NULL,
 employee_dob date NOT NULL,
 employee_gender varchar(8) NOT NULL,
 employee_phone_no varchar(13) UNIQUE NOT NULL,
 employee_city varchar(20),
 employee_state varchar(20) NOT NULL,
 employee_pincode varchar(5) NOT NULL,
 employee_date_of_join date NOT NULL,
 employee_pan_no varchar(15) NOT NULL,
 employee_ac_no varchar(20) NOT NULL,
employee_ifsc_code varchar(10) NOT NULL,
 employee_cl_balance int,
 employee_el_balance int,
employee_sl_balance int);



create table Attendance (
attendance_id int primary key,
attendance_date date NOT
attendance_sign_in time NOT NULL,
attendance_sign_out time,
attendance_isLate bool,
attendance_isHalfday bool,
attendance_isOvertime bool,
attendance_isPresent bool,
attendace_totalOvertime int,
fkemployee_id int references Employees(employee_id));

create table Leave(
leave_id int primary key,
leave_type varchar(15) NOT NULL,
leave_start_date date NOT NULL,
leave_end_date date NOT NULL,
leave_total_days int NOT NULL,
leave_reason text,
leave_applied_date date,
fkemployee_id int references Employees(employee_id));

create table Department(
department_id serial primary key,
department_name varchar(20) NOT NULL,
department_total_roles int);

create table Role(
role_id serial primary key,
role_name varchar(20) NOT NULL,
role_base_salary int NOT NULL,
role_current_holding int,                           
fkdepartment_id int references Department(department_id));


alter table Employees add column fkrole_id int references Role(role_id);

alter table Role add column role_max_holding int;

alter table Role alter column role_name set data type varchar(40);

create sequence mysequence start 1;

alter table role alter column role_id set default nextval('mysequence');

alter table attendance drop column fkemployee_id;

alter table attendance add column fkemployee_id int references Employees(employee_id) on delete cascade;

alter table leave drop column fkemployee_id;

alter table leave add column fkemployee_id int references Employees(employee_id) on delete cascade;
