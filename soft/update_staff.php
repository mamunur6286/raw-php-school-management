
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['staff_id'])){
    $staff_id=mysqli_real_escape_string(database::connect(),$_GET['staff_id']);
}
?>

<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Staff Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Staff Manage</li>
        <li class="">Profile</li>
        <li class='active'>Update</li>

    </ol>
</section>
<!------ student update form submit here --------->
<?php
    if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['btn_update'])){
        $update_result=$staff->update($_POST,$_FILES,$staff_id);
    }
?>
<?php
//Select student by id
$single_staff=$staff->singleStaff($staff_id);
if($single_staff){
    $staff_value=$single_staff->fetch_assoc();
}

?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                    <br>
                    <h3 class="text-center">Information of <?php echo $staff_value['staff_name']; ?></h3><br>
                    <br>
                    <div class="box-body">
                        <!----- student profile --------->
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-lg-10">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <img src="<?php echo $staff_value['image']; ?>" width="160px" height="170px">
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                                    <div class="row container-fluid">
                                        <div class="col-md-12 table-responsive ">
                                            <?php
                                            if(isset($update_result)){
                                                echo $update_result;
                                            }
                                            ?>
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <table class="table ">
                                                    <tr>
                                                        <td>Staff Image</td>
                                                        <td><input name="image" type="file" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Staff Id</td>
                                                        <td><input readonly type="text" class="form-control" value="<?php echo $staff_value['id'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Staff Name</td>
                                                        <td><input name="staff_name" type="text" class="form-control" value="<?php echo $staff_value['staff_name'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Father Name</td>
                                                        <td><input name="father_name" type="text" class="form-control" value="<?php echo $staff_value['father_name'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mother Name</td>
                                                        <td><input name="mother_name" type="text" class="form-control" value="<?php echo $staff_value['mother_name'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gender</td>
                                                        <td>
                                                            <select class="form-control" name="gender">
                                                                <option value="">Select One</option>
                                                                <option value="Male" <?php  if($staff_value['gender']=='Male'){ echo "selected"; } ?> >Male</option>
                                                                <option value="Female" <?php  if($staff_value['gender']=='Female'){ echo "selected"; } ?>>Female</option>
                                                                <option value="Other" <?php  if($staff_value['gender']=='Other'){ echo "selected"; } ?>>Other</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date of Birth</td>
                                                        <td><input name="birth_date" type="text" readonly id="datePicker" class="form-control" value="<?php echo $staff_value['birth_date'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile</td>
                                                        <td><input name="mobile" type="text" class="form-control" value="<?php echo $staff_value['mobile'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input name="email" type="text" class="form-control" value="<?php echo $staff_value['email'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>National Id</td>
                                                        <td><input name="national_id" type="text" class="form-control" value="<?php echo $staff_value['national_id'] ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Education </td>
                                                        <td><input name="education" class="form-control" value="<?php  echo $staff_value['education']?>"></td>
                                                        <td>Designation</td>
                                                        <td><input name="designation" type="text" class="form-control" value="<?php echo $staff_value['designation'] ?>"></td>
                                                    </tr>

                                                    <?php
                                                    $address=$staff_value['address'];
                                                    $exp=explode(',',$address);
                                                    $village=$exp['0'];
                                                    $union=$exp['1'];
                                                    $sub_district=$exp['2'];
                                                    $district=$exp['3'];
                                                    ?>
                                                    <tr>
                                                        <th>Address</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Village</td>
                                                        <td><input name="village" type="text" class="form-control" value="<?php echo $village ?>"></td>
                                                        <td>Union</td>
                                                        <td><input name="union" type="text" class="form-control" value="<?php echo $union ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub District</td>
                                                        <td><input name="sub_district" type="text" class="form-control" value="<?php echo $sub_district ?>"></td>
                                                        <td>District</td>
                                                        <td><input name="district" type="text" class="form-control" value="<?php echo $district ?>"></td>
                                                    </tr>
                                                </table>
                                                <div class="box-footer">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 "></div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                                                        <input name="btn_update" type="submit" class="btn btn-info btn-block" value="Update Now" />
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>