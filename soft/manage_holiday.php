<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>

    <!-- Right side Threme color setting -->

    <section class="content-header">
        <h1> Dashboard <small>Other Info</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Holiday Management</li>
            <li class="active">Holiday Manage</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <?php
                if (isset($del_message)){
                    echo $del_message;
                }
                ?>
                <div class="box" >
                    <div class="container-fluid">
                        <div class="box-header text-center">
                            <h3 class="box-title ">Total Holiday List </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive" >
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Serial No</th>
                                    <th>Holiday Day</th>
                                    <th>Holiday Month</th>
                                    <th>Holiday Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $select_result=$calender->select();
                                $i=1;
                                if($select_result){
                                    foreach ($select_result as $value){
                                        ?>
                                        <tr>
                                            <td ><?php echo  $i++;; ?></td>
                                            <td ><?php echo $value['day'] ?></td>
                                            <td ><?php echo $value['month'] ?></td>
                                            <td ><?php echo substr($value['holiday'],0,80);  ?></td>
                                            <td><a onclick="return confirm('Are you sure to delete this field?')" href="?del_result=<?php echo $value['id'].'-calendar' ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> </a></td>
                                        </tr>

                                    <?php }} ?>
                                </tbody>

                            </table>
                        </div><!-- /.box-body -->
                    </div>
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->
<?php
require_once 'inc/footer.php';
?>