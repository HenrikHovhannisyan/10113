<?php

namespace App\Http\Controllers;

use App\Models\TaxReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StripePaymentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse
     */
    public function payment(Request $request, $id)
    {
        $tax = TaxReturn::query()->where('id', $id)
            ->where('user_id', Auth::id())
            ->first();

        if(!$tax) {
           return redirect()->route('home')->with('error', 'Tax not found!');
        }

        if($tax->payment_status == 'paid') {
            return redirect()->route('home')->with('error', 'You already paid this tax!');
        }

        $amount = env('AMOUNT', 100);
        return view('pages.payment', compact('tax', 'amount'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function makePayment(Request $request)
    {
        $validated = $request->validate([
            'stripeToken' => 'required|string',
            'tax_id' => 'required|exists:tax_returns,id',
            'agree' => 'required|in:1'
        ]);

        // Fetch the tax record
        $tax = TaxReturn::query()
            ->where('id', $validated['tax_id'])
            ->where('user_id', Auth::id())
            ->first();

        if (!$tax) {
            return redirect()->route('home')->with('error', 'Tax not found!');
        }

        if ($tax->payment_status == 'paid') {
            return redirect()->route('home')->with('error', 'You already paid this tax!');
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            // Create a Stripe charge
            $charge = \Stripe\Charge::create([
                'amount' => intval(env('AMOUNT', 100) * 100),
                'currency' => 'usd',
                'source' => $validated['stripeToken'],
                'description' => 'Tax Payment for Tax ID #' . $tax->id,
                'metadata' => [
                    'user_id' => Auth::id(),
                    'tax_id' => $tax->id,
                    'email' => Auth::user()->email ?? 'N/A'
                ]
            ]);

            // Save payment status
            $tax->update([
                'payment_status' => 'paid',
                'payment_reference' => $charge->id ?? null
            ]);

            return redirect()->route('home')->with('success', 'Payment successful!');
        } catch (\Stripe\Exception\CardException $e) {
            return back()->with('error', $e->getError()->message);
        } catch (\Exception $e) {
            return back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }

}
