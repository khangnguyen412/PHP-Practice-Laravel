create database laravelLearning;
drop database laravelLearning;
create table test(
    fullName nvarchar(100),
    age int Not Null
);
select * from test;
alter table test drop column id;
drop table test;

-- truy xuất db mẫu
select * from acc_transaction;
select * from account;
select * from branch;
select * from customer;
select * from business;
select * from account join acc_transaction on account.ACCOUNT_ID = acc_transaction.ACCOUNT_ID;
select * from account where (AVAIL_BALANCE > 5000 or OPEN_BRANCH_ID = 1);
select * from account where (AVAIL_BALANCE > 5000 and OPEN_BRANCH_ID = 1);
select * from account where PRODUCT_CD like "sa%";
select * from account left join acc_transaction on account.ACCOUNT_ID = acc_transaction.ACCOUNT_ID;
select CUST_ID, STATE_ID from business where CUST_ID = '10' union select CUST_ID, STATE from customer where CUST_ID = 11;
select * from account order by PENDING_BALANCE asc;
select sum(AVAIL_BALANCE) as 'SUM AVAIL BALANCE',mona_prex_options PRODUCT_CD from account group by PRODUCT_CD having sum(AVAIL_BALANCE) > 10000;
insert into account value (30, 6000, null, '2004-12-17', '2004-12-15', 6000, 'ACTIVE', 10, 1, 1, 'CD');
update account set STATUS = 'INACTIVE' where ACCOUNT_ID = 30;
delete from account where ACCOUNT_ID = 30;

-- Relationships trong Eloquent
-- Tạo bảng Người
CREATE TABLE Person (
    PersonID INT PRIMARY KEY,
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    DateOfBirth DATE
);

-- Tạo bảng Hộ chiếu - quan hệ 1-1 với person
CREATE TABLE Passport (
    PassportID INT PRIMARY KEY,
    PassportNumber VARCHAR(20) UNIQUE,
    IssueDate DATE,
    ExpiryDate DATE,
    PersonID INT UNIQUE,
    FOREIGN KEY (PersonID) REFERENCES Person(PersonID)
);

-- Tạo bảng Quốc Tịch - quan hệ n-n với với person
CREATE TABLE Country (
    CountryID INT PRIMARY KEY,
    CountryName VARCHAR(100) UNIQUE
);

-- Tạo bảng trung gian vs Country - Person
CREATE TABLE PersonCountry (
    PersonID INT,
    CountryID INT,
    VisitDate DATE,
    PRIMARY KEY (PersonID, CountryID),
    FOREIGN KEY (PersonID) REFERENCES Person(PersonID),
    FOREIGN KEY (CountryID) REFERENCES Country(CountryID)
);

-- Tạo bảng Visa - quan hệ 1-n với person
CREATE TABLE Visa (
    VisaID INT PRIMARY KEY,
    VisaNumber VARCHAR(20) UNIQUE,
    Country VARCHAR(50),
    IssueDate DATE,
    ExpiryDate DATE,
    PersonID INT,
    FOREIGN KEY (PersonID) REFERENCES Person(PersonID)
);

-- Thêm dữ liệu mẫu
INSERT INTO Person (PersonID, FirstName, LastName, DateOfBirth) VALUES 
(1, 'John', 'Doe', '1985-06-15'),
(2, 'Jane', 'Smith', '1990-09-22'),
(3, 'Alice', 'Johnson', '1978-12-05'),
(4, 'Nguyen', 'Van A', '1990-01-15');
INSERT INTO Passport (PassportID, PassportNumber, IssueDate, ExpiryDate, PersonID) VALUES 
(1, 'A1234567', '2020-01-15', '2030-01-14', 1),
(2, 'B2345678', '2019-05-10', '2029-05-09', 2),
(3, 'C3456789', '2021-07-20', '2031-07-19', 3),
(4, 'C3456790', '2021-07-30', '2031-07-19', 4);
INSERT INTO Visa (VisaID, VisaNumber, Country, IssueDate, ExpiryDate, PersonID) VALUES 
(1, 'V123', 'USA', '2022-03-01', '2022-09-01', 1),
(2, 'V124', 'Canada', '2023-01-10', '2023-07-10', 1),
(3, 'V125', 'UK', '2021-08-15', '2022-02-15', 2),
(4, 'V126', 'Australia', '2020-10-05', '2021-04-05', 3);
INSERT INTO Country (CountryID, CountryName) VALUES 
(1, 'USA'),
(2, 'Canada'),
(3, 'UK'),
(4, 'Australia');
INSERT INTO PersonCountry (PersonID, CountryID, VisitDate) VALUES 
(1, 1, '2022-03-01'),  -- John Doe đã thăm USA
(1, 2, '2023-01-10'),  -- John Doe đã thăm Canada
(2, 3, '2021-08-15'),  -- Jane Smith đã thăm UK
(4, 4, '2020-10-05');  -- Alice Johnson đã thăm Australia

select * from Person;
select * from Passport;
select * from Visa;
select * from Country;
select * from PersonCountry;

SET SQL_SAFE_UPDATES = 0;