<?php
    $id=$_GET['id'];
    $sql="SELECT * FROM user WHERE user_id='$id'";
    $query=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($query);
?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="">Quản lý thành viên</a></li>
				<li class="active"><?php echo $row['user_full']; ?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Thành viên: <?php echo $row['user_full']; ?></h1>
			</div>
        </div><!--/.row-->
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-md-8">
                            <?php
                                if(isset($_POST['sbm'])){
                                    $check_mail=true;
                                    $full=$_POST['user_full'];
                                    $mail=$_POST['user_mail'];
                                    $pass=$_POST['user_pass'];
                                    $re_pass=$_POST['user_re_pass'];
                                    $level=$_POST['user_level'];

                                    $sql_mail="SELECT * FROM user";
                                    $query_mail=mysqli_query($conn,$sql_mail);
                                    while($row=mysqli_fetch_array($query_mail)){
                                        if($row['user_id']!=$id&&$row['user_mail']==$mail){
                                            $check_mail=false;
                                        }
                                    }

                                    if($check_mail){
                                        $sql_update="UPDATE user SET user_full='$full',user_mail='$mail',user_pass='$pass',user_level='$level' WHERE user_id='$id'";
                                        $query_update=mysqli_query($conn,$sql_update);
                                        header("location: index.php?page_layout=user");
                                    }
                                    else{
                                        $err_mail='<div class="alert alert-danger">Email đã tồn tại !</div>';
                                    }
                                }
                            ?>
                            <?php
                                    if(isset($err_mail)){
                                        echo $err_mail;
                                    }
                            ?>
                            <form role="form" method="post">
                                <div class="form-group">
                                    <label>Họ & Tên</label>
                                    <input type="text" name="user_full" required class="form-control" value="<?php echo $row['user_full']; ?>" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="user_mail" required value="<?php echo $row['user_mail']; ?>" class="form-control">
                                </div>                       
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="user_pass" value="<?php echo $row['user_pass']; ?>" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu</label>
                                    <input type="password" name="user_re_pass" value="<?php echo $row['user_pass']; ?>" required  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Quyền</label>
                                    <select name="user_level" class="form-control">
                                            <option value=1 <?php if($row['user_level']==1){echo "selected";} ?>>Admin</option>
                                            <option value=2 <?php if($row['user_level']==2){echo "selected";} ?>>Member</option>

                                    </select>
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
