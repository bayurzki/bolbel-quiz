<div class="card">
    <div class="card-header">
        <div class="card-title"><?=$ques['title']?></div>
    </div>
    <div class="card-body">
        <div class="container">
            <p><?=$ques['sub_title']?></p>
            <div class="table-responsive">
                <table class="table">
                <?php 
                foreach ($answer as $key => $value) {
                    if ($value->is_correct == 1) {
                        $checked = 'checked';
                        $icon_check= '<span class="form-check-sign"><i class="fa fa-check"></i></span>';
                    }else{
                        $checked = '';
                        $icon_check = '';
                    }
                ?>
                    <tr>
                        <td style="width:5%;"><?=$icon_check?></td>
                        <td style="width:10%;"><input class="form-check-input" name="is_correct" value="<?=$key?>" type="checkbox" <?=$checked?> /></td>
                        <td><?=$value->content?></td>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>