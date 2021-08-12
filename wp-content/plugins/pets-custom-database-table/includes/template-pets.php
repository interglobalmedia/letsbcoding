<?php

require_once plugin_dir_path(__FILE__) . 'GetPets.php';
$getPets = new GetPets();

get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Pet Adoption</h1>
    <div class="page-banner__intro">
      <p>Providing forever homes one search at a time.</p>
    </div>
  </div>  
</div>

<div class="container container--narrow page-section">
  <input type="text" name="table-search" id="table-search" placeholder="search pets by species">
  <p>This page took <strong><?php echo timer_stop();?></strong> seconds to prepare. Found <strong><?php echo number_format($getPets->count); ?></strong> results (showing the first <?php echo count($getPets->pets); ?>).</p>
  <div class="table-wrapper">
    <table class="pet-adoption-table">
      <tr>
        <th>Name</th>
        <th>Species</th>
        <th>Weight</th>
        <th>Birth Year</th>
        <th>Hobby</th>
        <th>Favorite Color</th>
        <th>Favorite Food</th>
        <?php 
        
        if (current_user_can('administrator')) { ?>
          <th>Delete</th>
        <?php } ?>
      </tr>
      <?php 
        foreach($getPets->pets as $pet) { ?>
          <tr>
            <td><?php echo $pet->petname; ?></td>
            <td><?php echo $pet->species; ?></td>
            <td><?php echo $pet->petweight; ?></td>
            <td><?php echo $pet->birthyear; ?></td>
            <td><?php echo $pet->favhobby; ?></td>
            <td><?php echo $pet->favcolor; ?></td>
            <td><?php echo $pet->favfood; ?></td>
            <?php 
              if (current_user_can('administrator')) { ?>
                <td style="text-align: center;">
                  <form action="<?php echo esc_url(admin_url('admin-post.php')) ?>" method="POST">
                    <input type="hidden" name="action" value="deletepet">
                    <input type="hidden" name="idtodelete" value="<?php echo $pet->id; ?>">
                    <button class="delete-pet-button">X</button>
                  </form>
              </td>
              <?php }
            ?>
          </tr>
        <?php }
      ?>
    </table>
  </div>
</div>
  <?php 
  
  if (current_user_can('administrator')) { ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')) ?>" class="create-pet-form" method="POST">
    <h2>Create a new pet</h2>
      <p>Enter the name and details for a new pet below.</p>
      <input type="hidden" name="action" value="createpet">
       <fieldset><label for="newpetname">Pet Name:</label> <input type="text" name="newpetname" id="newpetname" placeholder="name ..." required></fieldset>
       <fieldset><label for="newspecies">Species:</label> <input type="text" name="newspecies" id="newspecies" placeholder="species ..." required></fieldset>
      <fieldset><label for="newpetweight">Pet Weight:</label> <input type="text" name="newpetweight" id="newpetweight"placeholder="pet weight ..." required></fieldset>
      <fieldset><label for="newbirthyear">Birth Year:</label> <input type="text" name="newbirthyear" id="newbirthyear" placeholder="birth year ..." required></fieldset>
      <fieldset><label for="newfavhobby">Favorite Hobby:</label> <input type="text" name="newfavhobby" id="newfavhobby" placeholder="favorite hobby ..." required></fieldset>
      <fieldset><label for="newfavcolor">Favorite Color:</label> <input type="text" name="newfavcolor" id="newfavcolor" placeholder="favorite color ..." required></fieldset>
      <fieldset><label for="newfavfood">Favorite Food:</label> <input type="text" name="newfavfood" id="newfavfood" placeholder="favorite food ..." required></fieldset>
      <button class="add-pet">Add Pet</button>
    </form>
  <?php }
  
  ?>
  
</div>

<?php get_footer(); ?>