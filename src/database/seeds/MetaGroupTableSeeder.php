<?php
namespace Futurelabs\Realplat\Database\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MetaGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meta_groups')->insert([
            [
                'name'       => "Arredi Bagno",
                'slug'       => "arredo-bagno-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Disponibilità Immobili",
                'slug'       => "available-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Sotto Categorie Immobili",
                'slug'       => "categoria-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Colori Calendario",
                'slug'       => "color-calendar",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Strategie Piani di Lavoro",
                'slug'       => "condizione-bp",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Documenti Immobiliari",
                'slug'       => "documenti-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Dotazioni Immobili",
                'slug'       => "dotazioni-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Tipo dio Erogazione Riscaldamento",
                'slug'       => "erogazione-riscaldamento-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Esposizione Solare",
                'slug'       => "esposizione-solare",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Fonti dei Contatti",
                'slug'       => "fonte-contatti",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Impianto di Riscaldamento",
                'slug'       => "impianto-riscaldamento-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Lavanderia",
                'slug'       => "lavanderia-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Lingua dei Contatti",
                'slug'       => "lingua-contatti",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Macro Categorie Immobili",
                'slug'       => "macro-categoria-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Rifiniture Immobili",
                'slug'       => "rifiniture-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Serie delle Policy",
                'slug'       => "serie-policy",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Serramenti Immobili",
                'slug'       => "serramenti-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Serramenti Vetro Immobili",
                'slug'       => "serramenti-vetro-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Sistema Fornitura dell'Acqua",
                'slug'       => "sistema-acqua-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Stato dei Contatti",
                'slug'       => "stato-contatti",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Stato degli Immobili",
                'slug'       => "stato-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Condizione Immobili",
                'slug'       => "condizione-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Stato Proprietari",
                'slug'       => "stato-proprietari",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Step Avanzamento Immobili",
                'slug'       => "step-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Tipo di Contatto",
                'slug'       => "tipo-contatti",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Tipologia di Tetto",
                'slug'       => "tipo-tetto",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Azioni Immobili", //Vendesi o Affittasi
                'slug'       => "tipo-vendita",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Titolo dei Contatti",
                'slug'       => "titolo-contatti",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Azioni Immobili",
                'slug'       => "vendita-affitto",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Tipi di Viste Immobili",
                'slug'       => "vista-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Zona di Destinazione Immobili",
                'slug'       => "zona-destinazione-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'name'       => "Stato di Gestione Immobili",
                'slug'       => "gestione-immobili",
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ]
        );
    }
}
