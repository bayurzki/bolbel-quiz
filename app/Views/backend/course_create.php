<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Course</h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
	<div class="card-header">
		<div class="card-title">Add Course</div>
	</div>
    <div class="card-body">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="form-group form-inline">
    				<label class="col-md-3 col-form-label">Title</label>
    				<div class="col-md-6 p-0">
    					<input type="text" name="title" class="form-control input-full" />
    				</div>
    			</div>
    			<div class="form-group form-inline">
    				<label class="col-md-3 col-form-label">Sub Title</label>
    				<div class="col-md-6 p-0">
    					<textarea class="form-control input-full" name="sub_title"></textarea>
    				</div>
    			</div>    			
    		</div>
    	</div>
    </div>
</div>

<div class="card">
	<div class="card-header">
		<div class="card-title">Quiz List</div>
	</div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table list-quiz-course">
                <thead>
                    <th>Title</th>
                    <th>Sub Title</th>
                    <th>Type</th>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="4" class="no-data">Please add quiz</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#list_quiz">Add Quiz</button>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <a href="#" class="btn btn-primary float-right mr-3" onclick="save_course()">Save</a>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="list_quiz">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">List Quiz</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>No</th>
                            <th>Title</th>
                            <th>Sub title</th>
                            <th>Question</th>
                            <th>#</th>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach ($quiz as $key => $value) {
                            ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$value['title']?></td>
                                <td><?=$value['sub_title']?></td>
                                <td><?=$value['total_question']?></td>
                                <td><button class="btn btn-xs btn-success add_quiz_course" data-index="<?=$key?>" data-value="<?=$value['id']?>"><i class="fa fa-plus"></i></button></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
