<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class TestTaks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'es un comando de prueba para tareas Programadas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $texto =  "[" .  date("Y-m-d H:i:s") . "]"  . 'este es un mensaje de prueba ';

        Storage::append('archivo.txt', $texto);
    }
}
