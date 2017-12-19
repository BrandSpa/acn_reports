<?php
use PHPUnit\Framework\TestCase;
use \Mockery as m;

require str_replace('tests/apis', '', __DIR__) .'/apis/stripe.php';

class StripeTest extends TestCase
{

	protected $apiKey = 'sk_test_vq5s51SGycQ6dvCqC3H7JcCl';
	protected $token = '';

	protected function createToken($apiKey) {
		$card = [
		 'number' => '4242424242424242',
		 'exp_month' => '02',
		 'exp_year' => '2020',
		 'cvc' => '123'
		];

		$request = stripe_create_token($apiKey, $card);
		$response = json_decode(json_encode($request));
		return $response;
	}

	protected function createCustomer($apiKey) {
		$token = $this->createToken($apiKey);

		$customer = [
			'email' => 'test@brandspa.com',
			'stripe_token' => $token->id
		];

		$request = stripe_create_customer($this->apiKey, $customer);
		$response = json_decode(json_encode($request));
		return $response;
	}

	protected function getOrCreatePlan($apiKey, $plan_name) {
		if(stripe_get_plan($this->apiKey, $plan_name)) {
			$request = stripe_get_plan($this->apiKey, $plan_name);
		} else {
			$data = [
				'amount' => '34',
				'plan_name' => $plan_name
			];

			$request = stripe_create_plan($this->apiKey, $data);
		}

		$response = json_decode(json_encode($request));
		return $response;
	}

	public function testStripeCreateToken() {
		$response = $this->createToken($this->apiKey);
		$contains = strpos($response->id, 'tok_') !== false;
		$this->assertEquals(true, $contains);
	}

	public function testStripeCreateCustomer() {
		$response = $this->createCustomer($this->apiKey);
		$contains = strpos($response->id, 'cus_') !== false;
		$this->assertEquals(true, $contains);
	}

	public function testStripeCreateCharge() {
		$customer = $this->createCustomer($this->apiKey);

		$data = [
			"email" => "test@brandspa",
			"amount" => "33",
			"currency" => "usd",
			"customer" => $customer->id
		];

		$request = stripe_create_charge($this->apiKey, $data);
		$response = json_decode(json_encode($request));
		$idContains = strpos($response->id, 'ch_') !== false;
		$this->assertEquals(true, $idContains);
		$this->assertEquals("Payment complete.", $response->outcome->seller_message);
	}

	public function testStripeOnce() {
		$token = $this->createToken($this->apiKey);
		$data = [
			"name" => "Alejandro Test",
			"email" => "test@brandspa.com",
			"country" => "Colombia",
	    "currency" => "usd",
	    "amount" => "33",
	    "donation_type" => "once",
	    "trial_period_days" => "",
	    "stripe_token" => $token->id
		];

		$request = stripe_once($this->apiKey, $data);
		$response = json_decode(json_encode($request));
		$idContains = strpos($response->id, 'ch_') !== false;
		$this->assertEquals(true, $idContains);
		$this->assertEquals("Payment complete.", $response->outcome->seller_message);
	}

	public function testStripeGetOrCreatePlan() {
		$token = $this->createToken($this->apiKey);
		$plan_name = get_plan_name('39');
		$response = $this->getOrCreatePlan($this->apiKey, $plan_name);
		$this->assertEquals($plan_name, $response->id);
	}


	public function testStripeSubscription() {
		$plan_name = '33';
		$customer = $this->createCustomer($this->apiKey);
		$plan = $this->getOrCreatePlan($this->apiKey, $plan_name);

		$data = [
			"customer" => $customer->id,
			"plan" => $plan->id,
			"trial_period_days" => null
		];

		$request = stripe_create_subscription($this->apiKey, $data);
		$response = json_decode(json_encode($request));
		$containsId = strpos($response->id, 'sub_') !== false;
		$this->assertEquals(true, $containsId);
	}

	public function testStripeMonthly() {
		$token = $this->createToken($this->apiKey);
		$data = [
			"name" => "Alejandro Test",
			"email" => "test@brandspa.com",
			"country" => "Colombia",
	    "currency" => "usd",
	    "amount" => "33",
	    "donation_type" => "monthly",
	    "trial_period_days" => "",
	    "stripe_token" => $token->id
		];

		$request = stripe_monthly($this->apiKey, $data);
		$response = json_decode(json_encode($request));
		$idContains = strpos($response->id, 'sub_') !== false;
		$this->assertEquals(true, $idContains);
		$this->assertEquals("subscription", $response->object);
	}

}
