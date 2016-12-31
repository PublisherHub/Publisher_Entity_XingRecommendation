<?php

namespace Unit\Validation;

use Unit\Publisher\Mode\Recommendation\Validation\AbstractRecommendationTest;
use Publisher\Entry\Xing\Mode\Recommendation\XingUserRecommendation;
use Publisher\Entry\Xing\XingUserEntry;

class XingUserRecommendationTest extends AbstractRecommendationTest
{
    
    /**
     * @inheritDoc
     */
    public function getExceededMessageData()
    {
        $max = XingUserEntry::MAX_LENGTH_OF_MESSAGE;
        
        $title = '1234567890'; // 10 characters
        $url = 'http://www.example.com'; // 22 characters
        
        /* 
         * Characters arrangement:
         * 10 for title
         * 22 for url
         * 1 for break between title and url
         * 1 for break between message and url
         */
        $messageLength = $max - 10 - 22 - 1 - 1;
        $message = '';
        //add one additional character so we exceed $max
        for ($i = 0; $i < $messageLength+1; $i++) {
            $message .= 'c';
        }
         
        // .'b' => combining breaks
        $dataSet1 = array(
            'message' => $message,
            'title' => $title,
            'url' => $url
        );
        $dataSet2 = array(
            'message' => $title.'b'.$message,
            'title' => '',
            'url' => $url
        );
        $dataSet3 = array(
            'message' => $message.'b'.$url,
            'title' => $title,
            'url' => ''
        );
        $dataSet4 = array(
            'message' => $title.'b'.$message.'b'.$url,
            'title' => '',
            'url' => ''
        );
        
        return array(
            array($dataSet1),
            array($dataSet2),
            array($dataSet3),
            array($dataSet4)
        );
    }
    
    /**
     * @inheritDoc
     */
    protected function createRecommendation(array $content = array())
    {
        return new XingUserRecommendation($content);
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