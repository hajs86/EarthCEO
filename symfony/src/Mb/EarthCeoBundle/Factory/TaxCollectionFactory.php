<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 12.07.14
 * Time: 14:38
 */

namespace Mb\EarthCeoBundle\Factory;

use Mb\EarthCeoBundle\Entity\Tax;
use Mb\EarthCeoBundle\Entity\TaxCollection;
use PHPExcel;
use PHPExcel_Cell;
use PHPExcel_Worksheet_Row;
use PHPExcel_Worksheet_RowIterator;
use Symfony\Component\DependencyInjection\Container;

class TaxCollectionFactory
{
    /** @var PHPExcel */
    private $phpExcelObject;

    /** @var PHPExcel_Worksheet_RowIterator */
    private $rowIterator;

    /** @var  array */
    private $fields = [];

    /** @var  \Mb\EarthCeoBundle\Entity\TaxCollection */
    private $taxCollection;

    /**
     * @param PHPExcel $phpExcelObject
     */
    public function __construct(PHPExcel $phpExcelObject)
    {
        $this->phpExcelObject = $phpExcelObject;
        $this->rowIterator = $phpExcelObject->getActiveSheet()->getRowIterator();
        $this->taxCollection = new TaxCollection();

        $this->setFieldNames();
        $this->createCollectionFromSheet();
    }

    private function setFieldNames()
    {
        /** @var PHPExcel_worksheet_row $row */
        $header = $this->rowIterator->current();

        /** @var PHPExcel_cell $cell */
        foreach ($header->getCellIterator() as $key => $cell) {
            $this->fields[] = Container::camelize(strtolower($cell->getValue()));
        }

        $this->rowIterator->next();
    }

    /**
     * @param PHPExcel_Worksheet_Row $row
     *
     * @return static
     */
    private function createTaxFromRow(PHPExcel_worksheet_row $row)
    {
        $tax = [];

        foreach ($this->getValues($row) as $key => $value) {
            if (array_key_exists($key, $this->fields)) {
                $tax[$this->fields[$key]] = $value;
            }
        }

        return Tax::createFromArray($tax);
    }

    /**
     * @param PHPExcel_Worksheet_Row $taxValues
     *
     * @return \Generator
     */
    private function getValues(PHPExcel_worksheet_row $taxValues)
    {
        /** @var PHPExcel_cell $cell */
        foreach ($taxValues->getCellIterator() as $key => $cell) {
            yield $key => $cell->getValue();
        }
    }

    /**
     * @return TaxCollection
     */
    public function getTaxCollection()
    {
        return $this->taxCollection;
    }

    /**
     * @return bool
     */
    private function createCollectionFromSheet()
    {
        /** @var PHPExcel_worksheet_row $row */
        foreach ($this->rowIterator as $row) {
            //skip first row with field names
            if ($row->getRowIndex() === 1) continue;

            $this->taxCollection->offsetSet($row->getRowIndex(), $this->createTaxFromRow($row));
        }
    }
} 