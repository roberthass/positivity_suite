<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new \DateTime();
        DB::table('translations')->insert([
            'keyword' => 'langsam,Langsamheit,gemächlich,lahm,träge',
            'text' => 'Du könntest auch bedächtig oder nachdenklich sagen - oder Du bist etwas auf der Spur, dass Du durch Unterstützung, Nachfragen oder Gruppenarbeit ausgleichen kannst.',
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s'),
        ]);
        DB::table('translations')->insert([
            'keyword' => 'stur,Sturheit,störrig',
            'text' => 'Selbstbewusst oder hinterfragend wäre hier eine alternative Wahrnehmung. Der Schüler hat einen Grund, sich stur zu verhalten. Zum Beispiel kompensiert er ein Defizit oder er hat eine eigene Herangehensweise. Frage nach, ob er ein Thema vielleicht anders angehen möchte.',
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s'),
        ]);
        DB::table('translations')->insert([
            'keyword' => 'dumm,Dummheit,blöd,Blödheit,unwissend',
            'text' => 'Manchmal entsteht der Eindruck von Unwissenheit durch eine von der Norm abweichende Denkweise - versuche, die Dinge aus mehren Perspektiven zu erklären.',
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s'),
        ]);
        DB::table('translations')->insert([
            'keyword' => 'nervig,störend,Unruhe,Unruhestifter,Störenfried',
            'text' => 'Wenn Du aktiver bist als andere, lenke Deinen Tatendrang in die richtigen Bahnen, hinterfrage und nutze Deine Interessen.',
            'created_at' => $now->format('Y-m-d H:i:s'),
            'updated_at' => $now->format('Y-m-d H:i:s'),
        ]);
    }
}
