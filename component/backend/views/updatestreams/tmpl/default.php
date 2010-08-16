<?php
/**
 * @package AkeebaReleaseSystem
 * @copyright Copyright (c)2010 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 * @version $Id$
 */

defined('_JEXEC') or die('Restricted Access');

$model = $this->getModel();
?>
<form name="adminForm" action="index.php" method="POST">
	<input type="hidden" name="option" id="option" value="com_ars" />
	<input type="hidden" name="view" id="view" value="updatestreams" />
	<input type="hidden" name="task" id="task" value="display" />
	<input type="hidden" name="boxchecked" id="boxchecked" value="0" />
	<input type="hidden" name="hidemainmenu" id="hidemainmenu" value="0" />
	<input type="hidden" name="filter_order" id="filter_order" value="<?php echo $this->lists->order ?>" />
	<input type="hidden" name="filter_order_Dir" id="filter_order_Dir" value="<?php echo $this->lists->order_Dir ?>" />
<table class="adminlist">
	<thead>
		<tr>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ) + 1; ?>);" />
			</th>
			<th>
				<?php echo JHTML::_('grid.sort', 'LBL_UPDATES_NAME', 'name', $this->lists->order_Dir, $this->lists->order); ?>
			</th>
			<th width="180">
				<?php echo JHTML::_('grid.sort', 'LBL_UPDATES_TYPE', 'type', $this->lists->order_Dir, $this->lists->order); ?>
			</th>
			<th width="180">
				<?php echo JHTML::_('grid.sort', 'LBL_UPDATES_ELEMENT', 'element', $this->lists->order_Dir, $this->lists->order); ?>
			</th>
			<th width="80">
				<?php echo JHTML::_('grid.sort', 'PUBLISHED', 'published', $this->lists->order_Dir, $this->lists->order); ?>
			</th>
		</tr>
		<tr>
			<td></td>
			<td>
				<?php echo ArsHelperSelect::updatetypes($this->lists->fltType, 'type', array('onchange'=>'this.form.submit();')) ?>
			</td>
			<td></td>
			<td></td>
			<td>
				<?php echo ArsHelperSelect::published($this->lists->fltPublished, 'published', array('onchange'=>'this.form.submit();')) ?>
			</td>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="5">
				<?php if($this->pagination->total > 0) echo $this->pagination->getListFooter() ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php if($count = count($this->items)): ?>
		<?php
			$i = 0;

			foreach($this->items as $item):
		?>
		<tr>
			<td>
				<?php echo JHTML::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<a href="index.php?option=com_ars&view=updatestreams&task=edit&id=<?php echo (int)$item->id ?>">
					<?php echo htmlentities($item->name) ?>
				</a>
			</td>
			<td>
				<?php echo JText::_('LBL_UPDATETYPES_'.  strtoupper($item->type)); ?>
			</td>
			<td>
				<?php echo htmlentities($item->element) ?>
			</td>
			<td>
				<?php echo JHTML::_('grid.published', $item, $i); ?>
			</td>
		</tr>
	<?php
			$i++;
			endforeach;
	?>
	<?php else : ?>
		<tr>
			<td colspan="5" align="center"><?php echo JText::_('LBL_ARS_NOITEMS') ?></td>
		</tr>
	<?php endif ?>
	</tbody>
</table>

</form>