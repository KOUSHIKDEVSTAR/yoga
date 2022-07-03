<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Stripe API Configuration
| -------------------------------------------------------------------
|
| You will get the API keys from Developers panel of the Stripe account
| Login to Stripe account (https://dashboard.stripe.com/)
| and navigate to the Developers � API keys page
|
|  stripe_api_key        	string   Your Stripe API Secret key.
|  stripe_publishable_key	string   Your Stripe API Publishable key.
|  stripe_currency   		string   Currency code.
*/
$config['stripe_api_key']         = 'sk_test_51HNKXeFjQ4dpWp5WEFtk6k5JsnDg4kWFs6Gu5NsDlGA3C2q9MEmlK3qnEk4oA5VZae9drwwK7LO6RSqBcUBudTzL00Q3GE3Il2'; 
$config['stripe_publishable_key'] = 'pk_test_51HNKXeFjQ4dpWp5WaLwveImoE5sMMi9mF10LtMp7vPK2hW1MuVpJ6UNbYCmvZEkKK35mFFmHJ8YrsUfHqkyKT44t00dHjaA6Tb'; 
$config['stripe_currency']        = 'usd';