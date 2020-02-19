/* ============================================================ */
/*   Database name:  VIDEOCHAT                                  */
/*   DBMS name:      Sybase AS Anywhere 6                       */
/*   Created on:     06/11/2005  23:45                          */
/* ============================================================ */

/* ============================================================ */
/*   Table: FAQ                                                 */
/* ============================================================ */
create table FAQ
(
    FAQ_ID               int                   not null,
    FAQ_QUESTION         blob                          ,
    FAQ_ANSWER           blob                          ,
    primary key (FAQ_ID)
);

/* ============================================================ */
/*   Table: COUNTRY                                             */
/* ============================================================ */
create table COUNTRY
(
    COU_ID               int                   not null,
    COU_NAME             varchar(200)                  ,
    primary key (COU_ID)
);

/* ============================================================ */
/*   Table: CREDITCARD                                          */
/* ============================================================ */
create table CREDITCARD
(
    CC_ID                int                   not null,
    CC_NAME              varchar(100)                  ,
    primary key (CC_ID)
);

/* ============================================================ */
/*   Table: STATUS                                              */
/* ============================================================ */
create table STATUS
(
    STA_ID               int                   not null,
    STA_NAME             varchar(100)                  ,
    primary key (STA_ID)
);

/* ============================================================ */
/*   Table: USER                                                */
/* ============================================================ */
create table USER
(
    USER_ID              varchar(20)           not null,
    USER_PASSWORD        varchar(20)                   ,
    USER_NAME            varchar(200)                  ,
    USER_NICKNAME        varchar(100)                  ,
    SEX_ID               varchar(10)                   ,
    USER_AGE             int                           ,
    MARSTA_ID            varchar(10)                   ,
    COU_ID               int                   not null,
    USER_STATE           varchar(200)                  ,
    USER_CITY            varchar(200)                  ,
    USER_EMAIL           varchar(200)                  ,
    USER_PHOTO           varchar(250)                  ,
    USER_PUBLIC          char(1)                       ,
    PLAN_ID              int                           ,
    primary key (USER_ID)
);

/* ============================================================ */
/*   Table: PLAN                                                */
/* ============================================================ */
create table PLAN
(
    PLAN_ID              int                   not null,
    USER_ID              varchar(20)                   ,
    PLAN_NAME            varchar(100)                  ,
    PLAN_COST            decimal(10,2)                 ,
    PLAN_DURATION        int                           ,
    primary key (PLAN_ID)
);

/* ============================================================ */
/*   Table: BILLXUSER                                           */
/* ============================================================ */
create table BILLXUSER
(
    BILLUSER_ID          int                   not null,
    USER_ID              varchar(20)           not null,
    CC_ID                int                   not null,
    BILLUSER_HOLDERNAME  varchar(200)                  ,
    BILLUSER_NUMBER      varchar(50)                   ,
    BILLUSER_EXPMONTH    int                           ,
    BILLUSER_EXPYEAR     int                           ,
    BILLUSER_ADDRESS     varchar(250)                  ,
    primary key (BILLUSER_ID)
);

/* ============================================================ */
/*   Table: CONTACTXUSER                                        */
/* ============================================================ */
create table CONTACTXUSER
(
    USER_ID              varchar(20)           not null,
    CONTACT_ID           varchar(20)           not null,
    primary key (USER_ID, CONTACT_ID)
);

/* ============================================================ */
/*   Table: STATUSXUSER                                         */
/* ============================================================ */
create table STATUSXUSER
(
    USER_ID              varchar(20)           not null,
    STA_ID               int                   not null,
    STAXUSER_DATE        datetime                      ,
    primary key (USER_ID, STA_ID)
);

/* ============================================================ */
/*   Table: AUTHREQUESTXUSER                                    */
/* ============================================================ */
create table AUTHREQUESTXUSER
(
    FROMUSER_ID          varchar(20)           not null,
    TOUSER_ID            varchar(20)           not null,
    AUTREQUSER_COMMENT   blob                          ,
    AUTREQUSER_DATE      datetime                      ,
    primary key (FROMUSER_ID, TOUSER_ID)
);

alter table USER
    add foreign key FK_USER_COUXUSER_COUNTRY (COU_ID)
       references COUNTRY (COU_ID) on update restrict on delete restrict;

alter table PLAN
    add foreign key FK_PLAN_USERXPLAN_USER (USER_ID)
       references USER (USER_ID) on update restrict on delete restrict;

alter table BILLXUSER
    add foreign key FK_BILLXUSE_USERXBILL_USER (USER_ID)
       references USER (USER_ID) on update restrict on delete restrict;

alter table BILLXUSER
    add foreign key FK_BILLXUSE_CCBILLXUS_CREDITCA (CC_ID)
       references CREDITCARD (CC_ID) on update restrict on delete restrict;

alter table CONTACTXUSER
    add foreign key FK_USERXCONXUSER (USER_ID)
       references USER (USER_ID) on update restrict on delete restrict;

alter table CONTACTXUSER
    add foreign key FK_USERXCONXUSER1 (CONTACT_ID)
       references USER (USER_ID) on update restrict on delete restrict;

alter table STATUSXUSER
    add foreign key FK_STATUSXU_USERXSTAT_USER (USER_ID)
       references USER (USER_ID) on update restrict on delete restrict;

alter table STATUSXUSER
    add foreign key FK_STATUSXU_STATUSXST_STATUS (STA_ID)
       references STATUS (STA_ID) on update restrict on delete restrict;

alter table AUTHREQUESTXUSER
    add foreign key FK_USERXAUTHREQ (FROMUSER_ID)
       references USER (USER_ID) on update restrict on delete restrict;

alter table AUTHREQUESTXUSER
    add foreign key FK_USERXAUTHREQ1 (TOUSER_ID)
       references USER (USER_ID) on update restrict on delete restrict;

