<?php

// database/migrations/xxxx_xx_xx_disable_foreign_keys.php
// database/migrations/2024_11_29_224713_disable_foreign_keys.php

// database/migrations/2024_11_29_224713_disable_foreign_keys.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class DisableForeignKeys extends Migration
{
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    }

    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
