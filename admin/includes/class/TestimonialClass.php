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

    public function createTestimonial($TestimonialStatusID, $FullName, $Company, $TestimonialRating, $TestimonialDescription, $CreateBy)
    {
        global $conn;

        try {
            if (empty($TestimonialStatusID) and empty($FullName) and empty($TestimonialRating) and empty($TestimonialDescription) and empty($CreateBy)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "INSERT INTO tbl_testimonial (TestimonialStatusID, FullName, Company, TestimonialRating, TestimonialDescription, CreateBy) 
                            VALUES (?, ?, ?, ?, ?, ?)";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('isssss', $TestimonialStatusID, $FullName, $Company, $TestimonialRating, $TestimonialDescription, $CreateBy);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    $conn->commit();
                    echo    "Testimonial successfully created";
                } else {
                    echo    "Testimonial failed to create";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
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

    public function notApproveTestimonial($TestimonialID, $TestimonialStatusID, $UpdateBy)
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
                    echo    "Testimonial successfully not approved";
                } else {
                    echo    "Testimonial failed to not approve";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
