<?php
$id=$_GET['id'];
$query=mysqli_query($conn,"SELECT * FROM category WHERE cat_id='$id'");
$row=mysqli_fetch_array($query);
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="">Quản lý danh mục</a></li>
				<li class="active"><?php echo $row['cat_name']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh mục:<?php echo $row['cat_name']; ?></h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-8">

                        <?php
                            if(isset($_POST['sbm'])){
                                $check=true;
                                $name=$_POST['cat_name'];

                                $query=mysqli_query($conn,"SELECT * FROM category");
                                while($row=mysqli_fetch_array($query)){
                                    if($name==$row['cat_name'] && $id!=$row['cat_id']){
                                        $check=false;
                                    }
                                }
                                if($check){
                                    $sql="UPDATE category SET cat_name='$name' WHERE cat_id='$id'";
                                    $query_update=mysqli_query($conn,$sql);
                                    header("location: index.php?page_layout=category");
                                }else{
                                    $error='<div class="alert alert-danger">Danh mục đã tồn tại !</div>';
                                }

                            }

                        ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Tên danh mục:</label>
                                <?php if(isset($error)){echo $error;} ?>
                                <input type="text" name="cat_name" required value="<?php echo $row['cat_name']; ?>" class="form-control" placeholder="Tên danh mục...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div><!-- /.col-->
	</div>	<!--/.main-->	
