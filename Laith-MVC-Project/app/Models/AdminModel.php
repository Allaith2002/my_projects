<?php

class AdminModel
{
    private Database $Db;

 
    public function __construct(Database $db = new Database)
    {
        $this->Db = $db;
    }

    public function GetDashboard(): array
    {
        try {
            // Use SQL script to fetch all Dashboard from the Dashboard database.
            $getAllDashboardQuery = "CALL spGetDashboard()";

            $this->Db->query($getAllDashboardQuery);

            $result = $this->Db->resultSet();

            return $result ?? [];
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get all Sollicitaties from the database in the AdminModel class method GetDashboard!", 0);
            die('ERROR: Failed to get all Sollicitaties from the database in the AdminModel class method GetDashboard! ' . $ex->getMessage());
        }
    }

    public function GetDashboardById(int $id)
    {
        try {

            // Call the stored procedure from the database.
            $getSelectedApplicant = "CALL spGetDashboardById(:Id_User)";

            $this->Db->query($getSelectedApplicant);
            $this->Db->bind(':Id_User', $id);
            $result = $this->Db->single();

            $DashboardById = ($result);

            return $DashboardById;
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById!", 0);
            die('ERROR: Failed to get Sollicitatie by ID from the database in the AdminModel class method GetDashboardById! ' . $ex->getMessage());
        }
    }

    public function UpdateUserDetails($selectedUser): bool
    {
        try {
            // Check if the 'RoleId' key exists in the $selectedUser array
            if (array_key_exists('RoleId', $selectedUser)) {
                // Call the stored procedure from the database.
                $spQuery = "CALL spUpdateUserDetails(:Id, :UserName, :Password, :Email, :RoleId, :Mobile, :FirstName, :LastName, :CallSign)";
                $this->Db->query($spQuery);

                // Bind values
                $this->Db->bind(':Id', $selectedUser['Id']);
                $this->Db->bind(':UserName', $selectedUser['UserName']);
                $this->Db->bind(':Password', $selectedUser['Password']);
                $this->Db->bind(':Email', $selectedUser['Email']);
                $this->Db->bind(':RoleId', $selectedUser['RoleId']);
                $this->Db->bind(':Mobile', $selectedUser['Mobile']);
                $this->Db->bind(':FirstName', $selectedUser['FirstName']);
                $this->Db->bind(':LastName', $selectedUser['LastName']);
                $this->Db->bind(':CallSign', $selectedUser['CallSign']);

                // Execute the query
                if ($this->Db->execute()) {
                    error_log("INFO: Selected Sollicitatie has been modified in the AdminModel class method UpdateUserDetails!", 0);
                    return true;
                } else {
                    error_log("ERROR: Selected Sollicitatie has not been modified in the AdminModel class method UpdateUserDetails!", 0);
                    return false;
                }
            } else {
                // Handle the case when 'RoleId' key is missing
                throw new Exception("Missing 'RoleId' key in the selectedUser array");
            }
        } catch (PDOException $ex) {
            error_log("ERROR: Failed to update the selected Sollicitatie by ID from the database in the AdminModel class method UpdateUserDetails!", 0);
            die('ERROR: Failed to update the selected Sollicitatie from the database in the AdminModel class method UpdateUserDetails! ' . $ex->getMessage());
        } catch (Exception $ex) {
            // Handle the exception when 'RoleId' key is missing
            error_log($ex->getMessage(), 0);
            return false;
        }
    }
}