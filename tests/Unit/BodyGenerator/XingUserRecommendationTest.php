<?php

namespace Unit\BodyGeneration;

use Unit\Publisher\Mode\Recommendation\BodyGeneration\RecommendationTest;
use Publisher\Entry\Xing\Mode\Recommendation\XingUserRecommendation;

class XingUserRecommendationTest extends RecommendationTest
{   
    
    /**
     * @inheritDoc
     */
    protected function getTestEntity()
    {
        return new XingUserRecommendation();
    }
    
    /**
     * @inheritDoc
     */
    public function getSampleContentAndBody()
    {
        $title = 'test-title';
        $message = 'test-message';
        $url = 'http://www.example.com';
        
        return array(
            array( // only message
                array('message' => $message),
                array('message' => $message)
            ),
            array( // message and title
                array('message' => $message, 'title' => $title),
                array('message' => $title . "\n" . $message)
            ),
            array( // message and url
                array('message' => $message, 'url' => $url),
                array('message' => $message . "\n" . $url)
            ),
            array( // message, title and url
                array('message' => $message, 'title' => $title, 'url' => $url),
                array('message' => $title . "\n" . $message . "\n" . $url)
            )
        );
    }
    
}