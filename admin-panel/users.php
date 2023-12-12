<?php include('../includes/header.php');?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
            <button type="button" class="add-click btn btn-primary float-right" data-toggle="modal"
                data-target="#userModal">Add</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>UserName</th>
                            <!-- <th>Role</th> -->
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                    $i=1;
                    $row=$database->getTableList('users');
                    foreach($row as $value){
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->username; ?></td>
                            <!-- <td><?php echo $value->role_id; ?></td> -->
                            <td>



                                <button type="button" id="<?php echo $value->id;?>" table="users" data-toggle="modal"
                                    data-target="#userModal" class="btn btn-icon btn-success update_ edit-click"><i
                                        class="fas fa-edit"></i></button>
                                <button data-toggle="modal" data-target="#modal-delete-record" type="button"
                                    id="<?php echo $value->id;?>" table="users"
                                    class="del_click remove_record delete-privilege btn btn-icon btn-danger"><i
                                        class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?php include('../includes/footer.php'); ?>

<script type="text/javascript">
    $(document).on('click', '.edit-click', function () {
        var id = $(this).attr("id");
        // alert(id);
        $.ajax({
            url: "../includes/fetch_records.php",
            method: "POST",
            data: {
                id: id,
                type: 'List',
                Table: 'users'
            },
            dataType: "json",
            success: function (data) {

                $('#usersName').val(data.name);
                $('#usersEmail').val(data.email)
                $('#usersUserName').val(data.username);

                $('.primaryId').val(id);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
            }
        })
    });
</script>