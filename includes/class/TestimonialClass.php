<?php
require_once('ConnectionClass.php');

class Testimonial
{
    public $TestimonialID, $TestimonialStatusID, $FullName, $Company, $TestimonialRating,
        $TestimonialDescription;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchTestimonial($TestimonialStatusName = 'Approve')
    {
        global $conn;

        try {
            if (empty($TestimonialStatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.TestimonialID, b.TestimonialStatusID, b.TestimonialStatusName, a.FullName, 
                    a.Company, a.TestimonialRating, a.TestimonialDescription FROM tbl_testimonial a 
                    LEFT OUTER JOIN tbl_testimonial_status b ON a.TestimonialStatusID = b.TestimonialStatusID 
                    WHERE b.TestimonialStatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("s", $TestimonialStatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $TestimonialID,
                    $TestimonialStatusID,
                    $TestimonialStatusName,
                    $FullName,
                    $Company,
                    $TestimonialRating,
                    $TestimonialDescription
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'TestimonialID'             => $TestimonialID,
                        'TestimonialStatusID'       => $TestimonialStatusID,
                        'TestimonialStatusName'     => $TestimonialStatusName,
                        'FullName'                  => $FullName,
                        'Company'                   => $Company,
                        'TestimonialRating'         => $TestimonialRating,
                        'TestimonialDescription'    => $TestimonialDescription
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
                    echo    "<script>
                                alert('Thank you for providing testimony!');
                                document.location = '../../index'; 
                            </script>";
                } else {
                    echo    "<script>
                                alert('Testimonials failed to create');
                                document.location = '../../index'; 
                            </script>";
                }
            }
            $stmt->close();
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
