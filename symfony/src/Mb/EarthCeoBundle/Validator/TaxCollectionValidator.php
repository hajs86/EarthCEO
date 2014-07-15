<?php
/**
 * Created by PhpStorm.
 * User: mbugla
 * Date: 15.07.14
 * Time: 21:00
 */

namespace Mb\EarthCeoBundle\Validator;


use Mb\EarthCeoBundle\Entity\Sheet;
use Mb\EarthCeoBundle\Entity\Tax;
use Mb\EarthCeoBundle\Entity\TaxCollection;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\ValidatorInterface;

class TaxCollectionValidator
{
    /** @var \Symfony\Component\Validator\ValidatorInterface */
    private $validator;

    /**
     * @param ValidatorInterface $validator
     */
    public function __construct(ValidatorInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param TaxCollection $taxCollection
     */
    public function validateAndUpdateCollection(TaxCollection $taxCollection)
    {
        foreach ($taxCollection->getIterator() as $key => $tax) {
            /** @var ConstraintViolationListInterface $constraintViolationList */
            $constraintViolationList = $this->validator->validate($tax);

            if (count($constraintViolationList) > 0) {
                $this->nullBadValues($tax, $constraintViolationList);
            }
        }
    }

    /**
     * @param Tax                              $tax
     * @param ConstraintViolationListInterface $constraintViolationList
     */
    private function nullBadValues(Tax $tax, ConstraintViolationListInterface $constraintViolationList)
    {
        /** @var $error \Symfony\Component\Validator\ConstraintViolationInterface */
        foreach ($constraintViolationList as $error) {
            Sheet::getPropertyAccessor()->setValue($tax, $error->getPropertyPath(), null);
        }
    }

} 