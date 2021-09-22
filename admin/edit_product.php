<?php
$id=$_GET['id'];
$sql="SELECT * FROM product WHERE prd_id='$id'";
$query=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($query);

if(isset($_POST['sbm'])){
    $prd_name=$_POST['prd_name'];
    $prd_price=$_POST['prd_price'];
    $prd_warranty=$_POST['prd_warranty'];
    $prd_accessories=$_POST['prd_accessories'];
    $prd_promotion=$_POST['prd_promotion'];
    $prd_new=$_POST['prd_new'];
    $cat_id=$_POST['cat_id'];
    $prd_status=$_POST['prd_status'];
    $prd_featured=$_POST['prd_featured'];
    $prd_details=$_POST['prd_details'];
    if(isset($_POST['prd_featured'])){
        $prd_featured = 1;
    }else{
        $prd_featured = 0;
    }
    if($_FILES['prd_image']['name'] == ""){
        $prd_image = $row['prd_image'];
    }else{
        $prd_image = $_FILES['prd_image']['name'];
        $tmp_name = $_FILES['prd_image']['tmp_name'];
        move_uploaded_file($tmp_name,'images/'.$prd_image);
    }
    $sql_update = "UPDATE product SET prd_name = '$prd_name', prd_price = $prd_price, prd_warranty = '$prd_warranty',
    prd_accessories = '$prd_accessories', prd_promotion = '$prd_promotion', prd_new = '$prd_new', prd_details = '$prd_details',
    prd_status = $prd_status, cat_id = $cat_id, prd_featured = $prd_featured, prd_image = '$prd_image' WHERE prd_id = '$id' ";
    $query_update = mysqli_query($conn,$sql_update);
    header('location: index.php?page_layout=product');
}
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý sản phẩm</a></li>
				<li class="active"><?php echo $row['prd_name']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Sản phẩm: <?php echo $row['prd_name']; ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-6">
                                <form role="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="prd_name" required class="form-control" value="<?php echo $row['prd_name']; ?>"  placeholder="">
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Giá sản phẩm</label>
                                    <input type="number" name="prd_price" required value="<?php echo $row['prd_price']; ?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Bảo hành</label>
                                    <input type="text" name="prd_warranty" required value="<?php echo $row['prd_warranty']; ?>" class="form-control">
                                </div>    
                                <div class="form-group">
                                    <label>Phụ kiện</label>
                                    <input type="text" name="prd_accessories" required value="<?php echo $row['prd_accessories']; ?>" class="form-control">
                                </div>                  
                                <div class="form-group">
                                    <label>Khuyến mãi</label>
                                    <input type="text" name="prd_promotion" required value="<?php echo $row['prd_promotion']; ?>" class="form-control">
                                </div>  
                                <div class="form-group">
                                    <label>Tình trạng</label>
                                    <input type="text" name="prd_new" required value="<?php echo $row['prd_new']; ?>" type="text" class="form-control">
                                </div>  
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    <input type="file" name="prd_image">
                                    <br>
                                    <div>
                                        <img src="images/<?php echo $row['prd_image']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="cat_id" class="form-control">
                                        <?php
                                        $sql_cat='SELECT * FROM category';
                                        $query_cat=mysqli_query($conn,$sql_cat);
                                        while ($row_cat=mysqli_fetch_array($query_cat)) {
                                        ?>
                                        <option value=<?php echo $row_cat['cat_id'];?> <?php if($row['cat_id']==$row_cat['cat_id']){echo 'selected';} ?>><?php echo $row_cat['cat_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="prd_status" class="form-control">
                                        <option <?php if($row['prd_status']==1){echo 'selected';} ?> value=1>Còn hàng</option>
                                        <option <?php if($row['prd_status']==0){echo 'selected';} ?> value=0>Hết hàng</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Sản phẩm nổi bật</label>
                                    <div class="checkbox">
                                        <label>
                                            <input name="prd_featured" type="checkbox" value=<?php echo $row['prd_featured']; ?> <?php if($row['prd_featured']==1){echo 'checked';} ?>>Nổi bật
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label>Mô tả sản phẩm</label>
                                        <textarea name="prd_details" required class="form-control" rows="3"><?php echo $row['prd_details'];?></textarea>
                                    </div>
                                <button type="submit" name="sbm" class="btn btn-primary">Cập nhật</button>
                                <button type="reset" class="btn btn-default">Làm mới</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->
		
	</div>	<!--/.main-->