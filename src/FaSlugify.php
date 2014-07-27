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
use Ammont\Finglify\Finglify;

/**
 * Slugify
 *
 * @author    Amir Montazer <ammontazer@gmail.com>
 * @copyright 2012-2014 Amir Montazer
 * @license   http://www.opensource.org/licenses/MIT The MIT License
 */
class FaSlugify {

	/** @var boolean shows if the text should be translated */
	private $translate;

    /**
     * The class constructor.
     *
     * @param boolean $translate
     */
    public function __construct($translate = false)
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
    		$finglify = new Finglify();

    		$string = $finglify->translate($string);
    		$string = strtolower($string);
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
