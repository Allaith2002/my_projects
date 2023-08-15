USE `laith-db`;

DROP PROCEDURE IF EXISTS spUpdateUserDetails;

DELIMITER //

CREATE PROCEDURE spUpdateUserDetails
(
    id                      INT UNSIGNED,
    UserName                VARCHAR(255),
    Password                VARCHAR(255),
    Email                   VARCHAR(255),
    RoleID                  INT,
    Mobile                  VARCHAR(11),
    FirstName               VARCHAR(50),
    LastName                VARCHAR(50),
    CallSign                VARCHAR(50)
)
BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION
    BEGIN
        ROLLBACK;
        SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
    END;

    START TRANSACTION;

    UPDATE User AS USR
    SET    USR.UserName = UserName,
           USR.Password = Password
    WHERE  USR.Id = id;

    UPDATE Contact AS CON
    INNER JOIN Person AS PRS
        ON CON.PersonId = PRS.Id
    SET    CON.Email = Email,
           CON.Mobile = Mobile
    WHERE  PRS.Id = id;

    UPDATE Person AS PRS
    INNER JOIN UserPerRole AS UPR
        ON PRS.Id = UPR.UserId
    INNER JOIN Role AS RO
        ON UPR.RoleId = RO.Id
    SET    PRS.FirstName = FirstName,
           PRS.LastName = LastName,
           PRS.CallSign = CallSign,
           UPR.RoleId = RoleID
    WHERE  PRS.Id = id;

    COMMIT;
END //

DELIMITER ;

CALL spUpdateUserDetails(
    1,                 -- id
    'new_username',    -- UserName
    'new_password',    -- Password
    'new_email@example.com',  -- Email
    1,                 -- RoleID (1 for admin, 2 for member)
    '12345678901',     -- Mobile
    'New First Name',  -- FirstName
    'New Last Name',   -- LastName
    'New CallSign'     -- CallSign
);
