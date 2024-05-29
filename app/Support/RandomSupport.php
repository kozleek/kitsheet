<?php

namespace App\Support;

class RandomSupport
{
    /**
     * Get a random placeholder name.
     * This method returns a random placeholder name.
     */
    public static function getRandomPlaceholderName($gender = 'random'): string
    {
        $randomPlaceholders = [
            "attributes" => [
                ['m' => 'Červený', 'f' => 'Červená'],
                ['m' => 'Modrý', 'f' => 'Modrá'],
                ['m' => 'Zelený', 'f' => 'Zelená'],
                ['m' => 'Velký', 'f' => 'Velká'],
                ['m' => 'Malý', 'f' => 'Malá'],
                ['m' => 'Rychlý', 'f' => 'Rychlá'],
                ['m' => 'Ostříž', 'f' => 'Ostřížka'],
                ['m' => 'Kulatý', 'f' => 'Kulatá'],
                ['m' => 'Hrubý', 'f' => 'Hrubá'],
                ['m' => 'Jemný', 'f' => 'Jemná'],
                ['m' => 'Hladký', 'f' => 'Hladká'],
                ['m' => 'Křehký', 'f' => 'Křehká'],
                ['m' => 'Průhledný', 'f' => 'Průhledná'],
                ['m' => 'Lesklý', 'f' => 'Lesklá'],
                ['m' => 'Matný', 'f' => 'Matná'],
                ['m' => 'Lesní', 'f' => 'Lesní'],
                ['m' => 'Horský', 'f' => 'Horská'],
                ['m' => 'Slunečný', 'f' => 'Slunečná'],
                ['m' => 'Podzimní', 'f' => 'Podzimní'],
                ['m' => 'Zimní', 'f' => 'Zimní'],
                ['m' => 'Jarní', 'f' => 'Jarní'],
                ['m' => 'Letní', 'f' => 'Letní'],
                ['m' => 'Veselý', 'f' => 'Veselá'],
                ['m' => 'Vznešený', 'f' => 'Vznešená'],
                ['m' => 'Divoký', 'f' => 'Divoká'],
                ['m' => 'Moudrý', 'f' => 'Moudrá'],
                ['m' => 'Šťastný', 'f' => 'Šťastná'],
            ],
            "names" => [
                ['m' => 'Medvěd', 'f' => 'Medvědice'],
                ['m' => 'Tygr', 'f' => 'Tygřice'],
                ['m' => 'Lev', 'f' => 'Lvice'],
                ['m' => 'Vlk', 'f' => 'Vlčice'],
                ['m' => 'Liška', 'f' => 'Liščice'],
                ['m' => 'Jezevec', 'f' => 'Jezevčice'],
                ['m' => 'Kocour', 'f' => 'Kočka'],
                ['m' => 'Pes', 'f' => 'Fena'],
                ['m' => 'Kůň', 'f' => 'Kobyla'],
                ['m' => 'Slon', 'f' => 'Slonice'],
                ['m' => 'Nosorožec', 'f' => 'Nosorožice'],
                ['m' => 'Žirafa', 'f' => 'Žirafice'],
                ['m' => 'Opice', 'f' => 'Opice'],
                ['m' => 'Krokodýl', 'f' => 'Krokodýlka'],
                ['m' => 'Papoušek', 'f' => 'Papoušice'],
                ['m' => 'Sokol', 'f' => 'Sokolice'],
                ['m' => 'Orel', 'f' => 'Orlice'],
                ['m' => 'Hroch', 'f' => 'Hrošice'],
                ['m' => 'Klokan', 'f' => 'Klokánice'],
                ['m' => 'Koala', 'f' => 'Koala'],
                ['m' => 'Králík', 'f' => 'Králice'],
                ['m' => 'Puma', 'f' => 'Puma'],
            ]
        ];

        // use random gender if not specified
        $gender = $gender == 'random' ? (rand(0, 1) == 0 ? 'm' : 'f') : $gender;

        // get a random attribute and name
        $randomAttribute = $randomPlaceholders['attributes'][rand(0, count($randomPlaceholders['attributes']) - 1)][$gender];
        $randomName = $randomPlaceholders['names'][rand(0, count($randomPlaceholders['names']) - 1)][$gender];
        return $randomAttribute . ' ' . $randomName;
    }

    /**
     * Get a random number from a range.
     * This method returns a random number from a range.
     */
    public static function getRandomNumber(array $range = ['min' => 0, 'max' => 100, 'decimals' => 0], string $level = 'normal')
    {
        $min = $range['min'];
        $max = $range['max'];
        $decimals = intval($range['decimals']);

        // adjust the range according to the level
        // switch ($level) {
        //     case 'basic':
        //         $max = $min + intval(($max - $min) / 3);
        //         break;
        //     case 'normal':
        //         break;
        //     case 'hard':
        //         $min = $min + intval(2 * ($max - $min) / 3);
        //         break;
        // }

        // if min and max are the same, return the number
        if ($min == $max) {
            return $min;
        } else {
            // if decimals are set, generate a random number with decimals
            if ($decimals > 0) {
                $divisor = pow(10, $decimals);
                $formatString = "%." . $decimals . "f";
                $randomNumber = rand($min, $max * $divisor) / $divisor;
                $randomNumber = sprintf($formatString, $randomNumber);
                return $randomNumber;
            } else {
                $randomNumber = rand($min, $max);
                if ($randomNumber < 0){
                    return '(' . $randomNumber . ')';
                } else {
                    return $randomNumber;
                }
            }
        }
    }

    /**
     * Get a random operation with a sign.
     * This method returns a random operation with a sign.
     */
    public static function getRandomSign(array $range = ['add', 'subtract', 'multiply', 'divide']): array
    {
        $operation = $range[rand(0, count($range) - 1)];

        switch ($operation) {
            case 'add':
                return ['operation' => $operation, 'sign' => '+'];
            case 'subtract':
                return ['operation' => $operation, 'sign' => '-'];
            case 'multiply':
                return ['operation' => $operation, 'sign' => '*'];
            case 'divide':
                return ['operation' => $operation, 'sign' => '/'];
        }
    }

    /**
     * Get a random code.
     * This method returns a random code.
     */
    public static function getRandomCode($uuid, int $length = 4): string
    {
        $hash = md5($uuid);
        return substr($hash, 0, $length);
    }
}
