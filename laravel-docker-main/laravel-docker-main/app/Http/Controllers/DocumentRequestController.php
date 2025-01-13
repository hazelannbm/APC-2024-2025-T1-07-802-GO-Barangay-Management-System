namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DocumentRequest;

class DocumentRequestController extends Controller
{
    public function showRequestForm()
    {
        return view('auth.document-request');
    }

    public function submitRequest(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'age' => 'required|integer|min:1',
            'birthdate' => 'required|date',
            'document_type' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'valid_id' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $documentRequest = new DocumentRequest();
        $documentRequest->full_name = $request->full_name;
        $documentRequest->gender = $request->gender;
        $documentRequest->age = $request->age;
        $documentRequest->birthdate = $request->birthdate;
        $documentRequest->document_type = $request->document_type;
        $documentRequest->address = $request->address;
        $documentRequest->valid_id = $request->file('valid_id')->store('valid_ids', 'public');
        $documentRequest->save();

        return redirect()->route('document-request')->with('status', 'Document request submitted successfully!');
    }
}
