insert into officer values(5,'asdf','asdssf','asdf',215,'01254','65421');
insert into officer values(5,'asdf','assdfdf','asdf',215,'01254','65421');


create or replace trigger insert_to_isa
after insert on officer
for each row
begin
	if :new.oid>=6000000000 and :new.oid<7000000000 then
	insert into teacher(t_id) values(:new.oid);
	else insert into employee values(:new.oid);
	end if;
end;
/

drop sequence teacher_seq;
drop sequence employee_seq;

CREATE SEQUENCE teacher_seq start with 6000000000;
CREATE SEQUENCE employee_seq start with 7000000000;


create or replace procedure insert_employee(nname officer.name%TYPE,uuniversityemail  officer.universityemail%TYPE,eemail  officer.email%type,ssalarybase  officer.salarybase%type,mmobile  officer.mobile%type,rresidantphone  officer.residantphone%type) is
begin
	insert into officer(oid,name,universityemail,email,salarybase,mobile,residantphone) values(employee_seq.nextval,nname,uuniversityemail,eemail,ssalarybase,mmobile,rresidantphone);
end;
/

create or replace procedure insert_teacher(nname officer.name%TYPE,uuniversityemail  officer.universityemail%TYPE,eemail  officer.email%type,ssalarybase  officer.salarybase%type,mmobile  officer.mobile%type,rresidantphone  officer.residantphone%type,ooffice_telephone teacher.office_telephone%type,TT_roomno teacher.T_roomno%type,JJoining_date teacher.Joining_date%type,RRetiring_date teacher.Retiring_date%type,dd_code departments.D_code%type,sstatus teacher.status%type default 'working') is
dd_id departments.d_id%type;
ooid officer.oid%type;
begin
	ooid:=teacher_seq.nextval;
	insert into officer(oid,name,universityemail,email,salarybase,mobile,residantphone) values(ooid,nname,uuniversityemail,eemail,ssalarybase,mmobile,rresidantphone);
	if dd_code is not null then
	select d_id into dd_id from departments where d_code=dd_code;
	end if;
	update teacher b set b.office_telephone=ooffice_telephone,b.T_roomno=tt_roomno,b.Joining_date=JJoining_date,b.Retiring_date=RRetiring_date,b.D_ID=DD_ID,b.status=sstatus where b.t_id=ooid;
end;
/

create or replace procedure make_head(newhead teacher.t_id%type,dcode departments.d_code%type,startdate head_department.starting_date%type default sysdate) is
did head_department.d_id%type;
begin
	select d_id into did from departments where d_code=dcode;
	update head_department set finishing_date=startdate where d_id=did and finishing_date is null;
	insert into head_department(t_id,d_id,starting_date) values(newhead,did,startdate);
end;
/

create or replace procedure make_dean(newdean teacher.t_id%type,fid faculty.f_id%type,startdate dean_faculty.starting_date%type default sysdate) is
begin
	update dean_faculty set finishing_date=startdate where f_id=fid and finishing_date is null;
	insert into dean_faculty(t_id,f_id,starting_date) values(newdean,fid,startdate);
end;
/

create or replace procedure give_additional_responsibility(tid teacher.t_id%type,icode institute.i_code%type,desig Additional_Responsibility.designation%type,startdate Additional_Responsibility.starting_date%type default sysdate) is
begin
	update Additional_Responsibility set finishing_date=startdate where i_code=icode and designation=desig and finishing_date is null;
	insert into Additional_Responsibility(i_code,t_id,designation,starting_date) values(icode,tid,desig,startdate);
end;
/

create or replace trigger leave
after insert or update on teacher_leave
for each row
begin
	if inserting and :new.leave_start is not null and :new.leave_start<=sysdate and (:new.leave_end is null or :new.leave_end>sysdate) then
		update teacher set status='on leave' where t_id=:new.t_id;
	elsif updating and (:old.leave_end is null or :old.leave_end>sysdate )  and :new.leave_end is not null and :new.leave_end<=sysdate then
		update teacher set status='working' where t_id=:new.t_id;
		dbms_output.put_line('aisi');
	end if;
end;
/

create or replace trigger head_check
after insert or update on head_department
for each row 
declare
dd_id teacher.d_id%type;
begin
	select d_id into dd_id from teacher where t_id=:new.t_id;
	if dd_id<>:new.d_id then
		raise_application_error(-20002,'a teacher cannot be a head of different department');
	end if;
end;
/

create or replace trigger dean_check
after insert or update on dean_faculty
for each row 
declare
ff_id dean_faculty.f_id%type;
begin
	select f_id into ff_id from teacher,departments where t_id=:new.t_id and teacher.d_id=departments.d_id ;
	if ff_id<>:new.f_id then
		raise_application_error(-20002,'a teacher cannot be a dean of different faculty');
	end if;
end;
/

