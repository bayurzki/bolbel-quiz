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

            <div class="row group-match-ques">
                <?php 
                foreach ($answer as $key => $value) {
                    $contents = json_decode($value->content,true);
                    if ($value->is_correct == 1) {
                ?>
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table table-head-bg-primary">
                            <thead>
                                <th>
                                    <input type="text" name="a_head_<?=$key?>" placeholder="Correct Heading" value="<?=$contents['head']?>" />
                                </th>
                            </thead>
                            <tbody class="ans-controls-<?=$key?>">
                                <?php 
                                for ($i=0; $i < sizeof($contents['body']); $i++) {  
                                ?>
                                <tr class="dynamic-element-<?=$key?>" data-index="<?=$key?>">
                                    <td>
                                        <input type="text" name="a_list_<?=$key?>[]" placeholder="Correct Content" value="<?=$contents['body'][$i]?>">
                                        <?php if ($i > 0){ ?>
                                        <button class="btn btn-xs btn-danger remove_a_<?=$key?>" onclick="remove_a_0(<?=$i?>)" title="Delete"><i class="fa fa-trash"></i></button>
                                        <?php } ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <td>
                                    <button class="btn btn-xs btn-success ans-group-<?=$key?> float-right mr-3" title="add option" data-type="multi">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <?php 
                    }
                } ?>
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table table-head-bg-danger">
                            <thead>
                                <th><h4>Wrong Content</h4></th>
                            </thead>
                            <tbody class="ans-controls-3">
                                <tr class="dynamic-element-3">
                                    <td>
                                        <input type="text" name="a_list_3[]" placeholder="Wrong Content">
                                        
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <td>
                                    <button class="btn btn-xs btn-success ans-group-3 float-right mr-3" title="add option" data-type="multi">
                                        Add New <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>