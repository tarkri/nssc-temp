<?php

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $print['language']; ?>" xml:lang="<?php print $print['language']; ?>">
  <head>
    <?php print $print['head']; ?>
    <?php print $print['base_href']; ?>
    <title><?php print $print['title']; ?></title>
    <?php print $print['scripts']; ?>
    <?php print $print['sendtoprinter']; ?>
    <?php print $print['robots_meta']; ?>
    <?php print $print['favicon']; ?>
    <?php print $print['css']; ?>
  </head>
  <body>

    <div>
      <?php if (!empty($node->field_show_category)) : ?>
        <h1>Category: <?php print $node->field_show_category['und'][0]['value']; ?></h1>
        <h2><strong>Title:</strong> <?php print $node->title_field['und'][0]['value']; ?></h2>
      <?php endif; ?>

      <?php if (!empty($node->field_scholarship_type)) : ?>
        <h1>Category: <?php print $node->field_scholarship_type['und'][0]['value']; ?></h1>
      <?php endif; ?>
    </div>

    <?php if (!empty($node->body)) : ?>

      <hr class="print-hr" />

      <div>
        <h3>Short Description</h3>
        <p><?php print $node->body['und'][0]['value']; ?></p>
      </div>
    <?php endif; ?>

    <hr class="print-hr" />

    <div>
      <h3>Student Information</h3>
      <p>
        <?php if (!empty($node->field_student_name)) : ?>
          <strong>Name:</strong> <?php print $node->field_student_name['und'][0]['value']; ?><br />
        <?php else : ?>
          <strong>Name:</strong> <?php print $node->title_field['und'][0]['value']; ?><br />
        <?php endif; ?>

        <strong>Email:</strong> <?php print $node->field_student_email['und'][0]['email']; ?><br />
        <strong>Year In School:</strong> <?php print $node->field_receipt_year_in_school['und'][0]['value']; ?><br />
        <strong>School Name:</strong> <?php print $node->field_receipt_school_name['und'][0]['value']; ?>
      </p>
    </div>

    <?php if (!empty($node->field_receipt_group_members)) : ?>
      <hr class="print-hr" />

      <div>
        <h3>Group Members</h3>
        <p>
          <?php foreach ($node->field_receipt_group_members['und'] as $group_member) : ?>
            <?php print $group_member['value']; ?><br />
          <?php endforeach; ?>
        </p>
      </div>
    <?php endif; ?>

    <hr class="print-hr" />

    <div>
      <h3>Instructor Information</h3>
      <p>
        <strong>Name:</strong> <?php print $node->field_instructor_name['und'][0]['value']; ?><br />
        <strong>Email:</strong> <?php print $node->field_instructor_email['und'][0]['email']; ?>
      </p>
    </div>

    <hr class="print-hr" />

    <h4>Order ID: <?php print $node->field_order_id['und'][0]['value']; ?></h4>
    <h4>Tracking ID: <?php print $node->nid; ?></h4>

    <?php print $print['footer_scripts']; ?>
  </body>
</html>
