<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game = new Game();
        $game->title = "Juego 1";
        $game->description = "Comer la comida sin chocar en los muros";
        $game->cover = "book_cover_1.jpg";
        $game->save();

        $game = new Game();
        $game->title = "Juego 2";
        $game->description = "Comer la comida sin chocar en los muros";
        $game->cover = "book_cover_1.jpg";
        $game->save();

        $game = new Game();
        $game->title = "Juego 3";
        $game->description = "Comer la comida sin chocar en los muros";
        $game->cover = "book_cover_1.jpg";
        $game->save();
    }
}
