<?php
	
    include_once('inc/user.inc.php');
    include_once('layout/header.php');

    if (isset($_GET['success']) && $_GET['success']!='') {
        ?>
            <div class="alert alert-success" role="alert">
            <?php echo $_GET['success']; ?>
            </div>
        <?php   
        }

    ?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Users
    <a class="btn btn-primary float-right" href="add_edit_user.php?action=add">Add New</a>
</h1>

<div class="row">
    <div class="col-12">

        <!-- User list -->
        <table class="table table-bordered bg-white">
            <thead>
                <tr>
                    <th scope="col" class="text-center" style="width: 50px;">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col" class="text-center">Age</th>
                    <th scope="col">Create Date</th>
                    <th scope="col" class="text-center" style="width: 50px;">Status</th>
                    <th scope="col" class="text-center" style="width: 85px;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                
                while ($users = mysqli_fetch_assoc($data)) {   
                ?>
                <tr>
                    <th scope="row" class="text-center"><?php echo $users['id'] ?></th>
                    
                    <td><?php echo $users['first_name'] ?></td>
                    
                    <td><?php echo $users['last_name'] ?></td>

                    <td>
                        <a href="mailto:<?php echo $users['email'] ?>"><?php echo $users['email'] ?></a>
                    </td>
                    <td>
                        <a href="tel:<?php echo $users['phone_number'] ?>"><?php echo $users['phone_number'] ?></a>
                    </td>
                    <td class="text-center"><?php echo $users['age'] ?></td>
                    <td><?php echo $users['create_date'] ?></td>
                    <td class="text-center">
                        <a href="<?php echo get_site_url('users.php?action=status&user_id='.$users['id'].'&user_status='.$users['status'] ) ?>"><i class="fa<?php echo (isset($users['status']) && $users['status']=='1') ? 's' : 'r' ?> fa-check-circle"></i></a>
                    </td>
                    <td class="text-center">
                    <a href="#" class="user-model-link" data-toggle="modal" data-target="#userModel" user-data-id=<?php echo $users['id'] ?>><i class="far fa-eye"></i></a>
                        <a href="<?php echo get_site_url('add_edit_user.php?action=edit&user_id='.$users['id']) ?>"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Are you sure you want to delete this user?');" href="<?php echo get_site_url('users.php?action=delete&user_id='.$users['id']) ?>">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
               <?php } 
               
               if ($data->num_rows==0) {
               ?>
               
                <tr class="table-info">
                    <td colspan="9">Users not found! Please create new user by <a href="<?php site_url('add_edit_user.php') ?>">this</a> link.</td>
                </tr>
               <?php }  ?>
            </tbody>
        </table>
        <!-- EOF User list -->

        
        <!-- Pagination -->
        <?php if ($total_page>1) {
            
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item ">
                    <a class="page-link" href="<?php echo $prev_page_url ?>"  aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
               <?php for ($i=1; $i <=$total_page ; $i++) {                    
               ?>
                <li class="page-item <?php echo ($current_page==$i) ? "active" : '' ?>">
                    <a class="page-link" href="<?php echo get_site_url('users.php?page='.$i); ?>"><?php echo $i; ?></a>                    
                </li>
               <?php } ?>
                
                <li class="page-item ">
                    <a class="page-link" href="<?php echo $next_page_url ?>"  aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- EOF Pagination -->
        <?php } ?>

    </div>
</div>


<!-- User View Model -->

<div class="modal fade" id="userModel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div id="ajaxMessage">
        <div class="modal-body" >
            <div class="row">
                <div class="col-md-6 mb-2">
                    <b class="d-block">First Name</b>
                    <span id="userModelFirstName">Abc</span>
                </div>
                <div class="col-md-6 mb-2">
                    <b class="d-block">Last Name</b>
                    <span id="userModelLastName">Abc</span>
                </div>
                <div class="col-md-6 mb-2">
                    <b class="d-block">Email</b>
                    <span id="userModelEmail"><a href="mailto:abc@xyz.com">abc@xyz.com</a></span>
                </div>
                <div class="col-md-6 mb-2">
                    <b class="d-block">Phone Number</b>
                    <span id="userModelPhone"><a href="tel:987546561">987546561</a></span>
                </div>
                <div class="col-md-6 mb-2">
                    <b class="d-block">Age</b>
                    <span id="userModelAge">29</span>
                </div>
                <div class="col-md-6 mb-2">
                    <b class="d-block">Status</b>
                    <span id="userModelStatus">Enable</span>
                </div>
                <div class="col-md-12 mb-2">
                    <b class="d-block">Address</b>
                    <span id="userModelAddress">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                </div>
                <div class="col-md-6">
                    <b class="d-block">Create Date</b>
                    <span id="userModelCreateDate">Oct 11, 2021</span>
                </div>
                <div class="col-md-6">
                    <b class="d-block">Update Date</b>
                    <span id="userModelUpdateDate">Oct 11, 2021</span>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" id="userModelEditLink" class="btn btn-primary"><i class="far fa-edit"></i> Edit User</a>
            <a href="#" id="userModelDeleteLink" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                <i class="far fa-trash-alt"></i> Delete User
            </a>
            
        </div>
        </div>
        </div>
    </div>
</div>
<!-- EOF User View Model -->

<?php
	include_once('layout/footer.php');
?>

<script>
$(document).ready(function(){
    $(".user-model-link").click(function(e){
        let user_id_value = $(this).attr("user-data-id");
        let site_url = "<?php site_url() ?>"
        e.eventpreventDefault;        
        $.ajax({
            url: site_url+"user-ajax.php",
            type:"POST",
            data:{user_id : user_id_value},
            success: function(result){
            let response_object = JSON.parse(result);
            console.log(response_object);
            $("#userModelFirstName").html(response_object.first_name);
            $("#userModelLastName").html(response_object.last_name);
            $("#userModelEmail").html('<a href="mailto:'+response_object.email+'">'+response_object.email+'</a></span>');
            $("#userModelPhone").html('<a href="tel:'+response_object.phone_number+'">'+response_object.phone_number+'</a></span>');
            $("#userModelAge").html(response_object.age);
            $("#userModelStatus").html(response_object.status==1 ? "Enable" : "Disable");
            $("#userModelAddress").html(response_object.address);
            $("#userModelCreateDate").html(response_object.create_date);
            $("#userModelUpdateDate").html(response_object.update_date);
            $("#userModelEditLink").attr("href",site_url+'add_edit_user.php?action=edit&user_id='+response_object.id);
            $("#userModelDeleteLink").attr("href",site_url+'users.php?action=delete&user_id='+response_object.id);
            },
            error: function(result){

            },
        });
    });
});
</script>