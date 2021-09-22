<?php
    if(isset($_POST['key'])){
        $key=$_POST['key'];
    }else{
        $key=$_GET['key'];
    }

    $array=array();
    $array=explode(" ",$key);//tach chuoi thanh mang
    $str="%".implode("%",$array)."%";  //gop mang thanh chuoi
?>
<?php

if(isset($_GET['page'])){
    $page=$_GET['page'];
}else{
    $page=1;
}

$list_page='';
//back
$prev=$page-1;
if($prev<1){
    $prev=1;
}
$list_page.='<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key='.$key.'&page='.$prev.'">&laquo;</a></li>';
//

$sql_prd="SELECT * FROM product WHERE prd_name LIKE'$str'";
$total_row=mysqli_num_rows(mysqli_query($conn,$sql_prd));
$row_per_page=3;
$total_page=ceil($total_row/$row_per_page);
$per_row=$page*$row_per_page-$row_per_page;
for($i=1;$i<=$total_page;$i++){
    if($i==$page){
        $active='active';
    }else{
        $active='';
    }
    $list_page.='<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=search&key='.$key.'&page='.$i.'">'.$i.'</a></li>';
}
//
$next=$page+1;
if($next>$total_page){
    $next=$total_page;
}
$list_page.='<li class="page-item"><a class="page-link" href="index.php?page_layout=search&key='.$key.'&page='.$next.'">&raquo;</a></li>';
?>
                <!--	List Product	-->
                <div class="products">
                    <div id="search-result">Kết quả tìm kiếm với sản phẩm <span><?php echo $key; ?></span></div>
                        <div class="product-list row">
                        <?php
                        $sql="SELECT * FROM product WHERE prd_name LIKE '$str' LIMIT $per_row,$row_per_page";
                        $query=mysqli_query($conn,$sql);
                        while($row=mysqli_fetch_array($query)){
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mx-product">
                            <div class="product-item card text-center">
                                <a href="index.php?page_layout=product&id=<?php echo $row['prd_id']; ?>"><img src="../admin/images/<?php echo $row['prd_image']; ?>"></a>
                                <h4><a href="index.php?page_layout=product&id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
                                <p>Giá Bán: <span><?php echo number_format($row['prd_price'],0,'','.'); ?>đ</span></p>
                            </div>
                        </div>
                        <?php
                        }?>

                    </div>
                </div>
                <!--	End List Product	-->
                
                <div id="pagination">
                    <ul class="pagination">
                        <?php echo $list_page; ?>
                    </ul> 
                </div>
                

            