create or replace trigger dependanttrig
after insert or delete  on dependant
for each row
begin
	if inserting then
		update officer set dependents=dependents+1 where oid=:new.oid;
	elsif deleting then
		update officer set dependents=dependents-1 where oid= :old.oid;
	end if;
end;
/


create or replace procedure update_designation(name designation.officename%type,desig designation.designation%type,ggrade designation.grade%type) is
did designation.designationid%type;
begin
	select designationid into did from designation where officename=name and desig=designation;
	update designation set grade=ggrade where designationid=did;
end;
/

create or replace trigger insert_working
before insert  on working 
for each row
when (new.enddate is null)
declare
grd payscale.grade%type;
strt payscale.startingsalary%type;
incr payscale.yearlyincrement%type;
oldincr payscale.yearlyincrement%type;
dummy int;
begin
DBMS_OUTPUT.PUT_LINE('\nasdfadsf');
	select grade into grd from designation where designationid=:new.designationid;
	select startingsalary into strt from payscale where grade=grd;
	select yearlyincrement into incr from payscale where 
	grade=grd;
	
	select count(*) into dummy from working where oid=:new.oid and enddate is null;
	if dummy=0 then oldincr:=0;
	else
		select yearlyincrement into oldincr from working a,designation b,payscale c where a.designationid=b.designationid and b.grade=c.grade and a.oid=:new.oid and a.enddate is null;
	end if;
	
	salary_change(:new.oid,strt,incr,oldincr);
	
	update working set enddate=:new.startdate where oid=:new.oid and enddate is null;
end;
/

create or replace trigger update_designation_grade
before update  on designation
for each row
when (old.grade<>new.grade and new.designationid=old.designationid)
declare 
cursor cur is
select * from working where designationid=:new.designationid and enddate is null;
strt payscale.startingsalary%type;
incr payscale.yearlyincrement%type;
oldincr payscale.yearlyincrement%type;
begin
	select startingsalary into strt from payscale where grade=:new.grade;
	select yearlyincrement into incr from payscale where 
	grade=:new.grade;
	select yearlyincrement into oldincr from payscale where 
	grade=:old.grade;
	for emp in cur
	loop
		salary_change(emp.oid,strt,incr,oldincr);
	end loop;
end;
/

create or replace trigger update_payscale
before update  on payscale
for each row
when (old.grade=new.grade)
declare 
cursor cur is
select oid from working a,designation b where a.designationid=b.designationid and enddate is null and b.grade=:new.grade;
begin
	for emp in cur
	loop
		salary_change(emp.oid,:new.startingsalary,:new.yearlyincrement,:old.yearlyincrement);
	end loop;
end;
/


create or replace procedure salary_change(ooid officer.oid%type,newstart payscale.startingsalary%type,incr payscale.yearlyincrement%type,oldincr payscale.yearlyincrement%type) is
newsal payscale.startingsalary%type;
currentsal payscale.startingsalary%type;
sdate working.startdate%type;
dummy int;
begin
	dbms_output.put_line('asi');
	select count(*) into dummy from working where oid=ooid and enddate is null;
	if dummy=0 then newsal:=newstart;
	else
		select startdate into sdate from working where oid=ooid and enddate is null;
		select floor(months_between(sysdate,sdate ) /12)*oldincr into currentsal from dual;
		select salarybase+currentsal into currentsal from officer where oid=ooid;
		if currentsal<=newstart then
			newsal:=newstart;
		elsif currentsal>newstart then
			newsal:=newstart;
			while newsal<currentsal loop
				newsal:= newsal+incr;
			end loop;
		end if;
	end if;
	DBMS_OUTPUT.PUT_LINE(newstart);
	DBMS_OUTPUT.PUT_LINE(newsal);
	update officer set salarybase=newsal where oid=ooid;
end;
/



/*
insert into officer values(6000000005,'asdfa','aassdfdf','aasdf',22515,'0125254','65421');
insert into officer values(7000000005,'asdf','assdfdf','asdf',215,'01254','65421');

/*
create or replace trigger insert_to_officer
before insert on teacher
for each row
declare
a int;
begin
	select count(*) into a from officer where oid=:new.t_id;
	dbms_output.put_line('check_date trigger successfully executed');
	if a=0 then
	insert into officer(oid) values(:new.t_id);
	end if;
end;

create or replace procedure salary_change(ooid officer.oid%type,newstart payscale.startingsalary%type,newincr payscale.yearlyincrement%type) is
currentsal payscale.startingsalary%type;
begin
	select floor(months_between(sysdate,startingdate ) /12)*incr from dual;
	if currentsal<=newstart then
		newsal:=newstart;
	elsif currentsal>newstart then
		newsal:=newstart;
		while newsal<currentsal do
			newsal:= newsal+incr;
	end if;
end;
/
/
*/

