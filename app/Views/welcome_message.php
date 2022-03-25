<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Questions</h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
	<div class="card-header">
		<div class="card-title">Add Question</div>
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

    			<div class="form-group form-inline">
    				<label class="col-md-3 col-form-label">Type</label>
    				<div class="col-md-6 p-0">
    					<select name="question_type" class="form-control input-full" id="question_type" onchange="change_type()">
    						<option value="0">Single Choice</option>
    						<option value="1">Multi Choice</option>
    						<option value="2">Group Match</option>
    						<option value="3">Line Match</option>
    					</select>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<div class="card">
	<div class="card-header">
		<div class="card-title">Answers Question</div>
	</div>
    <div class="card-body">
    	<div class="row">
    		<div class="col-md-12">
    			<div id="answer-question">
					<div class="ans-controls" data-type="single">
	    				<div class="form-group form-inline entry" data-entry="0">
							<label class="col-md-3 col-form-label">
								<input class="form-check-input" name="is_correct" type="radio" checked>
								<span class="form-check-sign">Is Correct</span>
							</label>
							<div class="col-md-6">
								<input type="text" name="title" class="form-control input-full" value="true" />
							</div>
						</div>
						<div class="form-group form-inline entry" data-entry="1">
							<label class="col-md-3 col-form-label">
								<input class="form-check-input" name="is_correct" type="radio" value="">
								<span class="form-check-sign">Is Correct</span>
							</label>
							<div class="col-md-6">
								<input type="text" name="title" class="form-control input-full" value="false"/>
							</div>
							<div class="col-md-3">
								<button class="btn btn-danger ans-remove btn-remove btn-xs" onclick="ans_remove(1)" title="add option" type="button">
						            <i class="fa fa-minus"></i>
						        </button>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-9 justify-content-end">
							<button class="btn btn-xs btn-success ans-add float-right mr-3" title="add option">
							    Add New <i class="fa fa-plus"></i>
							</button>
						</div>
					</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<script type="text/javascript">
	function change_type(){
		var id_ = $("#question_type").val();
        var urlna = "<?=base_url().'/dashboard/answer_type/' ?>";
        console.log(urlna)
        $.ajax({
            url: urlna,  
            type: 'POST',
            data: {id: id_},
            success:function(data){
                $("#answer-question").html(data)
            }
        });
		
	}
</script>