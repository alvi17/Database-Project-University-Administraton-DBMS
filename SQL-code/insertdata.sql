
INSERT INTO Faculty values(5001,'Faculty of Engineering');
INSERT INTO Faculty values(5002,'Faculty of Civil Engineering');
INSERT INTO Faculty values(5003,'Faculty of Mechanical Engineering');
INSERT INTO Faculty values(5004,'Faculty of Electrical and Electronic Engineering');
INSERT INTO Faculty values(5005,'Faculty Architecture and Planning');

INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Electrical And Electronics Enginnering',105,5004,'EEE');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Computer Science And Engineering',305,5004,'CSE');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Civil Engineering',405,5002,'CE');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Mechanical Engineering',705,5003,'ME');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Industraial and Production Engineering',706,5003,'IPE');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Materials and Metallurgical Engineering',107,5001,'MME');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Naval Architecture and Marine Engineeting',707,5003,'NAME');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Architecture',205,5005,'ARCHI');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Urban and Regional Planning',206,5005,'URP');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Humanities',207,5005,'HUM');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Chemical Engineering',108,5001,'CHE');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Chemistry',120,5001,'CHEM');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Physics ',115,5001,'PHY');
INSERT INTO Departments(D_Name,D_Officeroom,F_Id,D_Code) values('Department of Water Resources Engineering',408,5002,'WRE');


INSERT INTO OFFICER VALUES(6000000001,' Md. Anwarul Hasan',null,'anarul@gmail.com',null,'016722137','0278800');
INSERT INTO OFFICER VALUES(6000000002,'A.S.M. Mainul Ahsan',null,'mainul@gmail.com',null,'016722177','0278833');
INSERT INTO OFFICER VALUES(6000000003,'Ahmed Tareq',null,'tarek@gmail.com',null,'0167724777','0278833');
INSERT INTO OFFICER VALUES(6000000004,'Ahsan Khan',null,'ahsan@gmail.com',null,'016774577','0278833',);
INSERT INTO OFFICER VALUES(6000000005,'A.N.M. Ahtesham Rafiq',null,'anm@gmail.com',null,'016777777','0278833');
INSERT INTO OFFICER VALUES(6000000006,'Dr.Md.Masroor Ali','mma@buet.ac.bd','mma@gmail.com',30000,'016777777','0278833');
INSERT INTO OFFICER VALUES(6000000007,'Dr.SM Forhad','smf@buet.ac.bd','sfa@gmail.com',30000,'016777347','0275333');
INSERT INTO OFFICER VALUES(6000000008,'Dr.Mohammad Mahfuzul Islam','mahfuz@cse.buet.ac.bd','mahfuzul.islam@gmail.com',30000,'016777457','0278842');
INSERT INTO OFFICER VALUES(6000000009,'Dr.M. Kaykobad','kaykobad@buet.ac.bd','mka@gmail.com',30000,'015347777','029433');
INSERT INTO OFFICER VALUES(6000000010,'Dr.M. Sohel Rahman','msrahman@cse.buet.ac.bd','msrahman@gmail.com',30000,'011777777','0278999',);
INSERT INTO OFFICER VALUES(6000000011,'Dr.Mahmuda Naznin','mahmudanaznin@cse.buet.ac.bd','mahmudanaznin@gmail.com',25000,'011777777','0278999');
INSERT INTO OFFICER VALUES(6000000012,'Dr.Mohammed Eunus Ali ','eunus@cse.buet.ac.bd','eunus@gmail.com',25000,'0117777453','02789309');
INSERT INTO OFFICER VALUES(6000000013,'Anindya Iqbal ','aninda@cse.buet.ac.bd','anynda@gmail.com',20000,'0177777453','02389309');
INSERT INTO OFFICER VALUES(6000000014,'Shubhra Kanti Karmaker','kanti@cse.buet.ac.bd','skk@gmail.com',20000,'0187777453','02785709');
INSERT INTO OFFICER VALUES(6000000015,'Sajjadur Rahman','rahmansunny@cse.buet.ac.bd','rahmansunny@gmail.com',20000,'0182777453','02753709');
INSERT INTO OFFICER VALUES(6000000016,'Imran Momtaz','mamtaz@ee.buet.ac.bd','momtaz@gmail.com',20000,'0153777453','02253709');

execute insert_teacher(' Md. Anwarul Hasan','anarul@gmail.com','anarul@gmail.com',null,'016722137','0278800','125432',354,null,null,'EEE','working');
execute insert_teacher('Md. Monwarul Islam','mic@gmail.com','mic@gmail.com',30000,'0167224','025432',250,null,null,'CSE','working');
execute insert_teacher('Dr.Md.Masroor Ali','mma@gmail.com','mma@gmail.com',30000,'016777777','0278833','125424',204,null,null,'CSE','working');
execute insert_teacher('Dr.SM Forhad','smf@gamil.com','sfa@gmail.com',30000,'016777347','0275333','125440',2154,null,null,'CSE','working');


execute insert_teacher('raisul','c@gmail.com','b@gmail.com',null,null,null,'125432',2154,null,null,null);
execute insert_teacher('raisul','c@gmail.com','b@gmail.com',null,null,null,'125432',2154,null,null,null);




INSERT INTO Dean_Faculty(T_ID,F_ID) values(6000000006,5004);
INSERT INTO Dean_Faculty(T_ID,F_ID,Finishing_date) values(6000000006,5004,'23-APril-2013');



INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Institute of Water and Flood Management','IWFM','OAB');
INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Institute of Appropriate Technology ','IAT','Civil Building');
INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Institute of Information and Communication Technology','IICT','New Academic Building');
INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Directorate of Advisory, Extension and Research Services','DAERS','New Academic Building');
INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Directorate of Students Welfare','DSW','BUET Play Ground');
INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Directorate of Planning and Development','DPD','Architecture Building');
INSERT INTO INSTITUTE(I_Name,I_Code,I_Location) values('Directorate of Continuing Education','DCE','Architecture Building');

INSERT INTO Additional_Responsibility values('IICT',6000000006,'Director','20-Mar-2014',null);
INSERT INTO Additional_Responsibility values('IICT',6000000007,'Member','20-Mar-2014',null);
INSERT INTO Additional_Responsibility values('IICT',6000000001,'Member','20-Mar-2013','20-Mar-2013');
INSERT INTO Additional_Responsibility values('IAT',6000000012,'Director','20-Mar-2014',null);

 


insert into office values('Office of the Vice-Chancellor','register building','9665650-80','8613046');
insert into office values('Office of the Registrar','register building','9665650-80','8613046');
insert into office values('Office of the Controller of Examinations','Exam controller building','9665650-80','8613046');
insert into office values('Office of the Comptroller','register building','9665650-80','8613046');
insert into office values('Office of the Librarian','library building','9665650-80','8613046');

insert into payscale values(5,30000,1000,'11-mar-2009');
insert into payscale values(6,25000,800,'11-mar-2009');
insert into payscale values(7,20000,700,'11-mar-2009');
insert into payscale values(8,18000,500,'11-mar-2009');
insert into payscale values(9,15000,300,'11-mar-2009');
insert into payscale values(10,10000,200,'11-mar-2009');

insert into designation(designation,officename,officetelephone,roomno,grade) values('Deputy Registrar','Office of the Registrar','966 5616,7141',512,7);
insert into designation(designation,officename,officetelephone,roomno,grade) values('Asstt.Programmer','Office of the Registrar','966 5616,7161',515,9);
insert into designation(designation,officename,officetelephone,roomno,grade) values('Asssitant register','Office of the Registrar','966 5616,7501',513,8);
insert into designation(designation,officename,officetelephone,roomno,grade) values('Administrative Officer (Estab.)','Office of the Registrar','966 5616,7503',514,8);
insert into designation(designation,officename,officetelephone,roomno,grade) values('Lecturer',null,null,null,10);
insert into designation(designation,officename,officetelephone,roomno,grade) values('Assistant professor',null,null,null,9);
insert into designation(designation,officename,officetelephone,roomno,grade) values('associate professor',null,null,null,8);
insert into designation(designation,officename,officetelephone,roomno,grade) values('professor',null,null,null,7);

execute insert_employee('Engr. Rakib Ahmed Saleh','rakib@buet.ac.bd',null,0,null,null);
execute insert_employee('Amit Bosu','amit@buet.ac.bd',null,0,null,null);
execute insert_employee('Md. Sayed Ali','sayedali@buet.ac.bd',null,0,null,null);
execute insert_employee('Md. Nurul Islam','nurul@buet.ac.bd',null,0,null,null);


execute promote(7000000000,'Office of the Registrar','Asssitant register',sysdate);
execute promote(7000000000,'Office of the Registrar','Deputy Registrar',sysdate);
update payscale set startingsalary=21000 where grade=7;

execute update_designation('Office of the Registrar','Deputy Registrar',6);

execute update_designation('Office of the Registrar','Deputy Registrar',9);

execute promote(7000000001,'Office of the Registrar','Asssitant register');
execute promote(7000000001,'Office of the Registrar','Deputy Registrar');

execute promote(7000000042,'Office of the Registrar','Asssitant register');

execute promote(6000000007,'Office of the Registrar','Asssitant register');
execute promote(6000000008,'Office of the Registrar','Asssitant register');

insert into teacher_leave values(".$tid.",".$lid.",'".to_date($sdate,'dd-MM-YYYY')."','".to_date($fdate,'dd-MM-YYYY')."')



//query of search

//search
select b.oid,d.d_name,b.name,b.universityemail,min(c.startdate) from teacher a,officer b,working c,departments d where a.d_id=d.d_id and a.t_id=b.oid and b.oid=c.oid and b.name like '%as%' and d.d_name like '%Comp%' group by b.oid,b.name,b.universityemail,d.d_name having (select floor(months_between(sysdate,min(c.startdate) ) /12) from dual)>=0;

//leave
select a.t_id,count(*),a.status from teacher a, teacher_leave b where a.t_id=b.t_id and (select floor(months_between(sysdate,min(b.leave_start) ) /12) from dual)>=2 group by a.t_id,a.status;

//promotioin
select a.oid,b.name,count(*),max(startdate),max(enddate) from working a,officer b where a.oid=b.oid and (select floor(months_between(sysdate,min(a.enddate) ) /12) from dual)<=0 group by a.oid,b.name ;


//
update payscale set startingsalary=21000 where grade=7;

//
execute update_designation('Office of the Registrar','Deputy Registrar',6);

// insert into medicalrecord(oid,description,recorddate);

//medical
select a.oid,b.name,count(*),max(startdate),max(enddate) from working a,officer b where a.oid=b.oid and (select floor(months_between(sysdate,min(a.enddate) ) /12) from dual)<=0 group by a.oid,b.name ;



 having (select floor(months_between(max(startdate),max(enddate)) *30) from dual)<1