create or replace procedure promote(ooid officer.oid%type,name designation.officename%type,desig designation.designation%type,sdate working.startdate%type default sysdate) is
did designation.designationid%type;
begin
DBMS_OUTPUT.PUT_LINE('asdfadsf');

	select designationid into did from designation where officename=name and desig=designation;
	insert into working(oid,startdate,designationid) values(ooid,sdate,did);
end;
/

create or replace trigger insert_working
before insert  on working 
for each row
when (new.enddate is null)
declare
grd payscale.grade%type;
strt payscale.startingsalary%type;
incr payscale.yearlyincrement%type;
begin
DBMS_OUTPUT.PUT_LINE('\nasdfadsf');
	select grade into grd from designation where designationid=:new.designationid;
	select startingsalary into strt from payscale where grade=grd;
	select yearlyincrement into incr from payscale where 
	grade=grd;
	salary_change(:new.oid,strt,incr);
	update working set enddate=:new.startdate where oid=:new.oid and enddate is null;
end;
/

create or replace trigger update_designation_grade
before update  on designation
for each row
when (old.grade<>new.grade and new.designationid=old.designationid)
declare 
cursor cur is
select * from working where designationid=:new.designationid and enddate is null;
strt payscale.startingsalary%type;
incr payscale.yearlyincrement%type;
begin
	select startingsalary into strt from payscale where grade=:new.grade;
	select yearlyincrement into incr from payscale where 
	grade=:new.grade;
	for emp in cur
	loop
		salary_change(emp.oid,strt,incr);
	end loop;
end;
/

create or replace trigger update_payscale
before update  on payscale
for each row
when (old.grade=new.grade)
declare 
cursor cur is
select oid from working a,designation b where a.designationid=b.designationid and enddate is null and b.grade=:new.grade;
begin
	for emp in cur
	loop
		salary_change(emp.oid,:new.startingsalary,:new.yearlyincrement);
	end loop;
end;
/


create or replace procedure salary_change(ooid officer.oid%type,newstart payscale.startingsalary%type,incr payscale.yearlyincrement%type) is
newsal payscale.startingsalary%type;
currentsal payscale.startingsalary%type;
oldincr payscale.grade%type;
sdate working.startdate%type;
dummy int;
begin
	dbms_output.put_line('asi');
	select count(*) into dummy from working where oid=ooid and enddate is null;
	if dummy=0 then newsal:=newstart;
	else
		select yearlyincrement into oldincr from working a,designation b,payscale c where a.designationid=b.designationid and b.grade=c.grade and a.oid=ooid and a.enddate is null;
		select startdate into sdate from working where oid=ooid and enddate is null;
		select floor(months_between(sysdate,sdate ) /12)*oldincr into currentsal from dual;
		select salarybase+currentsal into currentsal from officer where oid=ooid;
		if currentsal<=newstart then
			newsal:=newstart;
		elsif currentsal>newstart then
			newsal:=newstart;
			while newsal<currentsal loop
				newsal:= newsal+incr;
			end loop;
		end if;
	end if;
	DBMS_OUTPUT.PUT_LINE(newstart);
	DBMS_OUTPUT.PUT_LINE(newsal);
	update officer set salarybase=newsal where oid=ooid;
end;
/







select oid,dependents from officer;

insert into dependant(name,dateofbirth,oid) values('a',sysdate,6000000011);


insert into departments(d_name,d_officeroom,d_code) values('cse',123,'cse');
insert into departments(d_name,d_officeroom,d_code) values('eee',13,'eee');

execute insert_teacher(6000000011,'raisul','c@gmail.com','b@gmail.com',null,null,null,'125432',2154,null,null,'cse');

execute insert_teacher(6000000012,'saif','d@gmail.com','b@gmail.com',null,null,null,'125232',214,null,null,'cse');
execute insert_teacher(6000000013,'raisul','e@gmail.com','b@gmail.com',null,null,null,'125432',2154,null,null,'eee');

update departments set f_id=1 where d_code='eee';


execute make_head(6000000011,'cse');
execute make_head(6000000012,'eee');
execute make_head(6000000013,'eee');

insert into faculty values(1,'eee');
insert into faculty values(2,'me');

execute make_dean(6000000011,1);
execute make_dean(6000000012,1);

execute make_dean(6000000013,2);



insert into institute values('iit','as','ilocation');

execute give_additional_responsibility(6000000011,'iit','engineer');
execute give_additional_responsibility(6000000011,'iit','doctor');
execute give_additional_responsibility(6000000012,'iit','engineer');

insert into leave values(1,'normal','khk');
insert into teacher_leave(t_id,l_id,leave_start) values(6000000011,1,sysdate);
update teacher_leave set leave_end=null where t_id=6000000011;
update teacher_leave set leave_end='29-mar-2014' where t_id=6000000011;


//write procedure promote,trigger check teacher of different department being dean/head,trigger check double leave taking,trigger relating to salary.