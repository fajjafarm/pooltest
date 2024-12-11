use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoolTestResultsController;

Route::get('dashboards/index','PoolTestResultsController@dashboards/index');