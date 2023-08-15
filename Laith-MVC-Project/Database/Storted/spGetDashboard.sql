
USE `laith-db`;


    DROP PROCEDURE IF EXISTS spGetDashboard;
    
    DELIMITER //
    
	CREATE PROCEDURE spGetDashboard()
	BEGIN
        DECLARE EXIT HANDLER FOR SQLEXCEPTION
        BEGIN
            ROLLBACK;
            SELECT 'An error has occurred, operation rollbacked and the stored procedure was terminated';
        END;
         
    START TRANSACTION;
    SELECT  USR.Id                                         AS Id
            ,USR.UserName                                 AS UserName
            ,USR.Password								  AS Password
			,CON.Email                                    AS Email
            ,RO.Name                                      AS ROLE
            ,CON.Mobile                                   AS Mobile
            ,PRS.FirstName                                AS FirstName
            ,PRS.LastName                                 AS LastName
            ,PRS.CallSign                                 AS CallSign

    FROM    User AS USR
    INNER JOIN UserPerRole AS UPR
        ON USR.Id = UPR.UserId
    INNER JOIN Role AS RO
        ON UPR.RoleId = RO.Id
    INNER JOIN Person AS PRS
        ON USR.PersonId = PRS.Id
    INNER JOIN Contact AS CON
        ON PRS.Id = CON.PersonId;
    COMMIT;
END //

DELIMITER ;
	
/*****************************************Debug SP*****************************************
    
	CALL spGetDashboard()
	
********************************************************************************************/
    
 

   
   
   