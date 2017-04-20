drop table if exists profiles;

create table profiles (
  profilesID int,
  name varchar(255),
  tell varchar(255),
  age int,
  birthday date
);

insert into profiles (
  profilesID, name, tell, age, birthday
) value (
  1, '田中 実', '012-345-6789', 30, '1994-02-01'
);

insert into profiles (
  profilesID, name, tell, age, birthday
) value (
  2, '鈴木 茂', '090-1122-3344', 37, '1987-08-12'
);

insert into profiles (
  profilesID, name, tell, age, birthday
) value (
  3, '鈴木 実', '080-5566-7788', 24, '2000-12-24'
);

insert into profiles (
  profilesID, name, tell, age, birthday
) value (
  4, '佐藤 清', '012-0987-6543', 19, '2005-08-01'
);

insert into profiles (
  profilesID, name, tell, age, birthday
) value (
  5, '高橋 清', '090-9900-1234', 24, '2000-12-24'
);
