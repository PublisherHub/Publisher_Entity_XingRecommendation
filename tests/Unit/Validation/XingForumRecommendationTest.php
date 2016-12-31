<?php

namespace Unit\Validation;

use Unit\Publisher\Mode\Recommendation\Validation\AbstractRecommendationTest;
use Publisher\Entry\Xing\Mode\Recommendation\XingForumRecommendation;
use Publisher\Entry\Xing\XingForumEntry;

class XingForumRecommendationTest extends AbstractRecommendationTest
{
    
    /**
     * @inheritDoc
     */
    public function getExceededMessageData()
    {
        $url = 'http://www.example.com'; // 22 characters
        
        /* 
         * Characters arrangement:
         * 22 for url
         * 1 for break between message and url
         */
        $messageLength = XingForumEntry::MAX_LENGTH_OF_MESSAGE - 22 - 1;
        $message = '';
        //add one additional character so we exceed maximum message length
        for ($i = 0; $i < $messageLength+1; $i++) {
            $message .= 'c';
        }
        
        $title = 'c';
        //add one additional character so we exceed maximum title length
        for ($i = 0; $i < XingForumEntry::MAX_LENGTH_OF_TITLE+1; $i++) {
            $title .= '';
        }
        
        return array(
            array(
                array(
                    'message' => $message,
                    'title' => $title,
                    'url' => $url
                )
            ),
            array(
                array( 
                    'message' => $message.'b'.$url, // .'b' => combining break
                    'title' => $title,
                    'url' => ''
                )
            )
        );
    }
    
    /**
     * @inheritDoc
     */
    protected function createRecommendation(array $content = array())
    {
        return new XingForumRecommendation($content);
    }
    
    /**
     * @inheritDoc
     */
    protected function getYamlValidationPaths()
    {
        $paths = parent::getYamlValidationPaths();
        $paths[] = __DIR__ . '/../../../Resources/config/validation.yml';
        
        return $paths;
    }
    
}