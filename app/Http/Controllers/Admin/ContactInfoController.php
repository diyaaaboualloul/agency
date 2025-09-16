<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
   public function edit()
{
    $contactInfo = ContactInfo::firstOrCreate([]);
    return view('admin.contact-info.edit', compact('contactInfo'));
}

public function update(Request $request)
{
    $data = $request->validate([
        'agency_name'   => 'nullable|string|max:255',
        'email'         => 'nullable|email|max:255',
        'phone'         => 'nullable|string|max:20',
        'whatsapp'      => 'nullable|string|max:20',
        'address_line1' => 'nullable|string|max:255',
        'address_line2' => 'nullable|string|max:255',
        'city'          => 'nullable|string|max:100',
        'state'         => 'nullable|string|max:100',
        'latitude'      => 'nullable|numeric',
        'longitude'     => 'nullable|numeric',
    ]);

$contactInfo = ContactInfo::firstOrCreate([]);
$contactInfo->update($data);


    return redirect()->route('admin.contact-info.edit')
                     ->with('success', 'Contact info updated successfully!');
}

}
