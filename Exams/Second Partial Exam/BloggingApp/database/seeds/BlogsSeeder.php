<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'Happy New Year !',
            'username' => 'john',
            'description' => '

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet gravida nisi. Aenean sed rutrum ex. Sed magna dolor, varius vel pulvinar in, fringilla eget mauris. Etiam luctus tristique sem sit amet pulvinar. Aliquam augue lectus, laoreet vel dui vitae, lacinia vehicula libero. Morbi ac molestie velit. Donec vehicula nulla nec libero blandit laoreet. Proin egestas iaculis sem, at convallis tortor iaculis ut. Fusce vel ex purus.

Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis.

Proin molestie quis dolor quis molestie. Vestibulum hendrerit nisi magna, vitae tristique lacus consectetur in. In vel urna quam. Pellentesque suscipit pellentesque quam id porta. Fusce velit velit, posuere eu dapibus id, faucibus nec sem. Donec elementum eros sed purus lobortis dignissim. Donec suscipit efficitur posuere. Cras lacinia, neque sit amet porta hendrerit, arcu erat congue mauris, at mollis magna nibh quis metus. Phasellus varius tincidunt ipsum, nec tempus lacus faucibus sit amet. Nam sed elit nisl. Vestibulum id nisi sit amet arcu ornare vestibulum. Morbi diam ante, volutpat vitae enim quis, vehicula tristique libero. Integer id suscipit nisi, eu fringilla erat. Sed nisl ligula, tincidunt a molestie a, rhoncus a erat.

Praesent pretium mattis sapien, et tristique nulla sollicitudin vel. Praesent urna diam, commodo in pharetra quis, eleifend non nulla. Aliquam finibus nibh non dignissim hendrerit. Aenean in diam eget felis sollicitudin bibendum. Maecenas quis tellus rhoncus, sollicitudin lectus nec, facilisis nisl. Duis metus elit, cursus vitae dui id, pretium pellentesque enim. Nulla quis egestas turpis, eu dignissim justo. Curabitur quam lectus, finibus sed condimentum ac, viverra id urna. Etiam ac libero aliquet, dignissim lacus non, dictum tellus.

Maecenas nec efficitur elit, non sagittis odio. Proin scelerisque libero vel ex posuere, non rutrum urna lobortis. Quisque faucibus ex et aliquam tristique. Donec sed justo tellus. Nullam eleifend leo sed congue convallis. Pellentesque dapibus mi sed mauris maximus pellentesque. Nam interdum, purus vitae pellentesque egestas, metus ante elementum nunc, eu auctor metus libero vitae magna. Donec cursus sed ipsum sed consectetur. Integer auctor tincidunt ante, nec eleifend lorem. Donec vel velit rutrum, cursus mauris id, auctor ante. ',
            'likes' => 10,
            'dislikes' => 5,
            'created_at' => date('2020-01-01 00:01'),
            'updated_at' => date('2020-01-01 00:01')
        ]);

        DB::table('blogs')->insert([
            'title' => "Are Y'all READY ?!!?!",
            'username' => 'doe',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum sit amet gravida nisi. Aenean sed rutrum ex. Sed magna dolor, varius vel pulvinar in, fringilla eget mauris. Etiam luctus tristique sem sit amet pulvinar. Aliquam augue lectus, laoreet vel dui vitae, lacinia vehicula libero. Morbi ac molestie velit. Donec vehicula nulla nec libero blandit laoreet. Proin egestas iaculis sem, at convallis tortor iaculis ut. Fusce vel ex purus.

Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis.

Proin molestie quis dolor quis molestie. Vestibulum hendrerit nisi magna, vitae tristique lacus consectetur in. In vel urna quam. Pellentesque suscipit pellentesque quam id porta. Fusce velit velit, posuere eu dapibus id, faucibus nec sem. Donec elementum eros sed purus lobortis dignissim. Donec suscipit efficitur posuere. Cras lacinia, neque sit amet porta hendrerit, arcu erat congue mauris, at mollis magna nibh quis metus. Phasellus varius tincidunt ipsum, nec tempus lacus faucibus sit amet. Nam sed elit nisl. Vestibulum id nisi sit amet arcu ornare vestibulum. Morbi diam ante, volutpat vitae enim quis, vehicula tristique libero. Integer id suscipit nisi, eu fringilla erat. Sed nisl ligula, tincidunt a molestie a, rhoncus a erat.

Praesent pretium mattis sapien, et tristique nulla sollicitudin vel. Praesent urna diam, commodo in pharetra quis, eleifend non nulla. Aliquam finibus nibh non dignissim hendrerit. Aenean in diam eget felis sollicitudin bibendum. Maecenas quis tellus rhoncus, sollicitudin lectus nec, facilisis nisl. Duis metus elit, cursus vitae dui id, pretium pellentesque enim. Nulla quis egestas turpis, eu dignissim justo. Curabitur quam lectus, finibus sed condimentum ac, viverra id urna. Etiam ac libero aliquet, dignissim lacus non, dictum tellus.

Maecenas nec efficitur elit, non sagittis odio. Proin scelerisque libero vel ex posuere, non rutrum urna lobortis. Quisque faucibus ex et aliquam tristique. Donec sed justo tellus. Nullam eleifend leo sed congue convallis. Pellentesque dapibus mi sed mauris maximus pellentesque. Nam interdum, purus vitae pellentesque egestas, metus ante elementum nunc, eu auctor metus libero vitae magna. Donec cursus sed ipsum sed consectetur. Integer auctor tincidunt ante, nec eleifend lorem. Donec vel velit rutrum, cursus mauris id, auctor ante. ',
            'likes' => 10,
            'dislikes' => 5,
            'created_at' => date('2019-12-31 23:55'),
            'updated_at' => date('2019-12-31 23:55')
        ]);
    }
}
