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
}
