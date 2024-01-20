<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('filieres')->insert([
            ['nom'=> 'ATPA/AGRICULTURE TROPICALE OPTION PRODUCTION ANIMALE',
            ],

            ['nom'=> 'ATPV/AGRICULTURE TROPICALE OPTION PRODUCTION VEGETALE',
           ],

           ['nom'=> 'AACV/ARTS ET AMENAGEMENT DU CADRE DE VIE',
           ],

           ['nom'=> 'AD/ASSISTANAT DE DIRECTION',
           ],

           ['nom'=> 'CJPI/CARRIERES JURIDIQUES ET PROFESSIONS IMMOBILIERES',
           ],

           ['nom'=> 'CV/COMMUNICATION VISUELLE',
           ],

           ['nom'=> 'COS/COSMETOLOGIE',
           ],

           ['nom'=> 'ELT/ELECTROTECHNIQUE',
           ],

           ['nom'=> 'FA/FINANCES ASSURANCES',
           ],


           ['nom'=> 'FCGE/FINANCES COMPTABILITE ET GESTION DES ENTREPRISES'
        ],

        ['nom'=> 'GBAT/GENIE CIVIL OPTION BATIMENT'
         ],

         ['nom'=> 'GGT/GENIE CIVIL OPTION GEOMETRE TOPOGRAPHE'
        ],

        ['nom'=> 'GTP/GENIE CIVIL OPTION TRAVAUX PUBLICS'
        ],

        ['nom'=> 'GEE/GENIE ENERGETIQUE ET ENVIRONNEMENT'
        ],

        ['nom'=> 'GEC/GESTION COMMERCIALE'
        ],

        ['nom'=> 'GERN/GESTION DE L\'ENVIRONNEMENT ET DES RESSOURCES NATURELLES'
        ],
        ['nom'=> 'GCT/GESTION DES COLLECTIVITES TERRITORIALES'
        ],
        ['nom'=> 'HST/HYGIENE ET SECURITE DU TRAVAIL'
        ],
        ['nom'=> 'IACC/INDUSTRIES AGRO-ALIMENTAIRES ET CHIMIQUES OPTION CONTRÔLE'
         ],
         ['nom'=> 'IACP/INDUSTRIES AGRO-ALIMENTAIRES ET CHIMIQUES OPTION PRODUCTION'
        ],
        ['nom'=> 'LOG/LOGISTIQUE'
            ],
            ['nom'=> 'MSP/MAINTENANCE DES SYSTEMES DE PRODUCTION'
        ],
        ['nom'=> 'MGP/MINES GEOLOGIE ET PETROLE'
        ],
        ['nom'=> 'IDA/INFORMATIQUE DEVELOPPEUR D\'APPLICATIONS'
        ],
        ['nom'=> '2MA/MOTEUR ET MECANIQUE AUTOMOBILE'
        ],
        ['nom'=> 'OPL/OPTIQUE LUNETTERIE'
        ],
        ['nom'=> 'RIT/RESEAUX INFORMATIQUES ET TELECOMMUNICATIONS'
        ],
        ['nom'=> 'RHC/RESSOURCES HUMAINES ET COMMUNICATION'
        ],
        ['nom'=> 'SIN/SCIENCES DE L\'INFORMATION'
        ],
        ['nom'=> 'SIP/SECURITE INCENDIE ET PREVENTION'
        ],
        ['nom'=> 'SEI/SYSTEMES ELECTRONIQUES ET INFORMATIQUES'
        ],
        ['nom'=> 'TH/TOURISME HOTELLERIE'
        ],
        ['nom'=> 'URBA/URBANISME'
        ],
        ]);
    }
}
