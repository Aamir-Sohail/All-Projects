<div id ="form_header"><span class="heading"><?php echo gettext('Inter-Org Transfer Header') ?></span>
 <div id="tabsHeader">
  <ul class="tabMain">
   <li><a href="#tabsHeader-1"><?php echo gettext('Basic Info') ?></a></li>
   <li><a href="#tabsHeader-2"><?php echo gettext('Attachments') ?></a></li>
   <li><a href="#tabsHeader-3"><?php echo gettext('Notes') ?></a></li>
   <li><a href="#tabsHeader-4"><?php echo gettext('Actions') ?></a></li>
  </ul>
  <div class="tabContainer">
   <form method="post" id="inv_interorg_transfer_header"  name="inv_interorg_transfer_header">
    <div id="tabsHeader-1" class="tabContent">
     <ul class="column header_field">
      <li><?php $f->l_text_field_dr_withSearch('inv_interorg_transfer_header_id') ?>
       <a name="show" href="form.php?class_name=inv_interorg_transfer_header&<?php echo "mode=$mode"; ?>" class="show document_id inv_interorg_transfer_header_id"><i class="fa fa-refresh"></i></a> 
      </li>
      <li><?php $f->l_select_field_from_object('from_org_id', org::find_all_inventory(), 'org_id', 'org', $$class->from_org_id, 'from_org_id', '', 1, $readonly1); ?>       </li>
      <li><?php $f->l_select_field_from_object('to_org_id', org::find_all_inventory(), 'org_id', 'org', $$class->to_org_id, 'to_org_id', '', 1, $readonly1); ?>       </li>
      <li><?php $f->l_text_field('order_number', $$class->order_number ,  '' , 'order_number','primary_column2','', $readonly1); ?> </li>
      <li><label><?php echo gettext('Date') ?></label><?php echo $f->date_fieldFromToday_d('transaction_date', ino_date($$class->transaction_date), $readonly1); ?></li>
      <li><?php echo $f->l_select_field_from_array('transaction_type_id', inv_interorg_transfer_header::$transaction_type_id_a, $$class->transaction_type_id, 'transaction_type_id', '', 1, $readonly1, $readonly1); ?>       </li>
     </ul>
    </div>
    <div id="tabsHeader-2" class="tabContent">
     <div> <?php echo ino_attachement($file) ?> </div>
    </div>
    <div id="tabsHeader-3" class="tabContent">
     <div id="comments">
      <div id="comment_list">
       <?php echo!(empty($comments)) ? $comments : ""; ?>
      </div>
      <div id ="display_comment_form">
       <?php
       $reference_table = 'inv_interorg_transfer_header';
       $reference_id = $$class->inv_interorg_transfer_header_id;
       ?>
      </div>
     </div>
    </div>
    <div id="tabsHeader-4" class="tabContent">
     <div> 
      <ul class="column header_field">
       <li><?php $f->l_select_field_from_array('action' , $$class->action_a, '' ,'action') ?>       </li>
      </ul>
     </div>
    </div>
   </form>		

  </div>
 </div>

