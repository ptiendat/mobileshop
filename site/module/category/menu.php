<div class="col-lg-12 col-md-12 col-sm-12">
            	<nav>
                	<div id="menu" class="collapse navbar-collapse">
                        <ul>
                            <?php
                                $query=mysqli_query($conn,"SELECT * FROM category ORDER BY cat_id ASC");
                                while($row=mysqli_fetch_array($query)){
                                ?>
                                    <li class="menu-item"><a href="index.php?page_layout=category&id=<?php echo $row['cat_id']; ?>&cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></a></li>
                                <?php
                                }
                            ?>
                        </ul>
                    </div>
                </nav>
            </div>