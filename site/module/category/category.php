
<?php

$id=$_GET['id'];
$cat_name=$_GET['cat_name'];
$num=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM product,category WHERE product.cat_id=category.cat_id AND product.cat_id='$id'"));


if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}
$row_per_page=5;
$per_row=$page*$row_per_page-$row_per_page;
$total_page=ceil($num/$row_per_page);

$list_page="";

//prev
$prev=$page-1;
if($prev<1){
    $prev=1;
}
$list_page.='<li class="page-item"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&cat_name='.$cat_name.'&page='.$prev.'">&laquo;</a></li>';


//
for($i=1;$i<=$total_page;$i++){
    if($i==$page){
        $active="active";
    }else{
        $active="";
    }
    $list_page.='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&cat_name='.$cat_name.'&page='.$i.'">'.$i.'</a></li>';
}
//next
$next=$page+1;
if($next>$total_page){
    $next=$total_page;
}
$list_page.='<li class="page-item"><a class="page-link" href="index.php?page_layout=category&id='.$id.'&cat_name='.$cat_name.'&page='.$next.'">&raquo;</a></li>';


?>


                <!--	List Product	-->
                <div class="products">
                    <h3><?php echo $cat_name; ?> (hiện có <?php echo $num;  ?> sản phẩm)</h3>
                    <div class="product-list row">
                        <?php
                        $sql="SELECT * FROM product,category WHERE product.cat_id=category.cat_id AND product.cat_id='$id' LIMIT $per_row,$row_per_page";
                        $query=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($query)){
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&id=<?php echo $row['prd_id']; ?>"><img src="../admin/images/<?php echo $row['prd_image'] ?>"></a>
                                <h4><a href="index.php?page_layout=product&id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'','.'); ?>đ</span></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
                <!--	End List Product	-->
                
                <div id="pagination">
                    <ul class="pagination">
                        <?php echo $list_page; ?>
                    </ul> 
                </div>
                

            
