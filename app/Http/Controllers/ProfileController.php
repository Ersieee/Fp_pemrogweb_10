namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ProfileController extends Controller
{
    public function index()
    {
        $orders = Order::with('mobil')
                    ->where('user_id', Auth::id())
                    ->get();

        return view('profile', [
            'orders' => $orders
        ]);
    }
}
