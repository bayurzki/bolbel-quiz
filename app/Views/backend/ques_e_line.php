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

            <div class="line-match-ques">
                <div class="ans-controls">
                    <?php 
                    foreach ($answer as $key => $value) { 
                        $list_answer = explode('||',$value->content);
                    ?>
                    <div class="form-group form-inline dynamic-element" data-index="<?=$key?>">
                        <label class="col-md-2 col-form-label">
                            <input class="form-check-input checkbox" type="checkbox" name="is_correct[]" value="0">
                            <span class="form-check-sign">Is Correct</span>
                        </label>
                        <div class="col-md-10 line-match-list">
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="content_1[]" class="form-control input-full" value="<?=$list_answer[0]?>" />
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="content_2[]" class="form-control input-full" value="<?=$list_answer[1]?>"/>    
                                </div>
                                <?php if ($key > 0) { ?>
                                <div class="col-md-2 pt-2">
                                    <button class="btn btn-danger ans-remove btn-remove btn-xs" onclick="ans_remove(<?=$key?>)" title="add option" type="button">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-md-10 justify-content-end">
                        <button class="btn btn-xs btn-success ans-line float-right mr-3" title="add option" data-type="multi">
                            Add New <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>