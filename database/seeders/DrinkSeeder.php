<?php

namespace Database\Seeders;
use App\Models\Drink;

use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drink::create([
            'name' => 'UltimaThai Tea',
            'cover' => 'ThaiTea.png',
            'synopsis'=>'Now this time, a drink that is no less mainstream than STM is Thai Tea!', 
            'price' => 20000
        ]);
        Drink::create([
            'name' => 'Matchazilla',
            'cover' => 'matcha.png',
            'synopsis'=> 'Perfect for getting rid of the wear and tear caused by eating fried food but not buying a drink',
            'price' => 20000
        ]);
        Drink::create([
            'name' => 'Blushing Tea',
            'cover' => 'blushing.png',
            'synopsis'=>'Introducing our product: Blushing Tea. An extraordinary mix between strawberry and tea! grab it fast!',
            'price' => 25000
        ]);
        Drink::create([
            'name' => 'Ban Tea',
            'cover' => 'BanTea.png',
            'synopsis'=>'Have you ever ponder what can we made from banana and a tea? well here it is! BanTea, our sacred special menu. grab it fast and quench your thirst with this deliciously BanTea!',
            'price' => 25000
        ]);
        Drink::create([
            'name' => 'Toxic Tea',
            'cover' => 'Toxic.png',
            'synopsis'=>'Not only your relationship that can be toxic, our tea may be toxically sweet. a mix between grape and tea! grab it fast and enjoy our toxic!',
            'price' => 20000
        ]);
        Drink::create([
            'name' => 'STM',
            'cover' => 'STM.png',
            'synopsis'=>'You doesnt like sweets, You doesnt like bitter, you doesnt like hot, all you want is a classic regular tea and a product of TeaTan. Them, STM is the exact solution for your needs! a classic regular iced tea without any sweets or anything. just plain ol tea with ice.',
            'price' => 15000
        ]);

    }
}
