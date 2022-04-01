<div class="card">
    <div class="card-header">
        <div class="card-title"><?=$ques['title']?></div>
    </div>
    <div class="card-body">
        <div class="container">
            <p><?=$ques['sub_title']?></p>
            <div class="row">
                <div class="col-md-6 my-auto">
                <?php

                foreach ($answer as $key => $value) {
                    $list_answer = explode('||',$value->content);
                    if ($list_answer[0] != '') {
                ?>
                    <div class="list-ans-line-1">
                        <?=$list_answer[0]?>
                        <div class="circle-ans-1"></div>
                    </div>
                <?php }
                }
                ?>
                </div>
                <div class="col-md-6 my-auto">
                <?php
                foreach ($answer as $key => $value) {
                    $list_answer = explode('||',$value->content);
                    if ($list_answer[1] != '') {
                ?>
                    <div class="list-ans-line-2">
                        <div class="circle-ans-2"></div>
                        <?=$list_answer[1]?>
                    </div>
                <?php }
                }
                ?>
                </div>
            </div>
        </div>
    </div>