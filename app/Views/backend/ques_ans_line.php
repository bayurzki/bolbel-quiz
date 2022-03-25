<div class="line-match-ques">
	<div class="ans-controls">
		<div class="form-group form-inline dynamic-element" data-index="0">
			<label class="col-md-2 col-form-label">
				<input class="form-check-input checkbox" type="checkbox" name="is_correct[]" value="0">
				<span class="form-check-sign">Is Correct</span>
			</label>
			<div class="col-md-10 line-match-list">
				<div class="row">
					<div class="col-md-5">
						<input type="text" name="content_1[]" class="form-control input-full" />
					</div>
					<div class="col-md-5">
						<input type="text" name="content_2[]" class="form-control input-full" />	
					</div>
					<div class="col-md-2 pt-2"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 justify-content-end">
			<button class="btn btn-xs btn-success ans-line float-right mr-3" title="add option" data-type="multi">
			    Add New <i class="fa fa-plus"></i>
			</button>
		</div>
	</div>
</div>


<script src="<?php echo base_url() ?>/backend/js/custom.js"></script>
