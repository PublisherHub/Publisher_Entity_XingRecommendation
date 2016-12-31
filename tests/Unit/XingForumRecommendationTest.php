<?php

namespace Unit;

use Unit\Publisher\Mode\Recommendation\AbstractRecommendationTest;
use Publisher\Entry\Xing\Mode\Recommendation\XingForumRecommendation;
use Publisher\Entry\Xing\XingForumEntry;

class XingForumRecommendationTest extends AbstractRecommendationTest
{
    
    /**
     * @inheritDoc
     */
    protected function createRecommendation(array $content = array())
    {
        return new XingForumRecommendation($content);
    }
    
}