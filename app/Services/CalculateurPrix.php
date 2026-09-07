<?php
namespace App\Services;
class CalculateurPrix
{
    /**
    * Calcule le prix TTC à partir d'un prix HT et d'un taux de taxe.
    * Le taux de taxe est exprimé en décimal (ex: 0.15 pour 15%).
    *
    * @throws \InvalidArgumentException si le taux est négatif
    */
    public function calculerAvecTaxe(float $prixHT, float $tauxTaxe): float
    {
        if ($tauxTaxe < 0) {
        throw new \InvalidArgumentException("Le taux de taxe ne peut pas être négatif.");
        }

        return round($prixHT * (1 + $tauxTaxe), 2);
    }
}
