
drop table if exists department;

create table department (
  departmentID int not null auto_increment primary key,
  departmentName varchar(255)
);

insert into department (
  departmentID, departmentName
) value (
  1, '開発部'
);

insert into department (
  departmentID, departmentName
) value (
  2, '営業部'
);

insert into department (
  departmentID, departmentName
) value (
  3, '総務部'
);


drop table if exists station;

create table station (
  stationID int not null auto_increment primary key,
  stationName varchar(255)
);

insert into station (
  stationID, stationName
) value (
  1, '九段下'
);

insert into station (
  stationID, stationName
) value (
  2, '永田町'
);

insert into station (
  stationID, stationName
) value (
  3, '渋谷'
);

insert into station (
  stationID, stationName
) value (
  4, '神保町'
);

insert into station (
  stationID, stationName
) value (
  5, '上井草'
);



drop table if exists user;

create table user (
  userID int not null auto_increment primary key,
  name varchar(255),
  tell varchar(255),
  age int,
  birthday date,
  departmentID int,
  stationID int,
  foreign key (departmentID)
    references department(departmentID),
  foreign key (stationID)
    references station(stationID)
);

insert into user (
  userID, name, tell, age, birthday, departmentID, stationID
) value (
  1, '田中 実', '012-345-6789', 30, '1994-02-01', 3, 1
);

insert into user (
  userID, name, tell, age, birthday, departmentID, stationID
) value (
  2, '鈴木 茂', '090-1122-3344', 37, '1987-08-12', 3, 4
);

insert into user (
  userID, name, tell, age, birthday, departmentID, stationID
) value (
  3, '鈴木 実', '080-5566-7788', 24, '2000-12-24', 2, 5
);

insert into user (
  userID, name, tell, age, birthday, departmentID, stationID
) value (
  4, '佐藤 清', '012-0987-6543', 19, '2005-08-01', 1, 5
);

insert into user (
  userID, name, tell, age, birthday, departmentID, stationID
) value (
  5, '高橋 清', '090-9900-1234', 24, '2000-12-24', 3, 5
);
