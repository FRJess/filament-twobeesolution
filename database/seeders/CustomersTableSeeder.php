<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\People;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
        /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $customers = config('db.customers');

        foreach ($customers as $customer) {
            $new_customer = new Customer();
            $new_customer->name = $customer['name'];
            $new_customer->lastname = $customer['lastname'];
            $new_customer->city = $customer['city'];
            $new_customer->eye_color = $customer['eye_color'];
            $new_customer->hair_color = $customer['hair_color'];
            $new_customer->citizenship = $customer['citizenship'];
            $new_customer->save();
        }
    }
}
