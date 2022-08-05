<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
class ContactUsController extends Controller
{
    public function contact_us(Request $request)
    {
          $contact = new ContactUs();
          $contact->name = $request->name;
          $contact->email = $request->email;
          $contact->message = $request->message;
          $contact->save();

          return redirect('/');

    }
}
