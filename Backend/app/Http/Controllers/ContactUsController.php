<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\ContactUS;
use Mail;
class ContactUSController extends Controller
{
   public function contactUS()
{
return view('contactUS');
} 
   /** * Show the application dashboard. * * @return \Illuminate\Http\Response */
   public function contactUSPost(Request $request) 
   {
    $this->validate($request, [ 'name' => 'required', 'email' => 'required|email', 'message' => 'required' ]);
    ContactUS::create($request->all()); 
   
    Mail::send('email',
       array(
           'name' => $request->get('name'),
           'email' => $request->get('email'),
           'user_message' => $request->get('message')
       ), function($message)
   {
       $message->from('saquib.gt@gmail.com');
       $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
   });
    return back()->with('success', 'Thanks for contacting us!'); 
   }
}
=======
>>>>>>> parent of 850ac621... Mail Function
=======
>>>>>>> parent of 850ac621... Mail Function
=======
>>>>>>> parent of 850ac621... Mail Function
=======
<?php
Namespace App\Http\Controllers;

use App\Notifications\InboxMessage;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Admin;

Class ContactController extends Controller
{
	public function show() 
	{
		return view('contact');
	}

	public function mailToAdmin(ContactFormRequest $message, Admin $admin)
	{        //send the admin an notification
		$admin->notify(new InboxMessage($message));
		// redirect the user back
		return redirect()->back()->with('message', 'thanks for the message! We will get back to you soon!');
	}
}
>>>>>>> parent of 08a8b861... Revert "Mail Function"
