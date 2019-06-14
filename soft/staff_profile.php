
<?php
require_once 'inc/header.php';
require_once 'inc/sidebar.php';
?>
<?php
if (isset($_GET['staff_id'])){
    $staff_id=mysqli_real_escape_string(database::connect(),$_GET['staff_id']);
   }
    else{
        echo "<script>Window.location='home.php';</script>";
    }


?>

<?php
//Select student by id
$single_staff=$staff->singleStaff($staff_id);
if($single_staff){
    $staff_value=$single_staff->fetch_assoc();
}

?>
<!-- Right side Threme color setting -->
<section class="content-header">
    <h1> Dashboard <small>Staff Info</small></h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Staff Manage</li>
        <li class="active">Profile</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div id="div_print" class="box">
                <div class="container-fluid">
                    <div class="text-center">
                        <br>
                        <a class="" style="font-size: 20px" onClick="printdiv('div_print')"><i class="glyphicon glyphicon-print"></i> </a>
                    </div>
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
                                        <div class="col-md-12 table-responsive">
                                            <table class="table table-responsive-sm ">
                                                <tr>
                                                    <td>Staff Id</td>
                                                    <td><?php echo $staff_value['id']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Staff Name</td>
                                                    <td><?php echo $staff_value['staff_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Father Name</td>
                                                    <td><?php echo $staff_value['father_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mother Name</td>
                                                    <td> <?php echo $staff_value['mother_name']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Gender</td>
                                                    <td><?php echo $staff_value['gender']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Date of Birth</td>
                                                    <td><?php echo $staff_value['birth_date']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td><?php echo $staff_value['mobile']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>National Id</td>
                                                    <td><?php echo  $staff_value['national_id']; ?></td>
                                                    <td>Roll</td>
                                                    <td><?php echo $staff_value['id']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Education </td>
                                                    <td><?php echo  $staff_value['education']; ?></td>
                                                    <td>Designation </td>
                                                    <td><?php echo $staff_value['designation']; ?></td>
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
                                                    <td><?php echo $village; ?></td>
                                                    <td>Union</td>
                                                    <td><?php echo $union; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sub District</td>
                                                    <td><?php echo $sub_district; ?></td>
                                                    <td>District</td>
                                                    <td><?php echo $district; ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-4 "></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 ">
                            <a href="update_staff.php?staff_id=<?php echo $staff_value['id']; ?>" type="submit" class="btn btn-info btn-block">Update Profile</a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4"></div>

                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</section>


<?php
require_once 'inc/footer.php';
?>