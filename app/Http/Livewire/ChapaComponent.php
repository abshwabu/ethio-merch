<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Chapa\Chapa\Facades\Chapa as Chapa;


class ChapaComponent extends Component
{
     /**
     * Initialize Rave payment process
     * @return void
     */
    protected $reference;

    public function __construct(){
        $this->reference = Chapa::generateReference();

    }
    public function initialize()
    {
        //This generates a payment reference
        $reference = $this->reference;
        

        // Enter the details of the payment
        $data = [
            
            'amount' => 100,
            'email' => 'hi@negade.com',
            'tx_ref' => $reference,
            'currency' => "ETB",
            'callback_url' => route('callback',[$reference]),
            'first_name' => "Israel",
            'last_name' => "Goytom",
            "customization" => [
                "title" => 'Chapa Laravel Test',
                "description" => "I amma testing this"
            ]
        ];
        

        $payment = Chapa::initializePayment($data);


        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return;
        }

        return redirect($payment['data']['checkout_url']);
    }

    /**
     * Obtain Rave callback information
     * @return void
     */
    public function callback($reference)
    {
        
        $data = Chapa::verifyTransaction($reference);
        dd($data);

        //if payment is successful
        if ($data['status'] ==  'success') {
        

        dd($data);
        }

        else{
            //oopsie something ain't right.
        }


    }
    public function render()
    {
        return view('livewire.chapa-component');
    }
}
