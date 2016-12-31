<?php

namespace Unit\BodyGeneration;

use Unit\Publisher\Mode\Recommendation\BodyGeneration\RecommendationTest;
use Publisher\Entry\Xing\Mode\Recommendation\XingForumRecommendation;

class XingForumRecommendationTest extends RecommendationTest
{   
    
    protected function getTestEntity()
    {
        return new XingForumRecommendation();
    }
    
    public function getSampleContentAndBody()
    {
        $contentMinusUrl = array(
            'message' => 'test-message',
            'title' => 'test-title'
        );
        $content = $contentMinusUrl;
        $content['url'] = 'http://www.example.com';
        
        $bodyMinusUrl = array(
            'content' => $content['message'],
            'title' => $content['title']
        );
        $body = $bodyMinusUrl;
        $body['content'] = $content['message'] . "\n" . $content['url'];
        
        return array(
            // only message and title
            array($contentMinusUrl, $bodyMinusUrl),
            // title, message and url
            array($content, $body)
        );
    }
    
}