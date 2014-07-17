<?php

namespace Mb\EarthCeoBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Mb\EarthCeoBundle\Validator\Constraints as myAssert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Tax
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mb\EarthCeoBundle\Entity\TaxRepository")
 */
class Tax extends Sheet
{
    const DATE_FORMAT = 'd-m-Y';

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(name="internalId", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $internalId;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", nullable=true)
     * @Assert\NotBlank()
     * @Gedmo\SortableGroup
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @myAssert\Name()
     * @Gedmo\SortableGroup
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @myAssert\Name()
     * @Gedmo\SortableGroup
     */
    private $country;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesPIT", type="float", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     * @Gedmo\SortableGroup
     */
    private $taxesPIT;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesCIT", type="float", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     * @Gedmo\SortableGroup
     */
    private $taxesCIT;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesVAT", type="float", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     * @Gedmo\SortableGroup
     */
    private $taxesVAT;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesOther", type="float", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Type(type="float")
     * @Gedmo\SortableGroup
     */
    private $taxesOther;

    /**
     * @var integer
     *
     * @ORM\Column(name="population", type="integer", nullable=true)
     * @Assert\NotBlank()
     * @Assert\Type(type="integer")
     * @Gedmo\SortableGroup
     */
    private $population;

    /**
     * @var string
     *
     * @ORM\Column(name="mayorName", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @myAssert\Name()
     * @Gedmo\SortableGroup
     */
    private $mayorName;

    /**
     * @var string
     *
     * @ORM\Column(name="mayorEmail", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Email()
     * @Gedmo\SortableGroup
     */
    private $mayorEmail;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updateDate", type="date", nullable=true)
     * @Assert\NotBlank()
     * @myAssert\DateFormat()
     * @Gedmo\SortableGroup
     */
    private $updateDate;

    /**
     * @Gedmo\SortablePosition
     * @ORM\Column(name="position", type="integer")
     */
    private $position;


    /**
     * @return int
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * Get id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Tax
     */
    public function setCity($city)
    {
        $this->city = utf8_decode($city);

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Tax
     */
    public function setCountry($country)
    {
        $this->country = utf8_decode($country);

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set taxesPIT
     *
     * @param float $taxesPIT
     *
     * @return Tax
     */
    public function setTaxesPIT($taxesPIT)
    {
        $this->taxesPIT = $this->toFloat($taxesPIT);

        return $this;
    }

    /**
     * Get taxesPIT
     *
     * @return float
     */
    public function getTaxesPIT()
    {
        return $this->toNumberFormat($this->taxesPIT);
    }

    /**
     * Set taxesCIT
     *
     * @param float $taxesCIT
     *
     * @return Tax
     */
    public function setTaxesCIT($taxesCIT)
    {
        $this->taxesCIT = $this->toFloat($taxesCIT);

        return $this;
    }

    /**
     * Get taxesCIT
     *
     * @return float
     */
    public function getTaxesCIT()
    {
        return $this->toNumberFormat($this->taxesCIT);
    }

    /**
     * Set taxesVAT
     *
     * @param float $taxesVAT
     *
     * @return Tax
     */
    public function setTaxesVAT($taxesVAT)
    {
        $this->taxesVAT = $this->toFloat($taxesVAT);

        return $this;
    }

    /**
     * Get taxesVAT
     *
     * @return float
     */
    public function getTaxesVAT()
    {
        return $this->toNumberFormat($this->taxesVAT);
    }

    /**
     * Set taxesOther
     *
     * @param float $taxesOther
     *
     * @return Tax
     */
    public function setTaxesOther($taxesOther)
    {
        $this->taxesOther = $this->toFloat($taxesOther);

        return $this;
    }

    /**
     * Get taxesOther
     *
     * @return float
     */
    public function getTaxesOther()
    {
        return $this->toNumberFormat($this->taxesOther);
    }

    /**
     * Set population
     *
     * @param integer $population
     *
     * @return Tax
     */
    public function setPopulation($population)
    {
        if ($this->containsOnlyLetters($population)) {
            return null;
        }
        $population = intval(utf8_decode(str_replace(' ', '', $population)));
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer
     */
    public function getPopulation()
    {
        return $this->toNumberFormat($this->population);
    }

    /**
     * Set mayorName
     *
     * @param string $mayorName
     *
     * @return Tax
     */
    public function setMayorName($mayorName)
    {
        $this->mayorName = utf8_decode($mayorName);

        return $this;
    }

    /**
     * Get mayorName
     *
     * @return string
     */
    public function getMayorName()
    {
        return $this->wrongFormatOrValue($this->mayorName);
    }

    /**
     * Set mayorEmail
     *
     * @param string $mayorEmail
     *
     * @return Tax
     */
    public function setMayorEmail($mayorEmail)
    {
        $this->mayorEmail = utf8_decode($mayorEmail);

        return $this;
    }

    /**
     * Get mayorEmail
     *
     * @return string
     */
    public function getMayorEmail()
    {
        return $this->wrongFormatOrValue($this->mayorEmail);
    }

    /**
     * Set updateDate
     *
     * @param DateTime $updateDate
     *
     * @return Tax
     */
    public function setUpdateDate($updateDate)
    {
        $date = date(static::DATE_FORMAT, strtotime(str_replace('/', '-', $updateDate)));
        $this->updateDate = DateTime::createFromFormat(static::DATE_FORMAT, $date);

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return DateTime
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @return float
     */
    public function getIncomeForPerson()
    {
        if ($this->population > 0) {

            return $this->toNumberFormat(
                        array_sum(
                            [
                                $this->taxesCIT,
                                $this->taxesOther,
                                $this->taxesPIT,
                                $this->taxesVAT
                            ]
                        ) / $this->population
            );
        } else {

            return 'N/A';
        }
    }

    /**
     * @param $value
     *
     * @return null|string
     */
    private function toNumberFormat($value)
    {
        if ($value !== null) {

            return number_format($value, 2, ',', ' ');
        }

        return 'Wrong format';
    }

    /**
     * @param $num
     *
     * @return float
     */
    private function toFloat($num)
    {
        if ($this->containsOnlyLetters($num)) {
            return null;
        }

        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos :
            ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        }

        return floatval(
            preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
            preg_replace("/[^0-9]/", "", substr($num, $sep + 1, strlen($num)))
        ) * 1000;
    }

    /**
     * @param $value
     *
     * @return string
     */
    private function wrongFormatOrValue($value)
    {
        return !empty($value) ? $value : 'Wrong format';
    }

    /**
     * @param $value
     *
     * @return bool
     */
    private function containsOnlyLetters($value)
    {
        return !preg_match('/[^A-Za-z]/', $value);
    }


}
