<?php

/**
 * This file is part of ammont/fa-slugify.
 *
 * (c) Amir Montazer <ammontazer@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Ammont\FaSlugify;

/**
 * Slugify
 *
 * @package   org.cocur.slugify
 * @author    Florian Eckerstorfer <florian@eckerstorfer.co>
 * @author    Ivo Bathke <ivo.bathke@gmail.com>
 * @author    Marchenko Alexandr
 * @copyright 2012-2014 Florian Eckerstorfer
 * @license   http://www.opensource.org/licenses/MIT The MIT License
 */
class FaSlugify {

	/** @var boolean shows if the text should be translated */
	private $translate;

    /** @var array */
    private $rules = array(
        // Numeric characters
        '۱' => 1,
        '۲' => 2,
        '۳' => 3,
        '۴' => 4,
        '۵' => 5,
        '۶' => 6,
        '۷' => 7,
        '۸' => 8,
        '۹' => 9,
        '۰' => 0,

        /* Persian */
        'آ' => 'aa',
        'ا' => 'a',
        'ب' => 'b',
        'پ' => 'p',
        'ت' => 't',
        'ث' => 's',
        'ج' => 'j',
        'چ' => 'ch',
        'ح' => 'h',
        'خ' => 'kh',
        'د' => 'd',
        'ذ' => 'z',
        'ر' => 'r',
        'ز' => 'z',
        'س' => 's',
        'ش' => 'sh',
        'ص' => 's',
        'ض' => 'z',
        'ط' => 't',
        'ظ' => 'z',
        'ع' => 'aa',
        'غ' => 'gh',
        'ف' => 'f',
        'ق' => 'gh',
        'ك' => 'k',
        'گ' => 'g',
        'ل' => 'l',
        'م' => 'm',
        'ن' => 'n',
        'و' => 'v',
        'ه' => 'h',
        'ي' => 'y'
    );

    public function __constuct($translate = false)
    {
    	$this->translate = $translate;
    }

    /**
     * Returns the slugified string.
     *
     * @param string $string    String to slugify
     * @param string $separator Separator
     *
     * @return string Slugified string
     */
    public function slugify($string, $separator = '-')
    {
    	if ($this->translate)
    	{
    		$string = strtolower(strtr($string, $this->rules));
        	$string = preg_replace('/([^a-z0-9]|-)+/', $separator, $string);
        	$string = strtolower($string);
    	}
    	else
    	{
    		$string = strtolower($string);
        	$string = mb_ereg_replace('([^ا-ی۰-۹a-z0-9]|-)+', $separator, $string);
        	$string = strtolower($string);
    	}


        return trim($string, $separator);
    }

    /**
     * Adds a custom rule to the slugifier.
     *
     * @param string $character   Character
     * @param string $replacement Replacement character
     *
     * @return Slugify
     */
    public function addRule($character, $replacement)
    {
        $this->rules[$character] = $replacement;

        return $this;
    }

    /**
     * Static method to create new instance of {@see Slugify}.
     *
     * @return Slugify
     */
    public static function create($translate = false)
    {
        return new static($translate);
    }
}
