<div class="card">
    <div class="card-header">
        <div class="card-title">Edit Question</div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group form-inline">
                        <label class="col-md-3 col-form-label">Title</label>
                        <div class="col-md-6 p-0">
                            <input type="hidden" name="is_create" value="0" />
                            <input type="text" name="title" class="form-control input-full" value="<?=$ques['title']?>" />
                        </div>
                    </div>
                    <div class="form-group form-inline">
                        <label class="col-md-3 col-form-label">Sub Title</label>
                        <div class="col-md-6 p-0">
                            <textarea class="form-control input-full" name="sub_title"><?=$ques['sub_title']?></textarea>
                        </div>
                    </div>

                    <div class="form-group form-inline">
                        <label class="col-md-3 col-form-label">Type</label>
                        <div class="col-md-6 p-0">
                            <select name="question_type" class="form-control input-full" id="question_type" onchange="change_type()">
                                <option value="<?=$ques['type_question']?>"><?=$type?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ans-controls" data-type="single">
                <?php 
                foreach ($answer as $key => $value) { 
                if ($value->is_correct == 1) {
                    $checked = 'checked';
                }else{
                    $checked = '';
                }
                ?>
                <div class="form-group form-inline entry" data-entry="<?=$key?>">
                    <label class="col-md-3 col-form-label">
                        <input class="form-check-input radio" name="is_correct" value="0" type="radio" <?=$checked?>/>
                        <span class="form-check-sign">Is Correct</span>
                    </label>
                    <div class="col-md-6">
                        <input type="text" name="content[]" class="form-control input-full" value="<?=$value->content?>" />
                    </div>
                    <?php if ($key > 0) { ?>
                    <div class="col-md-3">
                        <button class="btn btn-danger ans-remove btn-remove btn-xs" onclick="ans_remove(<?=$key?>)" title="add option" type="button">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <div class="row">
                <div class="col-md-9 justify-content-end">
                    <button class="btn btn-xs btn-success ans-add float-right mr-3" title="add option" data-type="single">
                        Add New <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>