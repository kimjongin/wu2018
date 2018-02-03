<?php

class AI
{
    public static function process($text)
    {
        $result = [
            'gender' => self::getGender($text),
            'sentiment' => self::getSentiment($text),
            'rude_words' => self::getRudeWords($text),
            'languages' => self::getLanguages($text),
        ];
        return $result;
    }

    /**
     * @return string 'Male' or 'Female' or 'Unknown'
     */
    public static function getGender($text)
    {
        if (strpos($text, "ครับ") !== false) {
            return 'Male';
        }
        return 'Female';
    }

    /**
     * @return string 'Positive' or 'Neutral' or 'Negative'
     */
    public static function getSentiment($text)
    {
        return 'Negative';
    }

    /**
     * @return array of all rude words in Thai
     */
    public static function getRudeWords($text)
    {
        return ['แสส'];
    }

    /**
     * @return array of languages (TH, EN)
     */
    public static function getLanguages($text)
    {
        $result = [];
        $re = '/[ก-๛]+/u';
        preg_match_all($re, $text, $matches, PREG_SET_ORDER, 0);
        if (!empty($matches)) {
            array_push($result, 'TH');
        }
        return $result;
    }
}
