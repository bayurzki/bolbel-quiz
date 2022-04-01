<?php 
$list_answer = [];
foreach ($answer as $key => $value) {
    $contents = json_decode($value->content,true);
    for ($i=0; $i < sizeof($contents['body']); $i++) {  
        $list_answer[] = $contents['body'][$i];
    }
}
?>
<div class="card">
    <div class="card-header">
        <div class="card-title"><?=$ques['title']?></div>
    </div>
    <div class="card-body">
        <div class="container">
            <p><?=$ques['sub_title']?></p>
            <div class="list-answer dropped">
                <?php foreach ($list_answer as $key => $value) {?>
                    <div class="btn btn-primary btn-border btn-sm btn-round mr-1 btn-drag" data-value="<?=$value?>"><?=$value?></div>
                <?php } ?>
            </div>
            <div class="row">
                    <?php 
                    foreach ($answer as $key => $value) {
                        $contents = json_decode($value->content,true);
                        if ($value->is_correct == 1) {
                    ?>
                    <div class="col-md-6">
                        <div class="group-ans">
                            <div class="head-group-ans">
                                <?=$contents['head']?>
                            </div>
                            <?php 
                            for ($i=0; $i < sizeof($contents['body']); $i++) {  
                            ?>
                            <div class="body-group-ans dropped-one" data-index="<?=$key.'_'.$i?>" data-value="<?=$value->id?>">
                            </div>
                            <?php } ?>
                        </div>
                    </div>   
                    <?php 
                        }
                    } ?>
            </div>
            
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="mr-5">
            <button class="btn btn-primary btn_cek_group float-right">Check</button>
        </div>
    </div>
</div>