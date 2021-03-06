<?php namespace Spatie\Newsletter\MailChimp;

use Spatie\Newsletter\Interfaces\NewsletterCampaignInterface;

class NewsletterCampaign extends MailChimpBase implements NewsletterCampaignInterface
{
    /**
     * Create new MailChimp Campaign.
     *
     *
     * @param $subject
     * @param $content
     * @param $listName
     *
     * @return \associative_array
     */
    public function create($subject, $content, $listName = '')
    {
        $listProperties = $this->getListProperties($listName);

        return $this->mailChimp->campaigns->create('regular',
            [
                'list_id' => $listProperties['id'],
                'subject' => $subject,
                'from_email' => $listProperties['createCampaign']['fromEmail'],
                'from_name' => $listProperties['createCampaign']['fromName'],
                'to_name' => $listProperties['createCampaign']['toName'],

            ],
            [
                'html' => $content,
            ]);
    }
}
