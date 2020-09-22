<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

use InvalidArgumentException;

class PartyTaxScheme implements XmlSerializable
{
    private $registrationName;
    private $companyId;
    private $taxScheme;

    /**
     * @return mixed
     */
    public function getRegistrationName()
    {
        return $this->registrationName;
    }

    /**
     * @param mixed $registrationName
     * @return PartyTaxScheme
     */
    public function setRegistrationName($registrationName)
    {
        $this->registrationName = $registrationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param string $companyId
     * @return PartyTaxScheme
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
        return $this;
    }

    /**
     * @param TaxScheme $taxScheme.
     * @return mixed
     */
    public function getTaxScheme()
    {
        return $this->taxScheme;
    }

    /**
     * @param TaxScheme $taxScheme
     * @return PartyTaxScheme
     */
    public function setTaxScheme(TaxScheme $taxScheme)
    {
        $this->taxScheme = $taxScheme;
        return $this;
    }

    /**
     * The validate function that is called during xml writing to valid the data of the object.
     *
     * @return void
     * @throws InvalidArgumentException An error with information about required data that is missing to write the XML
     */
    public function validate()
    {
        if ($this->taxScheme === null) {
            throw new InvalidArgumentException('Missing TaxScheme');
        }
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer)
    {
        if ($this->registrationName !== null) {
             $writer->write([
                Schema::CBC . 'RegistrationName' => $this->registrationName
            ]);
        }
        if ($this->companyId !== null) {
             $writer->write([
                Schema::CBC . 'CompanyID' => $this->companyId
            ]);
        }

        $writer->write([
            Schema::CAC . 'TaxScheme' => $this->taxScheme
        ]);
    }
}
