<?php
$dir_base =  str_replace('apis', '', __DIR__);
require $dir_base . 'vendor/autoload.php';

/**
** Documentation
** url: https://stripe.com/docs/api/php
**/

function stripe_create_token($api_key, $card) {
  \Stripe\Stripe::setApiKey($api_key);

    try {
      $token = \Stripe\Token::create([
        "card" => [
        "number" => $card['number'],
        "exp_month" => $card['exp_month'],
        "exp_year" => $card['exp_year'],
        "cvc" => $card['cvc']
        ]
      ]);

      return $token;
    } catch(Exception $e) {
      return $e;
    }
}

function stripe_create_customer($api_key, $customer) {
  \Stripe\Stripe::setApiKey($api_key);

    try {
      $customer = \Stripe\Customer::create(array(
      "description" => 'charge for '. $customer['email'],
      "email" => $customer['email'],
      "source" => $customer['stripe_token']
    ));

    return $customer;

  } catch(Exception $e) {
    return $e->getMessage();
  }

}

function stripe_create_charge($api_key, $charge) {
  \Stripe\Stripe::setApiKey($api_key);

  try {
    $charge = \Stripe\Charge::create(array(
      "amount" => $charge['amount'] . '00',
      "currency" => $charge['currency'],
      "customer" => $charge['customer'],
      "description" => 'charge for '. $charge['email']
    ));
  } catch(Exception $e) {
    return $e;
  }

  return $charge;
}

function stripe_get_plan($api_key, $name) {
  \Stripe\Stripe::setApiKey($api_key);

   try {
    $plan = \Stripe\Plan::retrieve($name);
    return $plan;
   } catch(Exception $e) {
     return '';
   }
}


//fix currency, adding prefix 00
function stripe_create_plan($api_key, $plan) {
  \Stripe\Stripe::setApiKey($api_key);

  $plan = \Stripe\Plan::create(array(
    "amount" => $plan['amount'] . '00',
    "interval" => "month",
    "name" => $plan['plan_name'],
    "currency" => 'usd',
    "id" => $plan['plan_name'])
  );

  return $plan;
}

function stripe_update_plan($api_key, $plan) {
    \Stripe\Stripe::setApiKey($api_key);

    try {
      $p = \Stripe\Plan::retrieve($plan);
      $p->currency = "usd";
      $p->save();

      return $plan;
    } catch(Exception $e) {
      return $e;
    }

}


function stripe_create_subscription($api_key, $charge) {
  \Stripe\Stripe::setApiKey($api_key);

  try {
    $subscription = \Stripe\Subscription::create(array(
      "customer" => $charge["customer"],
      "plan" => $charge["plan"],
      "trial_period_days" => $charge["trial_period_days"]
    ));

    return $subscription;

  } catch(Exception $e) {
    return $e;
  }

}

function get_plan_name($amount) {
  return 'donation-' . $amount .'-usd';
}

function stripe_once($api_key, $data) {
  $customer = stripe_create_customer($api_key, $data);
  $data['customer'] = $customer->id;
  return stripe_create_charge($api_key, $data);
}

function stripe_monthly($api_key, $data) {
  $plan_name = get_plan_name($data['amount']);
  $data['plan_name'] = $plan_name;
  $plan = '';

  if(!empty(stripe_get_plan($api_key, $plan_name))) {
    $plan = stripe_get_plan($api_key, $plan_name);
  } else {
    $plan = stripe_create_plan($api_key, $data);
  }

  $customer = stripe_create_customer($api_key, $data);

  $subscription = array();
  $subscription['customer'] = $customer->id;
  $subscription['plan'] = $plan->id;

  if(isset($data['trial_period_days']) && !empty($data['trial_period_days'])) {
    $subscription['trial_period_days'] = $data['trial_period_days'];
  } else {
      $subscription['trial_period_days'] = null;
  }


  return stripe_create_subscription($api_key, $subscription);
}