</div>
<div id="form_line" class="form_line"><span class="heading"><?php echo gettext('Inter-Org Transfer Lines') ?></span>
 <form action=""  method="inv_interorg_transfer_line_form" id="inv_interorg_transfer_line_form"  name="inv_interorg_transfer_line">
  <div id="tabsLine">
   <ul class="tabMain">
    <li><a href="#tabsLine-1"><?php echo gettext('General Info') ?></a></li>
    <li><a href="#tabsLine-2"><?php echo gettext('Transfer') ?> </a></li>
    <li><a href="#tabsLine-3"><?php echo gettext('Lot Serial') ?> </a></li>
    <li><a href="#tabsLine-4"><?php echo gettext('On hand') ?> </a></li>
   </ul>
   <div class="tabContainer">
    <div id="tabsLine-1" class="tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th><?php echo gettext('Action') ?></th>
        <th><?php echo gettext('Seq') ?>#</th>
        <th><?php echo gettext('Line Id') ?></th>
        <th><?php echo gettext('Line') ?>#</th>
        <th><?php echo gettext('Item Id') ?></th>
        <th><?php echo gettext('Item Number') ?></th>
        <th><?php echo gettext('Revision') ?></th>
        <th><?php echo gettext('Item Description') ?></th>
        <th><?php echo gettext('UOM') ?></th>
        <th><?php echo gettext('Quantity') ?></th>
        <th><?php echo gettext('Reason') ?></th>
       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($inv_interorg_transfer_line_object as $inv_interorg_transfer_line) {
        ?>    
        <tr class="inv_interorg_transfer_line<?php echo $count?>" data-line_status="<?php echo $$class_second->status ?>">
         <td>
          <?php
          echo ino_inline_action($$class_second->inv_interorg_transfer_line_id, array('from_org_id' => $$class->from_org_id,
           'to_org_id' => $$class->to_org_id, 'inv_interorg_transfer_header_id' => $$class->inv_interorg_transfer_header_id,
           'transaction_type_id' => $$class->transaction_type_id));
          ?>
         </td>
         <td><?php $f->seq_field_d($count) ?></td>
         <td><?php $f->text_field_d2sr('inv_interorg_transfer_line_id', 'lineId'); ?></td>
         <td><?php $f->text_field_wid2s('line_number' ,'lines_number'); ?></td>
         <td><?php $f->text_field_wid2sr('item_id_m'); ?></td>
         <td><?php
          $f->val_field_wid2m('item_number', 'item', 'item_number', '', 'vf_select_item_number');
          echo $f->hidden_field_withCLass('transactable_cb', '1', 'popup_value');
          echo $f->hidden_field_withCLass('org_id1', $$class->from_org_id, 'org_id popup_value');
          ?>
          <i class="generic g_select_item_number select_popup clickable fa fa-search" data-class_name="item"></i></td>
         <td><?php $f->text_field_wid2sr('revision_name'); ?></td>
         <td><?php $f->text_field_wid2('item_description'); ?></td>
         <td><?php echo $f->select_field_from_object('uom_id', uom::find_all(), 'uom_id', 'uom_name', $$class_second->uom_id, '', 'uom_id', 1, $readonly); ?>  </td>
         <td><?php echo $f->number_field('transaction_quantity', $$class_second->transaction_quantity, '', '', '', 1, $f->readonly2); ?></td>
         <td><?php $f->text_field_wid2('reason'); ?>							</td>

        </tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
     </table>
    </div>
    <div id="tabsLine-2" class="tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th><?php echo gettext('Seq') ?>#</th>
        <th><?php echo gettext('From SubInv') ?></th>
        <th><?php echo gettext('From Locator') ?></th>
        <th><?php echo gettext('To SubInv') ?></th>
        <th><?php echo gettext('To Locator') ?></th>
        <th><?php echo gettext('Description') ?></th>
        <th><?php echo gettext('Status') ?></th>
        <th><?php echo gettext('Ref Type') ?></th>
        <th><?php echo gettext('Ref Name') ?></th>
        <th><?php echo gettext('Ref Value') ?></th>
       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($inv_interorg_transfer_line_object as $inv_interorg_transfer_line) {
        ?>   
         <tr class="inv_interorg_transfer_line<?php echo $count?>" data-line_status="<?php echo $$class_second->status ?>">
         <td><?php $f->seq_field_d($count) ?></td>
         <td>
          <?php echo $f->select_field_from_object('from_subinventory_id', subinventory::find_all_of_org_id($$class->from_org_id), 'subinventory_id', 'subinventory', $$class_second->from_subinventory_id, '', 'subinventory_id', ''); ?>
         </td>
         <td>
          <?php echo $f->select_field_from_object('from_locator_id', locator::find_all_of_subinventory($$class_second->from_subinventory_id), 'locator_id', 'locator', $$class_second->from_locator_id, '', 'from_locator_id', ''); ?>
         </td>
         <td>
          <?php echo $f->select_field_from_object('to_subinventory_id', subinventory::find_all_of_org_id($$class->to_org_id), 'subinventory_id', 'subinventory', $$class_second->to_subinventory_id, '', 'subinventory_id', ''); ?>
         </td>
         <td>
          <?php echo $f->select_field_from_object('to_locator_id', locator::find_all_of_subinventory($$class_second->to_subinventory_id), 'locator_id', 'locator', $$class_second->to_locator_id, '', 'to_locator_id', ''); ?>
         </td>
         <td><?php $f->text_field_wid2('description'); ?>							</td>
         <td><?php $f->text_field_wid2r('status', 'always_readonly'); ?>				
         <?php echo $f->hidden_field('action',''); ?>		</td>      
         <td><?php $f->text_field_wid2s('reference_type'); ?>							</td>
         <td><?php $f->text_field_wid2('reference_key_name'); ?>							</td>
         <td><?php $f->text_field_wid2('reference_key_value'); ?>							</td>
        </tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
     </table>
    </div>
    <div id="tabsLine-3" class="tabContent">
     <?php
     $ls_trclass = 'inv_interorg_transfer_line';
     $line_object_ls = $inv_interorg_transfer_line_object;
     $each_line_ls = $inv_interorg_transfer_line;
     $line_class_name_sl = &$class_second;
     $ref_key_name = 'inv_interorg_transfer_line';
     $ref_key_val = 'inv_interorg_transfer_line_id';
     include_once HOME_DIR . '/includes/template/lot_serial_template.inc'
     ?>
    </div>
    <div id="tabsLine-4" class="tabContent">
     <table class="form_line_data_table">
      <thead> 
       <tr>
        <th><?php echo gettext('Seq') ?>#</th>
        <th>From Current Onhand</th>
        <th>From Future Onhand </th>
        <th>To Current Onhand</th>
        <th>To Future Onhand</th>
       </tr>
      </thead>
      <tbody class="form_data_line_tbody">
       <?php
       $count = 0;
       foreach ($inv_interorg_transfer_line_object as $inv_interorg_transfer_line) {
        ?>   
        <tr class="inv_interorg_transfer_line<?php echo $count?>" data-line_status="<?php echo $$class_second->status ?>">
         <td><?php $f->seq_field_d($count) ?></td>
         <td><?php $f->text_field_wid2r('from_current_onhand', 'onhand'); ?>							</td>
         <td><?php $f->text_field_wid2r('from_future_onhand', 'onhand'); ?>							</td>
         <td><?php $f->text_field_wid2r('to_current_onhand', 'onhand'); ?>							</td>
         <td><?php $f->text_field_wid2r('to_future_onhand', 'onhand'); ?>							</td>
        </tr>
        <?php
        $count = $count + 1;
       }
       ?>
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </form>

</div>

<div id="js_data">
 <ul id="js_saving_data">
  <li class="headerClassName" data-headerClassName="inv_interorg_transfer_header" ></li>
  <li class="lineClassName" data-lineClassName="inv_interorg_transfer_line" ></li>
  <li class="savingOnlyHeader" data-savingOnlyHeader="false" ></li>
  <li class="primary_column_id" data-primary_column_id="inv_interorg_transfer_header_id" ></li>
  <li class="form_header_id" data-form_header_id="inv_interorg_transfer_header" ></li>
  <li class="line_key_field" data-line_key_field="item_id_m" ></li>
  <li class="single_line" data-single_line="false" ></li>
  <li class="form_line_id" data-form_line_id="inv_interorg_transfer_line" ></li>
 </ul>
 <ul id="js_contextMenu_data">
  <li class="docHedaderId" data-docHedaderId="inv_interorg_transfer_header_id" ></li>
  <li class="docLineId" data-docLineId="inv_interorg_transfer_line_id" ></li>
  <li class="btn1DivId" data-btn1DivId="ap_transaction_header" ></li>
  <li class="btn2DivId" data-btn2DivId="form_line" ></li>
  <li class="tbodyClass" data-tbodyClass="form_data_line_tbody" ></li>
  <li class="noOfTabbs" data-noOfTabbs="4" ></li>
 </ul>
</div>