<?php
declare(strict_types=1);
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\LegacyEventDispatcherProxy;
use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\Event\MessageEvent;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mailer\Messenger\SendEmailMessage;
use Symfony\Component\Mailer\Transport\TransportInterface;
use Symfony\Component\Mime\RawMessage;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Mailer implements MailerInterface
{
    /**
     * @var TransportInterface
     */
    private TransportInterface $transport;

    /**
     * @var mixed|null
     */
    private $bus;

    /**
     * @var EventDispatcherInterface|null
     */
    private ?EventDispatcherInterface $dispatcher;

    public function __construct(TransportInterface $transport, $bus = null, EventDispatcherInterface $dispatcher = null)
    {
        $this->transport = $transport;
        $this->bus = $bus;
        $this->dispatcher = class_exists(Event::class) ? LegacyEventDispatcherProxy::decorate($dispatcher) : $dispatcher;
    }

    public function send(RawMessage $message, Envelope $envelope = null):void
    {
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function sendMail(RawMessage $message, Envelope $envelope = null):bool
    {
        if (null === $this->bus) {
            $this->transport->send($message, $envelope);

            return true;
        }

        if (null !== $this->dispatcher) {
            $clonedMessage = clone $message;
            $clonedEnvelope = null !== $envelope ? clone $envelope : Envelope::create($clonedMessage);
            $event = new MessageEvent($clonedMessage, $clonedEnvelope, (string)$this->transport, true);
            $this->dispatcher->dispatch($event);

            return true;
        }
        if (null !== $this->bus) {
            $this->bus->dispatch(new SendEmailMessage($message, $envelope));
            return true;
        }

        return false;
    }
}
