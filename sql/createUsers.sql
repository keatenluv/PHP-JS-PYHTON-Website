USE phpTest;

Drop Table if Exists users;

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