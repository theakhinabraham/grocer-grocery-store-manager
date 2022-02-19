1) Download the ZIP file, rename the folder as "myFolder" and extract it to C://xampp/htdocs/
2) Run Apache and MySQL in Xampp
3) Go to Chrome Browser and go to http://localhost/myFolder/ to run the program
4) Download PHP Extensions in VS Code
5) Create a database named "grocer" with 3 tables in http://localhost/phpmyadmin/

Table no. 1:
1) "customer"
    Cid         int(10) A_I  
    Cname       varchar(100)
    Caddress    varchar(100)
    Cphone      int(12)       ~ While adding Phone Number, Start with 21xxx xxxxx or less
    
2) "employee"
    Eid         int(10) A_I
    Ename       varchar(100)
    Esalary     int(10)
    Eaddress    varchar(100)
    Ephone      int(12)       ~ While adding Phone Number, Start with 21xxx xxxxx or less
   
3) "product"
    Pid         int(10) A_I
    Pname       varchar(100)
    Pprice      int(10)
    Pstock      int(10)
    
    AND ENTER 3 VALUES IN EACH TABLE USING PHPMYADMIN TO MAKE CODE WORK
    
    
