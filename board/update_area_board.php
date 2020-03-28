<?php include_once('assets/config.php');

if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

	$row	=	$db->getAllRecords('tbl_area','*',' AND area_id="'.$_REQUEST['editId'].'"');

}



if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

	extract($_REQUEST);

	if($area_name==""){

		header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);

		exit;

	}

	$data	=	array(

					'area_name'=>$area_name,
					);

	$update	=	$db->update('tbl_area',$data,array('area_id'=>$editId));

	if($update){

		header('location: table_area_board.php?msg=rus&page=1&ipp=10');

		exit;

	}else{

		header('location: table_area_board.php?msg=rnu&page=1&ipp=10');

		exit;

	}

}

?>
<?php include './include_menu.php';?>
<script>
$(document).ready(function() {

    $('a[href^="./table_area_board.php"]').addClass('nav-item has-treeview menu-open nav-link active');

});
</script>
 <head>
        <title>แก้ไขข้อมูลเขตคณะกรรมการ</title>
    </head>
<br><br>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">แก้ไขข้อมูลเขตคณะกรรมการ</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#" style="color:info">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">แก้ไขข้อมูลเขตคณะกรรมการ</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   
    <div class="container">
        <?php

		if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="an"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

			echo	'<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

		}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

			echo	'<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

		}

		?>

        <div class="card">

            <div class="card-header"><i class="fa fa-fw fa-edit"></i> <strong>แก้ไขข้อมูล</strong> <a
                    href="table_area_board.php?page=1&ipp=10" class="float-right btn btn-dark btn-sm"><i
                        class="fa fa-fw fa-globe"></i> ตารางเขต</a></div>

            <div class="card-body">



                <div class="col-sm-6">
                <h5 class="card-title">ช่องที่มี <span class="text-danger">*</span> จำเป็นต้องกรอก! </h5>
                    <form method="post">

                        <div class="form-group">

                            <label>ชื่อเขตคณะกรรมการ <span class="text-danger">*</span></label>

                            <input type="text" name="area_name" id="area_name" class="form-control"
                                value="<?php echo isset($row[0]['area_name'])?$row[0]['area_name']:''; ?>"
                                placeholder="ป้อนชื่อเขตคณะกรรมการ" required>

                        </div>

                        <div class="form-group">

                            <input type="hidden" name="editId" id="editId"
                                value="<?php echo isset($_REQUEST['editId'])?$_REQUEST['editId']:''?>">

                            <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i
                                    class="fa fa-fw fa-edit"></i> แก้ไขข้อมูล</button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>



    <div class="container my-4">

        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

        <!-- demo left sidebar -->

        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-6724419004010752"
            data-ad-slot="7706376079" data-ad-format="auto" data-full-width-responsive="true"></ins>

        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>
    <br><br>
