<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'blog_id' => 1,
            'url' => 'https://images.unsplash.com/photo-1535498730771-e735b998cd64?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80'
        ]);

        DB::table('images')->insert([
            'blog_id' => 2,
            'url' => 'https://cdn.cnn.com/cnnnext/dam/assets/191203174105-edward-whitaker-1-large-169.jpg'
        ]);

        DB::table('images')->insert([
            'blog_id' => 1,
            'url' => 'https://www.itl.cat/pngfile/big/30-303191_background-images-for-editing-editing-pictures-background-background.jpg'
        ]);

        DB::table('images')->insert([
            'blog_id' => 1,
            'url' => 'https://cdn.pixabay.com/photo/2013/07/21/13/00/rose-165819__340.jpg'
        ]);
    }
}
