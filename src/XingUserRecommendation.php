<?php

namespace Publisher\Entry\Xing\Mode\Recommendation;

use Publisher\Mode\Recommendation\AbstractRecommendation;

class XingUserRecommendation extends AbstractRecommendation
{
    
    /**
     * @inheritDoc
     */
    public function getMessagePayload()
    {
       $message = $this->title ? $this->title . "\n" . $this->message : $this->message;
       
       if ($this->url) {
           $message .= "\n" . $this->url;
       }
       
       return $message;
    }
    
    /**
     * @inheritDoc
     */
    public function generateBody()
    {
        return array('message' => $this->getMessagePayload());
    }

}