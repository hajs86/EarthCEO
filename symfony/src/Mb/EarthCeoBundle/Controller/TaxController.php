<?php

namespace Mb\EarthCeoBundle\Controller;

use Mb\EarthCeoBundle\Entity\Sheet;
use Mb\EarthCeoBundle\Entity\TaxCollection;
use Mb\EarthCeoBundle\Factory\TaxCollectionFactory;
use Mb\EarthCeoBundle\Validator\TaxCollectionValidator;
use PHPExcel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Mb\EarthCeoBundle\Entity\Tax;
use Mb\EarthCeoBundle\Form\TaxType;
use Symfony\Component\HttpFoundation\Response;


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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('MbEarthCeoBundle:Tax')->findAll();

        return $this->render(
                    'MbEarthCeoBundle:Tax:index.html.twig', array(
                                                              'entities' => $entities,
                                                          )
        );
    }

    /**
     * Creates a new Tax entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Tax();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('tax_show', array('id' => $entity->getId())));
        }

        return $this->render(
                    'MbEarthCeoBundle:Tax:new.html.twig', array(
                                                            'entity' => $entity,
                                                            'form'   => $form->createView(),
                                                        )
        );
    }

    /**
     * Creates a form to create a Tax entity.
     *
     * @param Tax $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Tax $entity)
    {
        $form = $this->createForm(
                     new TaxType(), $entity, array(
                                      'action' => $this->generateUrl('tax_create'),
                                      'method' => 'POST',
                                  )
        );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tax entity.
     *
     */
    public function newAction()
    {
        $entity = new Tax();
        $form = $this->createCreateForm($entity);

        return $this->render(
                    'MbEarthCeoBundle:Tax:new.html.twig', array(
                                                            'entity' => $entity,
                                                            'form'   => $form->createView(),
                                                        )
        );
    }

    /**
     * Finds and displays a Tax entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MbEarthCeoBundle:Tax')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tax entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
                    'MbEarthCeoBundle:Tax:show.html.twig', array(
                                                             'entity'      => $entity,
                                                             'delete_form' => $deleteForm->createView(),
                                                         )
        );
    }

    /**
     * Displays a form to edit an existing Tax entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MbEarthCeoBundle:Tax')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tax entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render(
                    'MbEarthCeoBundle:Tax:edit.html.twig', array(
                                                             'entity'      => $entity,
                                                             'edit_form'   => $editForm->createView(),
                                                             'delete_form' => $deleteForm->createView(),
                                                         )
        );
    }

    /**
     * Creates a form to edit a Tax entity.
     *
     * @param Tax $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Tax $entity)
    {
        $form = $this->createForm(
                     new TaxType(), $entity, array(
                                      'action' => $this->generateUrl('tax_update', array('id' => $entity->getId())),
                                      'method' => 'PUT',
                                  )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Tax entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('MbEarthCeoBundle:Tax')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tax entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('tax_edit', array('id' => $id)));
        }

        return $this->render(
                    'MbEarthCeoBundle:Tax:edit.html.twig', array(
                                                             'entity'      => $entity,
                                                             'edit_form'   => $editForm->createView(),
                                                             'delete_form' => $deleteForm->createView(),
                                                         )
        );
    }

    /**
     * Deletes a Tax entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('MbEarthCeoBundle:Tax')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tax entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('tax'));
    }

    /**
     * Creates a form to delete a Tax entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
                    ->setAction($this->generateUrl('tax_delete', array('id' => $id)))
                    ->setMethod('DELETE')
                    ->add('submit', 'submit', array('label' => 'Delete'))
                    ->getForm();
    }

    public function fileProcessingAction(Request $request)
    {
        $filename = $request->query->get('filename');

        /** @var PHPExcel $object */
        $sheet = $this->getExcelService()->createPhpExcelObject($request->server->get('DOCUMENT_ROOT') . '/uploads/storage/' . $filename);

        $taxCollectionFactory = new TaxCollectionFactory($sheet);

        $this->getTaxCollectionValidator()->validateAndUpdateCollection($taxCollectionFactory->getTaxCollection());

        $em = $this->getDoctrine()->getManager();

        foreach ($taxCollectionFactory->getTaxCollection()->getIterator() as $tax) {
            $em->persist($tax);
            $em->flush();
        }

        return new Response(json_encode(['result' => 'success']));
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
