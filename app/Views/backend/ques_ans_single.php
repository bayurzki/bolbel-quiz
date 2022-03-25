<div class="ans-controls" data-type="single">
	<div class="form-group form-inline entry" data-entry="0">
		<label class="col-md-3 col-form-label">
			<input class="form-check-input radio" name="is_correct" value="0" type="radio" />
			<span class="form-check-sign">Is Correct</span>
		</label>
		<div class="col-md-6">
			<input type="text" name="content[]" class="form-control input-full" value="true" />
		</div>
	</div>
	<div class="form-group form-inline entry" data-entry="1">
		<label class="col-md-3 col-form-label">
			<input class="form-check-input radio" name="is_correct" value="1" type="radio" />
			<span class="form-check-sign">Is Correct</span>
		</label>
		<div class="col-md-6">
			<input type="text" name="content[]" class="form-control input-full" value="false"/>
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
		<button class="btn btn-xs btn-success ans-add float-right mr-3" title="add option" data-type="single">
		    Add New <i class="fa fa-plus"></i>
		</button>
	</div>
</div>

<script src="<?php echo base_url() ?>/backend/js/custom.js"></script>
