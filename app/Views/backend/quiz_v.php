<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Quiz</h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title"><?=$quiz['title']?></div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7">
                <p><?=$quiz['sub_title']?></p>
            </div>
            <div class="col-md-5">
                Duration: <?=$quiz['duration']?><br>
                Passing Grade: <?=$quiz['passing_grade']?>
            </div>
        </div>

        <?php foreach ($qdetail as $key => $value) { ?>
        <div class="list-quiz-detail">
            <button class="btn btn-default btn-full ans-view text-align-left" data-toggle="collapse" data-target="#ques_<?=$value->id_question?>" data-value="<?=$value->id_question?>">
                <?=$value->title?> <i class="fa fa-arrow-right float-right"></i>
            </button>
            <div id="ques_<?=$value->id_question?>" class="collapse">
            
            </div>
        </div>
        <?php } ?>
        
</div>