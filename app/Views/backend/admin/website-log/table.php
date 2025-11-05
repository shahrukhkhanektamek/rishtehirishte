<table id="buttons-datatables1" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Date Time</th>
            <th data-ordering="false">URI</th>
            <th data-ordering="false">Action</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach($data_list as $key=> $value) { 
            $user = $db->table("users")->where(["id"=>$value->user_id,])->get()->getFirstRow();
            ?>       
            <tr>
                <td>
                    <?=date("d M, Y", strtotime($value->add_date_time))?><br>
                    <small><?=date("h:i A", strtotime($value->add_date_time))?></small>
                </td>
                <td><?=$value->uri?></td>
                <td>
                    <a href="<?=$data['route'].'/delete/'.encript($value->id)?>" class="btn btn-sm btn-danger btn-icon waves-effect waves-light remove-item-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i class="ri-delete-bin-4-line"></i></a>
                </td>
            </tr>
         <?php } ?>
            
    </tbody>
</table>

<div class="pagination">
        <div class="pagination-result">
        Showing
        <span class="start-data">  <?=$data['startData'] ?></span>
        <span>to</span>
        <span class="end-data"><?=$data['endData'] ?></span>
        <span class="total-data"><?=$data['totalData'] ?> Results</span>
    </div>
    <?=$data['pager']?>
</div>
