use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoolTestResultsController;

Route::get('home','PoolTestResultsController@index');