<?php

namespace Unit;

use Unit\Publisher\Mode\Recommendation\AbstractRecommendationTest;
use Publisher\Entry\Xing\Mode\Recommendation\XingUserRecommendation;
use Publisher\Entry\Xing\XingUserEntry;

class XingUserRecommendationTest extends AbstractRecommendationTest
{
    
    /**
     * @inheritDoc
     */
    protected function createRecommendation(array $content = array())
    {
        return new XingUserRecommendation($content);
    }
    
}