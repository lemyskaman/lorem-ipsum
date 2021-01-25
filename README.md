# lorem-ipsum
A Lorem Ipsum generator class for php and laravel.

Its meant to be used principaly as facade on [laravel seeders](https://laravel.com/docs/8.x/seeding) when some text bust be added to some model's text field.

It was made from the code proposed by [Mark Penner](https://mpen.ca/) on an answer at [stackoverflow](https://stackoverflow.com/a/39986034), with minor variations.



# Dependency
It was writen and tested on php7.4.x and laravel 8.x

# install 
With composer just:
    
    $ composer require lemyskaman/loremp-ipsum

# Usage


Just call the static facade method make.

```php

    LorempIpsum::make();

```


```php

    LorempIpsum::make( int $nparagraphs = 1 , int $stences_range_start = 3 , int $sentences_range_end = 8 , int $words_range_start = 3 , int $words_range_end = 15 );

```

make() Returns a text of random [strings].

***$nparagraphs*** : Number of paragraph 1 by default

***$stences_range_start*** :  Minumun number of sentences per paragraph
***$sentences_range_end*** :  Maximun number of sentences per paragraph

***$words_range_end*** :  Minumun number of Words per paragraph
***$words_range_end*** :  Maximun number of Words per paragraph

On a Laravel Seeder:
```php
    //some/seeder/file
    namespace Database\Seeders;
    
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Lemyskaman\LorempIpsum\Facades\LorempIpsum;
    
    class DatabaseSeeder extends Seeder
    {
        /**
         * Run the database seeders.
         *
         * @return void
         */
        public function run()
        {
            DB::table('posts')->insert([
                'title' => LorempIpsum::make(1,1,1,2,4),
                'content' => LorempIpsum::make(5)
            ]);
        }
    }


    
```
    
 On artisans tinker:
 
```bash
    Psy Shell v0.10.6 (PHP 7.4.14 — cli) by Justin Hileman
    >>> \Lemyskaman\LorempIpsum\Facades\LorempIpsum::make()
    => "Praesent in pulvinar ultrices condimentum ullamcorper. Sed erat mauris facilisis ligula nisi class conubia neque fames, consectetur tincidunt integer orci porttitor consequat habitasse platea donec dignissim. Ligula ac tempor quis tellus nisi massa orci, in etiam lobortis quis fusce hendrerit augue eu lectus magna neque nisl iaculis. Erat pulvinar tempor phasellus eget eu efficitur duis laoreet vehicula imperdiet ullamcorper habitant, at luctus purus porttitor condimentum risus iaculis cras. Integer et ornare augue eget sagittis taciti accumsan cras, lorem erat integer est ultrices platea vel elementum sem habitant cras. Placerat malesuada vestibulum nec auctor aliquam et quam enim congue laoreet cras. Etiam ultrices convallis cubilia habitasse, dictum ut euismod nostra potenti laoreet vehicula ullamcorper iaculis. Dolor sit praesent viverra mattis vitae leo nibh ut tortor pharetra pretium odio rhoncus."
    >>> 
```

 
1) The number of paragrafs, 
    