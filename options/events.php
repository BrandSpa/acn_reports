<?php
add_action('admin_menu', 'bs_admin_events_options_menu');

function bs_admin_events_options_menu() {
		add_menu_page(
    'Brandspa theme options',
    'Events Logs', //menu name
    'manage_options', //allow it options
    'bs-events', //slug
    'bs_events_options',
    get_template_directory_uri() . '/public/img/bs.png', //icon on menu
    113 //position on menu
  );
}

function bs_events_options() {
  $paged = isset($_GET['paged']) ? $_GET['paged'] : 0;
  $perpage = isset($_GET['perpage']) ? $_GET['perpage'] : 25;
  $postname = isset($_GET['postname']) ? $_GET['postname'] : '';

  $query = new Wp_Query(array(
		'name' => $postname,
    'post_type' => 'event',
    'paged' => $paged,
		'posts_per_page' => $perpage
  ));

  $posts = $query->get_posts();

  ?>

  <h2>Events log</h2>

  <hr/>
  <table class="wp-list-table widefat fixed striped">
    <thead>
      <tr>
        <th>Event Name</th>
        <th>Event Content</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($posts as $post): ?>
        <tr>
          <td><?php echo  $post->post_title ?></td>
          <td><?php echo $post->post_content ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <hr/>

  <div class="pagination">
    <a class="prev-page button" href="/wp-admin/admin.php?page=bs-events&paged=<?php echo $paged > 0 ? $paged - 1 : 0 ?>">prev</a>
    <a class="next-page button" href="/wp-admin/admin.php?page=bs-events&paged=<?php echo count($posts) > 0 ? $paged + 1 :  $paged - 1 ?>">next</a>
  </div>
  <?php
  }
