<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Factories\PostFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $faker = Faker\Factory::create();
//        $faker->(PostFactory::class, 100);
        for ($i = 0 ;$i<30 ;$i++){
            Post::create([
                'title' => 'Post title'.$i,
                'author_id' => 1,
                'description' => 'A paragraph should consist of six to seven sentences. No, it should be no longer than three sentences long. Actually, it should include a topic sentence, several supporting sentences, and possibly a concluding sentence. Sigh. Can I end this paragraph yet?

All three of the declarations in the previous paragraph (the first pair of which come, respectively, from sources within Purdue University and Stanford University, two of the most prestigious institutions of higher learning in the United States), and any similarly quantitative statements, are wrong. The correct answer is that a paragraph has to be long enough to reach its end.

Like this one.

A paragraph can be as long or as short as you want it to be. It can unfold for countless pages or consist of one word — even one letter.

W-

(I meant to write, “Wait!” but was interrupted.)

The determination to make in composing a given paragraph is not the number of sentences or words or letters, but the number of ideas. The rule of thumb — in nonfiction, at least — is that each paragraph should focus on one idea or concept; when you shift to a new idea, shift to a new paragraph. (In fiction, its function is more nebulous: A paragraph is a unit of writing that further develops a story through exposition.)

However, ideas, as we all know, are slippery things, difficult to package and unlikely to remain in their allotted places. How big or small is an idea? What about an idea within an idea?

Ultimately, a paragraph is complete when you decide it is.',
            ]);
        }

    }
}
