<?php

?>
<H1>Использование SQL-запросов</H1>
        Синтаксис MySQL

//показать базы данных
SHOW DATABASES
id10552045_spp_database

drop database test;

//Список столбцов
SELECT COLUMN_NAME
FROM information_schema.COLUMNS
WHERE TABLE_SCHEMA = DATABASE()
AND TABLE_NAME = 'TAllEarthquakes'
ORDER BY ORDINAL_POSITION

select * from TAllEarthquakes
where
latitude > 50 and latitude < 53
and longitude > 110 and longitude < 116;

select * from TTowns;
select * from TTowns order by ID desc;

//первые 5
select * from VTowns limit 5;
select * from TAllEarthquakes limit 30;

//количестов записей
SELECT count(*) FROM TAllEarthquakes;

//минимальное значение
select min(latitude) from TAllEarthquakes;

select ID as "город" from TTowns order by ID desc;

select * from TAllEarthquakes where _year = 2005;

//Выбрать из списка
select * from TAllEarthquakes
where ID in(1, 2);




-- измененеие ячейки
update TAllEarthquakes
set note = "Муйское" where ID = 3530;


update TAllEarthquakes
set note = "Спитакское" where ID = 20563;
20563

select * from TAllEarthquakes
where note !=""

27410

update TAllEarthquakes
set note = "Балейское" where ID = 27410;

update TAllEarthquakes
set note = "Великое Восточно-Сибирское" where ID = 409;

update TAllEarthquakes
set note = "Чуйское" where ID = 26365;

select * from TAllEarthquakes
where MLH  > 7 and  latitude >45 and   longitude >100 and  longitude <150


--удаление записи
delete from tWorkerList where surname = 'Такойто';

select count(surname) as 'кол-во'
from tWorkerList
where postId = 4;


drop view if exists VTowns;
select * from VTowns;

create view VTowns as
select
T.ID as 'ID_города',
R.region_RF as 'Регион',
T.locality as 'Населенный_пункт'
from
TRegionsRF as R,
TTowns as T
where T.ref_region_RF_id = R.ID;
select * from VTowns where Регион = 'Свердловская область';

drop view if exists VAllEarthquakes;
select * from VAllEarthquakes;
create view VAllEarthquakes as
select
    ID as '№ п/п',
    _year as 'Год',
    _month	as 'Месяц',
    _day as 'День',
    _hour as 'Час',
    _min as 'Мин',
    sec	as 'Сек.',
    latitude as 'Широта, N',
    longitude as 'Долгота, E',
    DEPTH as 'Глубина гипоцентра, км',
    MLH	as 'Магнитуда по поверхностным волнам MLH с шагом 0.1',
    Ms05 as 'Магнитуда по поверхностным волнам MLH с шагом 0.5',
    polarAngle as 'Азимут',
    note as 'Примечание'
from TAllEarthquakes;


select * from VTowns where Регион = 'Свердловская область';









--group by ID, postId;
--выбор значений из коллекции
--alter table WorkerList drop column vaccination;
--alter table WorkerList add vaccination datetime;

-- измененеие ячейки
update tPrice
set price = 250000 where tPrice.surObjectID = 4 AND tPrice.workKindID = 3;

--удаление функции
drop function if exists GetNextMedCheck;
--или
if object_ID('GetNextMedCheck', 'f') is not null
drop function GetNextMedCheck;

 /*--ограничение целостности в контексте alter table
 --не выходит на существующие столбцы
alter table tWorksImplementation ADD constraint surObjectID_FK
foreign key(surObjectID) references tSurObjects(ID);

alter table tWorksImplementation ADD constraint workKindID_FK
foreign key(workKindID) references tWorkKindsList(ID);

*/

--alter table tWorksImplementation add bonus money;
--except
--intersect
--catch
--try
--throw
--одностроччный комментарий--

--create type MyType;
--insert into
--truncate -остается только поисание
--delete from [dbo].[Workers] where personnelNumber = 1;
--integer
--asc - по возрастанию
--desc - по убыванию
--alter table изменяет структуру таблицы
--while
--break
--continue

    Синтаксис MS SQL
select top 4 * from VTowns;

select * from tDepartments  order by tDepartments.fullTitle;
select * from tDepartments  where acronym = 'ОИЗ';
select
	fullTitle as 'Наименование отдела'
from tDepartments where acronym = 'ОИЗ';

select
	fullTitle as 'Полное наименование отдела',
	acronym as 'Аббревиатура'
from tDepartments
	 order by fullTitle;

select distinct
	ID as 'ID должности',
	postName as 'Наименование должности'
from tPostList;

     --вызов скалярной функции
 --почему то для скалярных функций указание схемы обязательно
 select [dbo].[GetNextMedCheck](1001)





<script>

</script>


<style type="text/css">



</style>

