<?php

add_action('admin_menu', 'bs_admin_contacts_options_menu');

function bs_admin_contacts_options_menu() {

		add_menu_page(
    'Brandspa theme options',
    'Contact us', //menu name
    'manage_options', //allow it options
    'bs-contacts', //slug
    'bs_contacts_options',
    get_template_directory_uri() . '/public/img/bs.png', //icon on menu
    114 //position on menu
  );
}

function bs_contacts_options() {
  $paged = isset($_GET['paged']) ? $_GET['paged'] : 0;
  $perpage = isset($_GET['perpage']) ? $_GET['perpage'] : 25;
  $postname = isset($_GET['postname']) ? $_GET['postname'] : '';

  $query = new Wp_Query(array(
		'name' => $postname,
    'post_type' => 'contact_us',
    'paged' => $paged,
		'posts_per_page' => $perpage
  ));

  $posts = $query->get_posts();

  ?>

  <h2>Contacts</h2>

  <hr/>
  <table class="wp-list-table widefat fixed striped">
    <thead>
      <tr>
        <th>Email</th>
        <th>Name</th>
        <th>Message</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($posts as $post): ?>
        <?php $contact = json_decode(str_replace("\\", '', $post->post_content)); ?>
        <tr>
          <td><?php echo $contact->email; ?></td>
          <td><?php echo $contact->name; ?></td>
          <td><?php echo $contact->message; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <hr/>

  <div class="pagination">
    <a class="prev-page button" href="/wp-admin/admin.php?page=bs-contacts&paged=<?php echo $paged > 0 ? $paged - 1 : 0 ?>">prev</a>
    <a class="next-page button" href="/wp-admin/admin.php?page=bs-contacts&paged=<?php echo count($posts) > 0 ? $paged + 1 :  $paged - 1 ?>">next</a>
  </div>
  <?php
  }
