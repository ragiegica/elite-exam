<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Artist;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $artists = [
            "AB6IX",
            "aespa",
            "Apink",
            "ATEEZ",
            "BAE173",
            "BamBam",
            "Bang Yongguk",
            "Billlie",
            "Blitzers",
            "Bolbbalgan4",
            "Brave Girls",
            "BTOB",
            "Choi Yena",
            "Cravity",
            "Cherry Bullet",
            "Def.",
            "DKZ",
            "Dreamcatcher",
            "Drippin",
            "E'LAST",
            "Enhypen",
            "Enhypen",
            "Epex",
            "Epik High",
            "Eric Nam",
            "Everglow",
            "fromis_9",
            "(G)I-dle",
            "Ghost9",
            "Ha Sungwoon",
            "Highlight",
            "ILY:1",
            "IVE",
            "IVE",
            "Jinjin & Rocky",
            "Just B",
            "Kai",
            "Kang Hyewon",
            "Kep1er",
            "Kihyun",
            "Kim Jaehwan",
            "Kim Junsu",
            "Kim Sungkyu",
            "Kim Wooseok",
            "Kim Yohan",
            "Kingdom",
            "Kwon Eunbi",
            "Kyuhyun",
            "Lee Seokhoon",
            "Lee Seungyoon",
            "Lisa",
            "LUNA",
            "Max Changmin",
            "Mirae",
            "Miyeon",
            "Monsta X",
            "Monsta X",
            "Moonbin & Sanha",
            "Moonbyul",
            "Moonbyul",
            "NCT 127",
            "NCT 127",
            "NCT 2021",
            "NCT Dream",
            "NINE.i",
            "NMIXX",
            "NU'EST",
            "Oh My Girl",
            "Omega X",
            "Onew",
            "ONEWE",
            "ONF",
            "OnlyOneOf",
            "P1Harmony",
            "Pentagon",
            "Purple Kiss",
            "Ravi",
            "Red Velvet",
            "Rocket Punch",
            "Seventeen",
            "Solar",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "SMTOWN",
            "Suho",
            "StayC",
            "Stray Kids",
            "Stray Kids",
            "Super Junior",
            "Super Junior - D&E",
            "Taeyeon",
            "Tempest",
            "Tan",
            "The Boyz",
            "The Boyz",
            "Treasure",
            "Trendz",
            "Twice",
            "UP10TION",
            "Verivery",
            "Victon",
            "Viviz",
            "Weeekly",
            "WEi",
            "Wheein",
            "Wonho",
            "Wonpil",
            "WJSN Chocome",
            "Younha",
            "Yoon Jisung",
            "Younite",
            "Yuju",
        ];

        $artists = array_unique($artists);

        $artistData = [];
        foreach ($artists as $name) {
            $artistData[] = [
                'name' => $name,
                'code' => $faker->unique()->regexify('[A-Za-z0-9]{5}'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        Artist::insert($artistData);
    }
}
