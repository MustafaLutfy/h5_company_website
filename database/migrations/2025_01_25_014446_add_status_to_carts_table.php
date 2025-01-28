<?php  

use Illuminate\Database\Migrations\Migration;  
use Illuminate\Database\Schema\Blueprint;  
use Illuminate\Support\Facades\Schema;  

return new class extends Migration  
{  
    /**  
     * Run the migrations.  
     */  
    public function up(): void  
    {  
        Schema::table('carts', function (Blueprint $table) {  
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])  
                  ->default('pending')  
                  ->after('user_id'); // This will add the column after user_id  
        });  
    }  

    /**  
     * Reverse the migrations.  
     */  
    public function down(): void  
    {  
        Schema::table('carts', function (Blueprint $table) {  
            $table->dropColumn('status');  
        });  
    }  
};  