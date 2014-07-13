<?php

namespace Mb\EarthCeoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Tax
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Mb\EarthCeoBundle\Entity\TaxRepository")
 */
class Tax extends Sheet
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $country;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesPIT", type="float")
     * @Assert\NotBlank()
     * @Assert\Currency
     */
    private $taxesPIT;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesCIT", type="float")
     * @Assert\NotBlank()
     * @Assert\Currency
     */
    private $taxesCIT;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesVAT", type="float")
     * @Assert\NotBlank()
     * @Assert\Currency
     */
    private $taxesVAT;

    /**
     * @var float
     *
     * @ORM\Column(name="taxesOther", type="float")
     * @Assert\NotBlank()
     * @Assert\Currency
     */
    private $taxesOther;

    /**
     * @var integer
     *
     * @ORM\Column(name="population", type="integer")
     * @Assert\NotBlank()
     * @Assert\Type(type="integer", message="The value {{ value }} is not a valid {{ type }}.")
     */
    private $population;

    /**
     * @var string
     *
     * @ORM\Column(name="mayorName", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $mayorName;

    /**
     * @var string
     *
     * @ORM\Column(name="mayorEmail", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $mayorEmail;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateDate", type="datetime")
     * @Assert\NotBlank()
     * @Assert\Date()
     */
    private $updateDate;


    /**
     * Get id
     *
     * @return integer 
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
     * @return Tax
     */
    public function setCity($city)
    {
        $this->city = utf8_encode($city);

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
     * @return Tax
     */
    public function setCountry($country)
    {
        $this->country = utf8_encode($country);

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
     * @return Tax
     */
    public function setTaxesPIT($taxesPIT)
    {
        $this->taxesPIT = number_format(floatval($taxesPIT), 2, ',', ' ');

        return $this;
    }

    /**
     * Get taxesPIT
     *
     * @return float 
     */
    public function getTaxesPIT()
    {
        return $this->taxesPIT;
    }

    /**
     * Set taxesCIT
     *
     * @param float $taxesCIT
     * @return Tax
     */
    public function setTaxesCIT($taxesCIT)
    {
        $this->taxesCIT = number_format(floatval($taxesCIT), 2, ',', ' ');

        return $this;
    }

    /**
     * Get taxesCIT
     *
     * @return float 
     */
    public function getTaxesCIT()
    {
        return $this->taxesCIT;
    }

    /**
     * Set taxesVAT
     *
     * @param float $taxesVAT
     * @return Tax
     */
    public function setTaxesVAT($taxesVAT)
    {
        $this->taxesVAT = number_format(floatval($taxesVAT), 2, ',', ' ');

        return $this;
    }

    /**
     * Get taxesVAT
     *
     * @return float 
     */
    public function getTaxesVAT()
    {
        return $this->taxesVAT;
    }

    /**
     * Set taxesOther
     *
     * @param float $taxesOther
     * @return Tax
     */
    public function setTaxesOther($taxesOther)
    {
        $this->taxesOther = number_format(floatval($taxesOther), 2, ',', ' ');

        return $this;
    }

    /**
     * Get taxesOther
     *
     * @return float 
     */
    public function getTaxesOther()
    {
        return $this->taxesOther;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return Tax
     */
    public function setPopulation($population)
    {
        $this->population = (int)$population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set mayorName
     *
     * @param string $mayorName
     * @return Tax
     */
    public function setMayorName($mayorName)
    {
        $this->mayorName = utf8_encode($mayorName);

        return $this;
    }

    /**
     * Get mayorName
     *
     * @return string 
     */
    public function getMayorName()
    {
        return $this->mayorName;
    }

    /**
     * Set mayorEmail
     *
     * @param string $mayorEmail
     * @return Tax
     */
    public function setMayorEmail($mayorEmail)
    {
        $this->mayorEmail = utf8_encode($mayorEmail);

        return $this;
    }

    /**
     * Get mayorEmail
     *
     * @return string 
     */
    public function getMayorEmail()
    {
        return $this->mayorEmail;
    }

    /**
     * Set updateDate
     *
     * @param \DateTime $updateDate
     * @return Tax
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = date('d F Y', $updateDate);

        return $this;
    }

    /**
     * Get updateDate
     *
     * @return \DateTime 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }
}
