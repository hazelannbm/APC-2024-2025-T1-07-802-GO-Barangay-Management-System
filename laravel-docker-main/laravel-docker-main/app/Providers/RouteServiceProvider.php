namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = 'http://localhost:80/dashboard';

    public function boot()
    {
        // ...existing code...
    }

    public function map()
    {
        // ...existing code...
    }
}
