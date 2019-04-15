<?php

namespace App\Console\Commands\Tenant;

use Illuminate\Console\Command;
use App\Hostname;
use App\Website;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;

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
        $website = new Website;
        app(WebsiteRepository::class)->create($website);

        $hostnames = $this->hostnames();
        $principal = $this->principal($hostnames);

        foreach ($hostnames as $hostname_item) {
            $hostname = new Hostname;
            $hostname->fqdn = $hostname_item;
            $hostname = app(HostnameRepository::class)->create($hostname);
            app(HostnameRepository::class)->attach($hostname, $website);
            if ($hostname_item !== $principal) {
                $hostname->redirect_to = 'https://' . $principal;
                $hostname->save();
            }
        }
        return 1;
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

    protected function principal(array $hostnames)
    {
        if (count($hostnames) > 1) {
            $hostname_principal = $this->choice("Nom de domain principal", $hostnames, $hostnames[0]);
        } else {
            $hostname_principal = $hostnames[0];
        }
        return $hostname_principal;
    }
}