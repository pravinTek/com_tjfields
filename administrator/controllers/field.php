<?php
/**
 * @version     1.0.0
 * @package     com_tjfields
 * @copyright   Copyright (C) 2014. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      TechJoomla <extensions@techjoomla.com> - http://www.techjoomla.com
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Field controller class.
 */
class TjfieldsControllerField extends JControllerForm
{

	function __construct() {
		$this->view_list = 'fields';
		parent::__construct();
	}

	function save()
	{
		$input=JFactory::getApplication()->input;
		$post=$input->post;
		$model = $this->getModel('field');
		$save_option=$model->save_option($post);
		if($save_option)
			{
				$msg='';
				$link = JRoute::_('index.php?option=com_tjfields&view=fields&client='.$input->get('client','','STRING'),false);
			}
		else
			{
				$msg=JText::_('TJFIELDS_ERROR_MSG');
				$link = JRoute::_('index.php?option=com_tjfields&view=fields&client='.$input->get('client','','STRING'),false);
			}
		$this->setRedirect($link,$msg);
	}

	function apply()
	{
		$input=JFactory::getApplication()->input;
		$data=$input->post;
		$model = $this->getModel('field');
		$field_id=$model->save_option($data);
		if($field_id)
			{
				$msg='';
				$link = JRoute::_('index.php?option=com_tjfields&view=field&layout=edit&id='.$field_id.'&client='.$input->get('client','','STRING'),false);
			}
		else
			{
				$msg=JText::_('TJFIELDS_ERROR_MSG');
				$link = JRoute::_('index.php?option=com_tjfields&view=field&layout=edit&id='.$field_id.'&client='.$input->get('client','','STRING'),false);
			}
		$this->setRedirect($link,$msg);
	}
	function add()
	{
		$input=JFactory::getApplication()->input;
		$link = JRoute::_('index.php?option=com_tjfields&view=field&layout=edit&client='.$input->get('client','','STRING'),false);
		$this->setRedirect($link);
	}
	function edit()
	{
		$cid   = $this->input->post->get('cid', array(), 'array');
		$recordId = (int) (count($cid) ? $cid[0] : $this->input->getInt('id'));
		$input=JFactory::getApplication()->input;
		$link = JRoute::_('index.php?option=com_tjfields&view=field&layout=edit&id='.$recordId.'&client='.$input->get('client','','STRING'),false);
		$this->setRedirect($link);
	}

	function cancel()
	{
		$input=JFactory::getApplication()->input;
		//print_r($input->get('client','','STRING')); die('asdasd');
		$link = JRoute::_('index.php?option=com_tjfields&view=fields&client='.$input->get('client','','STRING'),false);
		$this->setRedirect($link);
	}

}
