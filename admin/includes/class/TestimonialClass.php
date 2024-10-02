<?php
require_once('ConnectionClass.php');

class Testimonial
{
    public $TestimonialID, $TestimonialStatusID, $FullName, $Company, $TestimonialRating,
        $TestimonialDescription, $CreateBy, $CreateTime, $UpdateBy, $UpdateTime;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function approveTestimonial($TestimonialID, $TestimonialStatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($TestimonialID) and empty($TestimonialStatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_testimonial SET 
                            TestimonialStatusID = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE TestimonialID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('isi', $TestimonialStatusID, $UpdateBy, $TestimonialID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Testimonial successfully approved";
                } else {
                    echo    "Testimonial failed to approve";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function notApproveTestimonial()
    {
        global $conn;
    }
}
