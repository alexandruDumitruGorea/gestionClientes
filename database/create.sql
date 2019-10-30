create database gestionClientes;
create user admin@localhost identified with mysql_native_password by 'clientes-BD-2019';
grant all on gestionClientes.* to admin@localhost;
flush privileges;