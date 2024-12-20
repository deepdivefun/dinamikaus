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

    // Product Category Navbar
    public function fetchProductNavbar($StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName, 
                            a.ProductCategoryPhoto FROM tbl_product_category a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ? ORDER BY a.ProductCategoryID ASC";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('s', $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductCategoryID,
                    $StatusID,
                    $StatusName,
                    $ProductCategoryName,
                    $ProductCategoryPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductCategoryID'     => $ProductCategoryID,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductCategoryName'   => $ProductCategoryName,
                        'ProductCategoryPhoto'  => $ProductCategoryPhoto
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

    // Telusuri Kategory Populer
    public function fetchProductCategory($StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName, 
                            a.ProductCategoryPhoto FROM tbl_product_category a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('s', $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductCategoryID,
                    $StatusID,
                    $StatusName,
                    $ProductCategoryName,
                    $ProductCategoryPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductCategoryID'     => $ProductCategoryID,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductCategoryName'   => $ProductCategoryName,
                        'ProductCategoryPhoto'  => $ProductCategoryPhoto
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

    // E-Catalogue
    public function fetchProductECatalogue($StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName, 
                            a.ProductCategoryPhoto FROM tbl_product_category a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('s', $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductCategoryID,
                    $StatusID,
                    $StatusName,
                    $ProductCategoryName,
                    $ProductCategoryPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductCategoryID'     => $ProductCategoryID,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductCategoryName'   => $ProductCategoryName,
                        'ProductCategoryPhoto'  => $ProductCategoryPhoto
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

    // E-Catalogue By ID
    public function fetchProductECatalogueByID($ProductCategoryID, $StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName, 
                            a.ProductCategoryCatalog ,a.ProductCategoryPhoto FROM tbl_product_category a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE a.ProductCategoryID = ? AND b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('is', $ProductCategoryID, $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductCategoryID,
                    $StatusID,
                    $StatusName,
                    $ProductCategoryName,
                    $ProductCategoryCatalog,
                    $ProductCategoryPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductCategoryID'         => $ProductCategoryID,
                        'StatusID'                  => $StatusID,
                        'StatusName'                => $StatusName,
                        'ProductCategoryName'       => $ProductCategoryName,
                        'ProductCategoryCatalog'    => $ProductCategoryCatalog,
                        'ProductCategoryPhoto'      => $ProductCategoryPhoto
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

    // Product By Category ID Navbar
    public function fetchProductByCategoryID($ProductCategoryID, $StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductID, b.ProductCategoryID, c.StatusID, c.StatusName, a.ProductName, 
                            a.ProductPhoto FROM tbl_product a 
                            LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                            LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                            WHERE b.ProductCategoryID = ? AND c.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('is', $ProductCategoryID, $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductID,
                    $ProductCategoryID,
                    $StatusID,
                    $StatusName,
                    $ProductName,
                    $ProductPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductID'             => $ProductID,
                        'ProductCategoryID'     => $ProductCategoryID,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductName'           => $ProductName,
                        'ProductPhoto'          => $ProductPhoto
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

    // Product By Category ID Navbar Breadcumb
    public function fetchProductByCategoryIDBreadcumb($ProductCategoryID, $StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($ProductCategoryID) and empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductCategoryID, b.StatusID, b.StatusName, a.ProductCategoryName 
                            FROM tbl_product_category a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE a.ProductCategoryID = ? AND b.StatusName = ? LIMIT 1";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('is', $ProductCategoryID, $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductCategoryID,
                    $StatusID,
                    $StatusName,
                    $ProductCategoryName
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductCategoryID'     => $ProductCategoryID,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductCategoryName'   => $ProductCategoryName
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

    // Product By ID
    public function fetchProductByID($ProductID, $StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($ProductID) and empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductID, b.StatusID, b.StatusName, a.ProductName, a.ProductPrice, 
                            a.ProductDescription, a.ProductPhoto FROM tbl_product a 
                            LEFT OUTER JOIN tbl_status b ON a.StatusID = b.StatusID 
                            WHERE a.ProductID = ? AND b.StatusName = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param("is", $ProductID, $StatusName);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result(
                    $ProductID,
                    $StatusID,
                    $StatusName,
                    $ProductName,
                    $ProductPrice,
                    $ProductDescription,
                    $ProductPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductID'             => $ProductID,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductName'           => $ProductName,
                        'ProductPrice'          => $ProductPrice,
                        'ProductDescription'    => $ProductDescription,
                        'ProductPhoto'          => $ProductPhoto
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

    // Product By ID Breadcumb
    public function fetchProductByIDBreadcumb($ProductID, $StatusName = 'Active')
    {
        global $conn;

        try {
            if (empty($ProductID) and empty($StatusName)) {
                throw new Exception("Error Processing Request");
            } else {
                $conn->begin_transaction();

                $query  = "SELECT a.ProductID, b.ProductCategoryID, b.ProductCategoryName, c.StatusID, 
                            c.StatusName, a.ProductName, a.ProductPrice, a.ProductDescription, a.ProductPhoto 
                            FROM tbl_product a 
                            LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID
                            LEFT OUTER JOIN tbl_status c ON a.StatusID = c.StatusID 
                            WHERE a.ProductID = ? AND c.StatusName = ? LIMIT 1";
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
                    $ProductPrice,
                    $ProductDescription,
                    $ProductPhoto
                );

                $result = [];

                while ($stmt->fetch()) {
                    $conn->commit();
                    $result[]   = [
                        'ProductID'             => $ProductID,
                        'ProductCategoryID'     => $ProductCategoryID,
                        'ProductCategoryName'   => $ProductCategoryName,
                        'StatusID'              => $StatusID,
                        'StatusName'            => $StatusName,
                        'ProductName'           => $ProductName,
                        'ProductPrice'          => $ProductPrice,
                        'ProductDescription'    => $ProductDescription,
                        'ProductPhoto'          => $ProductPhoto
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
