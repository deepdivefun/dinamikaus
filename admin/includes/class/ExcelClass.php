<?php
require_once('ConnectionClass.php');
require_once('libs/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Excel
{
    private $conn;

    public function __construct()
    {
        global $conn;

        $this->conn = $conn;

        return $this->conn;
    }

    public function downloadProduct()
    {

        global $conn;

        $conn->begin_transaction();

        $spreadsheet = new Spreadsheet();

        $query = "SELECT a.ProductID, b.ProductCategoryName, c.ProductBrandName, d.StatusName, 
                    a.ProductName, a.ProductPrice, a.ProductDescription FROM tbl_product a 
                    LEFT OUTER JOIN tbl_product_category b ON a.ProductCategoryID = b.ProductCategoryID 
                    LEFT OUTER JOIN tbl_product_brand c ON a.ProductBrandID = c.ProductBrandID 
                    LEFT OUTER JOIN tbl_status d ON a.StatusID = d.StatusID";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result(
            $ProductID,
            $ProductCategoryName,
            $ProductBrandName,
            $StatusName,
            $ProductName,
            $ProductPrice,
            $ProductDescription
        );

        $spreadsheet->setActiveSheetIndex(0)->getAutoFilter()->setRange('A1:G1');
        $spreadsheet->getActiveSheet()->freezePane('A2');
        $spreadsheet->getActiveSheet()->getStyle('G2:G1000')->getAlignment()->setWrapText(true);
        $spreadsheet->getActiveSheet()->getStyle('G2:G' . $spreadsheet->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);
        // $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFont()->setBold(true);
        // $spreadsheet->getActiveSheet()->getStyle('A:G')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A:G')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $spreadsheet->getActiveSheet()->getStyle('A1:G1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('A1E3F9');
        foreach (range('A', 'G') as $columnWidth) {
            $spreadsheet->getActiveSheet()->getColumnDimension($columnWidth)->setAutoSize(true);
        }

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'ProductID')
            ->setCellValue('B1', 'ProductCategoryName')
            ->setCellValue('C1', 'ProductBrandName')
            ->setCellValue('D1', 'StatusName')
            ->setCellValue('E1', 'ProductName')
            ->setCellValue('F1', 'ProductPrice')
            ->setCellValue('G1', 'ProductDescription');

        $row = 2;

        while ($stmt->fetch()) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $row, $ProductID)
                ->setCellValue('B' . $row, $ProductCategoryName)
                ->setCellValue('C' . $row, $ProductBrandName)
                ->setCellValue('D' . $row, $StatusName)
                ->setCellValue('E' . $row, $ProductName)
                ->setCellValue('F' . $row, $ProductPrice)
                ->setCellValue('G' . $row, $ProductDescription);

            $row++;
        }

        $stmt->close();
        $conn->commit();

        $writer     = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $DateTime   = date('d_F_Y_H:i:s');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="DataProduct_' . $DateTime . '.xlsx"' . '; charset=utf-8');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();

        return $this->conn;
    }

    public function isProductExists($ProductID)
    {

        global $conn;

        try {
            if (empty($ProductID)) {
                throw new Exception("Error Processing Request");
            } else {

                $conn->begin_transaction();

                $query  = "SELECT ProductID FROM tbl_product WHERE ProductID = ?";
                $stmt   = $conn->prepare($query);
                $stmt->bind_param('i', $ProductID);
                $stmt->execute();
                $stmt->store_result();
                $stmt->bind_result($ProductID);
                $stmt->fetch();

                if ($stmt->num_rows > 0) {
                    $conn->commit();
                    return true;
                } else {
                    $conn->commit();
                    return false;
                }

                $stmt->close();
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
        $conn->close();
    }

    public function uploadProduct($UploadDataProduct, $UpdateBy)
    {
        global $conn;

        try {
            if (empty($UploadDataProduct) and empty($UpdateBy)) {
                throw new Exception("Error Processing Request");
            } else {

                $conn->begin_transaction();

                $spreadsheet            = IOFactory::load($UploadDataProduct);
                $worksheet              = $spreadsheet->getActiveSheet();
                $highestRow             = $worksheet->getHighestRow();

                for ($row = 2; $row <= $highestRow; $row++) {
                    $ProductID          = $worksheet->getCell('A' . $row)->getValue();
                    $ProductCategoryName = $worksheet->getCell('B' . $row)->getValue();
                    $ProductBrandName   = $worksheet->getCell('C' . $row)->getValue();
                    $StatusName         = $worksheet->getCell('D' . $row)->getValue();
                    $ProductName        = $worksheet->getCell('E' . $row)->getValue();
                    $ProductPrice       = $worksheet->getCell('F' . $row)->getValue();
                    $ProductDescription = $worksheet->getCell('G' . $row)->getValue();

                    if ($ProductCategoryName == "Laptop / Notebook") {
                        $ProductCategoryID = 1;
                    } elseif ($ProductCategoryName == "Dekstop") {
                        $ProductCategoryID = 2;
                    } elseif ($ProductCategoryName == "Monitor") {
                        $ProductCategoryID = 3;
                    } elseif ($ProductCategoryName == "Printer") {
                        $ProductCategoryID = 4;
                    } elseif ($ProductCategoryName == "Proyektor") {
                        $ProductCategoryID = 5;
                    } elseif ($ProductCategoryName == "Aksesoris") {
                        $ProductCategoryID = 6;
                    }

                    if ($ProductBrandName == "ASUS") {
                        $ProductBrandID = 1;
                    } elseif ($ProductBrandName == "ACER") {
                        $ProductBrandID = 2;
                    } elseif ($ProductBrandName == "HP") {
                        $ProductBrandID = 3;
                    } elseif ($ProductBrandName == "LENOVO") {
                        $ProductBrandID = 4;
                    } elseif ($ProductBrandName == "LG") {
                        $ProductBrandID = 5;
                    }

                    if ($StatusName == "Active") {
                        $StatusID = 1;
                    } elseif ($StatusName == "InActive") {
                        $StatusID = 2;
                    }

                    if ($this->isProductExists($ProductID)) {
                        $query  = "UPDATE tbl_product SET 
                                ProductCategoryID = ?, 
                                ProductBrandID = ?, 
                                StatusID = ?, 
                                ProductName = ?, 
                                ProductPrice = ?, 
                                ProductDescription = ?, 
                                UpdateBy = ?,
                                UpdateTime = NOW() 
                                WHERE ProductID = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('iissdssi', $ProductCategoryID, $ProductBrandID, $StatusID, $ProductName, $ProductPrice, $ProductDescription, $UpdateBy, $ProductID);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            $conn->commit();
                            echo    "Update data product successfully";
                        } else {
                            echo    "Failed to update data product";
                        }

                        $stmt->close();
                    } else {
                        $query = "INSERT INTO tbl_product (ProductCategoryID, ProductBrandID, StatusID, ProductName, ProductPrice, ProductDescription, UpdateBy) 
                                VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param('iissdsi', $ProductCategoryID, $ProductBrandID, $StatusID, $ProductName, $ProductPrice, $ProductDescription, $UpdateBy);
                        $stmt->execute();

                        if ($stmt->affected_rows > 0) {
                            $conn->commit();
                            echo    "Upload data product successfully";
                        } else {
                            echo    "Failed to upload data product";
                        }

                        $stmt->close();
                    }
                }
            }
        } catch (Exception $e) {
            $conn->rollback();
            echo 'Message: ' . $e->getMessage();
        }
    }
}
