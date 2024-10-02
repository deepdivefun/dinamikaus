<?php
require_once('ConnectionClass.php');

class StatusTestimonial
{
    public $TestimonialStatusID, $TestimonialStatusName;
    
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchStatusTestimonial()
    {
        global $conn;

        $query  = "SELECT TestimonialStatusID, TestimonialStatusName FROM tbl_testimonial_status";
        $stmt   = $conn->prepare($query);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($TestimonialStatusID, $TestimonialStatusName);
        $result = [];

        while ($stmt->fetch()) {
            $conn->commit();
            $result[] = [
                'TestimonialStatusID'      => $TestimonialStatusID,
                'TestimonialStatusName'    => $TestimonialStatusName
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
