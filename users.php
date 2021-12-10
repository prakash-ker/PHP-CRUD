<?php
	include_once('layout/header.php');
?>

                    <!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Users
    <a class="btn btn-primary float-right" href="add_edit_user.php">Add New</a>
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
                    <th scope="col" class="text-center" style="width: 50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <th scope="row" class="text-center">1</th>
                    
                    <td>First Name</td>
                    
                    <td>Last Name</td>

                    <td>
                        <a href="mailto:mail@gmail.com">Email</a>
                    </td>
                    <td>
                        <a href="tel:99999999">Phone</a>
                    </td>
                    <td class="text-center">Age</td>
                    <td>Create Date</td>
                    <td class="text-center">
                        <a href=""><i class="far fa-check-circle"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="add_edit_user.php"><i class="fa fa-edit"></i></a>
                        <a onclick="return confirm('Are you sure you want to delete this user?');" href="">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
               
                <tr class="table-info">
                    <td colspan="9">Users not found! Please create new user by <a href="<?php site_url('add_edit_user.php') ?>">this</a> link.</td>
                </tr>
                
            </tbody>
        </table>
        <!-- EOF User list -->

        
        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item ">
                    <a class="page-link" href=""  aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
               
                <li class="page-item ">
                    <a class="page-link" href="#">1</a>                    
                </li>
                <li class="page-item ">
                    <a class="page-link" href="#">2</a>                    
                </li>
                <li class="page-item ">
                    <a class="page-link" href="#">3</a>                    
                </li>
                
                <li class="page-item ">
                    <a class="page-link" href=""  aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- EOF Pagination -->
      

    </div>
</div>

<?php
	include_once('layout/footer.php');
?>