<?php

namespace App\Console\Commands\Tenant;

use App\Hostname;
use Illuminate\Console\Command;

class CreateTenant extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new website';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->hostnames();
    }

    /**
     * Function to add hostnames to websites
     *
     * @param null $hostnames_present
     * @return array
     */
    protected function hostnames($hostnames_present = null)
    {
        $hostnames = array();
        if ($hostnames_present === null) {
            $boucle = true;
            while ($boucle === true) {
                $question = $this->ask("Nom de domain");
                if (Hostname::where("fqdn", $question)->first() !== null) {
                    $this->error("Ce nom de domain est déjà enregistré sur l'application");
                } else {
                    array_push($hostnames, $question);
                    $boucle = false;
                }
            }
        } elseif ($hostnames_present !== null) {
            foreach ($hostnames_present as $item) {
                array_push($hostnames, $item->fqdn);
            }
        }
        $boucle = true;
        while ($boucle === true) {
            if ($this->confirm("Ajouter un nouveau nom de domain ?")) {
                $hostname_ask = $this->ask("Nom de domain");
                if (in_array($hostname_ask, $hostnames)) {
                    $this->error("Ce nom de domain est déjà enregistré pour ce site");
                } else {
                    array_push($hostnames, $hostname_ask);
                }
            } else {
                $boucle = false;
            }
        }
        return $hostnames;
    }
}