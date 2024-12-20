use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmergencyEquipmentChecksTable extends Migration
{
    public function up()
    {
        Schema::create('emergency_equipment_checks', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('equipment_type');
            $table->string('location');
            $table->date('check_date');
            $table->boolean('status')->default(false); // true for checked, false for not checked
            $table->text('comments')->nullable();
            $table->string('checked_by');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emergency_equipment_checks');
    }
}