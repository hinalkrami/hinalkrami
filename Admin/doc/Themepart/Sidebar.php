 
<?php
if(!isset($_SESSION['id']))
{
?>  
<aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="adminphoto/profile-user.png" alt="admin img">
        <div>
          <p class="app-sidebar__user-name">Admin</p>
        </div>
      </div>
</aside>
<?php
}else
{
?>
<aside class="app-sidebar">
      <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="adminphoto/profile-user.png" alt="admin img">
        <div>
          <p class="app-sidebar__user-name"><?php echo $_SESSION['name']?></p>
          <p class="app-sidebar__user-designation">Plant seller</p>
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" href="Dashboard.php"><i class="app-menu__icon bi bi-speedometer"></i><span class="app-menu__label">Dashboard</span></a></li>
        <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-laptop"></i><span class="app-menu__label">UI Elements</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon bi bi-circle-fill"></i> Bootstrap Elements</a></li>
            <li><a class="treeview-item" href="https://icons.getbootstrap.com/" target="_blank" rel="noopener"><i class="icon bi bi-circle-fill"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon bi bi-circle-fill"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon bi bi-circle-fill"></i> Widgets</a></li>
          </ul>
        </li> -->
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-ui-checks"></i><span class="app-menu__label">Forms</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <!-- <li><a class="treeview-item" href="Admin-form.php"><i class="icon bi bi-circle-fill"></i> Admin Form </a></li> -->
            <!-- <li><a class="treeview-item " href="User-form.php"><i class="icon bi bi-circle-fill"></i> User Form </a></li> -->
            <li><a class="treeview-item " href="Category-Form.php"><i class="icon bi bi-circle-fill"></i> Category Form </a></li>
            <li><a class="treeview-item " href="Subcategory-Form.php"><i class="icon bi bi-circle-fill"></i> Subcategory Form </a></li>
            <li><a class="treeview-item " href="Product-Form.php"><i class="icon bi bi-circle-fill"></i> Product Form </a></li>
            <!-- <li><a class="treeview-item " href="Cart-Form.php"><i class="icon bi bi-circle-fill"></i> Cart Form </a></li> -->

          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon bi bi-table"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Admin-Table.php"><i class="icon bi bi-circle-fill"></i>Admin  Table </a></li>
            <li><a class="treeview-item" href="User-table.php"><i class="icon bi bi-circle-fill"></i>User Table </a></li>
            <li><a class="treeview-item" href="Category-Table.php"><i class="icon bi bi-circle-fill"></i>Category Table </a></li>
            <li><a class="treeview-item" href="Subcategory-Table.php"><i class="icon bi bi-circle-fill"></i>Subcategory Table </a></li>
            <li><a class="treeview-item" href="Product-Table.php"><i class="icon bi bi-circle-fill"></i>Product Table </a></li>
            <li><a class="treeview-item" href="Cart-Table.php"><i class="icon bi bi-circle-fill"></i>Cart Table </a></li>
            <li><a class="treeview-item" href="Order_Details-Table.php"><i class="icon bi bi-circle-fill"></i>Order-Details Table</a></li>
            <li><a class="treeview-item" href="ordermaster-table.php"><i class="icon bi bi-circle-fill"></i>Order-Master Table </a></li>
            <li><a class="treeview-item" href="shipping-Table.php"><i class="icon bi bi-circle-fill"></i>Shipping Table </a></li>
            <li><a class="treeview-item" href="Feedback-Table.php"><i class="icon bi bi-circle-fill"></i>Feedback Table </a></li>
          
          </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="bi bi-gear me-2 fs-5"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator bi bi-chevron-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="Admin-changepassword.php"><i class="icon bi bi-circle-fill"></i>Change Password</a></li>
            <li><a class="treeview-item" href="Admin-logout.php"><i class="icon bi bi-circle-fill"></i> Logout</a></li>

          </ul>
        </li>
      </ul>
</aside>
<?php } ?>
