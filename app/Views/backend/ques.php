<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Questions</h2>
            </div>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            <a href="<?=base_url().'/dashboard/question_create'?>" class="btn btn-white btn-border btn-round mr-2">Add New</a>
            <!-- <a href="#" class="btn btn-secondary btn-round">Add Customer</a> -->
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-title">Questions Bank</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Sub title</th>
                    <th>Type</th>
                    <th>Create At</th>
                    <th>Create By</th>
                    <th>#</th>
                </thead>
                <tbody>
                    <?php 
                    $no=1; 
                    foreach ($datana as $key => $value) {
                        if ($value['type_question'] == 0) {
                            $type = 'Single Choice';
                        }elseif ($value['type_question'] == 1) {
                            $type = 'Multiple Choice';
                        }elseif ($value['type_question'] == 2) {
                            $type = 'Group Match';
                        }else{
                            $type = 'Line Match';
                        }
                    ?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><a href="<?=base_url().'/dashboard/question_view/'.$value['id']?>"><?=$value['title']?></a></td>
                        <td><?=$value['sub_title']?></td>
                        <td><?=$type?></td>
                        <td><?=date('Y-m-d H:i',strtotime($value['create_at']))?></td>
                        <td><?=$value['create_by']?></td>
                        <td>
                            <a href="<?=base_url().'/dashboard/question_view/'.$value['id']?>" class="btn btn-xs btn-success" title="View"><i class="fa fa-eye"></i></a>
                            <a href="<?=base_url().'/dashboard/question_edit/'.$value['id']?>" class="btn btn-xs btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                            <a href="<?=base_url().'/dashboard/question_delete/'.$value['id']?>" class="btn btn-xs btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>