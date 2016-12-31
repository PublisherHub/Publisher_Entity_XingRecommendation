<?php

namespace Publisher\Entry\Xing\Mode\Recommendation;

use Publisher\Mode\Recommendation\AbstractRecommendation;

class XingForumRecommendation extends AbstractRecommendation
{
    
    /**
     * @inheritDoc
     */
    public function getMessagePayload()
    {
       $message = $this->url ? $this->message."\n".$this->url : $this->message;
       
       return $message;
    }
    
    /**
     * @inheritDoc
     */
    public function generateBody()
    {
        $body = array();
        
        $body['title'] = $this->title;
        $body['content'] = $this->getMessagePayload();
        
        return $body;
    }
    
}