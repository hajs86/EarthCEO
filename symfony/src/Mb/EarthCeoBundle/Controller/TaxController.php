<?php

namespace Mb\EarthCeoBundle\Controller;

use Exception;
use InvalidArgumentException;
use Mb\EarthCeoBundle\Entity\Sheet;
use Mb\EarthCeoBundle\Entity\TaxCollection;
use Mb\EarthCeoBundle\Entity\TaxRepository;
use Mb\EarthCeoBundle\Factory\TaxCollectionFactory;
use Mb\EarthCeoBundle\Validator\TaxCollectionValidator;
use PHPExcel;
use PHPExcel_IOFactory;
use SplFileInfo;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mb\EarthCeoBundle\Entity\Tax;
use Mb\EarthCeoBundle\Form\TaxType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PropertyAccess\Exception\NoSuchPropertyException;


/**
 * Tax controller.
 *
 */
class TaxController extends Controller
{

    /**
     * Lists all Tax entities.
     *
     */
    public function indexAction($orderBy = null)
    {
        $em = $this->getDoctrine()->getManager();
        /** @var TaxRepository $repository */
        $repository = $em->getRepository('MbEarthCeoBundle:Tax');

        $entities = $repository->findBy([], $orderBy !== null ? [$orderBy => 'ASC'] : []);

        return $this->render(
                    'MbEarthCeoBundle:Tax:index.html.twig', array(
                                                              'entities' => $entities,
                                                          )
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function fileProcessingAction(Request $request)
    {
        $pathToFile = implode(
            '',
            [
                $request->server->get('DOCUMENT_ROOT'),
                $this->container->getParameter('upload_dir'),
                $request->query->get('filename')
            ]
        );

        /** @var PHPExcel $object */
        $sheet = $this->getObjectFromFile($pathToFile);

        try {
            $taxCollectionFactory = new TaxCollectionFactory($sheet);
        } catch (Exception $e) {

            return new Response(
                json_encode(['result' => 'fail', 'message' => 'Uploaded data does not meet structure requirements']),
                Response::HTTP_BAD_REQUEST
            );
        }

        $this->getTaxCollectionValidator()->validateAndUpdateCollection($taxCollectionFactory->getTaxCollection());

        $em = $this->getDoctrine()->getManager();

        foreach ($taxCollectionFactory->getTaxCollection()->getIterator() as $tax) {
            $em->persist($tax);
            $em->flush();
        }

        return new Response(json_encode(['result' => 'success']));
    }

    /**
     * @param $pathToFile
     *
     * @return PHPExcel
     */
    private function getObjectFromFile($pathToFile)
    {
        $fileInfo = new SplFileInfo($pathToFile);

        switch (strtolower($fileInfo->getExtension())) {
            case 'csv':
                $objReader = PHPExcel_IOFactory::createReader('CSV')
                                               ->setDelimiter($this->container->getParameter('csv_delimiter'))
                                               ->setEnclosure($this->container->getParameter('csv_enclosure'))
                                               ->setLineEnding($this->container->getParameter('csv_line_ending'))
                                               ->setSheetIndex(0);

                return $objReader->load($pathToFile);
            default:
                return $this->getExcelService()->createPhpExcelObject($pathToFile);
        }
    }

    /**
     * @return \Liuggio\ExcelBundle\Factory
     */
    private function getExcelService()
    {
        return $this->get('phpexcel');
    }

    /**
     * @return TaxCollectionValidator
     */
    private function getTaxCollectionValidator()
    {
        return $this->get('mb_earth_ceo.tax_collection_validator');
    }
}
