
                <div class="products">
                    <h3>Sản phẩm nổi bật</h3>
                    <div class="product-list row">
                        <?php
                        $sql="SELECT * FROM product WHERE prd_featured=1 LIMIT 6";
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
                        }
                        ?>
                    </div>
                </div>