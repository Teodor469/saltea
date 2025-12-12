<?php

namespace App\Livewire\Contact;

use App\Mail\ContactMail;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Contact extends Component
{
    #[Layout('components.layouts.public')]
    public $product = [];
    public $first_name;
    public $last_name;
    public $email;
    public $phone_number;
    public $address;
    public $additional_info;

    protected $rules = [
        'product' => 'required|array|min:1',
        'product.*' => 'required|integer|exists:products,id',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone_number' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'additional_info' => 'nullable|string|max:1000',
    ];

    public function submit()
    {
        $validated = $this->validate();

        Mail::to(config('mail.from.address'))->send(new ContactMail($validated));

        $this->reset();

        return redirect()->back()->with('success', 'Your order has been placed!');
    }

    public function render()
    {
        return view('livewire.contact.contact', [
            'products' => Product::all(),
        ]);
    }
}
