<?php
require_once('ConnectionClass.php');

class Product
{
    public $ProductID, $ProductCategoryID, $StatusID, $ProductName, $ProductDescription, $ProductPhoto;

    private $conn;

    public function __construct()
    {
        global $conn;
        $this->conn = $conn;

        return $this->conn;
    }

    public function fetchProductNavbar($StatusName = "Active")
    {
        global $conn;

        $query  = "SELECT a.ProductID, b.ProductCategoryID, b.ProductCategoryName, b.ProductCategoryPhoto, 
                    c.StatusID, c.StatusName FROM tbl_product a 
                    LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                    LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                    WHERE c.StatusName = ? GROUP BY a.ProductCategoryID ORDER BY a.ProductCategoryID ASC";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("s", $StatusName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $ProductID,
            $ProductCategoryID,
            $ProductCategoryName,
            $ProductCategoryPhoto,
            $StatusID,
            $StatusName
        );

        $result = [];

        while ($stmt->fetch()) {
            $result[]   = [
                'ProductID'             => $ProductID,
                'ProductCategoryID'     => $ProductCategoryID,
                'ProductCategoryName'   => $ProductCategoryName,
                'ProductCategoryPhoto'  => $ProductCategoryPhoto,
                'StatusID'              => $StatusID,
                'StatusName'            => $StatusName
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }

    public function fetchProductByCategoryID($ProductCategoryID, $StatusName = 'Active')
    {
        global $conn;

        $query  = "SELECT a.ProductID, b.ProductCategoryID, b.ProductCategoryName, c.StatusID, 
                    c.StatusName, a.ProductName, a.ProductDescription, a.ProductPhoto FROM tbl_product a 
                    LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                    LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                    WHERE a.ProductCategoryID = ? AND c.StatusName = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("is", $ProductCategoryID, $StatusName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $ProductID,
            $ProductCategoryID,
            $ProductCategoryName,
            $StatusID,
            $StatusName,
            $ProductName,
            $ProductDescription,
            $ProductPhoto
        );

        $result = [];

        while ($stmt->fetch()) {
            $result[]   = [
                'ProductID'             => $ProductID,
                'ProductCategoryID'     => $ProductCategoryID,
                'ProductCategoryName'   => $ProductCategoryName,
                'StatusID'              => $StatusID,
                'StatusName'            => $StatusName,
                'ProductName'           => $ProductName,
                'ProductDescription'    => $ProductDescription,
                'ProductPhoto'          => $ProductPhoto
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }

    public function fetchProductByID($ProductID, $StatusName = 'Active')
    {
        global $conn;

        $query  = "SELECT a.ProductID, b.ProductCategoryID, b.ProductCategoryName, c.StatusID, 
                    c.StatusName, a.ProductName, a.ProductDescription, a.ProductPhoto FROM tbl_product a 
                    LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                    LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                    WHERE a.ProductID = ? AND c.StatusName = ?";
        $stmt   = $conn->prepare($query);
        $stmt->bind_param("is", $ProductID, $StatusName);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $ProductID,
            $ProductCategoryID,
            $ProductCategoryName,
            $StatusID,
            $StatusName,
            $ProductName,
            $ProductDescription,
            $ProductPhoto
        );

        $result = [];

        while ($stmt->fetch()) {
            $result[]   = [
                'ProductID'             => $ProductID,
                'ProductCategoryID'     => $ProductCategoryID,
                'ProductCategoryName'   => $ProductCategoryName,
                'StatusID'              => $StatusID,
                'StatusName'            => $StatusName,
                'ProductName'           => $ProductName,
                'ProductDescription'    => $ProductDescription,
                'ProductPhoto'          => $ProductPhoto
            ];
        }

        return $result;
        $stmt->close();
        $conn->close();
    }
}
