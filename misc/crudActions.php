<?php

function theme_options_panel()
{
    add_menu_page('Theme page title', 'CRUD actions', 'manage_options', 'theme-options', 'wps_theme_func');
    add_submenu_page('theme-options', 'Create', 'Create', 'manage_options', 'theme-op-create', 'wps_theme_func_create');
    add_submenu_page('theme-options', 'Read', 'Read', 'manage_options', 'theme-op-read', 'wps_theme_func_read');
    add_submenu_page('theme-options', 'Update', 'Update', 'manage_options', 'theme-op-update', 'wps_theme_func_update');
}
add_action('admin_menu', 'theme_options_panel');

function wps_theme_func()
{
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
          <h2>CRUD</h2></div>';
}
function wps_theme_func_create()
{
    echo "<style>label{
        display: inline-block;
        float: left;
        clear: left;
        width: 50px;
        text-align: right;
    }
    input {
      display: inline-block;
      float: left;
    }</style>";

    if (isset($_POST['email'])) {
        global $wpdb;
        $wpdb->insert('wp_guest', ['name' => isset($_POST['name']) ? $_POST['name'] : "", 'email' => $_POST['email']]);
        $success =  "<p style='color: green;'>Success!</p>";
    } else {
        $success = "";
    }
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
          <h2>Create</h2></div>';
    echo "<form action='' method='post'>
          <label for='name'>Name:&nbsp;</label><input type='text' name='name'><br>
          <label for='email'>Email:&nbsp;</label><input type='email' name='email' required><br><br><br>
          <button type='submit'>Submit</button></form><br>" . $success;
}

function wps_theme_func_read()
{

    echo "<style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
    <table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th></th>
    <th></th>
  </tr>";
    global $wpdb;
    if (isset($_GET['remove'])) {
        $wpdb->delete('wp_guest', ['id' => $_GET['remove']]);
    }
    $userArray = $wpdb->get_results("SELECT * FROM wp_guest");
    foreach ($userArray as $user) {
        echo "<tr><td>$user->id</td>";
        echo "<td>" . (($user->name == null) ? "<i>[null]</i>" : $user->name) . "</td>";
        echo "<td>$user->email</td>";
        echo "<td><a href='http://localhost/wordpress/wp-admin/admin.php?page=theme-op-update&id=$user->id&email=$user->email&name=$user->name'>Update</a></td>";
        echo "<td><a onclick='deleteEntry($user->id)'><u>Delete</u></a></td></tr>";
    }
    echo "</table>";
    echo "<script>function deleteEntry(id) {if (confirm('Do you really want to delete this entry?')) {
        window.location.href = window.location.href + '&remove=' + id
    }}</script>";
}

function wps_theme_func_update()

{
    // die(var_dump($_GET));
    echo "<style>label{
        display: inline-block;
        float: left;
        clear: left;
        width: 50px;
        text-align: right;
    }
    input {
      display: inline-block;
      float: left;
    }</style>";

    if (isset($_POST['email'])) {
        global $wpdb;
        $wpdb->update('wp_guest', ['name' => isset($_POST['name']) ? $_POST['name'] : "", 'email' => $_POST['email']], ['id' => $_POST['id']]);
        $success =  "<p style='color: green;'>Success!</p>";
        echo "<script>window.location.href = window.location.href.split('&email')[0]
        </script>";
    } else {
        $success = "";
    }
    if (isset($_POST['id'])) {
        $_GET['id'] = $_POST['id'];
    }
    echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>
          <h2>Update</h2></div>';
    echo "<form action='' method='post'>
          <label for='id'>ID:&nbsp;</label><input type='number' name='id' value='" . $_GET['id'] . "'><br>
          <label for='name'>Name:&nbsp;</label><input type='text' name='name' value='" . $_GET['name'] . "'><br>
          <label for='email'>Email:&nbsp;</label><input type='email' name='email' value='" . $_GET['email'] . "'><br><br><br>
          <button type='submit'>Submit</button></form><br>" . $success;
}
