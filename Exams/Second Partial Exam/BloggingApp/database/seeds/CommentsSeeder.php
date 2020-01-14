<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'username' => 'doe',
            'comment_text' => 'Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis. ',
            'blog_id' => 1,
            'created_at' => date('2020-01-01 01:05'),
            'updated_at' => date('2020-01-01 01:05')
        ]);
        DB::table('comments')->insert([
            'username' => 'babu-frik',
            'comment_text' => 'Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis. ',
            'blog_id' => 1,
            'created_at' => date('2020-01-01 01:06'),
            'updated_at' => date('2020-01-01 01:06')
        ]);
        DB::table('comments')->insert([
            'username' => 'starkiller',
            'comment_text' => 'Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis. ',
            'blog_id' => 1,
            'created_at' => date('2020-01-01 02:05'),
            'updated_at' => date('2020-01-01 02:05')
        ]);

        DB::table('comments')->insert([
            'username' => 'revan',
            'comment_text' => 'Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis. ',
            'blog_id' => 2,
            'created_at' => date('2020-01-01 00:05'),
            'updated_at' => date('2020-01-01 00:05')
        ]);
        DB::table('comments')->insert([
            'username' => 'c3p0',
            'comment_text' => 'Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis. ',
            'blog_id' => 2,
            'created_at' => date('2019-12-31 23:58'),
            'updated_at' => date('2019-12-31 23:58')
        ]);
        DB::table('comments')->insert([
            'username' => 'its-some-soft-of-elvish',
            'comment_text' => 'Donec id orci vehicula, porttitor nulla quis, maximus quam. In vitae magna id libero laoreet bibendum. Donec ultricies velit pretium, pharetra purus eu, tempor odio. Phasellus vel fermentum mi. Sed sodales id purus sit amet viverra. Vestibulum fermentum consectetur nunc, ac molestie lorem tempus id. Morbi eleifend efficitur leo, a tristique nibh rhoncus eget. Nam vestibulum quam non facilisis faucibus. Praesent commodo felis vitae mauris interdum sollicitudin et et justo. Fusce pretium dui sed sagittis finibus. Duis quis est tellus. Fusce ac leo pharetra, hendrerit mi ut, volutpat odio. Etiam gravida justo lacus, sit amet volutpat nisi pharetra quis. ',
            'blog_id' => 2,
            'created_at' => date('2019-12-31 23:59'),
            'updated_at' => date('2019-12-31 23:59')
        ]);
    }
}
