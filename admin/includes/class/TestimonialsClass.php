<?php
require_once('ConnectionClass.php');

class Testimonials
{
    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function reviewTestimonials($TestimonialsID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($TestimonialsID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_testimonials SET 
                            StatusID = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE TestimonialsID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('isi', $StatusID, $UpdateBy, $TestimonialsID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Testimonials successfully reviewed";
                } else {
                    echo    "Testimonials failed to review";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }

    public function approveTestimonials($TestimonialsID, $StatusID, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($TestimonialsID) and empty($StatusID) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "UPDATE tbl_testimonials SET 
                            StatusID = ?, 
                            UpdateBy = ?,
                            UpdateTime = NOW()
                            WHERE TestimonialsID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('isi', $StatusID, $UpdateBy, $TestimonialsID);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Testimonials successfully approved";
                } else {
                    echo    "Testimonials failed to approve";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
