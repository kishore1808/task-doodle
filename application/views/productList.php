<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Home/addUpdateProduct'); ?>" id="productForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="update_id" name="update_id" value="0">
                    <div class=" form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group">
                        <label for="user_assign">User Asign</label>
                        <select class="form-control" name="user_id" id="user_id">
                            <option value="">Choose</option>
                            <?php
                            if(!empty($userList)){
                                
                                foreach($userList as $row){
                                    ?>
                                <option value="<?= $row['user_id'] ?>"><?= $row['username'] ?></option>
    
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="product_code">Product Code</label>
                        <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image" onchange="readURL(this);">
                    </div>
                    <div class="form-group">
                  <img id="blah" src="#" alt="your image" />
                                              </div>
                    <div class="form-group" for="price">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="clear_form()" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="savebtn">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">
            Product List
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Product List</li>
        </ol>

    </div>

    <div id="page-inner">

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary" onclick="openModel('add')" data-toggle="modal" data-target="#myModal">Add Product</button>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Image</th>
                                        <th>Price</th>
                                        <th>User Assigned</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($productList)){
                                        $i = 1;
                                        foreach($productList as $val){
                                            ?>
                                          <tr class="odd gradeX">
                                            <td><?= $i++; ?></td>
                                            <td><?= $val['product_name']; ?></td>
                                            <td><?= $val['code']; ?></td>
                                            <td><img src="<?= base_url($val['image']); ?>" width="50" height="50"></td>
                                            <td><?= $val['price']; ?></td>
                                            <td><?= $val['username']; ?></td>
                                            <td class="center"><label class="label label-<?= $val['status']==1?'success':'danger'; ?>" onclick="changeStatus(<?= $val['status'] ?>,<?= $val['product_id'] ?>)"> <?= $val['status']==1?'active':'inactive'; ?> </label></td>
                                            <td>
											<div class="btn-group">
											  <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle"><i class="fa fa-trash"></i> <span class="caret"></span></button>
											  <ul class="dropdown-menu">
												<li style="padding:5px;">Are You Want to 
                                                     delete?</li>
											
												<li class="divider"></li>
												<li><button class="btn btn-danger btn-sm btnDelete" style="margin-left:25px;" onclick="deletePro(<?= $val['product_id']; ?>)">Yes</button> <button class="btn btn-info btn-sm">No</button></li>
											  </ul>
											</div>
                                            <button onclick="editModal(<?= $val['product_id'] ?>,<?= $val['user_id'] ?>,
                                                 '<?= $val['product_name'] ?>','<?= $val['code'] ?>','<?= $val['price'] ?>','<?= $val['image'] ?>')" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><i class="fa fa-edit "></i> </butto
n>
                                            </td>
                                        </tr>   
                                            
                                            <?php
                                        }
                                    }
                                    
                                    ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
        <!-- /. ROW  -->


        <!-- /. ROW  -->

        <!-- /. ROW  -->
    </div>
    <footer>
        <p>All right reserved.</p>
    </footer>
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
<!-- /. WRAPPER  -->
<!-- jQuery Js -->
<script src="<?= base_url(); ?>assets/js/jquery-1.10.2.js"></script>
<!-- Bootstrap Js -->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- Metis Menu Js -->
<script src="<?= base_url(); ?>assets/js/jquery.metisMenu.js"></script>
<!-- DATA TABLE SCRIPTS -->
<script src="<?= base_url(); ?>assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?= base_url(); ?>assets/js/dataTables/dataTables.bootstrap.js"></script>


<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>
<!-- Custom Js -->
<script src="<?= base_url(); ?>assets/js/custom-scripts.js"></script>
<script>
  

    function openModel(id) {
         $('#productForm')[0].reset();
            $('#myModalLabel').html('Add Product');
            $('#savebtn').html('Add');
            $('#blah').attr('src', '').width(50).height(50);

        
    }

    function editModal(pid,uid,name,code,price,img){
        $('#myModalLabel').html('Update Product');
            $('#savebtn').html('Update');
            $('#update_id').val(pid);
            $('#name').val(name);
            $('#user_id').val(uid);
            $('#product_code').val(code);
            $('#price').val(price);

            var imgs = "<?= base_url() ?>"+img;
      $('#blah').attr('src', imgs).width(50).height(50);

    }

    function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result).width(50).height(50);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

    function changeStatus(status,id){
        $.ajax({
            url: "<?= base_url('Home/changeStatus') ?>",
            method: "POST",
            data: {
                id: id,
                status: status
            },
            success: function() {
                location.reload();
            }
        });
    }
    function deletePro(id) {
        $.ajax({
            url: "<?= base_url('Home/deletePro') ?>",
            method: "POST",
            data: {
                id: id
            },
            success: function(d) {
                toastpopup(d);
            }
        });
    }

    $("#dataTables-example").on('click', '.btnDelete', function() {
        $(this).closest('tr').remove();
    });
</script>

</body>

</html>