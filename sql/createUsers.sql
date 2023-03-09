USE phpTest;

Drop Table if Exists users;
Drop Table if Exists podcasts;

Create Table Users (
	ID int NOT NULL UNIQUE AUTO_INCREMENT,
    Username varchar(255) NOT NULL,
    Pass varchar(255) NOT NULL
);
INSERT into users (
    Username,
    Pass
) Values (
    "keaton",
    "love"
);

INSERT into users (
    Username,
    Pass
) Values (
    "lex",
    "friedman"
);

Select * FROM users WHERE Username='keaton' and Pass='love';
Select * FROM podcasts;

DELETE FROM podcasts where Duration_ms=0;

Create Table Podcasts (
	ID INT auto_increment PRIMARY KEY,
    Guest varchar(255),
    Title varchar(255),
    Releasedate datetime,
    Duration_ms int,
    Notes varchar(255)
);

INSERT into Podcasts (
	Guest,
	Title,
    Releasedate,
    Duration_ms,
    Notes
) Values (
	 "Elon Musk",
     "SpaceX",
     '20180302',
     420,
     "This is a note"
);