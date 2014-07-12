<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 12.07.14
 * Time: 14:38
 */

namespace Mb\EarthCeoBundle\Factory;

use PHPExcel;
use PHPExcel_Worksheet_Row;
use PHPExcel_Worksheet_RowIterator;

class TaxFactory
{

    /** @var PHPExcel */
    private $phpExcelObject;

    /** @var PHPExcel_Worksheet_RowIterator  */
    private $rowIterator;

    /** @var  array */
    private $fields = [];

    private $taxCollection;

    public function __construct(PHPExcel $phpExcelObject)
    {
        $this->phpExcelObject = $phpExcelObject;
        $this->rowIterator = $phpExcelObject->getActiveSheet()->getRowIterator();

        $this->setFieldNames();
    }

    private function setFieldNames()
    {
        /** @var PHPExcel_worksheet_row $row */
        $header = $this->rowIterator->current();

        foreach ($header->getCellIterator() as $key => $value) {
            $this->fields[] = $value;
        }

        $this->rowIterator->next();
    }

    public function getRow()
    {

    }

} 