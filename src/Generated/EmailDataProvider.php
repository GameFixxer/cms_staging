<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class EmailDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $to = '';

    /** @var string */
    protected $message = '';

    /** @var string */
    protected $subject = '';


    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }


    /**
     * @param string $to
     * @return EmailDataProvider
     */
    public function setTo(string $to = '')
    {
        $this->to = $to;

        return $this;
    }


    /**
     * @return EmailDataProvider
     */
    public function unsetTo()
    {
        $this->to = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTo()
    {
        return ($this->to !== null && $this->to !== []);
    }


    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }


    /**
     * @param string $message
     * @return EmailDataProvider
     */
    public function setMessage(string $message = '')
    {
        $this->message = $message;

        return $this;
    }


    /**
     * @return EmailDataProvider
     */
    public function unsetMessage()
    {
        $this->message = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasMessage()
    {
        return ($this->message !== null && $this->message !== []);
    }


    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }


    /**
     * @param string $subject
     * @return EmailDataProvider
     */
    public function setSubject(string $subject = '')
    {
        $this->subject = $subject;

        return $this;
    }


    /**
     * @return EmailDataProvider
     */
    public function unsetSubject()
    {
        $this->subject = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasSubject()
    {
        return ($this->subject !== null && $this->subject !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'to' =>
          array (
            'name' => 'to',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'message' =>
          array (
            'name' => 'message',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'subject' =>
          array (
            'name' => 'subject',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
