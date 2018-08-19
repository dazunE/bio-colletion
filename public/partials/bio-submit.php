<?php
/**
 * Provide a public-facing view for bio submission
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://dasun.blog
 * @since      1.0.0
 *
 * @package    Bio_Collection
 * @subpackage Bio_Collection/public/partials
 */
?>

<div class="bio-submit-wrapper">
  <div class="bio-submit">
      <h2><?php echo __('Submit a bio', TEXT_DOMAIN); ?></h2>
      <form>
          <h1 class="loading-text" data-text="ඔහොම හිටු...">ඔහොම හිටු...</h1>
          <div class="form-group half">
              <label><?php echo __('Name of the person',TEXT_DOMAIN );?></label>
              <input type="text" name="personName" class="form-control" id="person-name"  placeholder="Enter the name of the person" required>
          </div>
          <div class="form-group half date-input">
              <label><?php echo __('Date of birth',TEXT_DOMAIN );?></label>
              <input type="text" name="birthDate" class="form-control" id="birth-date"  placeholder="Pick the birth date" data-toggle="datepicker" required>
          </div>
          <div class="form-group half date-input">
              <label><?php echo __('Date of death',TEXT_DOMAIN );?></label>
              <input type="text" name="deathDate" class="form-control" id="death-date"  placeholder="Pick the date of death" data-toggle="datepicker" required>
          </div>
          <div class="form-group full">
              <label><?php echo __('Date of death',TEXT_DOMAIN );?></label>
              <textarea name="personBio" class="form-control" id="person-bio"  placeholder="Enter a bio" required></textarea>
          </div>
          <input type="hidden" value="<?php echo get_current_user_id()?>">
          <button type="submit" class="btn btn-primary"><?php echo __('Submit Bio',TEXT_DOMAIN );?></button>
      </form>
  </div>
</div>
