<?php
/**
 * @version    SVN: <svn_id>
 * @package    TJ-Fields
 * @author     Techjoomla <extensions@techjoomla.com>
 * @copyright  Copyright (c) 2009-2016 TechJoomla. All rights reserved.
 * @license    GNU General Public License version 2 or later.
 */

defined('JPATH_BASE') or die;

jimport('joomla.html.html');
jimport('joomla.form.formfield');

/**
 * Supports an formsource select list of subform
 *
 * @since  1.6
 */
class JFormFieldlayoutfield extends JFormField
{
	/**
	 * The form field type.
	 *
	 * @var		string
	 *
	 * @since	1.6
	 */
	protected $type = 'text';

	/**
	 * Method to get the field input markup.
	 *
	 * @return	string	The field input markup.
	 *
	 * @since	1.6
	 */
	protected function getInput()
	{
		$options = array();
		$options[] = JHtml::_(
								'select.option', 'joomla.form.field.subform.repeatable',
								JText::_('COM_TJFIELDS_FORM_LBL_FIELD_SELECT_FIELD_LAYOUT_REPETABLE')
							);

		$options[] = JHtml::_(
								'select.option', 'joomla.form.field.subform.repeatable-table',
								JText::_('COM_TJFIELDS_FORM_LBL_FIELD_SELECT_FIELD_LAYOUT_REPETABLE_TABLE')
							);

		return JHtml::_('select.genericlist', $options, $this->name,
		'class="inputbox required"', 'value', 'text', $this->value, $this->options['control'] . $this->name
		);
	}
}
