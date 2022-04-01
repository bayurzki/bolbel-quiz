<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Courses</h2>
            </div>
        </div>
        <div class="ml-md-auto py-2 py-md-0">
            <a href="<?=base_url().'/dashboard/course_create'?>" class="btn btn-white btn-border btn-round mr-2">Add New</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-title">Quiz List</div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <th>No</th>
                    <th>Title</th>
                    <th>Sub title</th>
                    <th>Create At</th>
                    <th>Create By</th>
                </thead>
                <tbody>
                <?php $no=1; foreach ($datana as $key => $value) { ?>
                    <tr>
                    <td><?=$no++?></td>
                    <td><a href="<?=base_url().'/dashboard/course_view/'.$value['id']?>"><?=$value['title']?></a></td>
                    <td><?=$value['sub_title']?></td>
                    <td><?=date('Y-m-d H:i', strtotime($value['create_at']))?></td>
                    </tr>
                <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
</div>