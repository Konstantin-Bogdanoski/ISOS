<?php

use Illuminate\Database\Seeder;
/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         *
         *   News with ID = 1
         *
         */

        DB::table('comments')->insert([
            'news_id' => 1,
            'username' => 'Eduardo Fernandez',
            'comment_text' => 'Curabitur vitae felis nec nulla efficitur pellentesque. Quisque ac ipsum eget mi interdum maximus. Nulla facilisi. Duis rhoncus dolor sed sapien suscipit rutrum. Fusce aliquet erat metus, ac mollis leo malesuada tincidunt. Cras id ultrices ante amet.',
            'created_at' => date('2019-11-05 00:25:30'),
            'updated_at' => date('2019-11-05 00:25:30')
        ]);

        DB::table('comments')->insert([
            'news_id' => 1,
            'username' => 'Makedon Filipe',
            'comment_text' => 'Nibh tellus molestie nunc non. Sed risus ultricies tristique nulla aliquet enim. Molestie at elementum eu facilisis sed odio morbi quis commodo. Massa tincidunt dui ut ornare lectus sit. Hendrerit gravida rutrum quisque non tellus orci.',
            'created_at' => date('2019-11-05 00:30:30'),
            'updated_at' => date('2019-11-05 00:30:30')
        ]);

        DB::table('comments')->insert([
            'news_id' => 1,
            'username' => 'Serajero Lulita',
            'comment_text' => 'Eget lorem dolor sed viverra. Ornare massa eget egestas purus viverra accumsan. In hac habitasse platea dictumst vestibulum rhoncus est. Tincidunt arcu non sodales neque sodales ut etiam sit amet. Semper auctor neque vitae tempus.',
            'created_at' => date('2019-11-05 00:35:30'),
            'updated_at' => date('2019-11-05 00:35:30')
        ]);

        DB::table('comments')->insert([
            'news_id' => 1,
            'username' => 'Nizzo Trocadderro',
            'comment_text' => 'Vestibulum efficitur justo sit amet suscipit feugiat. Sed pulvinar a dolor vitae aliquet. Curabitur ac eros porttitor, hendrerit urna non, vehicula erat. Nunc gravida volutpat magna, vel ultrices sapien. Nulla efficitur, nibh vel ullamcorper posuere.',
            'created_at' => date('2019-11-05 00:38:30'),
            'updated_at' => date('2019-11-05 00:38:30')
        ]);

        DB::table('comments')->insert([
            'news_id' => 1,
            'username' => 'Eduardo Fernandez',
            'comment_text' => 'Volutpat commodo sed egestas egestas fringilla phasellus faucibus. Potenti nullam ac tortor vitae purus faucibus. Lacus suspendisse faucibus interdum posuere lorem. Vel eros donec ac odio tempor.',
            'created_at' => date('2020-01-12 17:23:20'),
            'updated_at' => date('2020-01-12 17:23:20')
        ]);

        /*
         *
         * News with ID = 2
         *
         */

        DB::table('comments')->insert([
            'news_id' => 2,
            'username' => 'Makedon Filipe',
            'comment_text' => 'Vestibulum efficitur justo sit amet suscipit feugiat. Sed pulvinar a dolor vitae aliquet. Curabitur ac eros porttitor, hendrerit urna non, vehicula erat. Nunc gravida volutpat magna, vel ultrices sapien. Nulla efficitur, nibh vel ullamcorper posuere.',
            'created_at' => date('2019-12-13 16:16:00'),
            'updated_at' => date('2019-12-13 16:16:00')
        ]);

        DB::table('comments')->insert([
            'news_id' => 2,
            'username' => 'Serajero Lulita',
            'comment_text' => 'Morbi nec ipsum arcu. Donec mattis sapien quis cursus pretium. Nullam elit purus, porttitor tincidunt ornare eget, rhoncus et neque. Ut eget massa viverra eros faucibus posuere vitae quis mauris. Sed malesuada lobortis eros, non mattis mi. Cras amet.',
            'created_at' => date('2019-12-13 16:20:00'),
            'updated_at' => date('2019-12-13 16:20:00')
        ]);

        DB::table('comments')->insert([
            'news_id' => 2,
            'username' => 'Nizzo Trocadderro',
            'comment_text' => 'Nulla at volutpat diam ut venenatis. Leo duis ut diam quam nulla porttitor massa id. Venenatis urna cursus eget nunc scelerisque viverra mauris in. Sed tempus urna et pharetra pharetra massa massa ultricies.',
            'created_at' => date('2019-12-13 16:25:00'),
            'updated_at' => date('2019-12-13 16:25:00')
        ]);

        /*
         *
         * News with ID = 3
         *
         */

        DB::table('comments')->insert([
            'news_id' => 3,
            'username' => 'Nizzo Trocadderro',
            'comment_text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut est neque, accumsan in accumsan quis, aliquet ornare lacus. Praesent luctus massa nec scelerisque rutrum. Donec tristique aliquet ultrices. Pellentesque habitant morbi tristique senectus id.',
            'created_at' => date('2020-01-13 13:25:00'),
            'updated_at' => date('2020-01-13 13:25:00')
        ]);
    }
}
