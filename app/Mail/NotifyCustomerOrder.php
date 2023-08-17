<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyCustomerOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $ordernumber;
    public $deliveryaddress;
    public $FirstName;
    public $MiddleName;
    public $LastName;
    public $latitude;
    public $longitude;
    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        $this->ordernumber = $data['ordernumber'];
        $this->deliveryaddress = $data['deliveryaddress'];
        $this->FirstName = $data['firstname'];
        $this->MiddleName = $data['middlename'];
        $this->LastName = $data['lastname'];
        $this->latitude = $data['latitude'];
        $this->longitude = $data['longitude'];
        $this->products = $data['products'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Order Request Successful',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.CustomerOrder',
            with: [
                'ordernumber' => $this->ordernumber,
                'deliveryaddress' => $this->deliveryaddress,
                'FirstName' => $this->FirstName,
                'MiddleName' => $this->MiddleName,
                'LastName' => $this->LastName,
                'products' => $this->products,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
