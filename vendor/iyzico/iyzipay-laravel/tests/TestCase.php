<?php

namespace Actuallymab\IyzipayLaravel\Tests;

use Actuallymab\IyzipayLaravel\StorableClasses\Address;
use Actuallymab\IyzipayLaravel\StorableClasses\BillFields;
use Actuallymab\IyzipayLaravel\Tests\Models\User;
use Actuallymab\IyzipayLaravel\IyzipayLaravelServiceProvider;
use Dotenv\Dotenv;
use Faker\Factory;
use Orchestra\Database\ConsoleServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Actuallymab\IyzipayLaravel\IyzipayLaravelFacade as IyzipayLaravel;

abstract class TestCase extends Orchestra
{

    protected $faker;

    /**
     * @return void
     */
    public function setUp()
    {
        $this->faker = Factory::create();

        if (file_exists(__DIR__ . '/../.env')) {
            $dotenv = new Dotenv(__DIR__ . '/../');
            $dotenv->load();
        }

        parent::setUp();

        $this->loadMigrationsFrom([
            '--database' => 'testing',
            '--realpath' => realpath(__DIR__ . '/resources/database/migrations')
        ]);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        $app['config']->set('iyzipay.billableModel', 'Actuallymab\IyzipayLaravel\Tests\Models\User');
    }

    public function getPackageProviders($application)
    {
        return [
            IyzipayLaravelServiceProvider::class,
            ConsoleServiceProvider::class
        ];
    }

    protected function createUser(): User
    {
        return User::create([
            'name' => $this->faker->name
        ]);
    }

    protected function prepareBillFields(): BillFields
    {
        return new BillFields([
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'shipping_address' => new Address([
                'city' => $this->faker->city,
                'country' => $this->faker->country,
                'address' => $this->faker->address
            ]),
            'billing_address' => new Address([
                'city' => $this->faker->city,
                'country' => $this->faker->country,
                'address' => $this->faker->address
            ]),
            'identity_number' => $this->faker->lexify(str_repeat('?', 11)),
            'mobile_number' => $this->faker->e164PhoneNumber
        ]);
    }

    protected function prepareBilledUser(): User
    {
        $user = $this->createUser();
        $user->bill_fields = $this->prepareBillFields();

        return $user;
    }

    protected function prepareCreditCardFields(): array
    {
        return [
            'alias' => $this->faker->word,
            'holder' => $this->faker->name,
            'number' => $this->faker->randomElement($this->correctCardNumbers()),
            'month' => '01',
            'year' => '2030'
        ];
    }

    protected function createPlans(): void
    {
        IyzipayLaravel::plan('Aylık Ücretisiz');
        IyzipayLaravel::plan('Aylık Standart')->trialDays(15)->price(20);
        IyzipayLaravel::plan('Aylık Platinum')->trialDays(15)->price(40);
        IyzipayLaravel::plan('Yıllık Küçük')->yearly()->trialDays(15)->price(150);
        IyzipayLaravel::plan('Yıllık Standart')->yearly()->trialDays(15)->price(200);
        IyzipayLaravel::plan('Yıllık Platinum')->yearly()->trialDays(15)->price(400);
    }

    protected function correctCardNumbers(): array
    {
        return [
            '5526080000000006',
            '4603450000000000',
            '5311570000000005',
            // Non turkish cards below:
            '5400010000000004',
            '6221060000000004'
        ];
    }
}
