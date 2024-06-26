<?php
// Dr. Carelli (borrowed from Dr. Schwesinger and modified)

/* Function Name: insertUserRecord
 * Description: insert user information into the database
 * Parameters: (string) $name: the user's name
 *             (string) $email: the user's email
 *             (string) $password: the user's password
 * Return Value: (boolean) TRUE if the information was successfully inserted,
 *               otherwise FALSE
 */
function insertUserRecord($name, $email, $password) {

    // try to insert into the database
    // if an error occurs return FALSE
    try {
        $db =  new PDO("sqlite:accounts.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO accounts VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$name, $email, $password]);
        return TRUE;
    }
    catch (Exception $e) {
        print "<p>$e</p>";
        return FALSE;
    }
}

/* Function Name: getUserRecord
 * Description: get user information from the database
 * Parameters: (string) $email: the user's email
 *             (string) $password: the user's password
 * Return Value: (array) The user's record if it exists, otherwise an empty
 *               array
 */
function getUserRecord($email, $password) {

    // try to insert into the database
    // if an error occurs return FALSE
    try {
        $db =  new PDO("sqlite:accounts.db");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM accounts WHERE email=? and password=?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email, $password]);
        // there should only be a single record
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    catch (Exception $e) {
        print "<p>$e</p>";
        return array();
    }
}


?>
