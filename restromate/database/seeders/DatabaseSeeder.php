<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
            SliderSeeder::class,
            TicketSeeder::class,
            PromocodeSeeder::class,
            WaiterSeeder::class,  
            FaqSeeder::class,
            CmsSeeder::class,
            Offer_ManagementSeeder::class,
            Generealsetting::class,
            RoleSeeder::class,
            NotificationSeeder::class,
            AttributesSeeder::class,
            PaymentmethodSeeder::class,
            CategorySeeder::class,
            FirebaseSeeder::class,  
            PermissionsSeeder::class,
            TaxSeeder::class,
            AddonsSeeder::class,
            ProductSeeder::class,
            EmailsmtpSeeder::class,
            TagSeeder::class,
            TickettypeSeeder::class,
            TicketSeeder::class,
            FeaturedSeeder::class,
            ProductSeeder::class,
            CreateRoleSeeder::class

        ]);
    }
}
