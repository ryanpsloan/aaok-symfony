<?php

/**
 * state actions.
 *
 * @package    aaok
 * @subpackage state
 * @author     Your name here
 */
class stateActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->state_list = StatePeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->state = StatePeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->state);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StateForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new StateForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($state = StatePeer::retrieveByPk($request->getParameter('id')), sprintf('Object state does not exist (%s).', $request->getParameter('id')));
    $this->form = new StateForm($state);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($state = StatePeer::retrieveByPk($request->getParameter('id')), sprintf('Object state does not exist (%s).', $request->getParameter('id')));
    $this->form = new StateForm($state);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($state = StatePeer::retrieveByPk($request->getParameter('id')), sprintf('Object state does not exist (%s).', $request->getParameter('id')));
    $state->delete();

    $this->redirect('state/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $state = $form->save();

      $this->redirect('state/edit?id='.$state->getId());
    }
  }
}
