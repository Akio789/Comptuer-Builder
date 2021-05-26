

insert into computer_builder.components(type,socket,capacity,name,brand,price ,cores,frequency_boost)
values ("cpu", "LGA2066", 3.60, "Intel Corei-7-7820X X-series Processor" , "Intel", 7899.00, 8,"4.50" );

insert into computer_builder.components(type,socket,capacity,name,brand,price ,cores,frequency_boost)
values ("cpu", "AM4", 3.90, "AMD Ryzen™ 7 3700X" , "AMD", 8599.00, 8,"4.4" );

insert into computer_builder.components(type,socket,capacity,name,brand,price ,cores,frequency_boost)
values ("cpu", "LGA2066", 4.50, "Intel Core i9-10900X" , "Intel", 15199.00, 10,"4.70" );


insert into computer_builder.components(type,socket,capacity,name,brand,price,speed)
values ("ram", "DDR4", 8 , "Corsair Vengeance CMW16GX4M2C3200C16" , "Corsair", 2499.00, "3200" );

insert into computer_builder.components(type,socket,capacity,name,brand,price,speed)
values ("ram", "DDR4", 8 , "HyperX RAM Fury " , "Corsair", 979.00, "2400" );

insert into computer_builder.components(type,socket,capacity,name,brand,price,speed)
values ("ram", "DDR4", 16 , "Corsair Vengeance RGB Pro" , "Corsair", 2499.00, "3000" );



insert into computer_builder.components(type,socket,capacity,name,brand,price,core_frequency,core_boost,gpu_size)
values ("gpu", "PCIex4", 1 , "MSI TVIMSI500" , "MSI", 969.00, "589", "1000" , "");

insert into computer_builder.components(type,socket,capacity,name,brand,price,core_frequency,core_boost,gpu_size)
values ("gpu", "PCIex16", 4 , "GeForce GTX 1050 Ti" , "NVIDIA", 7999.00, "1291 ", "1392 " ,"" );

insert into computer_builder.components(type,socket,capacity,name,brand,price,core_frequency,core_boost,gpu_size)
values ("gpu", "PCIex16", 24 , "GGeForce RTX 3090" , "NVIDIA", 4499.00, "1395", "1695" ,"" );



insert into computer_builder.components(type,socket,capacity,name,brand,price,cache,interface)
values ("ssd", "b-key", 480 , "ADATA SSD SU630" , "ADATA", 1170.00, "5000", "Serial ATA-600");

insert into computer_builder.components(type,socket,capacity,name,brand,price,cache,interface)
values ("ssd", "b-key", 960 , "Kingston SSD A400" , "Kingston", 1899.00, "6000", "Serial ATA-600");


insert into computer_builder.components(type,socket,capacity,name,brand,price,cache,interface)
values ("ssd", "b-key", 1000 , "KingShark SSD 1TB" , "KingShark", 2799.00, "6000", "Serial ATA-600");



insert into computer_builder.components(type,socket,capacity,name,brand,price,cache,interface)
values ("hdd", "SATA 3", 2000 , "WD WD2003FZEX" , "WD", 2299.00, "6000", "Serial ATA");

insert into computer_builder.components(type,socket,capacity,name,brand,price,cache,interface)
values ("hdd", "SATA 3", 4000 , "Seagate IronWolf" , "Seagate", 2799.00, "5900", "Serial ATA");

insert into computer_builder.components(type,socket,capacity,name,brand,price,cache,interface)
values ("hdd", "SATA 3", 2000 , "Seagate BarraCuda" , "Seagate", 1299.00, "7200", "Serial ATA");


insert into computer_builder.components(type,socket,capacity,name,brand,price,noise,cooler_size,radiator)
values ("cooler", "LGA2066", 120 , "Cooler Master MasterLiquid ML240L RGB V2" , "Cooler Master", 1799.00,"15db" ,"27X11" ,"240" );

insert into computer_builder.components(type,socket,capacity,name,brand,price,noise,cooler_size,radiator)
values ("cooler", "LGA2066", 240 , "STRIX LC RGB Edición Blanca" , "Asus", 3799.00,"37.6db" ,"35X13" ,"240" );

insert into computer_builder.components(type,socket,capacity,name,brand,price,noise,cooler_size,radiator)
values ("cooler","AM4", 120 , "MAG CORELIQUID 240R" , "MSI", 2199.00,"16.7.6db" ,"31X13" ,"240" );

insert into computer_builder.components(type,socket,capacity,name,brand,price)
values ("cabinet", "atx", "" , "Corsair iCUE 220 " , "Corsair", 3999.00 );

insert into computer_builder.components(type,socket,capacity,name,brand,price)
values ("cabinet", "micro-atx", "" , "MasterBox Q300L " , "Cooler Master", 1999.00 );

insert into computer_builder.components(type,socket,capacity,name,brand,price)
values ("cabinet", "micro-atx", "" , "TUF GAMING GT501 GRY" , "Asus", 4199.00 );


insert into computer_builder.components(type,socket,capacity,name,brand,price,certification,power_supply_type)
values ("power_supply", "ATX", 550  , "ROG-STRIX-550G" , "Asus", 2999.00, "80 Plus Gold", ""   );

insert into computer_builder.components(type,socket,capacity,name,brand,price,certification,power_supply_type)
values ("power_supply", "SFX", 500  , "500 BR" , "EVGA ", 1199.00, "80 Plus Bronze", ""  );

insert into computer_builder.components(type,socket,capacity,name,brand,price,certification,power_supply_type)
values ("power_supply", "ATX", 1020, "Thermaltake CSP-328" , "Thermaltake", 3399.00, "80 Plus Gold", ""  );



insert into computer_builder.motherboards (name,brand,max_memory,price,socket,size)
values ("Asus Prime X299", "Asus", "256", 8418.00,"LGA2066","atx"  );

insert into computer_builder.motherboards (name,brand,max_memory,price,socket,size)
values ("Asus Motherboard Prime B450M-A II", "Asus", "128", 1799.00,"AM4","micro-atx");

insert into computer_builder.motherboards (name,brand,max_memory,price,socket,size)
values ("EVGA X299", "EVGA", "128", 6599.00,"LGA2066","micro-atx");