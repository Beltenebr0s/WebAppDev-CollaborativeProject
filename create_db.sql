create table campuses(
    id int not null,
    campus_name varchar(20)  not null,

    constraint PK_CAMPUS primary key (id)
);

create table users(
    id int not null,
    real_name varchar(50) not null,
    surname1 varchar(50) not null,
    surname2 varchar(50) ,
    enrollment_number varchar(9) not null,
    tec_email varchar(16) not null,
    passwd varchar(32) not null,
    campus_id int not null,

     constraint PK_USERS primary key (id),
    --  constraint FK_USERS_CAMPUSES foreign key (campus_id) references campuses(id)
);

create table products(
    id int not null,
    title varchar(100) not null,
    product_description varchar(3000),
    owner_id int not null,

     constraint PK_PRODUCTS primary key (id),
    --  constraint FK_PRODUCTS_USERS foreign key (owner_id) references users(id)
);

create table images(
    id int not null,
    img_name varchar(32) not null,
    product_id int not null,

     constraint PK_IMAGES primary key (id),
    --  constraint FK_IMG_PRODUCT foreign key (product_id) references products(id)
);

create table categories (
    id int not null,
    category_name varchar(50) not null,

     constraint PK_CATEGORIES primary key (id)
);

create table category_product (
    category_id int not null,
    product_id int not null,

     constraint PK_CATEGORY_PRODUCT primary key (category_id, product_id),
    --  constraint FK_CATPROD_CATEGORY foreign key (category_id) references categories(id),
    --  constraint FK_CATPROD_PRODUCT foreign key (product_id) references products(id)
);


-- INSERT INTO `campuses` (`id`, `campus_name`) VALUES (NULL, 'Querétaro');
-- INSERT INTO `campuses` (`id`, `campus_name`) VALUES (NULL, 'Monterrey');
-- INSERT INTO `campuses` (`id`, `campus_name`) VALUES (NULL, 'Ciudad de México');
-- INSERT INTO `campuses` (`id`, `campus_name`) VALUES (NULL, 'Cuernavaca');
-- INSERT INTO `campuses` (`id`, `campus_name`) VALUES (NULL, 'Toluca');
-- INSERT INTO `campuses` (`id`, `campus_name`) VALUES (NULL, 'Puebla');
