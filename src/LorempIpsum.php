<?php


namespace Lemyskaman\LorempIpsum;


/**
 * Class LorempIpsum, a handy tool to generate loremp ipsum text.
 * Some  methods names and  fucntionality code on this class where taken from Mark Penner's
 * stack overflow answer at https://stackoverflow.com/a/39986034
 * @package Lemyskaman\LorempImpsum
 */
class LorempIpsum
{

    private  $lorem = ['lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'praesent', 'interdum', 'dictum', 'mi', 'non', 'egestas', 'nulla', 'in', 'lacus', 'sed', 'sapien', 'placerat', 'malesuada', 'at', 'erat', 'etiam', 'id', 'velit', 'finibus', 'viverra', 'maecenas', 'mattis', 'volutpat', 'justo', 'vitae', 'vestibulum', 'metus', 'lobortis', 'mauris', 'luctus', 'leo', 'feugiat', 'nibh', 'tincidunt', 'a', 'integer', 'facilisis', 'lacinia', 'ligula', 'ac', 'suspendisse', 'eleifend', 'nunc', 'nec', 'pulvinar', 'quisque', 'ut', 'semper', 'auctor', 'tortor', 'mollis', 'est', 'tempor', 'scelerisque', 'venenatis', 'quis', 'ultrices', 'tellus', 'nisi', 'phasellus', 'aliquam', 'molestie', 'purus', 'convallis', 'cursus', 'ex', 'massa', 'fusce', 'felis', 'fringilla', 'faucibus', 'varius', 'ante', 'primis', 'orci', 'et', 'posuere', 'cubilia', 'curae', 'proin', 'ultricies', 'hendrerit', 'ornare', 'augue', 'pharetra', 'dapibus', 'nullam', 'sollicitudin', 'euismod', 'eget', 'pretium', 'vulputate', 'urna', 'arcu', 'porttitor', 'quam', 'condimentum', 'consequat', 'tempus', 'hac', 'habitasse', 'platea', 'dictumst', 'sagittis', 'gravida', 'eu', 'commodo', 'dui', 'lectus', 'vivamus', 'libero', 'vel', 'maximus', 'pellentesque', 'efficitur', 'class', 'aptent', 'taciti', 'sociosqu', 'ad', 'litora', 'torquent', 'per', 'conubia', 'nostra', 'inceptos', 'himenaeos', 'fermentum', 'turpis', 'donec', 'magna', 'porta', 'enim', 'curabitur', 'odio', 'rhoncus', 'blandit', 'potenti', 'sodales', 'accumsan', 'congue', 'neque', 'duis', 'bibendum', 'laoreet', 'elementum', 'suscipit', 'diam', 'vehicula', 'eros', 'nam', 'imperdiet', 'sem', 'ullamcorper', 'dignissim', 'risus', 'aliquet', 'habitant', 'morbi', 'tristique', 'senectus', 'netus', 'fames', 'nisl', 'iaculis', 'cras', 'aenean'];

    /**
     *
     * Build a loremp impsum random text,
     *
     * @param int $nparagraphs the number of paragraphs in the text
     * @param int $sentences_range_start
     * @param int $sentences_range_end
     * @param int $words_range_start
     * @param int $words_range_end
     * @return string
     * @throws \Exception
     */
    public  function make(
        int $nparagraphs = 1,
        int $sentences_range_start = 3,
        int $sentences_range_end = 8,
        int $words_range_start = 3,
        int $words_range_end = 15
    )
    {
        $sentences_range = [$sentences_range_start, $sentences_range_end];
        $words_range = [$words_range_start, $words_range_end];
        $paragraphs = [];
        for ($p = 0; $p < $nparagraphs; ++$p) {
            $nsentences = random_int($sentences_range_start, $sentences_range_end);
            $sentences = [];
            for ($s = 0; $s < $nsentences; ++$s) {
                $frags = [];
                $commaChance = .33;
                while (true) {
                    $nwords = random_int($words_range_start,$words_range_end);
                    $words = $this->random_values($this->lorem, $nwords);
                    $frags[] = implode(' ', $words);
                    if ($this->random_float() >= $commaChance) {
                        break;
                    }
                    $commaChance /= 2;
                }

                $sentences[] = ucfirst(implode(', ', $frags)) . '.';
            }
            $paragraphs[] = implode(' ', $sentences);
        }
        return implode("\n\n", $paragraphs);
    }

    private function random_float()
    {
        return random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX;
    }

    private  function random_values($arr, $count)
    {
        $keys = array_rand($arr, $count);
        if ($count == 1) {
            $keys = [$keys];
        }
        return array_intersect_key($arr, array_fill_keys($keys, null));
    }



}