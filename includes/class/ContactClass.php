<?php
require_once('ConnectionClass.php');

class Contact
{
    public $ContactID, $StatusID, $ContactNameArea, $ContactAddress, $ContactLinkGmaps, $ContactNumber,
        $CreateBy, $CreateTime, $UpdateBy, $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchContact($StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ContactID, b.StatusID, b.StatusName, a.ContactNameArea, a.ContactAddress, 
                            a.ContactLinkGmaps, a.ContactEmail, a.ContactEmailAlternative, a.ContactNumber 
                            FROM tbl_contact a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ContactID,
                    $StatusID,
                    $StatusName,
                    $ContactNameArea,
                    $ContactAddress,
                    $ContactLinkGmaps,
                    $ContactEmail,
                    $ContactEmailAlternative,
                    $ContactNumber
                );
                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[] = [
                        'ContactID'                 => $ContactID,
                        'StatusID'                  => $StatusID,
                        'StatusName'                => $StatusName,
                        'ContactNameArea'           => $ContactNameArea,
                        'ContactAddress'            => $ContactAddress,
                        'ContactLinkGmaps'          => $ContactLinkGmaps,
                        'ContactEmail'              => $ContactEmail,
                        'ContactEmailAlternative'   => $ContactEmailAlternative,
                        'ContactNumber'             => $ContactNumber,
                    ];
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }

        return $result;
        $conn->close();
    }
}
