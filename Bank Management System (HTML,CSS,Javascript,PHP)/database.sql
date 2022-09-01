drop database bank;
create database bank;
use bank;

create table branch (
branch_no int primary key ,
branch_city varchar(100) ,
branch_address varchar(200) ,
branch_province varchar(20) ,
branch_open_date date );

create table customer(
customer_account int primary key,
customer_name varchar(100),
customer_dob date,
customer_address varchar(200),
branch_no int,
customer_password varchar(30),
customer_balance int ,
customer_status varchar(20),
foreign key(branch_no) references branch(branch_no)
);

create table loan(
loan_id int primary key auto_increment,
customer_account int ,
loan_amount int,
loan_date date,
loan_status varchar(20) ,
foreign key(customer_account) references customer(customer_account)
);

create table transaction (
transaction_id int primary key auto_increment,
customer_account int ,
reciever_account int ,
transaction_type varchar(30) ,
transaction_amount int ,
transaction_date date ,
foreign key(customer_account) references customer(customer_account),
foreign key(reciever_account) references customer(customer_account)
);


