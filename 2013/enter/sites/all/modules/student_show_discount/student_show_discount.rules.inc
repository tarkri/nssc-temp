<?php

function student_show_discount_rules_action_info() {
  $actions = array();

  $actions['student_show_discount_entries'] = array(
    'label' => t('Apply Discount to order'),
    'parameter' => array(
      'commerce_order' => array(
        'type' => 'commerce_order',
        'label' => t('Order'),
        'description' => t('The order whose line items should be checked for the specified product. If the specified order does not exist, the comparison will act as if it is against a quantity of 0.'),
      ),
      'product_id' => array(
        'type' => 'text',
        'label' => t('Product SKU'),
        'description' => t('The SKU of the product to apply the discount on.'),
      ),
      'user' => array(
        'type' => 'user',
        'label' => t('User'),
        'description' => t('Specify the user whose shopping cart order the product will be added to, typically <em>site:current-user</em>.'),
      ),
    ),
    'group' => t('Commerce Order'),
    'provides' => array(
      'product_add_line_item' => array(
        'type' => 'commerce_line_item',
        'label' => t('Added product line item'),
      ),
    ),
  );

  return $actions;
}

/**
 * Condition callback: checks to see if a particular product exists on an order
 * in the specified quantity.
 */
function student_show_discount_entries($order, $sku, $user) {
  $products = array($sku => 0);
  $discounts = array('STUDENT_SHOW_ENTRY_DISCOUNT' => 0);

  // If we actually received a valid order...
  if (!empty($order)) {
    $order_wrapper = entity_metadata_wrapper('commerce_order', $order);

    // Populate the array of the quantities of the products on the order.
    foreach ($order_wrapper->commerce_line_items as $delta => $line_item_wrapper) {
      if (in_array($line_item_wrapper->type->value(), commerce_product_line_item_types())) {
        // Extract a product ID and quantity from the line item.
        $line_item_sku = $line_item_wrapper->commerce_product->sku->value();
        $quantity = $line_item_wrapper->quantity->value();

        // Update the product's quantity value.
        if (empty($products[$line_item_sku])) {
          $products[$line_item_sku] = $quantity;
        }
        else {
          $products[$line_item_sku] += $quantity;
        }

        if (empty($discounts[$line_item_sku])) {
          $discounts[$line_item_sku] = $quantity;
        }
        else {
          $discounts[$line_item_sku] += $quantity;
        }
      }
    }

    $apply_discount = floor($products[$sku] / 10);

    if ($products[$sku] >= 10 && $discounts['STUDENT_SHOW_ENTRY_DISCOUNT'] < $apply_discount) {
      $quantity = $apply_discount - $discounts['STUDENT_SHOW_ENTRY_DISCOUNT'];

      if ($product = commerce_product_load_by_sku('STUDENT_SHOW_ENTRY_DISCOUNT')) {
        // Pull the uid from the user passed in.
        if (empty($user) || empty($user->uid)) {
          $uid = NULL;
        }
        else {
          $uid = $user->uid;
        }

        // Only return an added line item.
        if ($line_item = commerce_cart_product_add_by_id($product->product_id, $quantity, TRUE, $uid)) {
          return array('product_add_line_item' => $line_item);
        }
      }
    }
  }
}
