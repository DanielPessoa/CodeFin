<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use \CodeFin\Models\Bank;
use Illuminate\Http\UploadedFile;

class CreateBankLogoDefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $logo = new UploadedFile(
            storage_path('app/files/banks/logos/gringottslogo.png'),
            'gringottslogo.png'
        );
        $name = env('BANK_LOGO_DEFAULT');
        $destFile = Bank::logosDir();

        \Storage::disk('public')->putFileAs($destFile, $logo, $name);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $name = env('BANK_LOGO_DEFAULT');
        $path = \CodeFin\Models\Bank::logosDir(). '/' . $name;
        \Storage::disk('public')->delete($path);
    }
}
