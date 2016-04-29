<?php

/**
 * zipcode actions.
 *
 * @package    aaok
 * @subpackage zipcode
 * @author     Your name here
 */
class zipcodeActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->zipcode_list = ZipcodePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->zipcode = ZipcodePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->zipcode);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ZipcodeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new ZipcodeForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($zipcode = ZipcodePeer::retrieveByPk($request->getParameter('id')), sprintf('Object zipcode does not exist (%s).', $request->getParameter('id')));
    $this->form = new ZipcodeForm($zipcode);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($zipcode = ZipcodePeer::retrieveByPk($request->getParameter('id')), sprintf('Object zipcode does not exist (%s).', $request->getParameter('id')));
    $this->form = new ZipcodeForm($zipcode);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($zipcode = ZipcodePeer::retrieveByPk($request->getParameter('id')), sprintf('Object zipcode does not exist (%s).', $request->getParameter('id')));
    $zipcode->delete();

    $this->redirect('zipcode/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $zipcode = $form->save();

      $this->redirect('zipcode/edit?id='.$zipcode->getId());
    }
  }
}
