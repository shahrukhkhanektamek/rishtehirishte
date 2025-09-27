<table id="buttons-datatables1" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
    <thead>
        <tr>
            <th data-ordering="false">Registered Date</th>
            <th data-ordering="false">ID/Name</th>
            <th data-ordering="false">Phone/Email</th>
            <th data-ordering="false">Sex/Age</th>
            <th data-ordering="false">Edu / Occup / Annual Income</th>
            <th data-ordering="false">Caste / Religion / M-Tongue</th>
            <th data-ordering="false">State/City</th>
            <th data-ordering="false">Requirement for partner</th>
            <th data-ordering="false">Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach($data_list as $key=> $value) { ?>
            <tr>
                <td><?=date("d M, Y h:i A", strtotime($value->add_date_time)) ?></td>
                <td>
                    <b>Reg Id:</b> <?=env('APP_SORT') ?>-<?=$value->user_id ?><br>
                    <b>Name:</b> <?=$value->name ?>
                </td>
                <td>
                    <b>Email:</b> <?=$value->email?><br>
                    <b>Mobile:</b> <?=$value->phone?>
                </td>
                <td>
                    <b>Age:</b> <?=$value->age ?><br>
                    <b>Sex:</b> <?=$value->gender==1?'Male':'Female'?>
                </td>
                <td>
                    <b>Edu:</b> <?=$value->education_name?><br>
                    <b>Occup:</b> <?=$value->occupation_name?><br>
                    <b>Anu-Inco:</b> <?=$value->annualincome?>
                </td>
                <td>
                    <b>Cast:</b> <?=$value->caste_name?><br>
                    <b>Religion</b>:<?=$value->religion_name ?><br>
                    <b>M-Tongue:</b> <?=$value->mothertongue_name?>
                </td>
                <td>
                    <b>State:</b> <?=$value->state_name?><br>
                    <b>City:</b> <?=$value->city?>
                </td>
                <td>Not Fill</td>
                <td><?=status_get($value->status)?></td>
                <td>
                    <a href="<?=$data['route'].'/edit/'.encript($value->id)?>" class="btn btn-sm btn-outline-primary btn-icon waves-effect" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-ball-pen-line"></i></a>

                    <a href="<?=$data['route'].'/view/'.encript($value->id)?>" class="btn btn-sm btn-outline-primary btn-icon waves-effect" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="ri-eye-fill"></i></a>

                    <a href="<?=$data['route'].'/block_unblock/'.encript($value->id)?>" data-value="<?=$value->status?>" class="btn btn-sm btn-outline-danger btn-icon waves-effect block-item-btn"  data-bs-placement="top" title="Disble"><i class="ri-settings-6-line"></i></a>

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
