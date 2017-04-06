
create database `itcast`;
use `itcast`;

create table `student`(
  `id` int unsigned primary key auto_increment,
  `name` varchar(32) not null,
  `gender` varchar(32) not null
)charset=utf8;

select * from `student`;